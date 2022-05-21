<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoniteredbillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moniteredbills', function (Blueprint $table) {
            $table->id();
            $table->string('bill_number')->nullable()->default('N/A');
            $table->string('state')->nullable()->default('N/A');
            $table->string('title')->nullable()->default('N/A');
            $table->bigInteger('user_id');
            $table->bigInteger('bill_id')->nullable()->default(0);
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
        Schema::dropIfExists('moniteredbills');
    }
}
