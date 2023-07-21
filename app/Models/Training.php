<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Attribute;

class Training extends Model
{
    use HasFactory;

    protected $fillable=['name','description','author_id', 'test_id', 'main_section_id'];


    public function mainSection()
    {
        return $this->belongsTo(MainSection::class, 'main_section_id');
    }

    public function sections():HasMany
    {
        return $this->hasMany(TrainingSection::class);
    }

    public function test():HasOne
    {
        return $this->hasOne(Test::class, 'test_id');
    }

    public function progress():\Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get:function(){
            return  Auth::user()->trainings()->where('trainings.id', $this->id)->first()?->pivot?->progress;
        });

    }


}
