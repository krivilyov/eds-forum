<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Vanya Krivilyov',
                'email' => 'XEGO@yandex.ru',
                'email_verified_at' => NULL,
                'password' => '$2y$10$w28rL5x0eie9214vZFo4O.kJfCh4xBM6C1YHmT9q7zoLaB.vwJazy',
                'remember_token' => NULL,
                'created_at' => '2021-02-13 20:38:46',
                'updated_at' => '2021-02-13 20:38:46'
            ],
            [
                'id' => 10,
                'name' => 'Иван Сергеевич',
                'email' => 'gramprogramming@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$9Gb2yeuliHf6vqTFxWZ/POR9glq/1oqKxUqAORnvuEnbZIN588ETi',
                'remember_token' => NULL,
                'created_at' => '2021-02-16 15:58:21',
                'updated_at' => '2021-02-16 15:58:21'
            ],
        ]);
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
