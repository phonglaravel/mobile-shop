<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableCommentProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_product', function (Blueprint $table) {
           $table->increments('id');
           $table->string('name');
           $table->string('email')->nullable();
           $table->text('content');
           $table->integer('product_id');
           $table->string('date');
           $table->integer('star');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_product');
    }
}
