<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->enum('type',['individual','series'])->default('individual');
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->enum('frequency',['daily','weekly',' fortnightly','monthly'])->nullable();
            $table->string('document')->nullable();
            $table->string('link')->nullable();
            $table->string('thumbnail')->nullable();
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
        Schema::dropIfExists('lessons');
        Schema::disableForeignKeyConstraints();

    }
}
