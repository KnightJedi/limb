# Шаг 1. Более подробно о функциональности приложения
Составим небольшое ТЗ на наше приложение

## Роли пользователей сайта
Типичные роли пользователей нашего приложения:

* **Покупатель** — может просматривать список товаров, формировать корзину заказа и отсылать заказ.
* **Администратор** — формирует список товаров. Принимает заказы к исполнению.

## Возможности администратора по формированию списка товаров

* Администратор проходит процедуру аутентификации на сайте, вводя свой логин и пароль. Посетители сайта не могут попасть в панель управления без прохождения процедуры аутентификации.
* Администратор просматривает список товаров.
* Для каждого товара указываются следующие свойства:
  * Название
  * Изображение
  * Описание
  * Цена товара
  * Флаг доступности товара в текущий момент
* Изображение товара будет заливаться на сервер при помощи той же формы, что и форма по созданию/редактированию товара. При создании товара необходимо будет указать путь до файла изображения. При редактирования товара указание нового файла будет перезаписывать текущее изображение.

## Возможности покупателей по работе со списком товаров

* Покупатели могут просматривать товары.
* Будет предусмотрена возможность фильтрации товара по первой букве алфавита.
* Будет также представлена возможность поиска товаров по наименованию и по цене.

## Возможности покупателей по работе с корзиной заказа

* Покупатели могут добавлять товары в корзину заказа.
* Корзина заказа сохраняется в сессии пользователя.
* Покупатели могут просмотреть состояние своей корзины заказа в любой момент.
* Покупатели могут менять количество единиц каждого товара, а также удалять товарные позиции при необходимости.

## Возможности покупателей по формированию заказа

* Покупатели могут отсылать заказы, состоящие из товарных позиций корзины.
* Перед отсылкой заказа покупатели проходят процедуру аутентификации или загистрируются на сайте.
* При регистрации необходимо указать свое имя, email, логин и пароль.
* После отправки заказа корзина очищается.

## Возможности администратора по работе с заказами покупателей

* Администратор может просматривать список всех заказов пользователей.
* Заказы могут иметь следующий статус
  * Новый
  * Принятый на обработку
  * Отосланный
* Администратор может просмотреть заказы с возможностью отображения заказов только определенного статуса.
* Администратор может изменять статус заказов.
* Администор может просмотреть информацию о покупателе, сделавшего заказ.

## Возможности покупателя по работе со своими заказами

* Покупатель для просмотра списка своих заказов должен пройти процедуру аутентификации на сайте.
* Покупатель может просмотреть список своих заказов.

## Далее
[Шаг 2. Запуск приложения. База данных. Базовые шаблоны.](./step2.md)
