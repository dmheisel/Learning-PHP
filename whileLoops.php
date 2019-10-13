<?php
  $counter = 0;
  while ($counter < 50) {
    $counter ++;
    if ($counter % 3 == 0 && $counter % 5 == 0) {
      echo "FizzBuzz!\n";
      continue;
    } else if ($counter %5 == 0) {
      echo "Buzz!\n";
      continue;
    } else if ($counter %3 == 0) {
      echo "Fizz!\n";
      continue;
    } else {
      echo $counter . "\n";
    }
  };
?>
