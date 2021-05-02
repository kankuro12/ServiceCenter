<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_order_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('service_type_item_id');
            $table->foreign('service_type_item_id')->references('id')->on('service_type_items')->onDelete('cascade');


            $table->unsignedBigInteger('service_orders_id');
            $table->foreign('service_orders_id')->references('id')->on('service_orders')->onDelete('cascade');

            $table->decimal('total',10,2)->default(0);

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
        Schema::dropIfExists('service_order_items');
    }
}
