<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{

    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
        	$table->increments('id');
        	$table->string('name', 255);
        	$table->float('price_in');
        	$table->float('price_out');
        	$table->float('price_sell');
            $table->string('image')->comment('Link of image');
        	$table->integer('category_id');
        	$table->integer('tag_id');
            $table->text('properties');
        	$table->date('exp_date')->default(date('Y-m-d'));
        	$table->string('brand_name', 20);
            $table->integer('stock');
			$table->tinyInteger('deleted')->default(0);
			$table->string('created_by', 20)->default('System');
			$table->string('updated_by', 20)->default('System');
			$table->timestamps();
		});
    }


    public function down()
    {
		Schema::dropIfExists('products');
    }
}
