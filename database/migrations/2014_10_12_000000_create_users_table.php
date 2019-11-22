<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->primarykey()->unsigned();
            $table->string('FName');
            $table->string('LName');
            $table->string('email')->unique();
            $table->string('NIC')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('DOB');
            $table->string('avatar')->default('default.jpg');
            $table->boolean('is_admin')->default(0);
            $table->boolean('is_tutor')->default(0);
            $table->boolean('is_student')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
