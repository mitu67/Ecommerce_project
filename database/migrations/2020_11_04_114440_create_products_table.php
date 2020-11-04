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
            $table->increments('id');
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('brand_id')->unsigned()->nullable();
            $table->integer('admin_id')->unsigned()->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('slug')->nullable();
            $table->integer('quantity')->dafault(1);
            $table->integer('price');
            $table->tinyInteger('status')->default(0);
            $table->integer('offer_price')->nullable();
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
