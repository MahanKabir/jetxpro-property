<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('title');
            $table->string('keywords',350)->default('keyword');
            $table->string('description',350)->default('description');
            $table->longText('content')->nullable();
            $table->string('area')->nullable();
            $table->integer('country');
            $table->integer('state');
            $table->integer('city');
            $table->text('images')->nullable();
            $table->text('amenity')->nullable();
            $table->bigInteger('price');
            $table->integer('age')->nullable();
            $table->string('slug',100);
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
        Schema::dropIfExists('properties');
    }
}
