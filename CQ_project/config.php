<?php

$host = "cpanel.formaweb.com.br"; /* Host name */
$user = "cairo_testes"; /* User */
$password = "kDBg4bdUEyAE"; /* Password */
$dbname = "cairo_testes"; /* Database name */

$conn = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
}
if ($conn){
        echo("Conectado");
}
?>
