<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Team extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->string('description');
            $table->string('phone');
            $table->integer('number_of_staff');
            $table->integer('city_id');
            $table->integer('district_id');
            $table->integer('country_id');
            $table->integer('sector_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn('description', 'phone',
                'number_of_staff', 'city_id', 'district_id', 'country_id','sector_id');
        });
    }
}
