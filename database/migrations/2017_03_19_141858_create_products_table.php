<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title', 128);
            $table->decimal('price')->default(0);
        });

        DB::table('products')->insert(
            [
                'title' => 'milk',
                'price' => 3,
            ]
        );

        DB::table('products')->insert(
            [
                'title' => 'water',
                'price' => 1.5,
            ]
        );

        DB::table('products')->insert(
            [
                'title' => 'potato',
                'price' => 8.5,
            ]
        );
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
