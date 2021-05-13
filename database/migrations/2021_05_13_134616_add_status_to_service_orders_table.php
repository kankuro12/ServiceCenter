<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToServiceOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_orders', function (Blueprint $table) {
            $table->unsignedInteger("status")->default(0);
        });

        Schema::table('deliveries', function (Blueprint $table) {
            $table->unsignedInteger("status")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_orders', function (Blueprint $table) {
            //
            $table->dropColumn('status');
        });
        Schema::table('deliveries', function (Blueprint $table) {
            //
            $table->dropColumn('status');
        });
        
    }
}
