<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dailyrooms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('url')->nullable();
            $table->string('room_id')->nullable();
            $table->string('name')->nullable();
            $table->string('status')->nullable()->default('created');
            $table->softDeletes();
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
        Schema::dropIfExists('dailyrooms');
    }
}
