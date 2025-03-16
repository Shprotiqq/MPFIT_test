# Тестовое задание для MPFIT

## Инструкция по развертыванию:
1. `cp .env.example .env`
2. Установить в .env файле данные для входа в БД
3. `npm install`
4. `npm run build`
5. `composer install`
6. `php artisan key:generate`
7. `php artisan migrate --seed`

## Инструкция по развертыванию через Docker
1. `cp .env.example .env`
2. Установить в .env файле данные для входа в БД
2. `docker compose up --build -d nginx`
3. `docker compose run --rm npm install`
4. `docker compose run --rm npm run build`
5. `docker compose exec -it php composer install`
6. `docker compose exec -it php php artisan key:generate`
7. `docker compose exec -it php php artisan migrate --seed`


## Цель задания:
 - Создать веб-приложение с использованием фреймворка Laravel, которое включает управление товарами и заказами.

## Функционал приложения

### Управление товарами:
  - Добавление, редактирование, удаление и просмотр товаров.
  - Просмотр списка товаров с сокращенной информацией (название, цена, категория).
  - Просмотр полной информации о товаре:
    - Название (обязательное поле);
    - Категорию (товар должен быть обязательно привязан к одной из категорий)
    - Описание
    - Цена (валюта - рубли, копейки должны учитываться)(обязательное поле);

### Управление заказами:
  - Добавление заказа с возможностью добавления одного наименования товара в количестве 1 штуки или больше.
  - Заказ должен содержать:
    - ФИО покупателя (обязятельное поле);
    - Дату создания (обязательное поле);
    - Статус заказа (новый или выполнен, по умолчанию - новый);
    - Комментарий покупателя;
    
  - Просмотр списка заказов с отображением:
    - Номера заказа (ID);
    - Даты создания;
    - ФИО покупателя;
    - Статуса заказа;
    - Итоговой цены;
  - Просмотр заказа (с полной информацией о заказе) с возможностью изменить статус на "выполнен" через кнопку.

### Категории для товаров
- Создание миграций для таблицы categories, которая должна содержать:
  - ID
  - Название категории
- Изначальные категории:
  - Легкий
  - Хрупкий
  - Тяжелый