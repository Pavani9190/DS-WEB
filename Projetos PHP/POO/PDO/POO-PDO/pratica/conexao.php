<?php

    // MySQL
    $db = new PDO("mysql:host=localhost;dbname=pdo", "root", "");
  

    /*
    class Clientes extends PDO{
        public $nome;
        public $email;

        public function insertCliente($nome, $email){
            $statement = $this->prepare("INSERT INTO clientes (nome, email) VALUES (:nome, :email)");
            $statement->bindParam(':nome', $nome);
            $statement->bindParam(':email', $email);
            return $statement->execute();
        }
        public function consultaClientes(){
            $dados = $this->query("SELECT * FROM clientes");
            return $dados->fetchAll(PDO::FETCH_ASSOC);
        }

        public function consultaCliente($nome){
            $statement = $this->prepare("SELECT * FROM clientes WHERE nome LIKE :nome");
            $statement->execute(array(':nome' => "%$nome%"));
            return $dados = $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public function updateCliente($id, $nome, $email){
            $statement = $this->prepare('UPDATE clientes SET nome = :nome , email = :email WHERE id = :id');
            $statement->bindParam(':id', $id);
            $statement->bindParam(':nome', $nome);
            $statement->bindParam(':email', $email);
            return $statement->execute();
        }

        public function deleteCliente($id){
            $statement = $this->prepare("DELETE FROM clientes WHERE id >= :id");
            $statement->bindParam(':id', $id);
            return $statement->execute();
        }
    }

    var_dump($db = new Clientes("mysql:host=localhost;dbname=pdo", "root", ""));

    */
    
?>