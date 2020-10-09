<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
//            $table->unsignedBigInteger('experience_id');
//            $table->foreign('experience_id')->references('id')->on('experiences')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('Education',50)->nullable();
            $table->string('taught_level',50)->nullable();
            $table->boolean('marketing_preference')->nullable();
//            $table->string('discription',266)->nullable();
//            $table->string('profession',50)->nullable();
//            $table->boolean('online_session')->nullable();
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
        Schema::dropIfExists('teachers');
        Schema::disableForeignKeyConstraints();
    }
}
