<?php
function printCookie()
{
    if (isset($_COOKIE["username"])) {
        echo $_COOKIE["username"];
    } else {
        echo "Guest";
    }
}

printCookie();
