<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliopagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfoliopages', function (Blueprint $table) {
            $table->id();
            $table->string('long_title');
            $table->string('short_title');
            $table->string('category_id');
            $table->string('website');
            $table->string('client');
            $table->string('short_description');
            $table->string('description1');
            $table->string('description2');
            $table->string('img');
            $table->string('status');
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
        Schema::dropIfExists('portfoliopages');
    }
}
