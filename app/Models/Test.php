<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Test extends Model
{
    use HasFactory;

    protected $fillable =['title','description', 'questions'];
    public $timestamps=false;

    protected $casts = ['questions' => 'array'];

    public function questions():HasMany
    {
        return $this->hasMany(TestQuestion::class);
    }

    public function training():BelongsTo
    {
        return $this->belongsTo(Training::class);
    }
}
