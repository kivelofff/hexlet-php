solution.sql
Создайте таблицу article_categories с двумя полями:

id — автогенерируемый первичный ключ
name — текстовое поле
Добавьте в эту таблицу две произвольные записи.

Подсказки
Перед тем как писать запросы в файл, зайдите в psql и поэкспериментируйте, как следует

create table article_categories (id bigint primary key generated always as identity, name varchar(255));
insert into article_categories (name) values ('hlebushek'), ('pivko');