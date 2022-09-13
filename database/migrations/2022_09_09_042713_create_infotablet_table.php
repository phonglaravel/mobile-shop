<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfotabletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infotablet', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->string('congnghemanhinh')->nullable();
            $table->string('dophangiai')->nullable();
            $table->string('manhinhrong')->nullable();
            $table->string('hedieuhanh')->nullable();
            $table->string('chipxuly')->nullable();
            $table->string('tocdocpu')->nullable();
            $table->string('chipdohoa')->nullable();
            $table->string('ram')->nullable();
            $table->string('bonhotrong')->nullable();
            $table->string('bonhoconlai')->nullable();
            $table->string('camerasau')->nullable();
            $table->string('quayphim')->nullable();
            $table->string('tinhnang')->nullable();
            $table->string('cameratruoc')->nullable();
            $table->string('tinhnangcameratruoc')->nullable();
            $table->string('mangdidong')->nullable();
            $table->string('sim')->nullable();
            $table->string('cuocgoi')->nullable();
            $table->string('wifi')->nullable();
            $table->string('gps')->nullable();
            $table->string('bluetooth')->nullable();
            $table->string('congketnoi')->nullable();
            $table->string('jacktainghe')->nullable();
            $table->string('tinhnangdacbiet')->nullable();
            $table->string('dungluongpin')->nullable();
            $table->string('loaipin')->nullable();
            $table->string('congnghepin')->nullable();
            $table->string('hotrotoida')->nullable();
            $table->string('sackemmay')->nullable();
            $table->string('chatluong')->nullable();
            $table->string('kichthuoc')->nullable();
            $table->string('ngayramat')->nullable();
            $table->string('tinhtrang1')->nullable();
            $table->string('nguongoc')->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infotablet');
    }
}
