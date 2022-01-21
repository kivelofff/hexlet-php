<?php
echo compareVersion("0.1", "0.2").'<br>';
echo compareVersion("0.2", "0.1").'<br>';
echo compareVersion("4.2", "4.2").'<br>';
echo compareVersion("4.2.2", "4.2").'<br>';
function compareVersion($ver1, $ver2) {
    echo "compare versions $ver1 and $ver2: ";
    $ver_arr1 = explode(".", $ver1);
    $ver_arr2 = explode(".", $ver2);
    $ver1_len = count($ver_arr1);
    $ver2_len = count($ver_arr2);
    $len = min($ver1_len, $ver2_len);
    for ($i=0; $i<$len; $i++)
    if ($ver_arr1[0]>$ver_arr2[0]) {
        return 1;
    } else if ($ver_arr1[0]<$ver_arr2[1]) {
        return -1;
    } else if ($ver_arr1[0]==$ver_arr2[0]) {
        if ($i==$len-1) {
            if ($ver2_len==$ver1_len) {
                return 0;
            } else {
                return $ver1_len>$ver2_len ? 1 : -1;
            }

        }
    }
}