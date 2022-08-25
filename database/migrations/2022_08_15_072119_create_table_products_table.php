<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug_product');
            $table->integer('category_id');
            $table->string('tinhtrang');
            $table->string('bosanpham');
            $table->string('baohanh');
            $table->integer('goibaohanh');
            $table->text('description');
            $table->text('kithuat');
            $table->integer('status');
            $table->string('banner')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
