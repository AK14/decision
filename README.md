<h1>Сервис коротких ссылок - тестовое задание</h1>

<h2> Установка </h2>  
Проект выполнен на базе Laravel 11 <br>
<p>После скачивания репозотория необходимо настроить подключение к базе данных в файле .env
<br> У меня настроена база MySql, можно прописать в настройках подключение к sqlite
<code>DB_CONNECTION=sqlite
DB_DATABASE=/home/***/database/database.sqlite </code>
</p>
Запустить команды 
<ul>
    <li>composer install</li>
    <li>npm update</li>
    <li>php artisan key:generate</li>
    <li>npm run build</li>
    <li>php artisan migrate </li>
</ul>

Начальной страницы нет, пользователя сразу перекидывает на авторизацию.
<br>
Новому пользователю нужно зарегистрироваться

Для того, что-бы работало копирование короткой ссылки, нужно в адресной строке ввести https://decision.test  