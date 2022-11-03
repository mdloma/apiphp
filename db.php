<?php


$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "gestion_tareas";
$dbport = 3306;


$conn = null;

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname;port=$dbport", $username, $password);
 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {

  
  http_response_code(500);
  echo '{"message": "Se ha producido un error interno. Ponte en contacto con el administrador si el problema persiste."}';
  return;
}