<?php


$uriParts = explode('/',substr($uri,1));


$affectedRows = deleteTarea($conn, $uriParts[1]);

if($affectedRows === 0){
  
    http_response_code(404);
    echo '{"message": "La tarea no existe"}';
    return;
}


http_response_code(204);
echo '';
return;

