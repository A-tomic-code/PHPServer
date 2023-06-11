<?php
function erase($id)
{  $db = new mysqli('localhost', 'root', '', 'pruebas');

  if($db -> connect_error){
    die("CONN DB ERR " . $db -> connect_error);
  }

  if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    
    // preparar la sentencia
    
    $sql = <<<sql
      DELETE FROM usuarios
      WHERE (id = ?)
    sql;

    $sql_statement = $db -> prepare($sql);

    if(!$sql_statement){
      die("ERROR SQLSTMT " . $db -> error);
    }

    $sql_statement -> bind_param('i', $id);
    $response = '';
    
    // ejecutar la sentencia

    if($sql_statement -> execute()){
      $response = Array(
        'error' =>  false,
        'message' => "DELETED USER $id",
      );
    }else{
      $response = Array(
        'error' =>  true,
        'message' => "EROR DELETING USER $id",
        
      );
    }
    echo json_encode($response);

  }}


  // <<<sql
  //   DELETE FROM usuarios
  //   WHERE (id = $userId)
  // sql;

  // $output = array(
  //   'error' => false
  // );
  // echo json_encode($output)
?>