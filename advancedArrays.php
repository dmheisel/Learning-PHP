<?php
  $odd_numbers = [1,3,5,7,9];
  $even_numbers = [2,4,6,8,10];

  $all_numbers = array_merge($odd_numbers, $even_numbers);
  print_r($all_numbers);

  // this won't work!
  // $newArray = sort($all_numbers);
  // print_r($newArray);

  //instead, do it like this!  the array is mutated.
  sort($all_numbers);
  print_r($all_numbers);

  print_r(array_slice($all_numbers, 3, 2));
  print_r($all_numbers);

  print_r(array_splice($all_numbers, 2, 3));
  print_r($all_numbers);
?>
