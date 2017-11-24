<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_offer_user', function (Blueprint $table) {
            $table->integer('job_offers_id')->unsigned();
            $table->foreign('job_offers_id')->references('id')->on('job_offers')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_offer_user', function (Blueprint $table) {
            $table->dropForeign(['job_offer_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('job_offer_user');
    }
}
