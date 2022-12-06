<?php

namespace Polymorphysm\ParamPolymorphysm\Src;

require_once __DIR__ . '/../../../vendor/autoload.php';
use Polymorphysm\ParamPolymorphysm\Src\Node;

// BEGIN (write your solution here)
function reverse(Node $list): Node
{
    $result = null;
    $currentElement = $list;
    do {
        $result = new Node($currentElement->getValue(), $result);
        $currentElement = $currentElement->getNext();
    } while ($currentElement != null);
    return $result;

}

function test(Node $list) {
    $current = $list;
    while ($current != null) {
        print_r('node value: ' . $current->getValue() . 'next node: ' . PHP_EOL);
        $current = $current->getNext();
    }
}

$numbers = new Node(1, new Node(2, new Node(3)));
print_r('original:' . PHP_EOL);
test($numbers);
print_r('inverted:' . PHP_EOL);
test(reverse($numbers));
// END

