<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'table_number',
        'order',
        'total_price',
        'delivered'
    ];

    protected $casts = [
        'order' => 'array'
    ];
}
