<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TrainingSection extends Model
{
    use HasFactory;

    public $timestamps=false;
    protected $fillable=['title','content','training_id', 'test_id'];

    public function training(): BelongsTo
    {
        return $this->belongsTo(Training::class, 'training_id');
    }

    public function test():HasOne
    {
        return $this->hasOne(Test::class, 'test_id');
    }

}
