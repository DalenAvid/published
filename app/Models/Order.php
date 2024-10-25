<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'create_orders';
    // protected $fillable = [
    //     'phone',
    //     'address',
    //     'card_type',
    //     'card_number',
    //     'expiry_date',
    //     'cvv'
    // ];
    protected $fillable = [
        'user_id', 'book_id', 'phone', 'address','card_type', 'card_number', 'expiry_date', 'cvv', 'quantity', 'total_price'
    ];

    // Зв’язок з моделлю User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Зв’язок з моделлю Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
