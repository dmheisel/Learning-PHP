# More PHP Learning - Advanced

Learning PHP a little more, getting past the basic syntax stuff!

# Table of Contents

- [More PHP Learning - Advanced](#more-php-learning---advanced)
- [Table of Contents](#table-of-contents)
- [Importing/Including files](#importingincluding-files)
  - [include() and require()](#include-and-require)
  - [include_once() and require_once()](#includeonce-and-requireonce)

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

#
