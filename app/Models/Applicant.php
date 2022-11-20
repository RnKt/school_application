<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applicant extends Model
{
    use SoftDeletes;

    protected $table = 'applicant';

    protected $fillable = [
        'first_name',
        'last_name',
        'division_id',
        'school_year',
        'date_of_birth',
        'points',
        'email',
        'status',
    ];

}
