# laracms
CMS on Laravel 5.3

Установка

1. git clone
2. composer install
3. php artisan key:generate
4. Права на 0777 на папку storage и public/uploads
5. Прописать пароли на базу в .env
6. php artisan migrate
7. Идем database/seeds/DatabaseSeeder.php там прописываем наши логин и пароль в админку
8. php artisan db:seed

Все. Админка работает.

Вход в админку: url.com/admin


Чтобы заработал фронтенд:
Идем в дерево сайта создаем корневой узел, назначаем ему шаблон Главная станица.

