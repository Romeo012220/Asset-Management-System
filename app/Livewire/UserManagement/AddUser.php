<?php

namespace App\Livewire\UserManagement;

use App\Models\User;
use App\Models\Branch;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class AddUser extends Component
{
    public $name;
    public $email;
    public $password;
    public $role = 'Staff';
    public $branch;

    public function mount()
    {
        abort_unless(auth()->user()->role === 'Admin', 403);
    }

    public function save()
{
    $this->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
        'role' => 'required|in:Admin,Staff',
        'branch' => 'required|string|max:255',
    ]);

    User::create([
        'name' => $this->name,
        'email' => $this->email,
        'password' => Hash::make($this->password),
        'role' => $this->role,
        'branch' => $this->branch,
        'status' => 'Active',
    ]);

    return redirect()->route('users.index')
        ->with('success', 'User created successfully.');
}
    public function render()
    {
        return view('livewire.user-management.add-user', [
            'branches' => Branch::where('status', 'Active')
                ->orderBy('branch_name')
                ->get(),
        ]);
    }
}