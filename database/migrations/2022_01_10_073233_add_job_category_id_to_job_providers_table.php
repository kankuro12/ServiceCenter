<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJobCategoryIdToJobProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_providers', function (Blueprint $table) {
            $table->unsignedBigInteger('job_category_id')->nullable();
            $table->date('lastdate')->nullable();
            $table->integer('opening')->nullable();
            $table->integer('type')->nullable();
            $table->string('designation',100)->nullable();
            $table->text('salary')->nullable();
            $table->text('education')->nullable();
            $table->text('exp')->nullable();
            $table->integer('positiontype')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_providers', function (Blueprint $table) {
            //
            $table->dropColumn('job_category_id');
            $table->dropColumn('lastdate');
            $table->dropColumn('opening');
            $table->dropColumn('type');
            $table->dropColumn('designation');
            $table->dropColumn('salary');
            $table->dropColumn('education');
            $table->dropColumn('exp');
            $table->dropColumn('positiontype');
        });
    }
}
