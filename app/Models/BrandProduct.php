<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class BrandProduct extends Model
{
    use HasFactory;
    protected $table = 'tbl_brandproduct';
    protected $primaryKey = 'brandID';
    protected $fillable = ['brandname', 'branddesc'];
    public function product()
    {
        return $this->hasMany(Product::class, 'brandID');
    }
}
