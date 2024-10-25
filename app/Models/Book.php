<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'book';
    public $timestamps = false;
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
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

}
