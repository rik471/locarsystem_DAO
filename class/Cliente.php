<?php

  class Cliente {

    /*ATRIBUTOS*/
    private $codCli;
    private $login;
    private $senha;
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



    public function getLogin(){
      return $this->login;
    }
    public function setLogin($login){
      $this->login = $login;
    }



    public function getSenha(){
      return $this->senha;
    }
    public function setSenha($senha){
      $this->senha = $senha;
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
          $this->setDados($results[0]);
      }
    }

    //FUNÇÃO PARA LISTAR USUARIOS
    public static function lista(){

      $sql = new Banco();

      return $sql->select("SELECT * FROM locarsystem.CLIENTE ORDER BY LOGIN");
      /*if (count($result) > 0) {
          $this->setDados($results[0]);
      }*/
    }

    //FUNÇÃO PARA BUSCAR USUARIO POR LETRAS E PALAVRAS
    public static function busca($letra){

      $sql = new Banco();

      return $sql->select("SELECT * FROM locarsystem.CLIENTE WHERE NOME LIKE :NOME ORDER BY NOME", array(
        ':NOME'=>'%'.$letra.'%'
      ));
          //$this->setDados($results[0]);
    }



    //FUNÇÃO PARA AUTENTICAR CODIGO E SENHA
    public function login($nome, $senha){

      $sql = new Banco();

      $results = $sql->select("SELECT * FROM locarsystem.CLIENTE WHERE LOGIN = :LOGIN AND SENHA = :SENHA", array(
        ':LOGIN'=>$login,
        ':SENHA'=>$senha
      ));
      if (count($results) > 0) {
        $this->setDados($results[0]);
      }else{
        throw new Exception("Login ou Senha incorretos");
      }
    }

    //INSERE NOVO USUARIO
    public function insert(){

      $sql = new Banco();

      $results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :SENHA)", array(
        ":LOGIN"=>$this->getLogin(),
        ":SENHA"=>$this->getSenha()
      ));
      if (count($results) > 0){
        $this->setDados($results[0]);
      }
    }

    ///UPDATE
    public function update($login, $senha){

       $this->setLogin($login);
       $this->setSenha($senha);

       $sql = new Banco();

       return $sql->query("UPDATE locarsystem.CLIENTE SET LOGIN = :LOGIN, SENHA = :SENHA WHERE CODCLI = :CODCLI", array(
         ":LOGIN"=>$this->getLogin(),
         ":SENHA"=>$this->getSenha(),
         ":CODCLI"=>$this->getCodCli()
       ));
       /*if (count($results) > 0){
         $this->setDados($results[0]);
       }*/
    }

    //DELETE
    public function delete(){

      $sql = new Banco();

      $sql->query("DELETE FROM locarsystem.CLIENTE WHERE CODCLI = :CODCLI", array(
        ":CODCLI"=>$this->getCodCli()
      ));
      $this->setCodCli(0);
      $this->setLogin("");
      $this->setSenha("");
      $this->setDataCadastro(new DateTime());

      //if (count($results) > 0){
        //$this->setDados($results[0]);
      //}
    }


    //NOVO USUARIO PASSANDO LOGIN E SENHA NA CLASSE Cliente
    public function __construct($login = "", $senha = ""){
      $this->setLogin($login);
      $this->setSenha($senha);
    }

    //METODO DE MOSTRAR DADOS QUANDO USANDO SETTERS
    public function setDados($dados){

      $this->setCodCli($dados['CODCLI']);
      $this->setLogin($dados['LOGIN']);
      $this->setSenha($dados['SENHA']);
      $this->setNome($dados['NOME']);
      $this->setTelefone($dados['TELEFONE']);
      $this->setEndereco($dados['ENDERECO']);
      $this->setTipoCli($dados['TIPOCLI']);
      $this->setDataCadastro(new DateTime($dados['DATACADASTRO']));
      $this->setCnh($dados['CNH']);

      foreach ($dados as &$row) {
          $row['ENDERECO'] = utf8_encode($row['ENDERECO']);
      }
      return $dados;

    }

    // FUNCAO PRA MOSTRAR NA TELA EM STRING COM JSON ENCODE
    public function __toString(){

      return json_encode(array(
        "CODCLI"=>$this->getCodCli(),
        "LOGIN"=>$this->getLogin(),
        "SENHA"=>$this->getSenha(),
        "NOME"=>$this->getNome(),
        "TELEFONE"=>$this->getTelefone(),
        "ENDERECO"=>$this->getEndereco(),
        "TIPOCLI"=>$this->getTipoCli(),
        "DATACADASTRO"=>$this->getDataCadastro()->format("d/m/Y H:i:s")
      ));
    }
  }
 ?>
