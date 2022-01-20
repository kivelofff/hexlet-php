<?php
echo calcInPolishNotation([1, 2, '+', 4, '*', 3, '+']).'<br>';
echo calcInPolishNotation([7, 2, 3, '*', '-']).'<br>';
function calcInPolishNotation($arr) {
    $num_stack = [];
    $len = count($arr);
    for ($i=0; $i<$len; $i++) {
        $current_el = $arr[$i];
        if (is_numeric($current_el)) {
            array_push($num_stack, $current_el);
        } else {
            $second_num=array_pop($num_stack);
            $first_num=array_pop($num_stack);
            $result = match ($current_el) {
                '+' => $first_num + $second_num,
                '-' => $first_num - $second_num,
                '*' => $first_num * $second_num,
                '/' => $first_num / $second_num,
                default => 0,
            };
            array_push($num_stack, $result);
        }

    }
    return array_pop($num_stack);
}
