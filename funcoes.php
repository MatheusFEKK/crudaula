<?php
    include_once'configs/database.php';
    include_once'objects/aluno.php';
    
    $banco = new database();
    $db = $banco->connection();
    $aluno = new Aluno($db);
    $alunos = null;

    function index(){
        global $alunos;
        $banco = new database();
        $db = $banco->connection();
        $aluno = new Aluno($db);
        $alunos = $aluno->readAll();
    }

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
        $aluno->ra = $_GET['delete'];
        if($aluno->delete()){
            header('Location: index.php');
        }
    }

    if (isset($_POST['editar'])){
        $aluno->ra = $_POST['ra'];
        $aluno->nome = $_POST['nome_edit'];
        $aluno->email = $_POST['email_edit'];
        $aluno->telefone = $_POST['telefone_edit'];
        $aluno->senha = $_POST['senha_edit'];
        if ($aluno->editar()){
            header('Location: index.php');
        }
    }
