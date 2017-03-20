<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('role');
            $table->string('api_token', 32)->nullable()->unique();
            $table->timestamp('expiration')->nullable();
        });

        DB::table('users')->insert(
            [
                'username' => 'user',
                'password' => bcrypt('userpass'),
                'role' => 'user',
            ]
        );

        DB::table('users')->insert(
            [
                'username' => 'admin',
                'password' => bcrypt('adminpass'),
                'role' => 'admin',
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
        Schema::dropIfExists('users');
    }
}
