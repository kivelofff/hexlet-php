<?php
echo lengthOfLastWord('').'<br>';
echo lengthOfLastWord('man in BlacK').'<br>';
echo lengthOfLastWord('hello, world!  ').'<br>';

function lengthOfLastWord($str) {
    echo "length of last word of string:$str is ";
    $corrected = rtrim($str);
    $len = strlen($corrected);
    if($len==0) {
        return 0;
    }
    for ($i=$len-1; $i>=0; $i--) {
        if ($corrected[$i]==' ') {
            return $len-1-$i;
        }
    }
}
