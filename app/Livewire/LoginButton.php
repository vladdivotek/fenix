<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginButton extends Component
{
    public function login()
    {
        $credentials = [
            'email' => 'jamesbond@localhost.com',
            'password' => 'password',
        ];

        Auth::attempt($credentials)
            ? session()->flash('message', 'You are successfully logged in')
            : session()->flash('error', 'Incorrect email or password');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.login-button');
    }
}
