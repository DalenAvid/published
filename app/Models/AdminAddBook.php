<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminAddBook extends Model
{
    use HasFactory;
    protected $table = 'book';

    protected $fillable = [
        'title',
        'author',
        'description',
        'language',
        'genre',
        'age',
        'year',
        'pages',
        'book_file',
        'cover_image',
        'price',
    ];
}
