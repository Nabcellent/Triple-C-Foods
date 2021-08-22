<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperOrdersProduct
 */
class OrdersProduct extends Model {
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'details',
        'quantity',
        'price',
    ];

    /**
     * RELATIONSHIP FUNCTIONS
     */
    public function order(): BelongsTo {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
