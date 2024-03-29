Подготовка к работе—
Основы реляционных баз данных
Вспомним, как работает psql. Если эту программу запустить без аргументов, то она пытается подключиться к локальной базе данных (находящейся на той же машине) с именем, совпадающим с именем текущего пользователя, и делает это, используя роль с этим же именем. Если PostgreSQL установлен верно, то запуск этой программы в Linux (например, Ubuntu) ругается на отсутствие соответствующей роли:

psql

psql: FATAL:  role "tirion" does not exist
Мы уже научились решать эту проблему, используя sudo -u postgres psql. Но это не лучшее решение, как минимум, по двум причинам:

Пользователь postgres имеет максимальные права в СУБД. Тот, кто завладеет им, может уничтожить все. Поэтому конкретные клиенты (приложения или пользователи) никогда не создают базы данных от имени postgres и никогда не работают из-под этого пользователя.
Придется постоянно использовать эту конструкцию sudo -u postgres для любых команд, связанных с СУБД.
Если у вас MacOS, часть sudo -u postgres использовать не нужно, так как после установки PostgreSQL автоматически конфигурируется для работы с вашим пользователем

Для упрощения работы по ходу курса создадим роль, которая имеет такое же имя, как и пользователь, из-под которого вы работаете. Выполните следующие действия:

Посмотрите имя вашего текущего пользователя: whoami

whoami

tirion
Создайте роль с таким же именем внутри PostgreSQL, используя команду createuser. Обратите внимание на то, что команду нужно запускать от пользователя postgres, иначе она попробует соединиться с СУБД от имени текущего пользователя, которого там нет:

# Флаг --createdb добавляет нашей роли возможность создавать базы данных
# По умолчанию этой возможности нет
sudo -u postgres createuser --createdb tirion

# Для удаления пользователя можно воспользоваться командой:
dropuser tirion
Теперь у нас есть роль в СУБД. Попробуем соединиться с PostgreSQL, используя ее:

psql

psql: FATAL:  database "tirion" does not exist
Снова ошибка, но уже другая. Теперь psql ругается на то, что не выбрана база данных. Надо сказать, что невозможно соединиться с СУБД просто так: соединение всегда происходит с конкретной базой данных. Эту базу данных можно указать самостоятельно, просто передав один аргумент в psql. Мы уже знаем, что внутри PostgreSQL создана база postgres. Попробуем подключиться к ней:

psql postgres

postgres=>
Соединение удалось. Теперь посмотрим список ролей. Для этого подходит команда \du (Describe Users), которую надо выполнить внутри REPL.

postgres=> \du
List of roles
Role name |                         Attributes                         | Member of
-----------+------------------------------------------------------------+-----------
postgres  | Superuser, Create role, Create DB, Replication, Bypass RLS | {}
tirion    | Create DB                                                  | {}
Как видно, в СУБД создано две роли. Одна postgres, другая — та, которую мы самостоятельно добавили ранее.

Для экспериментов нам понадобится база данных и, возможно, даже не одна. Создадим базу данных с именем hexlet. Сделать это можно из командной строки (не репла psql!) командой createdb.

# Опция --owner позволяет указать владельца создаваемой базы данных
sudo -u postgres createdb --owner=tirion hexlet
# Если запустить эту команду без аргументов,
# то она попытается создать базу данных,
# совпадающую с именем вашего пользователя в системе.
createdb hexlet
Имя для базы данных выбирается произвольно и обычно совпадает с названием проекта, для которого она создается. Имена баз уникальны в рамках одной СУБД. Это значит, что повторный вызов createdb с тем же именем приведет к ошибке.

После установки, PostgreSQL сразу создает несколько служебных баз данных (например, postgres), которые нужны для работы самой СУБД.

# Посмотреть список баз данных
psql -l

# Не полный вывод
                          List of databases
Name    |  Owner   | Encoding |   Collate   |    Ctype    |
-----------+----------+----------+-------------+-------------+
pgadmin   | pgadmin  | UTF8     | en_US.UTF-8 | en_US.UTF-8 |
tirion    | tirion   | UTF8     | en_US.UTF-8 | en_US.UTF-8 |
postgres  | postgres | UTF8     | en_US.UTF-8 | en_US.UTF-8 |
template0 | postgres | UTF8     | en_US.UTF-8 | en_US.UTF-8 |
template1 | postgres | UTF8     | en_US.UTF-8 | en_US.UTF-8 |
Теперь у нас есть роль и база данных для экспериментов. Подключение к этой БД выполняется так:

psql hexlet

hexlet=>
Созданную базу данных можно удалить командой dropdb:

dropdb hexlet
Не забудьте ее снова создать, так как она понадобится нам в дальнейшем.

Запускать такую команду нужно с большой осторожностью. Удаление базы данных — необратимый процесс. Нет ничего страшнее, чем потерять данные, которые невозможно восстановить без резервных копий. Во избежание недоразумений, команда dropdb не работает без аргументов — ей всегда нужно передавать имя базы.

Удаление базы данных возможно только в том случае, если к ней никто не подключен (за исключением того, кто удаляет). Если есть другие клиенты, например psql или pgadmin4, то СУБД предупредит о невозможности выполнить команду.

Процесс создания пользователя и базы данных


Самостоятельная работа
Создайте роль с именем hexletbot
Создайте базу данных с именем hexletbot
Удалите созданную базу данных
В дальнейшем нам понадобится база данных из репозитория pg-dump-example. Все, что от вас требуется сейчас — загрузить ее в базу данных под именем hexlet. Инструкция по загрузке есть в описании репозитория.