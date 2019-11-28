# More PHP Learning - Advanced

Learning PHP a little more, getting past the basic syntax stuff!

# Table of Contents

- [More PHP Learning - Advanced](#more-php-learning---advanced)
- [Table of Contents](#table-of-contents)
- [Importing/Including files](#importingincluding-files)
  - [include() and require()](#include-and-require)
  - [include_once() and require_once()](#includeonce-and-requireonce)
- [The File System](#the-file-system)
  - [Open Files](#open-files)
    - [Open Modes](#open-modes)
    - [Checking File Existance](#checking-file-existance)
    - [Closing a file](#closing-a-file)
  - [Reading Files](#reading-files)
    - [File Size](#file-size)
    - [readfile()](#readfile)
    - [file_get_contents()](#filegetcontents)
    - [file()](#file)
  - [Writing Files](#writing-files)
    - [file_put_contents()](#fileputcontents)
  - [Deleting, Renaming](#deleting-renaming)
  - [Filesystem Functions](#filesystem-functions)
- [Parsing Directories](#parsing-directories)
  - [Make Directory](#make-directory)
  - [Copying Files](#copying-files)
  - [Listing Files in a Directory](#listing-files-in-a-directory)

# Importing/Including files

## include() and require()

As things get a little more complicated, we'll be breaking files apart and importing them into others. This helps create a clean, readable code base and makes our code more reusable if we have smaller chunks broken into more files. Instead of copying code we've written elsewhere, just import it into the new file using `include()` or `require()`

- The difference between `include()` and `require()` is: the include() statement will only generate a PHP warning but allow script execution to continue if the file to be included can't be found, whereas the require() statement will generate a fatal error and stops the script execution. Think of include as "if it exists, bring it along", and require as "we absolutely need this to continue, stop everything if we don't have it."

syntax looks like:

```
include("path/to/filename"); //-Or- include "path/to/filename";
require("path/to/filename"); //-Or- require "path/to/filename";
```

a chunk of code like this:

```
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tutorial Republic</title>
</head>
<body>
<?php include "header.php"; ?>
<?php include "menu.php"; ?>
    <h1>Welcome to Our Website!</h1>
    <p>Here you will find lots of useful information.</p>
<?php include "footer.php"; ?>
</body>
</html>
```

will have our PHP includes replaced with whatever is contained in those files.

## include_once() and require_once()

Caling `include()` or `require()` more than once in a file will typically result in a **Fatal error: Cannot redeclare [function name] **

To get around this, you can use `include_once()` or `require_once()` -- this will only include the file once total, so it won't duplicate it or result in an error.

# The File System

PHP contains functionality to create, access, modify, and manipulate files stored on your server dynamically.

## Open Files

`fopen()` will open a file, and takes two parameters: _filename_ and _mode_.

```
fopen("food_shelf_south.txt", r) //this will open the food shelf report in read mode
```

### Open Modes

| Modes | Actions allowed                                                                                    |
| ----- | -------------------------------------------------------------------------------------------------- |
| r     | Read-only                                                                                          |
| r+    | Read and Write                                                                                     |
| w     | Write-only - File will be opened cleared, or if it doesn't exist, php will create it.              |
| w+    | Write & read -- like r+ but clears the file                                                        |
| a     | Append: opens file for writing only, but preserves current file content by writing to end of file. |
| a+    | Append, read, write - preserves as 'a' does, but allows reading                                    |
| x     | Writing Only, but errors if file already exists. To be used for creating a new file.               |
| x+    | Writing, Reading, errors as 'x' does, creates new file.                                            |

### Checking File Existance

Since PHP will generate warnings if files don't exist,it's good practice to implement file checking before trying to access it, using `file_exists()`

### Closing a file

Once finished working on the file, using `fclose()` on the file to close it. PHP will handle this when a script terminates on its own, but it's considered best practice to close it this way instead to ensure nothing else reads/writes to that file in error.

## Reading Files

Okay, so the file is open in read mode, but we still have to _read_ the file. That's where `fread()` comes in.

`fread()` takes two parameters: _file handle_, and _length in bytes_

Calling it would look like:

```php
fread($handle, "20")
```

This would use the \$handle file handler (where we open it and set it in read mode) to read 20 byts from this particular file.

### File Size

Since it's likely we might not know the size of the file we're reading, we can use `filesize()` to get the size of the file we're looking at.
Using it in conjuction with `fread()` would look like this:

```php
<?php
$file = 'food_shelf_south.txt';

//check if the file exists
if (file_exists($file)) {
    //set the file handler to open it
    $handle = fopen($file, 'r');

    //read the entire contents of the file
    $content = fread($handle, filesize($file));

    //close the file handler
    fclose($handle);

    //print the content to console
    echo $content;
} else {
    echo "ERROR: file does not exist";
}
?>
```

### readfile()

This is a simpler way to read the entire contents of a file without having to worry about opening/closing it. This will have the same results as above:

```php
<?php
$file = 'food_shelf_south.txt';

if(file_exists($file)) {
    readfile($file) or die("ERROR: cannot read file");
} else {
    echo "ERROR: file does not exist";
}
?>
```

### file_get_contents()

Very similar to `readfile()`. Opens the file, reads it and echos out the entire file as a string variable.

### file()

Another method to read a file, `file()` reads the file. _However_, this method returns the file's content as an **array of lines** instead of a string. Each element in the array corresponds to one line in the file read.

Processing the data for the file would need to use something like a `foreach()` loop to iterate over it.

For example:

```php
<?php
$file = 'food_shelf_south.txt';

if (file_exists($file)) {
    $fileArray = file($file) or die("ERROR: cannot read file to array");
    forEach($fileArray as $line) {
        echo $line;
    }
} else {
    echo "ERROR: file does not exist";
}
?>
```

## Writing Files

File writing is handled very similarly to reading, above, but uses the "w" method for the handler.

Also uses the `fwrite()` function.

Optionally, can use `file_put_contents()` -- the counterpart to `file_get_contents()`.

### file_put_contents()

Much like get contents, this doesn't need to use the fopen() or fwrite() methods. Additionally, you can pass it a _special parameter_ in the form of a `FILE_APPEND` flag, that will cause it to open the file in append mode, instead of re-writing the entire file.

This would look like:

```php
<?php
$file = 'food_shelf_south.txt'
$data = '25,65,75'

file_put_contents($file, $data, FILE_APPEND) or die('ERROR: cannot write to file');

echo "Data written to the file successfully."
?>
```

## Deleting, Renaming

Just a short bit -- you can use `unlink()` and `rename()` to delete or rename files, respectively.

Both take the file as the fist parameter, and unlink takes the new file name as the second parameter.

## Filesystem Functions

| Function        | Description                                  |
| --------------- | -------------------------------------------- |
| fgetc()         | Gets one character at a time                 |
| fgets()         | Gets one line(string) at a time              |
| fgetcsv()       | Reads a line of CSV (comma separated values) |
| filetype()      | Returns the file type of the file passed     |
| feof()          | Checks if end of file is reached             |
| is_file()       | Checks if the arg passed is an actual file   |
| is_dir()        | Checks if the arg passed is a directory      |
| is_executable() | Checks if it's an executable                 |
| realpath()      | Returns canonicalized absolute pathname      |
| rmdir()         | Removes a directory                          |

# Parsing Directories

Much like you can manipulate files, you can also manipulate directories and use PHP to navigate them.

## Make Directory

`mkdir()` makes a new directory, and you pass it the desired directory name as a parameter, like:

```php
<?php
$dir = 'myDir';

//check if directory already exists
if (!file_exists($dir)) {
    //attempt to create the directory
    if(mkdir($dir)) {
        //on success
        echo $dir . "directory successfully created.";
    } else {
        //on fail
        echo "ERROR: directory could not be created.";
    }
} else {
    echo "ERROR: directory already exists";
}
?>
```

If you specify a parent directory in the directory name, that directory **must** exist, otherwise php will throw an error.

## Copying Files

Using `copy()`, you can copy a file from one location and save it in another. It takes two parameters, the _sourcefile_ and the _destination_.

**Note:** Both the source file and the destination directory must exist for this to work.

## Listing Files in a Directory

Using `scandir()`, you can list out all the files in the location passed as a parameter.

A common usage would be to recursively list out all the files in a nested folder. Let's see what this would look like:

```php
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
```
