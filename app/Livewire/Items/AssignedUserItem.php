<?php

namespace App\Livewire\Items;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Item;

class AssignedUserItem extends Component
{
    use WithPagination;

    public $search = '';
    public $category = '';
    public $status = '';

    protected $paginationTheme = 'tailwind';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedCategory()
{
    $this->resetPage();
}

public function updatedStatus()
{
    $this->resetPage();
}
public function render()
{
    $user = auth()->user();

    $items = Item::query()
        ->whereNotNull('assigned_to')
        ->where('assigned_to', '!=', '')

        // Staff can only see assets assigned to them
        ->when(strtolower($user->role) === 'staff', function ($query) use ($user) {
            $query->where('assigned_to', $user->name);
        })

        ->when($this->search, function ($query) {
            $query->where(function ($q) {
                $q->where('asset_tag', 'like', '%' . $this->search . '%')
                  ->orWhere('item_name', 'like', '%' . $this->search . '%')
                  ->orWhere('serial_number', 'like', '%' . $this->search . '%');
            });
        })
        ->when($this->category, function ($query) {
            $query->where('category', $this->category);
        })
        ->when($this->status, function ($query) {
            if ($this->status === 'In Use') {
                $query->whereNotNull('assigned_to')
                      ->where('assigned_to', '!=', '');
            }
        })
        ->latest()
        ->paginate(5);

    return view('livewire.items.assigned-user-item', [
        'items' => $items,

        'categories' => Item::whereNotNull('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category'),

        'statuses' => collect(['In Use']),
    ]);
}
}