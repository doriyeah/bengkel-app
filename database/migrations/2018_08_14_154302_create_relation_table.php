<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('category_barang', function (Blueprint $table){
           $table->increments('id');
           $table->integer('category_id');
           $table->integer('barang_id');
           $table->timestamps();
        });



        Schema::table('category_barang', function (Blueprint $table){
            $table->integer('category_id')->unsigned()->change();
            $table->foreign('category_id')->references('id')->on('category')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('barang_id')->unsigned()->change();
            $table->foreign('barang_id')->references('id')->on('barang')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('laporan', function (Blueprint $table){
            $table->integer('user_id')->unsigned()->change();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('barang_id')->unsigned()->change();
            $table->foreign('barang_id')->references('id')->on('barang')
                ->onUpdate('cascade')->onDelete('cascade');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relation');
    }
}
