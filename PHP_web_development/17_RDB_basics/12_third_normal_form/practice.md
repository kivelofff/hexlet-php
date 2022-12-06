В базе данных содержится таблица old_cities следующей структуры:

country	region	city
Россия	Татарстан	Бугульма
Россия	Татарстан	Казань
Россия	Самарская область	Тольятти
Город в этой таблице зависит и от региона и от страны. Зависимость от региона прямая, а вот от страны город зависит 
косвенно, так как страна определяется регионом.

solution.sql
Создайте три таблицы countries, country_regions и country_region_cities, в которых отобразите нормализованную структуру
исходной таблицы old_cities. Создайте суррогатный первичный ключ для каждой из таблиц. Не забудьте указать внешний 
ключ. Поле для имени сущности в каждой таблице назовите именем name. Все ключи должны иметь тип bigint
Добавьте в созданные таблицы те же записи, что и в исходной таблице, но в нормализованной форме
Подсказки
Внешний ключ именуется как: имя таблицы (на которую ссылается) в единственном числе плюс _id
Перед тем как писать запросы в файл, зайдите в psql и поэкспериментируйте, как следует

create table countries (id bigint primary key, name varchar(255));
insert into countries values (1, 'Россия');
create table country_regions (id bigint primary key, country_id bigint references countries (id), name varchar(255));
insert into country_regions values (1, 1, 'Татарстан'), (2, 1, 'Самарская область');
create table country_region_cities (id bigint primary key, country_region_id bigint references country_regions (id), name varchar(255));
insert into country_region_cities values (1, 1, 'Бугульма'), (2, 1, 'Казань'), (3, 2, 'Тольятти');