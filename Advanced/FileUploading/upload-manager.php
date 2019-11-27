<?php

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    //isset checks if the variable passed is set
    //$_FILES is anything that's sent with HTTP POST method, "photo" the name of the input sent through.
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        //allowed is an array of allowed file types, to be used for only allowing image upload
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");

        //sets variables from properties of files uploaded
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];

        //verify the file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("ERROR: invalid format, please upload a photo only.");

        //verify the file size - 5MB max
        $maxSize = 5 * 1024 * 1024;
        if ($filesize > $maxSize) die('5MB size maximum, please choose a smaller file.');

        //verify MIME type of file is actual photo
        if (in_array($filetype, $allowed)) {
            //check if the file exists prior to upload
            if (file_exists("upload/" . $filename)) {
                echo "File already exists";
            } else {
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename);
                echo "File was uploaded successfully.";
            }
        } else {
            echo "There was a problem uploading your file, please try again.";
        }
    } else {
        echo "ERROR: " . $_FILES["photo"]["error"];
    }
}
