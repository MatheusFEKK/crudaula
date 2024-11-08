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
</head>
<body>
    <?php
    foreach ($aluno->searchPerson($_GET['changing']) as $rows){
       echo '<form action="funcoes.php" method="get">
            <input type="text" value="'.$rows['ra'].'" name="ra" readonly><label for="">RA</label><br>
            <input type="text" value="'.$rows['nome'].'" name="nome_edit"><label for="">Nome</label><br>
            <input type="text" value="'.$rows['email'].'" name="email_edit"><label for="">Email</label><br>
            <input type="text" value="'.$rows['senha'].'" name="senha_edit"><label for="">Senha</label><br>
            <input type="text" value="'.$rows['telefone'].'" name="telefone_edit"><label for="">Telefone</label><br>
            <button name="editar">Enviar</button>
        </form>';
        
    } 
    ?>
</body>
</html>