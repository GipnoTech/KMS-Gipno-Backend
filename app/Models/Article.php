<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['main_section_id', 'parent_id', 'category_id', 'title', 'content'];

    public function mainSection()
    {
        return $this->belongsTo(MainSection::class, 'main_section_id');
    }

    public function articlesCategory()
    {
        return $this->belongsTo(ArticleCategory::class, 'category_id');
    }

    public function parent()
    {
        return $this->belongsTo(Article::class, 'parent_id');
    }
}
