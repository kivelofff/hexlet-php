solution.sql
Составьте запрос (к таблице users), который считает количество пользователей, рождённых (поле birthday) в каждом году (из тех, что есть в birthday) по следующим правилам:

Анализируются только те пользователи, у которых указана дата рождения.
Выборка отсортирована по году рождения в прямом порядке.
Подсказки:

Чтобы извлечь год из дня рождения, воспользуйтесь конструкцией: EXTRACT(year FROM birthday) AS year_of_birthday.
Итоговая таблица должна иметь два поля с именами year_of_birthday и count.

select extract(year from birthday) as year_of_birthday, count(*) from users where birthday is not null group by year_of_birthday order by year_of_birthday;