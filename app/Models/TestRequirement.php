<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestRequirement extends Model
{
    use SoftDeletes;

    protected $table = 'test_requirement';

    protected $fillable = [
        'division_id',
        'test_id',
    ];

}
