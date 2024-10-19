<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Books extends Model
{
    /** @use HasFactory<\Database\Factories\BooksFactory> */
    use HasFactory;
    protected $table = 'books';
    protected $fillable = ['judul','penulis','harga','stok','category_id'];

    public function category() :BelongsTo{
        return $this->belongsTo(BookCategory::class);
    }
}
