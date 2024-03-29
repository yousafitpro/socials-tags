<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialConnectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_connects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('platform')->nullable();
            $table->bigInteger('user_id');
            $table->longText('access_token')->nullable();
            $table->longText('userid')->nullable();
            $table->string('expire_in')->nullable();
            $table->string('expire_at')->nullable();
            $table->string('status')->nullable()->default('Disconnected');
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
        Schema::dropIfExists('social_connects');
    }
}
