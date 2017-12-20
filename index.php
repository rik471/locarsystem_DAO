<?php

  require_once("config.php");

  /*FAZENDO CONSULTA
  $sql = new Banco();

  $sql->query("UPDATE CLIENTE SET CNH = B WHERE CODCLI = 1");

  $select = $sql->select("SELECT * FROM locarsystem.CLIENTE");

  echo json_encode($select);*/

/*BUSCANDO UM USUARIO
  $user = new Cliente();

  $user->carregarPorCliente(1);

  echo $user;*/

  //BUSCANDO LISTA DE USUARIOS
  //$lista = Cliente::getLista();
  //echo json_encode($lista);

  $busca = Cliente::busca("r");

  echo json_encode($busca);
 ?>
