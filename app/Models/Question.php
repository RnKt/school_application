<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use SoftDeletes;

    protected $table = 'applicant';

    protected $fillable = [
        'test_id',
        'question',
    ];
}
