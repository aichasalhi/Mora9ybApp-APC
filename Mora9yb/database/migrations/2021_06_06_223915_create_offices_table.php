<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('num_office')->nullable();
                         $table->unsignedBigInteger('nbr_électeurs_inscrits')->nullable();
                         $table->unsignedBigInteger('nbrvotants')->nullable();
                         $table->unsignedBigInteger('nbrdoc_contest')->nullable();
                         $table->unsignedBigInteger('nbrdoc_annuler')->nullable();
                         $table->unsignedBigInteger('nbrvotes_exprim')->nullable();
                      
             
                         $table->unsignedBigInteger('centre_id');
                         
                         $table->foreign('centre_id')->references('id')
                         ->on('centres');
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
        Schema::dropIfExists('offices');
    }
}
