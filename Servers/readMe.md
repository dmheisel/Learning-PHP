# PHP Server Stuff

## Table of Contents

- [PHP Server Stuff](#php-server-stuff)
  - [Table of Contents](#table-of-contents)
  - [Built in Web Server](#built-in-web-server)
  - [File Uploading/Downloading](#file-uploadingdownloading)
    - [Upload](#upload)
    - [Processing the uploaded file:](#processing-the-uploaded-file)
    - [Download](#download)
  - [Cookies and Sessions](#cookies-and-sessions)
    - [Cookies](#cookies)
      - [Accessing Cookie Values](#accessing-cookie-values)
    - [Sessions](#sessions)
      - [Accessing / Storing Session Data](#accessing--storing-session-data)
      - [Ending Sessions](#ending-sessions)

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

### Download

Generally, forcing a download is not necessary -- files are usually stored in an accessable way and hyperlinked -- the browser handles either displaying the image or pdf, or downloading the zip or exe file.

However, you _can_ force a download using php's `readfile()` function.

## Cookies and Sessions

### Cookies

Notoriously insecure, cookies are still sometimes a viable option. Use `setcookie(name, value, expire, path, domain, secure)` to make a cookie. **Note:** All values other than _name_ are optional. Not setting an expiration will have the cookie expire at the end of the browser session (when the browser is closed).

As always, don't store any sensitive data in a cookie -- they can be accessed and manipulated by end users, and that's generally a recipe for a bad time.

```php
setcookie("username", "David Heisel");
```

#### Accessing Cookie Values

When a cookie is created, php saves it in an array that's a 'superglobal' variable: `$_COOKIE` This variable generally is an associative array that contains all cookies sent by the browser in the current request, keyed by the cookie name. So to print the _username_ cookie above, you would do `echo $_COOKIE["username"];`

To be more robust and check first if it even exists:

```php
if(isset($_COOKIE["username"])) {
  echo $_COOKIE["username"];
} else {
  echo "Guest";
}
```

### Sessions

Sessions are generally the better way to do it - the data you want to store is saved on the server instead of the client, and the data is identified with a unique user session ID that's randomly generated by php -- essentially impossible to guess.

Before we can do anything with sessions, we would need to start the session.

```php
session_start(); //starts the server session
```

#### Accessing / Storing Session Data

Much like cookies, there's a superglobal associative array for sessions: `$_SESSION`. To store data, simply

```php
$_SESSION["firstname"] = "David";
$_SESSION["lastname"] = "Heisel";
```

And we can create a function to retrieve that data:

```php
function greetUser() {
  echo "Hi there, " . $_SESSION["firstname"] . " " . $_SESSION["lastname"] . "!";
}
greetUser();
```

#### Ending Sessions

Simply call `session_destroy()` to end the session and destroy all contents.
