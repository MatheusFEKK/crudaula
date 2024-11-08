<?php

    Class Aluno{
        public $ra;
        public $nome;
        public $email;
        public $senha;
        public $telefone;
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

        public function searchPerson($ra){
            $sql = "SELECT * FROM aluno WHERE ra = :ra";
            $resultado = $this->bd->prepare($sql);
            $resultado->bindParam(':ra', $ra);
            $resultado->execute();

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        public function cadastrar(){
            $sql = "INSERT INTO aluno (nome, email, telefone, senha) values (:nome, :email, :telefone, :senha)";
            $statement = $this->bd->prepare($sql);
            $statement->bindParam(':nome', $this->nome, PDO::PARAM_STR);
            $statement->bindParam(':email', $this->email, PDO::PARAM_STR);
            $statement->bindParam(':telefone', $this->telefone, PDO::PARAM_STR);
            $statement->bindParam(':senha', $this->senha, PDO::PARAM_STR);

            if ($statement->execute()){
                return true;
            }else {
                return false;
            }

        }

        public function delete(){
            $sql = "DELETE FROM aluno where ra = :ra";
            $stat = $this->bd->prepare($sql);
            $stat->bindParam(":ra", $this->ra);

            if ($stat->execute()){
                return true;
            }else {
                return false;
            }
        }

        public function editar(){
            $sql = "UPDATE aluno SET nome = :nome, email = :email, senha = :senha, telefone = :telefone where ra = :ra";
            $stat = $this->bd->prepare($sql);
            $stat->bindParam(":nome", $this->nome);
            $stat->bindParam(":email",$this->email);
            $stat->bindParam(":telefone",$this->telefone);
            $stat->bindParam(":senha",$this->senha);
            $stat->bindParam(":ra",$this->ra);
            if($stat->execute()){
                return true;
            }else {
                return false;
            }
            
        }
    }