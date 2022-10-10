Это задание не связано напрямую с теорией, но продолжает тематику работы с базой данных.

solution.sql
Создайте таблицу cars со следующими полями:
user_first_name - имя пользователя (соответствующее имени в таблице users)
brand - марка машины
model - конкретная модель
Добавьте в таблицу users две записи с именами arya и sansa. Сама таблица добавляется в базу данных автоматически (смотрите файл init.sql)
Добавьте в таблицу cars 5 произвольных записей. Две из них должны указывать на первого пользователя по имени arya, а три других - на sansa.

create table cars (user_first_name varchar(255), brand varchar(255), model varchar(255));
insert into users values ('arya', 'stark', '2022-10-10'), ('sansa', 'stark', '2022-11-11');
insert into cars values ('arya', 'bmw', 'x5'), ('arya', 'mersedes', 'c220'), ('sansa', 'vw', 'passat'), ('sansa', 'skoda', 'fabia'), ('sansa', 'toyota', 'corolla');

Пример

INSERT INTO users VALUES ('User First Name', 'User Last Name', '1832-10-11');
-- Машина для пользователя добавленного предыдущим запросом. Связь через имя.
INSERT INTO cars VALUES ('User First Name', 'bmw', 'x5');

Подсказки

Если тип поля не указан, то выберите его самостоятельно
Перед тем как писать запросы в файл, зайдите в psql и поэкспериментируйте, как следует
Не бойтесь сломать что-то в базе, всегда можно восстановиться командой make reset в терминале