<?php

  require_once("config.php");

  /*$sql = new Banco();

  $sql->query("UPDATE CLIENTE SET CNH = B WHERE CODCLI = 1");

  $select = $sql->select("SELECT * FROM locarsystem.CLIENTE");

  echo json_encode($select);*/

  $user = new Cliente();

  $user->carregarPorCliente(1);

  echo $user;
 ?>
