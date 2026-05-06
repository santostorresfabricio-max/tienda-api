<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'client_id',
        'order_number',
        'total_amount',
        'status',
        'notes',
        'ordered_at',
    ];

    public function client(){
    return $this->belongsTo(Client::class);
        }

        public function products(){
            return $this->belongsToMany(Product::class)->withPivot('quantity', 'price')->withTimestamps();
        }
}
