<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centres', function (Blueprint $table) {
            $table->id();
            $table->integer('num_centre');
            $table->string('nom_centre');
            $table->unsignedBigInteger('commune_id');
            
            $table->foreign('commune_id')->references('id')
            ->on('communes');
            
            $table->unsignedBigInteger('wilaya_id');
            
            $table->foreign('wilaya_id')->references('id')
            ->on('wilayas');

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
        Schema::dropIfExists('centres');
    }
}
