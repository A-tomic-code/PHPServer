<?php

include_once('./cors.php');
include_once('./user_controller/create.php');
include_once('./user_controller/get.php');
include_once('./user_controller/delete.php');
include_once('./user_controller/update.php');

define('DATA', json_decode(file_get_contents('php://input')));



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  get_all();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  $data = array(
    'full_name' => DATA -> full_name,
    'email' => DATA -> email,
    'address' => DATA -> address,
    'avatar_url' => DATA -> avatar_url
  );

  createUser($data);
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
  
  $data = array(
    'full_name' => DATA -> full_name,
    'email' => DATA -> email,
    'address' => DATA -> address,
    'avatar_url' => DATA -> avatar_url,
    'id' => DATA -> id
  );

  updateUser($data);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
  erase(DATA -> id);
}

?>