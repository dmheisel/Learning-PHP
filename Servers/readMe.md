# PHP Server Stuff

## Table of Contents

- [PHP Server Stuff](#php-server-stuff)
  - [Table of Contents](#table-of-contents)
  - [Built in Web Server](#built-in-web-server)
  - [File Uploading/Downloading](#file-uploadingdownloading)
    - [Upload](#upload)
    - [Processing the uploaded file:](#processing-the-uploaded-file)

## Built in Web Server

PHP is packaged with a built-in web server -- see [the official documentation](https://www.php.net/manual/en/features.commandline.webserver.php).

To serve up your files, in your terminal (from the directory you want to serve up), type `php -S localhost:8080`

You can add `-t [dirname]` to serve up a specific directory.

Once you've run this, you sould see something like:

```
PHP 7.1.32 Development Server started at Wed Nov 27 14:28:19 2019
Listening on http://localhost:8080
Document root is /Users/<username>/Documents/Code/Learning-PHP
Press Ctrl-C to quit.
```

You can then navigate to localhost:8080 in your browser and see whatever is being served up from that directory. (localhost:8080/index.html, for example, might be a static web page you've built)

## File Uploading/Downloading

### Upload

Here we're going to look into how to upload a file to a server from a simple html form.

We'll work from this form -- included in the repo -- to handle our file:

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>File Upload Form</title>
  </head>
  <body>
    <form
      action="upload-manager.php"
      method="post"
      enctype="multipart/form-data"
    >
      <h2>Upload File</h2>
      <label for="fileSelect">Filename:</label>
      <input type="file" name="photo" id="fileSelect" />
      <input type="submit" name="submit" value="Upload" />
      <p>
        <strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a
        max size of 5 MB.
      </p>
    </form>
  </body>
</html>
```

### Processing the uploaded file:

See the included file processor.php, or below:

```php
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
?>
```

This code will store your photo into an 'upload/' folder in the server directory.
