<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exps', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('company',100);
            $table->string('city',100);
            $table->text('desc');
            $table->integer('start');
            $table->integer('end');
            $table->unsignedBigInteger('resume_id');
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
        Schema::dropIfExists('exps');
    }
}
