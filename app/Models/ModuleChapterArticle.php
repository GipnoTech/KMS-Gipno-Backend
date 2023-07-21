<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleChapterArticle extends Model
{
    use HasFactory;

    protected $fillable = ['article_id', 'training_section_id', 'title', 'content'];

    public function articles()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    public function trainingSection()
    {
        return $this->belongsTo(TrainingSection::class, 'training_section_id');
    }
}
