<?php
session_start();

$_SESSION["firstname"] = "David";
$_SESSION["lastname"] = "Heisel";

function greetUser()
{
    echo "Hi there, " . $_SESSION["firstname"] . " " . $_SESSION["lastname"] . "!";
}

greetUser();
