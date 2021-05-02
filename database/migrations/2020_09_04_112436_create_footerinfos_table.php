<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooterinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footerinfos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('col_1');
            $table->text('item_1');
            $table->text('col_2');
            $table->text('item_2');
            $table->text('col_3');
            $table->text('item_3');
            $table->text('col_4');
            $table->text('item_4');
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
        Schema::dropIfExists('footerinfos');
    }
}
