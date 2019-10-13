<?php
  $greeting = "Hello ";
  $user = "David";
  echo $greeting . $user . "\n";
  $longString = 'This is a longer string than the other ones, how long is it?';
  echo strlen($longString) . "\n";
  $lastThreeChars = substr($longString, strlen($longString) - 3);
  echo "last three characters are: " . $lastThreeChars;
?>
