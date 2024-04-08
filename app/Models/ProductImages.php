<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;
    protected $primaryKey = 'imageID';
    protected $fillable = ['productID', 'image_path'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID');
    }
}
