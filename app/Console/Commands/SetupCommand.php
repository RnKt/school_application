<?php

namespace App\Console\Commands;

use App\Models\Division;
use App\Models\Test;
use App\Models\Subject;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AdminCreateCommand extends Command
{
    protected $signature = 'setup:school';

    protected $description = 'setup:school';

    public function handle()
    {
        Division::create(
            [
            'name' => 'lyceum',
            'slug' => 'lyceum',
            'student_count' => 2,
            ]
        );
        Division::create(
            [
            'name' => 'PCI',
            'slug' => 'PCI',
            'student_count' => 3,
            ]
        );
        Division::create(
            [
            'name' => 'ELE',
            'slug' => 'ELE',
            'student_count' => 4,
            ]
        );

        Subject::create(
            [
            'name' => 'Matematika',
            'slug' => 'Matematika',
            ]
        );
        Subject::create(
            [
            'name' => 'Slovencina',
            'slug' => 'Slovencina',
            ]
        );
        Subject::create(
            [
            'name' => 'Anglictina',
            'slug' => 'Anglictina',
            ]
        );
        Subject::create(
            [
            'name' => 'Elektrotechnika',
            'slug' => 'Elektrotechnika',
            ]
        );

        Test::create(
            [
            'name' => 'Monitor matematika',
            'slug' => 'Monitor matematika',
            ]
        );
        Test::create(
            [
            'name' => 'Monitor slovencina',
            'slug' => 'Monitor slovencina',
            ]
        );

    }
}
