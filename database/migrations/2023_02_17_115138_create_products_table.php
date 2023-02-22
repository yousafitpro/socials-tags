<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('is_expired')->nullable();
            $table->string('is_connected')->nullable();
            $table->longText('identity_id_1')->nullable();
            $table->longText('identity_user_id')->nullable();
            $table->longText('identity_username')->nullable();
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
        Schema::dropIfExists('products');
    }
}
