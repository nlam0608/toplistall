<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('content');
            $table->string('image');
            $table->string('rating');
            $table->string('price');
            $table->integer('status');
            $table->string('views');
            $table->string('order');
            $table->foreignId('category_id')->constrained('categories');
            $table->string('lick_amazon');
            $table->string('link_ebay');
            $table->string('link_walmarl');
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
        Schema::dropIfExists('products');
    }
}
