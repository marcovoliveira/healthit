<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('realizada')->default(0);   // false para não realizada; true para realizada
            $table->string('name');
            $table->integer('sns');
            $table->dateTime('data');
            $table->string('especialidade');
            $table->integer('user_id');
            $table->text('sintomas')->nullable();
            $table->text('diagnostico')->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
