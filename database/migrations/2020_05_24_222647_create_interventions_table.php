<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interventions', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('desc')->nullable();
            $table->string('type');
            $table->date('date');
            $table->string('statu')->default('en ratard');
            $table->unsignedBigInteger('lct_id');
            $table->unsignedBigInteger('loct_id');
            $table->foreign('loct_id')->references('id')->on('locataires')->onDelete('cascade');
            $table->foreign('lct_id')->references('id')->on('locations')->onDelete('cascade');
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
        Schema::dropIfExists('interventions');
    }
}
