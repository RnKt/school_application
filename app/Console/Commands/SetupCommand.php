<?php

namespace App\Console\Commands;

use App\Models\Administrator;
use App\Models\Settings;
use App\Services\SettingsService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class SetupCommand extends Command
{
    protected $signature = 'app:setup';

    protected $description = 'Setup new application';

    public function handle()
    {
        /*$name = $this->ask('Name');
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
        }*/
        $name = $this->ask('App name');
        $this->info('Setting up application...');
        SettingsService::bootstrap();
        $this->info('Setup was successfully completed.');
    }
}
