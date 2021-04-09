<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid_offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bid_id');
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('bid_id')->references('id')->on('bids');
            $table->text('body')->nullable();
            $table->double('price')->nullable();
            $table->timestamps();
        });

        Schema::table('bids', function (Blueprint $table) {
            $table->integer('offer_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bid_offers');

        Schema::table('bids', function (Blueprint $table) {

            $table->dropColumn('offer_type');
        });

    }
}
