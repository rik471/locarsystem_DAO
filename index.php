<?php

  require_once("config.php");

  //FAZENDO CONSULTA
  /*$sql = new Banco();
  $sql->query("UPDATE CLIENTE SET CNH = B WHERE CODCLI = 1");
  $select = $sql->select("SELECT * FROM locarsystem.CLIENTE");
  echo json_encode($select);*/

/*BUSCANDO UM USUARIO
  $user = new Cliente();

  $user->carregarPorCliente(1);

  echo $user;*/

  //BUSCANDO LISTA DE USUARIOS
  //$lista = Cliente::lista();
  //echo json_encode($lista);

  /*$listar = new Banco();
  $listar->select("SELECT * FROM CLIENTE;");
  echo json_encode($listar);*/

  //busca por letras e silabas
  //$busca = Cliente::busca("ri");
  //echo json_encode($busca);

  //AUTENTICANDO LOGIN E SENHA
  //$sql = new Cliente();
  //$sql->login("Rick471", "rickvei");
  //echo $sql;

  //INSERINDO NOVO USUARIOS
  /*$novo = new Cliente();
  $novo->setLogin("PontoDuplo");
  $novo->setSenha("master");
  $novo->insert();
  echo $novo;*/

  //Inserindo novo usuario na classe Cliente
  //$novo = new Cliente("RicardoVei", "Pardal");
  //$novo->insert();
  //echo $novo;

  //UPDATE credenciais de usuario
  $atualizar = new Cliente();
  $atualizar->carregarPorCliente(1);
  $atualizar->update("Rick880", "rickvei");
  echo $atualizar;

  //DELETE usuario
  /*$delete = new Cliente();
  $delete->carregarPorCliente(14);
  $delete->delete();
  echo $delete;*/
 ?>
