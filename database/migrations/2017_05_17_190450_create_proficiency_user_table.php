<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProficiencyUserTable extends Migration
{
    public function up()
    {
        Schema::create('proficiency_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proficiency_id');
            $table->integer('user_id');
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
        Schema::dropIfExists('proficiency_user');
    }
}
