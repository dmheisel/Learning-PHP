<?php
  $user = 'David';
  echo "Hello $user!";
  echo "\nHello " . "World!";
  $currentYear = 2019;
  $birthYear = 1984;
  $age = $currentYear - $birthYear;
  echo "\n";
  echo $age;
  echo "\n$user is $age years old!";

  $myArray = [1, 1, 2, 3, 5, 8, 13];
  echo "\n";
  echo $myArray[2] . "\n";
  echo count($myArray) . "\n";
  $firstItem = reset($myArray);
  echo $firstItem . "\n";
  $lastItem = end($myArray);
  echo $lastItem . "\n";
  array_push($myArray, 21);
  print_r($myArray);
  array_pop($myArray);
  print_r($myArray);
?>
