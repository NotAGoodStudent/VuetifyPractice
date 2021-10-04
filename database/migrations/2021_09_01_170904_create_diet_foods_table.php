<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_foods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diet_id')->constrained();
            $table->string('food_name');
            $table->string('fats');
            $table->string('saturated_fats');
            $table->string('proteins');
            $table->string('carbs');
            $table->string('calories');
            $table->string('sugars');
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
        Schema::dropIfExists('diet_foods');
    }
}
