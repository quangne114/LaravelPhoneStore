<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->id('productID');
            $table->unsignedBigInteger('categoryID');
            $table->unsignedBigInteger('brandID');    
            $table->string('productname');
            $table->text('productdesc');
            $table->float('productprice');
            $table->string('productimage');
            $table->integer('productstatus');
            $table->timestamps();
    
            // Khai báo các khóa ngoại
            $table->foreign('categoryID')->references('categoryID')->on('tbl_categoryproduct');
            $table->foreign('brandID')->references('brandID')->on('tbl_brandproduct');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_product');
    }
};
