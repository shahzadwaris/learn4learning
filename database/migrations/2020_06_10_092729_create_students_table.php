<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('parent_email',50)->nullable();
            $table->boolean('marketing_preference')->nullable();
            $table->dateTime('dob')->nullable();
//            $table->unsignedBigInteger('user_id');
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//            $table->boolean('online_session')->nullable();
//            $table->string('discription',50)->nullable();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('students');
        Schema::disableForeignKeyConstraints();
    }
}
