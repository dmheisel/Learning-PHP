<?php

$newDir = "testDir";

//check existence of file
if (!file_exists($newDir)) {
    //attempt to create
    if (mkdir($newDir)) {
        echo $newDir . " directory successfully created.";
    } else {
        echo "ERROR: directory could not be created.";
    }
} else {
    echo "ERROR: directory already exists.";
}
