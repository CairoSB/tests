<?php

$Database = new Database($database);

class Database{
  var $queries = array();
  var $connection;

  var $database = array(
    'host' => '127.0.0.1',
  	'login' => 'hgbrasil',
  	'password' => '',
  	'database' => '',
  );

  function __construct($database = null){
    if(is_array($database)) $this->database = $database;
    $this->dbConnect();
  }

  function query($query, $method = 'read', $first = false){
    $this->queries[] = $query;
    if($method == 'write'){
      mysqli_query($this->connection, $query);
      return true;
    } else {
      $select = mysqli_query($this->connection, $query);
      $i = 0;
      while($row = mysqli_fetch_array($select, MYSQLI_ASSOC)) {
        $results[$i] = $row;
        $i++;
      }
      if($i == 0) $results = 0;
      elseif($first) $results = $results[0];
      return($results);
    }
  }

  function dbConnect(){
    if(is_array($this->database)){
      $database = $this->database;
      $this->connection = @mysqli_connect($database['host'], $database['login'], $database['password']) or die ('Erro ao conectar-se ao servidor My-SQL.');
      @mysqli_select_db($this->connection, $database['database']) or die ('Erro ao conectar-se ao banco de dados.');
    } else {
      echo 'Faltando configurações do banco de dados.';
      exit(0);
    }
  }

}

function pr($array){
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}

?>
