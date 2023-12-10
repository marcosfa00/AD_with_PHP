<?php
/**
 * Excercise Data Base
 */


include_once 'Methods.php';
title();
spaces();

echo "Show file content: ZONES.TXT";
echo "<br>";
//we create a new object of the class Database
$methods = new Database();


$zones = fopen("Zones.txt", "r");
$methods->readZones($zones);

