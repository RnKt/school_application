<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use SoftDeletes;

    protected $table = 'exam';

    protected $fillable = [
        'name',
        'test_category',
    ];
}
