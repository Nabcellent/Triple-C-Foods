<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperProductsImage
 */
class ProductsImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * RELATIONSHIP FUNCTIONS
     */
    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
