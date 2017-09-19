<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_roles', function (Blueprint $table) {
           $table->integer('user_id')->unsigned();
           $table->integer('role_id')->unsigned();

	        //FOREIGN KEY CONSTRAINTS
	        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
	        $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

	        //SETTING THE PRIMARY KEYS
	        $table->primary(['user_id','role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_roles');
    }
}
