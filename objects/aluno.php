<?php

    Class Aluno{
        private $ra;
        private $nome;
        private $email;
        private $telefone;
        private $bd;

        public function __construct($bd)
        {
            $this->bd = $bd;
        }

        public function readAll(){  
            $sql = "SELECT * FROM aluno";
            $resultado = $this->bd->query($sql);
            $resultado->execute();

            return $resultado->fetchAll(PDO::FETCH_ASSOC);

            
        }

        public function searchPerson($nome){
            $nome = "%".$nome."%";
            $sql = "SELECT * FROM aluno WHERE nome LIKE :nome;";
            $resultado = $this->bd->prepare($sql);
            
            $resultado->bindParam(':nome', $nome);
            $resultado->execute();

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }
    }