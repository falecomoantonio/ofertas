<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title',200);
            $table->string('banner',40);
            $table->text('content');
            $table->json('gallery');
            $table->decimal('price',10,2);

            $table->integer('category_id');
            $table->integer('owner_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->on('categories')->references('id');
            $table->foreign('owner_id')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
