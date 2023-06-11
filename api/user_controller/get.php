<?php
function get_all()
{

  $username = 'root';
  $password = '';
  $hostName = 'localhost';
  $database = 'pruebas';

  $db = new mysqli($hostName, $username, $password, $database);

  if ($db->connect_error) {
    die('ERROR CONEXION DB ' . $db->connect_error);
  }

  $sql = "SELECT * FROM usuarios";
  $result = $db->query($sql);

  // Verificar si se obtuvieron resultados
  if ($result->num_rows > 0) {
    // Crear un array para almacenar los registros
    $arrayResultados = array();

    // Recorrer los resultados
    while ($registro = $result->fetch_assoc()) {
      // Agregar cada registro al array
      $arrayResultados[] = $registro;
    }

    // Convertir el array en JSON
    $jsonResultados = array(
      'error' => false,
      'data' => $arrayResultados
    );

    // Imprimir el JSON
    echo json_encode($jsonResultados);
  } else {
    $error = array(
      "error" => true,
      "message" => 'no content available'
    );
    echo json_encode($error);
  }
}

?>