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

    if (isset($_GET['editar'])){
        $aluno->ra = $_GET['ra'];
        $aluno->nome = $_GET['nome_edit'];
        $aluno->email = $_GET['email_edit'];
        $aluno->telefone = $_GET['telefone_edit'];
        $aluno->senha = $_GET['senha_edit'];
        if ($aluno->editar()){
            header('Location: index.php');
        }
    }
