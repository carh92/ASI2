<?php
define ('DB_HOST','localhost'); //Host de postgresql (puede ser otro)
define ('DB_USER','postgres'); //Usuario de postgresql (puede ser otro)
define ('DB_PASS','123456'); //Password de postgresql (puede ser otro)
define ('DB_NAME','cargomania'); //Database de postgresql (puede ser otra)
define ('DB_PORT','5434'); //Puerto de postgresql (puede ser otro)
$c=pg_connect("user=".DB_USER." port=".DB_PORT." dbname=".DB_NAME." host=".DB_HOST." password=".DB_PASS);
//analisis2 
?>