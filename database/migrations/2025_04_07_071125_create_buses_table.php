<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('bus_number');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('created_by')->constrained('users', 'id');
            $table->foreignId('category_id')->constrained('categories', 'id');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('buses');
    }
};
