<?php
echo(power_3(1).'<br>');
echo(power_3(3).'<br>');
echo(power_3(10).'<br>');
echo(power_3(27).'<br>');
echo(power_3(36).'<br>');


function power_3($num) {
    echo "is number $num power of 3? ";
    if ($num==1) {return true;}
    $div=0;
    while ($num>1) {
        $div = $num % 3;
        if ($div >0) {
            return false;
        }
        $num = $num/3;
    }
    return true;
}
