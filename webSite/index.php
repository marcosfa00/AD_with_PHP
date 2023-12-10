<?php
/**
 * Excercise Data Base
 */


include_once 'Methods.php';
title();
spaces();

echo "Show file content: ZONES.TXT";
$zones = fopen("Zones.txt", "r");
readZones($zones);
