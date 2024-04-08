<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class CategoryProduct extends Model
{
    use HasFactory;
    protected $table = 'tbl_categoryproduct';
    protected $primaryKey = 'categoryID';
    protected $fillable = ['categoryname', 'categorydesc'];
    public function product()
    {
        return $this->hasMany(Product::class, 'categoryID');
    }
}
