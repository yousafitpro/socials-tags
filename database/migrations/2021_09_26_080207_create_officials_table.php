<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officials', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable()->default('0');
            $table->text('o_id')->nullable()->default('');
            $table->text('name')->nullable()->default('');
            $table->text('post')->nullable()->default('');
            $table->text('state')->nullable()->default('');
            $table->text('web')->nullable()->default('');
            $table->text('email')->nullable()->default('');
            $table->text('address')->nullable()->default('');
            $table->text('image')->nullable()->default('');
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
        Schema::dropIfExists('officials');
    }
}
