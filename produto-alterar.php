<?php
try {
    $conexao = new \PDO("mysql:host=127.0.0.1;dbname=crud", "root", "root");
} catch (Exception $e) {
    echo 'Não foi possível conectar ao banco!';
}
require 'ProdutoService.php';
require 'ProdutoEntity.php';
if($_GET){
    $produto = new ProdutoEntity;
    
    $service = new ProdutoService($conexao, $produto);
    $products = $service->find($_GET['id']);
}
if($_POST){
    $produto = new ProdutoEntity;
    $produto->setId($_POST['id'])
            ->setNome($_POST['nome'])
            ->setCategoria($_POST['categoria']);
    
    $service = new ProdutoService($conexao, $produto);
    $products = $service->update();
    
    header("Location:http://127.0.0.1:8080/");    
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
                    <li><a href="">Produtos</a></li>
                    <li><a href="">Categorias</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <h2>Produtos</h2>
                <form method="POST">
                    <input type="hidden" name="id" value="<?=$products['id'];?>">
                    <input type="text" name="nome" placeholder="Nome" value="<?=$products['nome'];?>">
                    <input type="text" name="categoria" placeholder="Categoria" value="<?=$products['categoria'];?>">
                    <input type="submit" value="Gravar">
                </form>
            </div>
        </div>
    </body>
</html>

