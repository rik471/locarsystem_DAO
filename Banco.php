
<?php

  class Banco extends PDO {//CLASSE PARA PROGRAMAR CONSULTAS SQL EM ROTINA

    private $conn;

    public function __construct(){
      //esta função programara o sistema para sempre logar neste banco de dados
      $this->conn = new PDO("mysql:host=127.0.0.1;dbname=locarsystem","root","darkside");

    }

    //função para receber parametros de consulta
    private function setParams($statement, $parameters = array()){

      // o foreach orgranizara para que cada parametro passe pelo bindParam e execute
      foreach ($parameters as $key => $value) {

        $this->setParam($key, $value);//$key=linha, $value=valor da coluna

      }

    }

    private function setParam($statement, $key, $value){
      //função para organizar a consulta, a linha e o valor

      $statement->bindParam($key, $value);

    }


    public function query($rawQuery, $params = array()){
      //programando o sistema para consultas de banco por rotina
      $stmt = $this->conn->prepare($rawQuery);

      $this->setParams($stmt, $params);

      $stmt->execute();

      return $stmt;

    }

    public function select($rawQuery, $params = array()):array
    {

      $stmt = $this->query($rawQuery, $params);

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

  }




 ?>
