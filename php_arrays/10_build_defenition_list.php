<?php

/*src\Strings.php
Реализуйте функцию buildDefinitionList, которая генерирует html список определений (теги dl, dt и dd) и возвращает получившуюся строку. При отсутствии элементов в массиве функция возвращает пустую строку.

Параметры функции
Список определений следующего формата:

<?php

$definitions = [
    ['definition1', 'description1'],
    ['definition2', 'description2']
];
То есть каждый элемент входного списка сам является массивом, содержащим два элемента: термин и его определение.

Пример использования
<?php

$definitions = [
    ['Блямба', 'Выпуклость, утолщения на поверхности чего-либо'],
    ['Бобр', 'Животное из отряда грызунов'],
];

buildDefinitionList($definitions);
// => '<dl><dt>Блямба</dt><dd>Выпуклость, утолщение на поверхности чего-либо</dd><dt>Бобр</dt><dd>Животное из отряда грызунов</dd></dl>';*/

$definitions = [
    ['Блямба', 'Выпуклость, утолщения на поверхности чего-либо'],
    ['Бобр', 'Животное из отряда грызунов'],
];

var_dump(buildDefinitionList($definitions));

function buildDefinitionList(array $arr): string
{
    if (empty($arr)) {
        return '';
    }
    $defs = [];
    foreach ($arr as $element) {
        $defs[] = "<dt>{$element[0]}</dt><dd>{$element[1]}</dd>";
    }
    $result = implode('', $defs);
    return "<dl>{$result}</dl>";
}