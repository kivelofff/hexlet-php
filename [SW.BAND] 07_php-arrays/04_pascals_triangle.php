<?php
var_dump(generate(1));
var_dump(generate(4));

function generate($row) {
    $res=[];
    for ($i=0; $i<=$row; $i++) {
        $res[]=factorial($row)/(factorial($i)*factorial($row-$i));
    }
    return $res;
}

function factorial($num) {
    $res=1;
    for($i=1; $i<=$num; $i++) {
        $res *=$i;
    }
    return $res;
}
