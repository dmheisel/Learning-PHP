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

    echo $content, "\n";
} else {
    echo "ERROR: file does not exist, cannot read.";
};

if (file_exists($file)) {
    readfile($file) or die('ERROR: cannot read this file.');
    echo "\n";
} else {
    echo "ERROR: file does not exist.";
}

//lastly, converting file to an array using file()
if (file_exists($file)) {
    $arr = file($file) or die('ERROR: cannot read file to array');
    foreach ($arr as $line) {
        echo $line;
    }
} else {
    echo "ERROR: file does not exist";
};
