<?php

// app/Models/Article.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Add fields that are mass assignable
    protected $fillable = [
        'title',
        'content',
        'category_id',
    ];

    // Define the relationship to Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Define the relationship to Tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}