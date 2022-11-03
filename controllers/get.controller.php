<?php


    $tareas = getTareaList($conn);

    http_response_code(200);
    echo json_encode($tareas);
    return;

$uriParts = explode('/',substr($uri,0));

    $tarea = getTarea($conn, $uriParts[0]);
    print($uriParts[0]);

    if(!$tarea){
        //devolvemos un error
        http_response_code(404);
        echo '{"message": "La tarea no existe"}';
        return;
    }
    
    http_response_code(200);
    echo json_encode($tarea);
    return;