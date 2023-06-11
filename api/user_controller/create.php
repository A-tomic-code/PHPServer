<?php

function createUser($data)
{
    $db = new mysqli('localhost', 'root', '', 'pruebas');
    $table_fields = "full_name, email, address, avatar_url";

    if ($db->connect_error) {
        die('ERR DB CONN' . $db->connect_error);
    }

    $sql = <<<sql
      INSERT INTO usuarios ($table_fields) 
      VALUES (?, ?, ?, ?)
    sql;

    $sql_statement = $db->prepare($sql);

    if (!$sql_statement) {
        die(' STMT ERR' . $db->error);
    }

    $sql_statement->bind_param(
        'ssss',
        $data['full_name'],
        $data['email'],
        $data['address'],
        $data['avatar_url']
    );

    $response = '';

    if ($sql_statement->execute()) {

        $inserted_id = $db->insert_id;
        $response = json_encode([
            'error' => false,
            'insert_id' => $inserted_id
        ]);

    } else {

        $response = json_encode([
            'error' => true,
            'message' => $sql_statement->error
        ]);

    }

    echo $response;
}

// $json = file_get_contents('php://input');
// $data = json_decode($json, true);

// createUser($data);

$test= 'xxxx'
?>
