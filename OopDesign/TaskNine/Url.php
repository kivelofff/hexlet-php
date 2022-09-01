<?php

namespace OopDesign\TaskTen\TaskNine;

/**
 * src/Url.php

В данном упражнении вам предстоит реализовать класс Url, который позволяет извлекать из HTTP адреса, представленного строкой, его части.

Класс должен содержать конструктор и методы:

конструктор - принимает на вход HTTP адрес в виде строки.
getScheme() - возвращает протокол передачи данных (без двоеточия).
getHostName() - возвращает имя хоста.
getQueryParams() - возвращает параметры запроса в виде пар ключ-значение объекта.
getQueryParam() - получает значение параметра запроса по имени. Если параметр с переданным именем не существует, метод возвращает значение заданное вторым параметром (по умолчанию равно null).
equals($url) - принимает объект класса Url и возвращает результат сравнения с текущим объектом - true или false.

<?php

use App\Url;

$url = new Url('http://yandex.ru:80?key=value&key2=value2');
$url->getScheme(); // 'http'
$url->getHostName(); // 'yandex.ru'
$url->getQueryParams();
// [
//     'key' => 'value',
//     'key2' => 'value2',
// ];
$url->getQueryParam('key'); // 'value'
// второй параметр - значение по умолчанию
$url->getQueryParam('key2', 'lala'); // 'value2'
$url->getQueryParam('new', 'ehu'); // 'ehu'
$url->getQueryParam('new'); // null
$url->equals(new Url('http://yandex.ru:80?key=value&key2=value2')); // true
$url->equals(new Url('http://yandex.ru:80?key=value')); // false
 */

class Url
{
    private string $address;
    private string $scheme;
    private string $hostName;
    private array $params;

    public function __construct(string $address)
    {
        $this->address = $address;
        $this->scheme = substr($address, 0, strpos($address, "://"));
        $addrWithoutScheme = substr($address, strpos($address, "://") + 3);
        if (str_contains($addrWithoutScheme, ":")) {
            $endOfName = strrpos($addrWithoutScheme, ":");
        } elseif (str_contains($addrWithoutScheme, "?")) {
            $endOfName = strpos($addrWithoutScheme, "?");
        } else {
            $endOfName = strlen($addrWithoutScheme);
        }
        $this->hostName = substr($addrWithoutScheme, 
            0, 
            $endOfName
        );
        if (str_contains($address, "?")) {
            $paramsString = substr($address, strpos($address, "?") + 1);
            $paramsArray = explode("&", $paramsString);
            for ($i = 0; $i < count($paramsArray); $i++) {
                $param = explode("=", $paramsArray[$i]);
                $this->params[$param[0]] = $param[1];
            }
        } else {
            $this->params = [];
        }
    }
    
    public function getScheme(): string
    {
        return $this->scheme;
    }
    
    public function getHostName(): string
    {
        return $this->hostName;
    }
    
    public function getQueryParams(): array
    {
        return $this->params;
    }
    
    public function getQueryParam(string $param, mixed $default = null): mixed
    {
        return $this->params[$param] ?? $default;
    }
    
    public function equals(Url $url): bool
    {
        return $this->address === $url->address;
    }
}