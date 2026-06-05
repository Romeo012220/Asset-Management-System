<?php

namespace App\Livewire\UserManagement;

use Livewire\Component;
use App\Models\User;

class UserList extends Component
{
    public $search = '';
    public $statusFilter = '';

    public function toggleStatus($userId)
    {
        $user = User::findOrFail($userId);

        $user->update([
            'status' => $user->status === 'Active'
                ? 'Inactive'
                : 'Active'
        ]);
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->statusFilter, function ($query) {
                $query->where('status', $this->statusFilter);
            })
            ->latest()
            ->get();

        return view('livewire.user-management.user-list', [
            'users' => $users,
        ]);
    }
}