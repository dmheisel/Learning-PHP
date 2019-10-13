<?php
  // arrays can use default indexes, or be structured like javascript objects/python dictionaries.
  $addressBook = [
    "Home" => "415 S 4th Street, Virginia MN",
    "Temp Home" => "7215 Newton Ave S, Richfield MN",
    "Jessica Work" => "1111 7th Street, Hibbing MN"
  ];

  //conditinals / if blocks look similar to js as well.
  if (array_key_exists("Home", $addressBook)) {
    echo "My home address is " . $addressBook["Home"] . "\n";
  };

  print_r(array_keys($addressBook));
  print_r(array_values($addressBook));
?>
