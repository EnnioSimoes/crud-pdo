<?php
try {
    $conexao = new \PDO("mysql:host=127.0.0.1;dbname=crud", "root", "root");
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}
require 'CategoriaEntity.php';
require 'CategoriaService.php';
if($_GET){
    $categoria = new CategoriaEntity;
    $service = new CategoriaService($conexao, $categoria);
    $categories = $service->find($_GET['id']);
//    var_dump($categories);
}        
if($_POST){
    $categoria = new CategoriaEntity;
    $categoria->setNome($_POST['nome'])
              ->setId($_POST['id']);
    $service = new CategoriaService($conexao, $categoria);
    $categories = $service->update($_GET['id']);
    header("Location:http://127.0.0.1:8080/categorias.php");
}        
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>CRUD</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <div class="row">
            <div class="col-md-3">
                <ul class="nav">
                    <li><a href="/">Produtos</a></li>
                    <li><a href="http://127.0.0.1:8080/categorias.php">Categorias</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <h2>Categoria</h2>
                <form method="POST">
                    <input type="hidden" name="id" placeholder="Nome" value="<?=$categories['id'];?>">
                    <input type="text" name="nome" placeholder="Nome" value="<?=$categories['nome'];?>">
                    <input type="submit" value="Gravar">
                </form>
            </div>
        </div>
    </body>
</html>

