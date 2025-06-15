<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutItemsTable extends Migration
{
    public function up()
    {
        Schema::create('checkout_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('checkout_id');
            $table->unsignedBigInteger('food_id');
            $table->integer('quantity');
            $table->integer('price');
            $table->timestamps();

            $table->foreign('checkout_id')->references('id')->on('checkouts')->onDelete('cascade');
            $table->foreign('food_id')->references('id')->on('food')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('checkout_items');
    }
} 