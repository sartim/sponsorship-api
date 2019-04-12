<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_sponsors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('child_id')->index()->foreign('child_id')->references('id')->on('children');
            $table->integer('sponsor_id')->index()->foreign('sponsor_id')->references('id')->on('sponsors');
            $table->timestamps();

            $table->foreign('child_id')
                ->references('id')
                ->on('children')
                ->onDelete('cascade');

            $table->foreign('sponsor_id')
                ->references('id')
                ->on('sponsors')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('child_sponsors');
    }
}
