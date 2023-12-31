<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    use HasFactory;

    protected $fillable=['test_id','user_id','question_id','answers'];

    protected $casts = [
        'answers'=>'array'
    ];
}
