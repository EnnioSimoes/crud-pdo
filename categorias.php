<?php
try{
    $conexao = new \PDO("mysql:host=127.0.0.1;dbname=crud", "root", "root");
} catch (Exception $ex) {
    echo 'Não foi possível conectar ao banco de dados!';
}
require 'CategoriaEntity.php';
require 'CategoriaService.php';

$categorias = new CategoriaEntity;
$categorias->setNome('Jogos');

$service = new CategoriaService($conexao, $categorias);
$categories = $service->listar();
if($_GET && $_GET['action']=='delete'){
    $categorias = new CategoriaEntity;

    $service = new CategoriaService($conexao, $categorias);
    $service->delete($_GET['id']);    
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
                <h2>Categorias</h2>
                <a href="categoria-inserir.php">Nova Categoria</a>
                <table class="table">
                    <tr>
                        <td>Categoria</td>
                        <td>Ações</td>
                    </tr>
                    <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?=$category['nome'];?></td>
                        <td>
                            <a href="http://127.0.0.1:8080/categoria-alterar.php?id=<?=$category['id'];?>">Editar</a> 
                            <a href="http://127.0.0.1:8080/categorias.php?id=<?=$category['id'];?>&action=delete">Excluir</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </body>
</html>

