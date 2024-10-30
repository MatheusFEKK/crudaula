<?php 

include_once 'configs/database.php';
include_once 'objects/aluno.php';

$banco = new database();
$bd = $banco->connection();
if ($bd){
    $aluno = new Aluno($bd); 
}










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
            <form action="index.php" method="post">
                <input type="text" name="nome">
                <button>Enviar</button>
            </form>
            <table class="table">
                <th scope="col">RA</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
            
            <?php
                foreach ($aluno->readAll() as $rows){
                    echo '<tr><td>'.$rows['ra'].'</td>';
                    echo '<td>'.$rows['nome'].'</td>';
                    echo '<td>'.$rows['email'].'</td>';
                    echo '<td>'.$rows['telefone'].'</td></tr>';
                }         
                echo 'Resultado da busca ('.$_POST['nome'].'):<br>';
                foreach ($aluno->searchPerson($_POST['nome']) as $rowss){
                    echo $rowss['nome'].'<br>';
                }

                
            ?>
            
            </table>
        </div>
    </div>




</body>
</html>