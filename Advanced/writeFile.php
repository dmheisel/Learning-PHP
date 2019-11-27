<?php
$file = '/Users/david.heisel/Documents/Code/Learning-PHP/Advanced/food_shelf_south.txt';
$data = '50,65,75';

file_put_contents($file, $data, FILE_APPEND) or die('ERROR: cannot write to the file');
readfile($file) or die('ERROR: cannot read the file.');
