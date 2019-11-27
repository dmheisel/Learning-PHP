<?php

$date = date("m/d/Y");
echo $date, "\n";
$longFormatDate = date("F d, Y h:i:s A");
echo $longFormatDate, "\n";

$futureDate = mktime(0, 0, 0, date("m") + 30, date("d"), date("Y"));
//futureDate should be 30 months from today's date!
echo date("m/d/Y", $futureDate);
