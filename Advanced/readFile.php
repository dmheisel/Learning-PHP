<?php
$file = '/Users/david.heisel/Documents/Code/Learning-PHP/Advanced/food_shelf_south.txt';

//Check if the file exists first:
if (file_exists($file)) {
    //create the file handler to open the file
    $handle = fopen($file, "r");

    //read the file contents and save to a variable using the file handler
    $content = fread($handle, filesize($file));

    //close the file
    fclose($handle);

    echo $content;
} else {
    echo "ERROR: file does not exist, cannot read.";
}
