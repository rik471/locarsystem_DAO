<?php

  class Cliente {

    /*ATRIBUTOS*/
    private $codCli;
    private $nome;
    private $telefone;
    private $endereco;
    private $tipoCli;
    private $dataCadastro;
    private $cnh;


    /*GETTERS E SETTERS PARA ATRIBUTOS PRIVADOS*/
    public function getCodCli(){
      return $this->codCli;
    }
    public function setCodCli($codCli){
      $this->codCli = $codCli;
    }


    public function getNome(){
      return $this->nome;
    }
    public function setNome($nome){
      $this->nome = $nome;
    }


    public function getTelefone(){
      return $this->telefone;
    }
    public function setTelefone($telefone){
      $this->telefone = $telefone;
    }


    public function getEndereco(){
      return $this->endereco;
    }
    public function setEndereco($endereco){
      $this->endereco = $endereco;
    }


    public function getTipoCli(){
      return $this->tipoCli;
    }
    public function setTipoCli($tipoCLi){
      $this->tipoCli = $tipoCli;
    }


    public function getDataCadastro(){
      return $this->dataCadastro;
    }
    public function setDataCadastro($dataCadastro){
      $this->dataCadastro = $dataCadastro;
    }


    public function getCnh(){
      return $this->cnh;
    }
    public function setCnh($cnh){
      $this->cnh = $cnh;
    }
    /*FIM GETTERS E SETTERS PARA ATRIBUTOS PRIVADOS*/

    //FUNCAO PARA FAZER A BUSCA POR USUARIO
    public function carregarPorCliente($id){

      $sql = new Banco();

      $result = $sql->select("SELECT * FROM CLIENTE WHERE CODCLI = :ID ", array(
        ":ID"=>$id
      ));

      if (count($result) > 0) {

        $row = $result[0];

        $this->setCodCli($row['CODCLI']);
        $this->setNome($row['NOME']);
        $this->setTELEFONE($row['TELEFONE']);
        $this->setEndereco($row['ENDERECO']);
        $this->setTipoCli($row['TIPOCLI']);
        $this->setDataCadastro(new DateTime($row['DATACADASTRO']));
        $this->setCnh($row['CNH']);

      }
    }
    // FUNCAO PRA MOSTRAR NA TELA
    public function __toString(){

      return json_encode(array(
        "CODCLI"=>$this->getCodCli(),
        "NOME"=>$this->getNome(),
        "TELEFONE"=>$this->getTelefone(),
        "ENDERECO"=>$this->getEndereco(),
        "TIPOCLI"=>$this->getTipoCli(),
        "DATACADASTRO"=>$this->getDataCadastro()->format("d/m/Y H:i:s")
      ));
    }


  }

 ?>
