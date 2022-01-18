<?php
echo isBalancedBrackets("(())").'<br>';
echo isBalancedBrackets("((())").'<br>';

function isBalancedBrackets($string) {
    echo "Check if string:$string is balanced:";
    if (empty($string)) {
        return true;
    }
    $open=0;
    $close=0;
    for ($i=0; $i<strlen($string); $i++) {
      if($string[$i]=='(') {
          $open++;
      }
      if($string[$i]==')') {
          $close++;
      }
    }
    if ($open != $close) {
        return false;
    }
    return true;
}
