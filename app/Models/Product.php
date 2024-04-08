<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryProduct;
use App\Models\BrandProduct;
use App\Models\ProductImages;
class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'productID';
    protected $table = 'tbl_product';

    protected $fillable = [
        'ProductID',
        'productname',
        'productdesc',
        'productprice',
        'productimage',
        'productstatus',
        'categoryID',
        'brandID'
    ];

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'categoryID');
    }
    public function brand()
    {
        return $this->belongsTo(BrandProduct::class, 'brandID');
    }
    public function images()
    {
        return $this->hasMany(ProductImages::class, 'productID');
    }
}
