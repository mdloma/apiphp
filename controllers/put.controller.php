<?php

$tareaData = getRequestBody();

if(!is_array($tareaData)){

http_response_code(400);
echo '{"message": "Petición mal formada"}';
return;
}

if(!key_exists('titulo',$tareaData)){
http_response_code(400);
echo '{"message": "Es necesario especificar el titulo de la tarea"}';
return;
}

if(!key_exists('categoria',$tareaData)){
http_response_code(400);
echo '{"message": "Es necesario que especifiques una categoria de la tarea"}';
return;
}


$uriParts = explode('/',substr($uri,1));


$id = editUser($conn, $tareaData, $uriParts[0]);


if(!$id){
   
    http_response_code(400);
    echo '{"message": "No se ha podido actualizar la tarea, revisa los datos enviados"}';
    return;
}

$tarea = getTarea($conn, $id);

http_response_code(200);
echo json_encode($tareaData);
