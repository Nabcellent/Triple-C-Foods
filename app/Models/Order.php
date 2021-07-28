<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperOrder
 */
class Order extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'phone',
        'total',
        'status'
    ];

    /**
     * RELATIONSHIP FUNCTIONS
     */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function orderProducts(): HasMany {
        return $this->hasMany(OrdersProduct::class)->with('product');
    }
}
