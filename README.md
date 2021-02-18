# eds-forum

* клонируем проект
##API
* в терминале открываем директорию api
* тянем зависимости <br>
`composer install`
* создаем БД в MySQL 5<br>name: 'eds-forum',<br>user: 'root',<br>password: 'root1' (такие настройки подключения)
* переименовываем файл .env.example -> .env
* меняем данные подключения к БД <br>
`DB_CONNECTION=mysql`<br>
 `DB_HOST=127.0.0.1`<br>
 `DB_PORT=3306` <br>
 `DB_DATABASE=eds-forum` <br>
 `DB_USERNAME=root` <br>
 `DB_PASSWORD=root1` <br>
* выполняем миграции (запасной файл [dump](https://disk.yandex.ru/d/fxlwknpoBJktOg) для BD) <br>
`php artisan migrate`
* запустить проект api <br>
`php artisan serve`

##CLIENT
* в терминале открываем директорию client
* тянем зависимости <br>
`npm install`
* запускаем сервер <br>
`npm run serve`
* переходим в браузере `http://localhost:8080/`