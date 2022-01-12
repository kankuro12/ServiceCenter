<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->string('fname',100)->nullable();
            $table->string('mname',100)->nullable();
            $table->string('name',100);
            $table->string('address',100);
            $table->string('phone',100);
            $table->string('email',100);
            $table->string('citizen',100)->default('nepali');
            $table->string('country',100)->nullable();
            $table->string('city',100)->nullable();
            $table->string('addr',100)->nullable();
            $table->date('dob')->nullable();
            $table->text('summary')->nullable();
            $table->unsignedBigInteger('user_id');

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
        Schema::dropIfExists('resumes');
    }
}
