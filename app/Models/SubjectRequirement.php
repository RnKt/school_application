<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubjectRequirement extends Model
{
    use SoftDeletes;

    protected $table = 'subject_requirement';

    protected $fillable = [
        'division_id',
        'subject_id',
    ];

}
