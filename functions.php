<?php

function getRequestBody(){
  $json = file_get_contents('php://input');
  
  return json_decode($json, true);
}

function insertTarea($conn, $tareaData){
  $insertTarea = [
    ':titulo' => $tareaData['titulo'],
    ':descripcion' => $tareaData['descripcion'],
    ':categoria' => $tareaData['categoria'],
    ':fecha_creacion' => (new DateTime())->format('Y-m-d H:i:s'),
    ':fecha_actualizacion' => (new DateTime())->format('Y-m-d H:i:s')
  ];
  
  $insertSQL = "INSERT INTO tareas ( titulo, categoria ,descripcion, fecha_creacion, fecha_ actualizacion) VALUES (:titulo,:categoria,:descripcion, :fecha_creacion,:fecha_actualizacion)";

  $query = $conn->prepare($insertSQL);
  
  try{
  
    if($query->execute($insertTarea)) {
        return $conn->lastInsertId();
    }
  }catch(Exception $e){
    return $e->getMessage();
  }
}

function getTarea($conn, $id){
  $tareaSQL = "SELECT * FROM tareas WHERE id=:id";
  $query = $conn->prepare($tareaSQL);

  $query->setFetchMode(PDO::FETCH_ASSOC);
 
  $query->execute([':id' => $id]);
 
  $tareas = $query->fetchAll();

  if(count($tareas) === 0){
    return null;
  }

  return $tareas[0];
}

function getTareaList($conn){
  $usersSQL = "SELECT * FROM tareas ORDER BY titulo ASC";
  $query = $conn->prepare($tareaSQL);
 
  $query->setFetchMode(PDO::FETCH_ASSOC);

  $query->execute();
  
  return $query->fetchAll();
}
  
function editTarea($conn, $tareaData, $id){
  $updateTarea = [
  
    ':titulo' => $tareaData['titulo'],
    ':categoria' => $tareaData['categoria'],
    ':descripcion' => $tareaData['descripcion'],
    ':id' => $id
  ];
  
  $updateSQL = "UPDATE tareas SET titulo=:titulo, descripcion=:descripcion, categoria=:categoria, WHERE id=:id";
  
  $query = $conn->prepare($updateSQL);
  
  try{
    
    if($query->execute($updateTarea)) {
        return $id;
    }
  }catch(Exception $e){
    return null;
  }
}

function deleteTarea($conn, $id){
  $deleteTarea = [
    ':id' => $id
  ];
  
  $deleteSQL = "DELETE FROM gestion_tareas.tareas WHERE id=:id";
 
  $query = $conn->prepare($deleteSQL);
  
  try{
    
    if($query->execute($deleteTarea)) {
      return $query->rowCount();
    }
  }catch(Exception $e){
    return 0;
  }
}
