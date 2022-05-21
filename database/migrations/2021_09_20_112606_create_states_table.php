<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable()->default('0');
            $table->bigInteger('state_id')->nullable()->default(20);
            $table->string('state_abbr')->nullable()->default('N/A');
            $table->string('state_name')->nullable()->default('N/A');
            $table->string('is_self_added')->nullable()->default('0');
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
        Schema::dropIfExists('states');
    }
}
