DROP TABLE IF EXISTS old_cities;
CREATE TABLE old_cities (
                            country varchar(255),
                            region varchar(255),
                            city varchar(255)
);

INSERT INTO old_cities VALUES
                           ('Россия', 'Татарстан', 'Бугульма'),
                           ('Россия', 'Самарская область', 'Тольятти'),
                           ('Россия', 'Татарстан', 'Казань');
