<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alias', 100);
            $table->string('title', 100);
            $table->integer('visible')->default(1);
            $table->integer('order')->default(0);
        });

        // Insert some data
        DB::table('categories')->insert([
            [
                'alias' => 'novosti-i-obyavlenia',
                'title' => 'Новости и объявления'
            ],
            [
                'alias' => 'technicheskie-voprosi',
                'title' => 'Технические вопросы'
            ],
            [
                'alias' => 'obsujdenie_igri',
                'title' => 'Обсуждение игры'
            ],
            [
                'alias' => 'tvorchestvo',
                'title' => 'Творчество'
            ],
            [
                'alias' => 'rekruting',
                'title' => 'Рекрутинг'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
