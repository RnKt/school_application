<?php

namespace Database\Seeders;

use App\Models\Administrator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    private function getData()
    {
        return [
            'administrators' => [
                [
                    'name' => 'Administrátor',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('1234'),
                ]
            ],
        ];
    }

    public function run()
    {

        $data = $this->getData();

        foreach ($data['administrators'] as $administrator) {
            Administrator::create($administrator);
        }
    }
}
