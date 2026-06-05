<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email;
    public $password;
    public $remember = false;

   public function login()
{
    $this->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

   if (Auth::attempt([
    'email' => $this->email,
    'password' => $this->password,
    'status' => 'Active',
], $this->remember)) {

        $user = Auth::user();

        if ($user->status !== 'Active') {

            Auth::logout();

            session()->invalidate();
            session()->regenerateToken();

            $this->addError(
                'email',
                'Your account has been disabled. Please contact the administrator.'
            );

            return;
        }

        session()->regenerate();

        return redirect()->route('items.index');
    }

    $this->addError('email', 'Invalid email or password.');
}

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('layouts.guest');
    }
}