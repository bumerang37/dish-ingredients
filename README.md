<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Dish/Ingredients</h1>
    <br>
</p>

Проект собран на базе расширенного (advanced) шаблона [Yii 2](http://www.yiiframework.com/).

Приложение позволяет создавать "блюда" и "ингредиенты" в административной части - <b>admin.dish-ingredients/ </b>.

Доступ к функционалу создания "блюд" и "ингредиентов" есть у пользователей с ролью "администратор".

В пользовательской части авторизованные пользователи могут найти блюда по ингредиентам.

Итоговые результаты выводятся согасно критериям, указанным ниже:

Критерии:
------------

1. Если найдены блюда с полным совпадением ингредиентов выводятся только они
2. Если найдены блюда с частичным совпадением ингредиентов - выводим в порядке уменьшения совпадения ингредиентов вплоть до 2х
3. Если найдены блюда с совпадением менее чем 2 ингредиента или не  найдены вовсе, выводится “Ничего не найдено”
4. Если выбрано менее 2х ингредиентов не ищем, нужно больше ингредиентов

Сменить роль пользователя можно через консольное приложение командами:

<code>php yii console/set-user-role-to-admin имя пользователя </code> и

<code>php yii console/set-user-role-to-user имя пользователя </code>


Минимальные требования:
------------

Версия вебсервера не ниже PHP 5.4.0.

Проект протестирован на версии PHP 7.2.22 x64


Установка
------------

### Установка через composer

Если в системе не установен [Composer](http://getcomposer.org/), его можно установить выполнив следующие инструкции на сайте
 [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

Развернуть приложение можно следующим образом:

~~~
git clone git@github.com:bumerang37/dish-ingredients.git dish-ingredients
composer self-update
cd dish-ingredients
composer install
~~~

Начало
---------------

Приложение использует переменные <b>окружения</b>. Перед началом работы убедитесь, что существует файл ```.env``` в корне проекта.
Затем заполните обязательно заполните переменные: 

```MYSQL_ROOT_PASSWORD```,

``MYSQL_DATABASE``,

``MYSQL_USER``,

``MYSQL_PASSWORD``,

``HOST``

Следуйте следующим инструциям для запуска проекта:

1. Создайте файл `.env` в корне проекта с помощью файла `.env-example`
 `cp .env-example .env`
2. Инициализируйте переменные окружения в `.env`, указанные выше
3. Выполните команду `php init ` в корне проекта, действуйте согласно инструкциям
4. Выполните команду `php yii console/create-db`, убедитесь что база данных существует
5. Выполните миграции для текущей базы данных `php yii migrate`
6. Зайдите на сайт  `dish-ingredients` и создайте пользователя
7. Чтобы данный пользователь смог создавать блюда и ингредиенты в `admin.dish-ingredients/`, необходимо изменить его роль на "administrator" это можно сделать так<br>
  `php yii console/set-user-role-to-admin` - Роль пользователя "Admin"
  `php yii console/set-user-role-to-user` - Роль пользователя "User"
8. Создайте несколько блюд и ингредиентов (5-6)
9. Перейдите в `dish-ingredients`, можно пользоваться поиском

Структура проекта:
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
