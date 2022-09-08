<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfomobileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infomobile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->string('congnghemanhinh')->nullable();
            $table->string('dophangiai')->nullable();
            $table->string('manhinhrong')->nullable();
            $table->string('dosangtoida')->nullable();
            $table->string('matkinhcamung')->nullable();
            $table->string('camerasau')->nullable();
            $table->string('quayphim')->nullable();
            $table->string('denflash')->nullable();
            $table->string('cameratruoc')->nullable();
            $table->string('chipxuly')->nullable();
            $table->string('cpu')->nullable();
            $table->string('chipdohoa')->nullable();
            $table->string('ram')->nullable();
            $table->string('bonhotrong')->nullable();
            $table->string('danhba')->nullable();
            $table->string('mangdidong')->nullable();
            $table->string('sim')->nullable();
            $table->string('wifi')->nullable();
            $table->string('gps')->nullable();
            $table->string('bluetooth')->nullable();
            $table->string('congsac')->nullable();
            $table->string('jacktainghe')->nullable();
            $table->string('ketnoikhac')->nullable();
            $table->string('dungluongpin')->nullable();
            $table->string('loaipin')->nullable();
            $table->string('hotrotoida')->nullable();
            $table->string('congnghepin')->nullable();
            $table->string('baomatnangcao')->nullable();
            $table->string('tinhnangdacbiet')->nullable();
            $table->string('khangnuoc')->nullable();
            $table->string('ghiam')->nullable();
            $table->string('xemphim')->nullable();
            $table->string('nghenhac')->nullable();
            $table->string('kichthuoc')->nullable();
            $table->string('thoidiemramat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infomobile');
    }
}
