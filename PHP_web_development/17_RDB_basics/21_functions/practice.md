solution.sql
Составьте запрос, который извлекает из таблицы users количество записей, у которых 
значение поля house равно stark.

Подсказки:

Перед тем, как записывать решение в файл, откройте psql и попробуйте сделать выборку там

select count(*) from users where house = 'stark';