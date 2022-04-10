<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * @method static latest()
 */
class Product extends Model
{
    use HasFactory;

    const PRODUCT_WIDTH = 716;
    const PRODUCT_HEIGHT = 930;

    protected $fillable = [
        'category_id',
        'brand_id',
        'tax_id',
        'name',
        'slug',
        'price',
        'discount_price',
        'stock',
        'code',
        'color',
        'details',
        'weight',
        'status',
        'feature',
        'on_sale',
        'created_by',
        'updated_by',
    ];

    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::creating(function (Product $product) {
            $product->slug = slug($product->name);
            $product->created_by = Auth::id() ?? 1;
            $product->updated_by = Auth::id() ?? 1;
        });

        static::updating(function (Product $product) {
            $product->slug = slug($product->name);
            $product->updated_by = Auth::id();
        });
    }


    public function images(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function productPricesWithSize(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductPrice::class);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function createdBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function updatedBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }


    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeOnSale($query)
    {
        return $query->where('on_sale', 1)->active();
    }

    public function scopeFeature($query)
    {
        return $query->where('feature', 1)->active()->onsale();
    }
}
