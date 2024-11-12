<?php 

include_once 'configs/database.php';
include_once 'objects/aluno.php';
include_once'funcoes.php';

index(); // Função index que esta dentro do funcoes.php

$banco = new database();
$bd = $banco->connection();
$aluno = new Aluno($bd); 
global $alunos;










/*
    include_once 'configs/database.php';

    $banco = new database();
    $bd = $banco->bridge();

    if ($bd){
        // print_r($bd); 
        echo 'Connected with the Database!';
        $sql = 'SELECT * FROM aluno'; // Comando de consulta no SQL
        $resultado = $bd->query($sql); // Variavel (Statement) que carrega as informações necessarias
        $resultado->execute(); // Declaração (Statement)

        $resultado = $resultado->fetchAll(PDO::FETCH_OBJ);


        /* Este foi usnado o FETCH_OBJ (Acessando os itens de um objeto) */
        // foreach ($resultado as $row){
        //     echo '<br><tr><td>Nome: '.$row->nome .'</td><br><td>Email: ';
        //     echo $row->email.'</td><br></tr>';
        // }
        

        /* Este foi usando o FETCH_ASSOC (Acessando pelas chaves do vetor)
        foreach ($resultado as $row){
            echo '<br>Nome: '.$row['nome'] .'<br>Email: ';
            echo $row['email'].'<br>';
        }
        print_r($resultado);
        */

    // } else {
    //     echo 'Connection severed!';
    // }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD AULA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <a href="cadastro.php"><button class="btn btn-info">Cadastrar</button></a><br><br>
            <form action="index.php" method="post">
                <input type="text" name="ra">
                <button class="btn btn-primary">Enviar</button>
            </form>
            <?php
            if ($alunos){
                echo '<table class="table">
                   <th scope="col">RA</th>
                   <th scope="col">Nome</th>
                   <th scope="col">E-mail</th>
                   <th scope="col">Senha</th>
                   <th scope="col">Telefone</th>
                   <th scope="col">Deletar</th>';
               
                   foreach ($alunos as $rows){
                       echo '<tr><td>'.$rows['ra'].'</td>';
                       echo '<td>'.$rows['nome'].'</td>';
                       echo '<td>'.$rows['email'].'</td>';
                       echo '<td>'.$rows['senha'].'</td>';
                       echo '<td>'.$rows['telefone'].'</td>';
                       echo '<td><a href="funcoes.php?delete='.$rows['ra'].'" class="btn btn-danger">DELETAR</a></td>';
                       echo '<td><a href="editar.php?changing='.$rows['ra'].'" class="btn btn-primary">EDITAR</a></td>';
                   }
                   echo '</tr>';            

            }

                if (isset($_POST['ra'])){
                    echo 'Resultado da busca ('.$_POST['ra'].'):<br>';
                    foreach ($aluno->searchPerson($_POST['ra']) as $info_user){
                        echo "RA: ", $info_user['ra'], " Nome: ", $info_user['nome'], " Email: ", $info_user['email'], " Senha: ", $info_user['senha'], " Telefone: ", $info_user['telefone'].'<br>';
                    }

                }

                
            ?>
            
            </table>
        </div>
    </div>

</body>
</html>