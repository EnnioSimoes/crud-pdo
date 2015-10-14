<?php
try {
    $conexao = new \PDO("mysql:host=127.0.0.1;dbname=crud", "root", "root");
} catch (Exception $e) {
    echo 'Não foi possível conectar ao banco!';
}
require 'ProdutoService.php';
require 'ProdutoEntity.php';

$produto = new ProdutoEntity;
$produto->setNome('Bola Quadrada')
        ->setId(1)
        ->setCategoria('Brinquedo');

$service = new ProdutoService($conexao, $produto);
$products = $service->listar();
if($_GET && $_GET['action']='delete'){
    $produto = new ProdutoEntity;
    $produto->setId($_GET['id']);

    $service = new ProdutoService($conexao, $produto);
    $products = $service->delete();    
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
                    <li><a href="/">Produtos</a></li>
                    <li><a href="http://127.0.0.1:8080/categorias.php">Categorias</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <h2>Produtos</h2>
                <a href="produto-inserir.php">Novo Produto</a>
                <table class="table">
                    <tr>
                        <td>Produto</td>
                        <td>Categoria</td>
                        <td>Ações</td>
                    </tr>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?=$product['nome'];?></td>
                        <td><?=$product['categoria'];?></td>
                        <td>
                            <a href="http://127.0.0.1:8080/produto-alterar.php?id=<?=$product['id'];?>">Editar</a> 
                            <a href="http://127.0.0.1:8080/?id=<?=$product['id'];?>&action=delete">Excluir</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </body>
</html>

