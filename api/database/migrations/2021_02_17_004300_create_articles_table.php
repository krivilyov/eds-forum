<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('alias', 100);
            $table->string('title', 100);
            $table->text('content');
            $table->integer('visible')->default(1);
            $table->unsignedInteger('category_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('no action');
        });

        DB::table('articles')->insert([
            [
                'created_at' => '2021-02-13 20:38:46',
                'updated_at' => null,
                'alias' => 'zapusk-foruma',
                'title' => 'Запуск форума',
                'content' => 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.',
                'category_id' => 1,
                'user_id' => 10
            ],
            [
                'created_at' => '2021-02-11 18:38:46',
                'updated_at' => null,
                'alias' => 'sonnie-kurliki',
                'title' => 'Сонные курлыки',
                'content' => 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться.',
                'category_id' => 1,
                'user_id' => 10
            ],
            [
                'created_at' => '2021-02-09 18:38:46',
                'updated_at' => null,
                'alias' => 'uporotii-programming',
                'title' => 'Упоротый программинг',
                'content' => 'Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц.',
                'category_id' => 1,
                'user_id' => 1
            ],
            [
                'created_at' => '2021-02-05 18:38:46',
                'updated_at' => null,
                'alias' => 'chto-interesnee-js-ili-php',
                'title' => 'Что интереснее JS или PHP',
                'content' => 'Здесь ваш текст.. Здесь ваш текст.."сразу показывает, как много веб-страниц.',
                'category_id' => 2,
                'user_id' => 10
            ],
            [
                'created_at' => '2021-02-08 20:38:46',
                'updated_at' => null,
                'alias' => 'novie-tehnologii',
                'title' => 'Новые технологии',
                'content' => 'Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь.',
                'category_id' => 2,
                'user_id' => 1
            ],
            [
                'created_at' => '2021-02-08 18:38:46',
                'updated_at' => null,
                'alias' => 'novaya-lineika-mac',
                'title' => 'Новая линейка MAC',
                'content' => 'MAC имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь.',
                'category_id' => 2,
                'user_id' => 10
            ],
            [
                'created_at' => '2021-02-14 18:38:46',
                'updated_at' => null,
                'alias' => 'pesni-pro-razrabov',
                'title' => 'Песни про разрабов',
                'content' => 'Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так.',
                'category_id' => 4,
                'user_id' => 1
            ],
            [
                'created_at' => '2021-02-15 18:38:46',
                'updated_at' => null,
                'alias' => 'pesni-pro-razrabov',
                'title' => 'Песни про разрабов',
                'content' => 'Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так.',
                'category_id' => 4,
                'user_id' => 10
            ],
            [
                'created_at' => '2021-02-17 18:38:46',
                'updated_at' => null,
                'alias' => 'ishem-razrabotchika',
                'title' => 'Ищем разработчика',
                'content' => 'Его корни уходят в один фрагмент классической латыни 45 года н.э., то есть более двух тысячелетий назад. Ричард МакКлинток, профессор латыни из колледжа Hampden-Sydney, штат Вирджиния, взял одно из самых странных слов в Lorem Ipsum, "consectetur", и занялся его поисками в классической латинской литературе.',
                'category_id' => 5,
                'user_id' => 10
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
        Schema::dropIfExists('articles');
    }
}
