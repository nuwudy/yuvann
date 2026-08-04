<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public string $email = '';
    public string $password = '';

    protected array $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function mount(): void
    {
        if (Auth::check()) {
            redirect()->to('/admin/products');
        }
    }

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();
            return redirect()->intended('/admin/products');
        }

        $this->addError('email', 'Invalid credentials provided.');
    }

    public function render()
    {
        return view('livewire.admin.login')
            ->layout('components.layouts.app', ['title' => 'Admin Login - Yuvann Wellness']);
    }
}
