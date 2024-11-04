<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cadastrado - CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="display:flex; justify-content:center; width:100vw; height:100%;">
        <div class="box" style="align-items: center;">
            <form action="funcoes.php" method="post">
                <input type="text" name="nome" placeholder="NOME" style="border-radius: 0.5rem; border:1px solid black;"><br>
                <input type="text" name="email" placeholder="EMAIL" style="border-radius: 0.5rem; border:1px solid black;"><br>
                <input type="text" name="telefone" placeholder="TELEFONE" style="border-radius: 0.5rem; border:1px solid black;"><br>
                <input type="text" name="senha" placeholder="SENHA" style="border-radius: 0.5rem; border:1px solid black;">
                <button class="btn btn-primary" name="cadastrar">Cadastrar</button>
            </form>
        </div>
    </div>
</body>
</html>