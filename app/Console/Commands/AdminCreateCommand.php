<?php

namespace App\Console\Commands;

use App\Models\Administrator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AdminCreateCommand extends Command
{
    protected $signature = 'admin:create';

    protected $description = 'Create app administrator';

    public function handle()
    {
        $name = $this->ask('Name');
        $email = $this->ask('Email');
        $password = $this->secret('Password');
        $repeatPassword = $this->secret('Repeat password');
        if ($password === $repeatPassword) {
            Administrator::create(
                [
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                ]
            );
        } else {
            $this->error('Passwords do not match.');
        }
    }
}
