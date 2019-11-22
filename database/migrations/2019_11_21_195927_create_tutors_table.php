<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutors', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('Qualification')->nullable();
            $table->string('referName')->nullable();
            $table->string('referStatus')->nullable();
            $table->string('referEmail')->nullable();
            $table->string('referNumber')->nullable();
            $table->boolean('approved')->default(0);
            $table->integer('subject_id')->default(1);
            $table->integer('rate')->default(1000);
            $table->biginteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('tutors');
    }
}
