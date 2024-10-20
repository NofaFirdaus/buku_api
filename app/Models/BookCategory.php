<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    /** @use HasFactory<\Database\Factories\BookCategoryFactory> */
    use HasFactory;
    protected $table ='book_categories';
    protected $fillable = ['category_name'];
    public function bukus()
    {
        return $this->hasMany(Books::class, 'category_id','id');
    }
}
