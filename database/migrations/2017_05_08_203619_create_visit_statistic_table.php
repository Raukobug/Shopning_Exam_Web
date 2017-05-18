<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitStatisticTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_statistic', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('shop_id')->unsigned();
			$table->foreign('shop_id')->references('id')->on('shop');
			$table->integer('visit_count');
			$table->integer('unique_visit_count');
			$table->date('date');
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
        Schema::dropIfExists('visit_statistic');
    }
}
