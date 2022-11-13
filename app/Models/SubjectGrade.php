<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SubjectGrade extends Model
{
    use SoftDeletes;

    protected $table = 'applicant_subject_grades';

    protected $fillable = [
        'subject_id',
        'applicant_id',
        'grade',
        'points', 
    ];

}