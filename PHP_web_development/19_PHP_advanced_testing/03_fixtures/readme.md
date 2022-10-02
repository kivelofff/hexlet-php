tests/SolutionTest.php
Протестируйте функцию, которая преобразует различные входные форматы в выходной HTML.

<?php
 
// Поддерживаются yaml/json/csv
$html1 = toHtmlList('/path/to/yaml/file');
$html2 = toHtmlList('/path/to/json/file');
$html3 = toHtmlList('/path/to/csv/file');
Каждый из входных файлов для этой функции содержит список элементов из которых формируется элемент <ul>. Входные данные и выходной HTML можно подсмотреть в фикстурах.

Ваша задача, пропустить через эту функцию входные файлы и сравнить результат работы функции с ожидаемым значением находящимся в файле tests/fixtures/result.html. Функция принимает на вход путь к файлу.

Подсказки
Провайдеры данных