<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BidTableAddCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bids', function (Blueprint $table) {
            $table->integer('category_id');
            $table->integer('country_id')->default(1);
            $table->integer('city_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('status_id')->default(1);
            $table->json('fields')->nullable();
            $table->decimal('price')->nullable();
            $table->integer('currency_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bids', function (Blueprint $table) {
            $table->dropColumn('category_id');
            $table->dropColumn('country_id');
            $table->dropColumn('district_id');
            $table->dropColumn('city_id');
            $table->dropColumn('status_id');
            $table->dropColumn('price');
            $table->dropColumn('fields');
            $table->dropColumn('currency_id');
        });
    }
}
