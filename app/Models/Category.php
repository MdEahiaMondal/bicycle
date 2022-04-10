<?php

namespace App\Models;

use Auth;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @mixin Eloquent
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'description',
        'status',
        'created_by',
        'updated_by',
    ];

    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::creating(function (Category $category){
            $category->slug = slug($category->name);
            $category->created_by = Auth::id() ?? 1;
            $category->updated_by = Auth::id() ?? 1;
        });

        static::updating(function (Category $category){
            $category->slug = slug($category->name);
            $category->updated_by = Auth::id();
        });
    }

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeMainCategory($query)
    {
        return $query->where('parent_id', 0);
    }

    public function isMain()
    {
        return $this->parent_id == 0;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
