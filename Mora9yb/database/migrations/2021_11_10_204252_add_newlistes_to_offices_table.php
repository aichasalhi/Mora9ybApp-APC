<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewlistesToOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offices', function (Blueprint $table) {
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
