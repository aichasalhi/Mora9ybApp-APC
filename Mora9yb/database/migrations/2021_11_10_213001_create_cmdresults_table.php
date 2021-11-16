<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmdresultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmdresults', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nbr_électeurs_inscrits')->nullable();
            $table->unsignedBigInteger('nbrvotants')->nullable();
            $table->unsignedBigInteger('nbrdoc_contest')->nullable();
            $table->unsignedBigInteger('nbrdoc_annuler')->nullable();
            $table->unsignedBigInteger('nbrvotes_exprim')->nullable();
            $table->unsignedBigInteger('L1')->nullable();
            $table->unsignedBigInteger('L3')->nullable();
            $table->unsignedBigInteger('L4')->nullable();
            $table->unsignedBigInteger('L5')->nullable();
            $table->unsignedBigInteger('L6')->nullable();
            
            $table->unsignedBigInteger('L8')->nullable();
            $table->unsignedBigInteger('L10')->nullable();
            $table->unsignedBigInteger('L11')->nullable();
            
            $table->unsignedBigInteger('L16')->nullable();
          
            $table->unsignedBigInteger('L2')->nullable();
            $table->unsignedBigInteger('L7')->nullable();
            $table->unsignedBigInteger('L9')->nullable();
            $table->unsignedBigInteger('L12')->nullable(); 
            $table->unsignedBigInteger('L13')->nullable();
            $table->unsignedBigInteger('L14')->nullable();
            $table->unsignedBigInteger('L15')->nullable();
            $table->unsignedBigInteger('L17')->nullable();
            $table->unsignedBigInteger('L18')->nullable();
            $table->unsignedBigInteger('L19')->nullable();
            $table->unsignedBigInteger('L20')->nullable();
            $table->unsignedBigInteger('L21')->nullable();
            $table->unsignedBigInteger('L22')->nullable();
            $table->unsignedBigInteger('L23')->nullable();
            $table->unsignedBigInteger('L24')->nullable();
            $table->unsignedBigInteger('L25')->nullable(); 
            $table->unsignedBigInteger('L26')->nullable();
            $table->unsignedBigInteger('L27')->nullable();
            $table->unsignedBigInteger('L28')->nullable();
            $table->unsignedBigInteger('L29')->nullable();
            $table->unsignedBigInteger('L30')->nullable();
            $table->unsignedBigInteger('L31')->nullable();
            $table->unsignedBigInteger('L32')->nullable();
            $table->unsignedBigInteger('L33')->nullable();
            $table->unsignedBigInteger('L34')->nullable();
            $table->unsignedBigInteger('L35')->nullable();
            $table->unsignedBigInteger('L36')->nullable(); 
            $table->unsignedBigInteger('L37')->nullable();
            $table->unsignedBigInteger('L38')->nullable();
            $table->unsignedBigInteger('L39')->nullable();
            $table->unsignedBigInteger('L40')->nullable();

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
        Schema::dropIfExists('cmdresults');
    }
}
