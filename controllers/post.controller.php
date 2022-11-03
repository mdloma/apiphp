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

    if(!key_exists('descripcion',$userData)){
      http_response_code(400);
      echo '{"message": "Es necesario que especifiques una descripcion de la tarea"}';
      return;
    }


    $result = insertTarea($conn, $tareaData);
  
    $tarea = getTarea($conn, $result);

    http_response_code(201);
    echo json_encode($tarea);
    return;