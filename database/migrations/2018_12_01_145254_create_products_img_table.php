<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsImgTable extends Migration
{

    public function up()
    {
        Schema::create('products_img', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->string('image')->comment('Link of image');
            $table->tinyInteger('deleted')->default(0);
            $table->string('created_by', 20)->default('System');
            $table->string('updated_by', 20)->default('System');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('products_img');
    }
}
