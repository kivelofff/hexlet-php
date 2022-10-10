solution.sql
Запишите в файл следующие запросы:

delete from users where first_name = 'Sansa';
insert into users (first_name, email) values ('Arya', 'arya@winter.com');
update users set manager = true where email = 'tirion@got.com';

Запрос, который удаляет пользователя с именем Sansa
Запрос, который вставляет в базу пользователя с именем Arya и почтой arya@winter.com
Запрос, который устанавливает флаг manager в true для пользователя с емейлом tirion@got.com
Подсказки:

Перед тем как писать запросы в файл, зайдите в psql и поэкспериментируйте как следует
Не бойтесь сломать что-то в базе, всегда можно восстановиться командой make reset в терминале
Структуру базы данных можно подсмотреть в файле init.sql