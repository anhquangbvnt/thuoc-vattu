<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone', 15)->default('');
            $table->tinyInteger('role')->default(0);
            $table->integer('membership_id')->default(0);
            $table->boolean('gender')->comment('1 is Man, 2 is Woman')->default(0);
            $table->string('facebook')->default('');
            $table->tinyInteger('deleted')->default(0);
            $table->string('created_by', 20)->default('System');
            $table->string('updated_by', 20)->default('System');
            $table->rememberToken();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('users');
    }
}
