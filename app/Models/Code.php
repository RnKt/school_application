<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Code extends Model
{
    use SoftDeletes;

    protected $table = 'code';

    protected $fillable = [
        'code', 
        'applicant_id'
    ];

}
