<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfolaptopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infolaptop', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->string('congnghecpu')->nullable();
            $table->string('tocdocpu')->nullable();
            $table->string('tocdotoida')->nullable();
            $table->string('ram')->nullable();
            $table->string('loairam')->nullable();
            $table->string('tocdobusram')->nullable();
            $table->string('ramtoida')->nullable();
            $table->string('ocung')->nullable();
            $table->string('manhinh')->nullable();
            $table->string('dophangiai')->nullable();
            $table->string('congnghemanhinh')->nullable();
            $table->string('cardmanhinh')->nullable();
            $table->string('congngheamthanh')->nullable();
            $table->string('conggiaotiep')->nullable();
            $table->string('ketnoikhongday')->nullable();
            $table->string('webcam')->nullable();
            $table->string('tinhnangkhac')->nullable();
            $table->string('denbanphim')->nullable();
            $table->string('kichthuoc')->nullable();
            $table->string('chatlieu')->nullable();
            $table->string('thongtinpin')->nullable();
            $table->string('hedieuhanh')->nullable();
            $table->string('thoigianramat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infolaptop');
    }
}
