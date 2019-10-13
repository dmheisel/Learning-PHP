<?php
  $fibbArray = [1, 1, 2, 3, 5, 8, 13, 21, 34];
  for ($i = 0; $i < count($fibbArray); $i++) {
    $fibbNumber = $fibbArray[$i];
    echo $fibbNumber . "\n";
  };

  forEach($fibbArray as $fibbNumber) {
    echo $fibbNumber . "\n";
  };

  $phone_numbers = [
    "Alex" => "415-235-8573",
    "Jessica" => "415-492-4856",
    ];

  foreach ($phone_numbers as $name => $number) {
    echo "$name's number is $number.\n";
  }
?>
