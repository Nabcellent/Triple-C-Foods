<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperProduct
 */
class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'image',
        'description',
        'price',
        'stock',
        'discount',
    ];

    /**
     * RELATIONSHIP FUNCTIONS
     */
    public function cart(): HasMany {
        return $this->hasMany(Cart::class);
    }

    public function orderProducts(): HasMany {
        return $this->hasMany(OrdersProduct::class);
    }

    public function productImages(): HasMany {
        return $this->hasMany(ProductsImage::class);
    }
}
