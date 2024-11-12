<?php   
        include_once'configs/database.php';
        include_once'funcoes.php';
        include_once'objects/aluno.php';

            $database = new database;
            $db = $database->connection();
            $aluno = new aluno($db);



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/edit.css">
</head>
<body>
    <div class="container">
        <div class="box">
    <?php
    foreach ($aluno->searchPerson($_GET['changing']) as $rows){
       echo '<form action="funcoes.php" method="post">
            <input  class="shadow-sm" type="text" value="'.$rows['ra'].'" name="ra" readonly><label for="">RA</label><br>
            <input  class="shadow-sm" type="text" value="'.$rows['nome'].'" name="nome_edit"><label for="">Nome</label><br>
            <input  class="shadow-sm" type="text" value="'.$rows['email'].'" name="email_edit"><label for="">Email</label><br>
            <input  class="shadow-sm" type="text" value="'.$rows['senha'].'" name="senha_edit"><label for="">Senha</label><br>
            <input  class="shadow-sm" type="text" value="'.$rows['telefone'].'" name="telefone_edit"><label for="">Telefone</label><br>
            <button class="btn btn-info shadow-sm"name="editar">Enviar</button>
        </form>';
        
    } 
    ?>
        </div>
    </div>
</body>
</html>