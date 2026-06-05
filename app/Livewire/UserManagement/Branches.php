<?php

namespace App\Livewire\UserManagement;

use App\Models\Branch;
use Livewire\Component;

class Branches extends Component
{
    public $showModal = false;

    public $branch_name;
    public $location;
    public $status = 'Active';
    public $search = '';
    public $statusFilter = '';
    public $editingBranchId = null;


    public function mount()
    {
        abort_unless(auth()->user()->role === 'Admin', 403);
    }

   public function openModal()
{
    $this->resetValidation();
    $this->reset(['branch_name', 'location', 'editingBranchId']);
    $this->status = 'Active';
    $this->showModal = true;
}

   public function closeModal()
{
    $this->showModal = false;
    $this->reset(['branch_name', 'location', 'editingBranchId']);
    $this->status = 'Active';
}

    public function save()
{
    $this->validate([
        'branch_name' => 'required|string|max:255|unique:branches,branch_name,' . $this->editingBranchId,
        'location' => 'nullable|string|max:255',
        'status' => 'required|in:Active,Inactive',
    ]);

    if ($this->editingBranchId) {
        Branch::findOrFail($this->editingBranchId)->update([
            'branch_name' => $this->branch_name,
            'location' => $this->location,
            'status' => $this->status,
        ]);

        session()->flash('success', 'Branch updated successfully.');
    } else {
        Branch::create([
            'branch_name' => $this->branch_name,
            'location' => $this->location,
            'status' => $this->status,
        ]);

        session()->flash('success', 'Branch added successfully.');
    }

    $this->closeModal();
}

    public function render()
{
    $branches = Branch::query()

        ->when($this->search, function ($query) {
            $query->where('branch_name', 'like', '%' . $this->search . '%');
        })

        ->when($this->statusFilter, function ($query) {
            $query->where('status', $this->statusFilter);
        })

        ->latest()
        ->get();

    return view('livewire.user-management.branches', [
        'branches' => $branches,
    ]);
}

    public function toggleStatus($branchId)
{
    $branch = Branch::findOrFail($branchId);

    $branch->update([
        'status' => $branch->status === 'Active'
            ? 'Inactive'
            : 'Active'
    ]);

    session()->flash('success', 'Branch status updated successfully.');
}

public function editBranch($branchId)
{
    $branch = Branch::findOrFail($branchId);

    $this->editingBranchId = $branch->id;
    $this->branch_name = $branch->branch_name;
    $this->location = $branch->location;
    $this->status = $branch->status;

    $this->showModal = true;
}
}