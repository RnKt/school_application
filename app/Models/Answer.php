<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use SoftDeletes;

    protected $table = 'answer';

    protected $fillable = [
        'answer',
        'question_id',
        'isTrue',
    ];
}
