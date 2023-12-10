<?php

function title(){
    echo "Marcos Fernandez Avendaño";
    echo "<br>";
    echo "Fernando Alonso Diaz";
    echo "<br>";
    echo "EJERCICIO PISOS PHP";
}


function spaces() {
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
}

function readZones($file){
  while (!feof($file)){
      $line = fgets($file);
      echo $line;
      echo "<br>";
  }
}