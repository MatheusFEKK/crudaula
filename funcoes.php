<?php
    include_once'configs/database.php';
    include_once'objects/aluno.php';
    
    $banco = new database();
    $db = $banco->connection();
    $aluno = new Aluno($db);

    if (isset($_POST['cadastrar'])){
        $aluno->nome = $_POST['nome'];
        $aluno->email = $_POST['email'];
        $aluno->telefone = $_POST['telefone'];
        $aluno->senha = $_POST['senha'];
        if ($aluno->cadastrar()){
            header('Location: index.php');
        }
    }


    if (isset($_GET['delete'])){
        if($aluno->delete($_GET['delete'])){
            header('Location: index.php');
        }
    }