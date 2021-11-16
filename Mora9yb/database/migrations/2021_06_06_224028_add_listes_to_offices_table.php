<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddListesToOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offices', function (Blueprint $table) {
            $table->unsignedBigInteger('L1')->nullable();
            $table->unsignedBigInteger('L3')->nullable();
            $table->unsignedBigInteger('L4')->nullable();
            $table->unsignedBigInteger('L5')->nullable();
            $table->unsignedBigInteger('L6')->nullable();
            // $table->unsignedBigInteger('L7')->nullable();
            $table->unsignedBigInteger('L8')->nullable();
            $table->unsignedBigInteger('L10')->nullable();
            $table->unsignedBigInteger('L11')->nullable();
            // $table->unsignedBigInteger('L12')->nullable(); 
            // $table->unsignedBigInteger('L13')->nullable();
            // $table->unsignedBigInteger('L14')->nullable();
            // $table->unsignedBigInteger('L15')->nullable();
            $table->unsignedBigInteger('L16')->nullable();
            // $table->unsignedBigInteger('L19')->nullable();
            // $table->unsignedBigInteger('L20')->nullable();
            // $table->unsignedBigInteger('L21')->nullable();
            // $table->unsignedBigInteger('L22')->nullable();
            // $table->unsignedBigInteger('L24')->nullable();
            // $table->unsignedBigInteger('L25')->nullable(); 
            // $table->unsignedBigInteger('L27')->nullable();
            // $table->unsignedBigInteger('L28')->nullable();
            // $table->unsignedBigInteger('L29')->nullable();
            // $table->unsignedBigInteger('L30')->nullable();
            // $table->unsignedBigInteger('L31')->nullable();
            // $table->unsignedBigInteger('L32')->nullable();
            // $table->unsignedBigInteger('L33')->nullable();
            // $table->unsignedBigInteger('L34')->nullable();
            // $table->unsignedBigInteger('L35')->nullable();
            // $table->unsignedBigInteger('L36')->nullable(); 
            // $table->unsignedBigInteger('L37')->nullable();
            // $table->unsignedBigInteger('L38')->nullable();
            // $table->unsignedBigInteger('L39')->nullable();
            // $table->unsignedBigInteger('L40')->nullable();
            // $table->unsignedBigInteger('L41')->nullable();
            // $table->unsignedBigInteger('L42')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offices', function (Blueprint $table) {
            //
        });
    }
}
