<?php

namespace App\Livewire\UserManagement;

use Livewire\Component;
use App\Models\User;
use App\Models\Branch;

class EditUser extends Component
{
    public User $user;

    public $branches = [];

    public $name;
    public $email;
    public $role;
    public $branch;
    public $status;

    public function mount(User $user)
    {
        $this->user = $user;

        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->branch = $user->branch;
        $this->status = $user->status;

        $this->branches = Branch::where('status', 'Active')
            ->orderBy('branch_name')
            ->get();
    }

    public function updateUser()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'role' => 'required',
            'branch' => 'nullable',
            'status' => 'required',
        ]);

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'branch' => $this->branch,
            'status' => $this->status,
        ]);

        session()->flash('success', 'User updated successfully.');

        return redirect()->route('users.index');
    }

    public function render()
    {
        return view('livewire.user-management.edit-user');
    }
}