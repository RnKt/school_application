<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ExamCategory extends Model
{
    use SoftDeletes;

    protected $table = 'exam_category';

    protected $fillable = [
        'name',
    ];
}
