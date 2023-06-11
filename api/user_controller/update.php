<?php
  function updateUser($data){
    
    $db = new mysqli('localhost', 'root', '', 'pruebas');

    if($db -> connect_error){
      die('ERROR CONNECTING DB ' . $db -> connect_error);
    }

    $sql = <<<sql
      UPDATE usuarios 
      SET full_name = ?, address = ?, email = ?, avatar_url = ?
      WHERE (id = $data[id])
    sql;

    $sql_statement = $db -> prepare($sql);

    if(!$sql_statement){
      die('Statement error ' . $db -> error);
    }

    $sql_statement -> bind_param(
      'ssss',
      $data['full_name'],
      $data['address'],
      $data['email'],
      $data['avatar_url']
    );

    $response = '';

    if($sql_statement -> execute()){
      $response = array(
        'error' => false,
        'message' => 'Updated successfully'
      );
      
      echo json_encode($response);
    }

  }
?>