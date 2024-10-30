<?php

    Class database {
        private $host = 'localhost';
        private $database = 'crudaula';
        private $user = 'root';
        private $password = '';
        public $conn;

        public function connection(){
            $this->conn = null; // Toda vez que executa a função BRIDGE, caso tenha uma conexão aberta, ele elimina no começo do código.


            try {
                $this->conn = new PDO("mysql:host=$this->host; dbname=$this->database;", $this->user, $this->password);
            } catch (PDOException $error){
                echo $error -> getMessage();
            }
            return $this->conn;
        }
        
    }