<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_team_id');
            $table->unsignedBigInteger('receiver_team_id');
            $table->foreign('sender_team_id')->references('id')->on('teams');
            $table->foreign('receiver_team_id')->references('id')->on('teams');
            $table->integer('status')->default(0);
            $table->integer('project_id')->default(0);
            $table->string('message')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('partners');
    }
}
