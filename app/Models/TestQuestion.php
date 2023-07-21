<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestQuestion extends Model
{
    use HasFactory;
    protected $fillable =['title','text','question_number','answers'];

    public $timestamps = false;

    protected $casts =[
        'answers'=>'array'
    ];

    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class);
    }

//    public function result():HasMany{
//        return $this->hasMany(TestResult::class);
//    }
}
