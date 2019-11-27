<?php
$file = '/Users/david.heisel/Documents/Code/Learning-PHP/Advanced/food_shelf_south.txt';

//Check if the file exists first:
if (file_exists($file)) {
    $handle = fopen($file, "r");
} else {
    echo "ERROR: file does not exist, cannot read.";
}
