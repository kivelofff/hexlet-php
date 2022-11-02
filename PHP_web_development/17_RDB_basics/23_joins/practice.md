solution.sql
Составьте запрос, который извлекает из базы идентификатор топика и имя автора топика 
(first_name) по следующим правилам:

Анализируются топики только тех пользователей, чей емейл находится на домене 
lannister.com
Выборка отсортирована по дате создания топика в прямом порядке

select topics.id, users.first_name from topics left join users on topics.user_id = users.id where users.email like '%lannister.com' order by topics.created_at;