<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('imgProfile')->nullable();
            $table->string('name');
            // $table->string('pseudo');
            $table->string('email')->nullable();
            $table->string('matricule')->unique();
            $table->enum('role',['student', 'teacher'])->default('student');
            $table->string('password');
            $table->string('filiere');
            $table->integer('question_asked')->default(0);
            $table->integer('question_answered')->default(0);
            $table->unsignedBigInteger('departement_id');
            $table->foreign('departement_id')->references('id')->on('departements');
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
