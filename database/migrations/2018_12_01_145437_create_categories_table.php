<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->tinyInteger('deleted')->default(0);
            $table->tinyInteger('type');
            $table->string('created_by', 20)->default('System');
            $table->string('updated_by', 20)->default('System');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
