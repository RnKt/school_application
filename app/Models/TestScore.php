<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TestScore extends Model
{
    use SoftDeletes;

    protected $table = 'applicant_test_score';

    protected $fillable = [
        'test_id',
        'applicant_id',
        'score',
        'points', 
    ];
}
