Автоинкремент—
Основы реляционных баз данных
На этом курсе мы уже создавали значения первичных ключей самостоятельно. Так можно делать в учебных целях, но в промышленной разработке эту задачу берут на себя СУБД — системы управления базами данных. Общий принцип механизма автогенерации такой:

Внутри базы создается отдельный счетчик, который привязывается к каждой таблице
Счетчик увеличивается на единицу при вставке новой строки
Получившееся значение записывается в поле, помеченное как автогенерируемое
До определенного момента механизм автоинкремента был реализован по-своему в каждой СУБД, иногда значительно отличающимися способами. Это создавало проблемы при переходе от одной СУБД к другой и усложняло реализацию программного слоя доступа к базе данных. Причем эта функциональность добавлена в стандарт SQL:2003, то есть очень давно. И только в 2018 году PostgreSQL (начиная с версии 10) стал его поддерживать. Такой автоинкремент известен под именем GENERATED AS IDENTITY:

CREATE TABLE colors (
-- Одновременное использование и первичного ключа и автогенерации
id bigint PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
name varchar(255)
);

INSERT INTO colors (name) VALUES ('Red'), ('Blue');

SELECT * FROM colors;
Этот запрос вернет:

id	name
1	Red
2	Blue
Интересно поведение автогенератора при удалении записей. Если удалить запись с id равным двум и вставить еще одну запись, то значением поля id будет 3. Автогенерация никак не связана с данными в таблице. Это отдельный счетчик, который всегда увеличивается. Таким образом избегаются вероятные коллизии и ошибки, когда один и тот же идентификатор принадлежит сначала одной записи, а потом другой.

Вот его структура из документации:

column_name type GENERATED { ALWAYS | BY DEFAULT } AS IDENTITY[ ( sequence_option ) ]
Тип данных может быть SMALLINT, INT или BIGINT
GENERATED ALWAYS — не позволит добавлять значение самостоятельно, используя UPDATE или INSERT
GENERATED BY DEFAULT — в отличие от предыдущего варианта, этот вариант позволяет добавлять значения самостоятельно
PostgreSQL позволяет иметь более одного автогенерируемого поля на таблицу.