<?php
class ProdutoEntity
{
    private $table = "produtos";
    private $id;
    private $nome;
    private $categoria;
    
    function getTable() {
        return $this->table;
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function setTable($table) {
        $this->table = $table;
        return $this;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
        return $this;
    }


}