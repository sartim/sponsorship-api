<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contributions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('child_id')->index()->foreign()->references('id')->on('children')->onDelete('cascade');
            $table->integer('sponsor_id')->index()->foreign()->references('id')->on('sponsors')->onDelete('cascade');
            $table->integer('currency_id')->index()->foreign()->references('id')->on('currencies')->onDelete('cascade');
            $table->decimal('contribution', 18, 2);
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
        Schema::dropIfExists('contributions');
    }
}
