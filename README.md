# php-todo

Скромный туду-лист на PHP

## Установка:

- git clone https://github.com/gleb-sh/php-todo.git
- composer install
- импорт дампа в вашу БД;
- настройка подключения к БД в файле bootstrap/config.php

## Вводные:

- минимум кода;
- без сложной архитектуры;
- MVC и ООП;
- дизайн не нужен (bootstrap).

## Что использовал из готовых решений:

- автозагрузка psr-4;
- Eloquent ORM (c зависимостями), чтобы не писать запросы руками (см.: "минимум кода");
- Twitter Bootstrap 5, gulp, scss.

## Ещё кое-что:

- одна точка входа;
- свой роутер, конкретно под задачу;
- авторизация через сессию;
- немного асинхронности и json-a;
- логику частично вывел в сервисы, но без фанатизма (см.: "без сложной архитектуры");
- бутстрап и конфиг объединил в один файл, ибо кроме базы конфигурировать нечего (см.: "минимум кода", "без сложной архитектуры");
- валидация практически отсутсвует, исходя из минимальных требований;
- защита от csrf не предусмотрена;
- "чистый" дамп (без задач) в корне;
- закоммичен каждый этап работы.
