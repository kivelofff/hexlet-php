solution.sql
Напишите запрос, создающий таблицу users со следующими полями:

id — первичный автогенерируемый ключ.
username — уникально и не может быть null.
email — не может быть null.
created_at — не может быть null.
Напишите запрос, создающий таблицу topics со следующими полями:

id — первичный автогенерируемый ключ.
user_id — внешний ключ.
body — не может быть null.
created_at — не может быть null.
Подсказки:

Выберите типы данных самостоятельно.

create table users (id bigint primary key generated always as identity, username varchar(255) unique not null, email varchar(255) not null, created_at timestamp not null);
create table topics (id bigint primary key generated always as identity, user_id bigint references users (id), body varchar(255) not null, created_at timestamp not null);
