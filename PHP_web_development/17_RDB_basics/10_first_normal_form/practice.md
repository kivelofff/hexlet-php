solution.sql
Создайте таблицу users со следующими полями:
id - первичный ключ
first_name - имя
created_at - дата создания пользователя
Добавьте в таблицу users одну запись с именем пользователя Tom.
Создайте таблицу orders со следующими полями:
id - первичный ключ
user_first_name - при вставке записи здесь указывается имя пользователя из таблицы users
months - количество покупаемых месяцев (обучение на Хекслете)
created_at - дата создания заказа
Добавьте в таблицу orders два заказа на созданного ранее пользователя
Значения первичных ключей задайте самостоятельно. Автогенерация изучается дальше по курсу. Примеры вставки данных в эти таблицы:

INSERT INTO users (id, first_name, created_at) VALUES (1, 'Tom', '1832-11-23');
INSERT INTO orders (id, user_first_name, months, created_at) VALUES (1, 'Tom', 3, '2012-10-1');
Подсказки:

Перед тем как писать запросы в файл, зайдите в psql и поэкспериментируйте как 

create table users (id bigint primary key, first_name varchar(255), created_at timestamp);
insert into users (id, first_name, created_at) values (1, 'Tom', '2022-11-11');
create table orders (id bigint primary key, user_first_name varchar(255), months smallint, created_at timestamp);
insert into orders (id, user_first_name, months, created_at) values (1, 'Tom', '14', '2022-11-11');
