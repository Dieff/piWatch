<?php
require('config.php');

function getPDO(){
  $host = DB_HOST;
  $db   = DB_SCHEMA;
  $user = DB_USER;
  $pass = DB_PASSWORD;
  $charset = DB_CHARSET;

  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
  $pdo = new PDO($dsn, $user, $pass);

  return $pdo;
}

function getModulesData(){
  return json_decode(file_get_contents("./modules/modules.json"), true);
}

?>
