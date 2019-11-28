<?php

$newDir = "testDir";

//check existence of file
// if (!file_exists($newDir)) {
//     //attempt to create
//     if (mkdir($newDir)) {
//         echo $newDir . " directory successfully created.";
//     } else {
//         echo "ERROR: directory could not be created.";
//     }
// } else {
//     echo "ERROR: directory already exists.";
// }

$mydir = '/Users/david.heisel/Documents/Code/Learning-PHP';
//function to list out all files in a directory
function listFiles($path)
{
    //does this file exist and is it a directory?
    if (file_exists($path) && is_dir($path)) {
        //get the results of what's in this directory
        $result = scandir($path);

        //now let's remove the current and parent directories and see what's left
        $files = array_diff($result, array('.', '..'));

        //if there are files remaining...
        if (count($files) > 0) {
            //loop through the file list
            foreach ($files as $file) {
                if (is_file("$path/$file")) {
                    //if it's a file, print out the file name
                    echo $file . "\n";
                } else if (is_dir("$path/$file")) {
                    //if it's a directory, call the function recursively
                    listFiles("$path/$file");
                }
            }
        } else {
            echo "No files found in directory " . $path . "\n";
        }
    } else {
        echo "ERROR: directory not found";
    }
}

listFiles($mydir);
