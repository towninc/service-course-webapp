<?php

$arr = array(array(array(1,2,3,4),array(5,6,7)),8,9,10);

var_dump($arr);

debug("arr",$arr);

function debug($name, $value) {
  echo "<table>";
  foreach($value as $k => $v) {
    echo "<tr><td>{$k}</td><td>";
    if(is_array($v)) {
      debug($k, $v);
    } else { 
      echo $v;
    }
    echo "</td></tr>";
  }
  echo "</table>";
}

?>