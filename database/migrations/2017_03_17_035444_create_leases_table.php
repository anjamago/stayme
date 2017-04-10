<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leases', function (Blueprint $table) {
            $table->increments('id_lease');
            $table->integer('id_city');
            $table->integer('id_departmen');
            $table->integer('id_outskirt');
            $table->integer('id_lease_type');
            $table->integer('id_lease_tiame');
            $table->integer('id_gender');
            $table->integer('id_user');
            $table->integer('id_role');
            $table->string('prince');
            $table->longText('description');
            $table->longText('rules');
            $table->integer('room');
            $table->longText('cause');
            $table->string('address');
            $table->binary('enabled');
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
        Schema::dropIfExists('leases');
    }
}
