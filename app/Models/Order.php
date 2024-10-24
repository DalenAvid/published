<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'create_orders';
    protected $fillable = [
        'phone',
        'address',
        'card_type',
        'card_number',
        'expiry_date',
        'cvv'
    ];
}
