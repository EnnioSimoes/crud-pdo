<?php
class CategoriaEntity
{
    private $tabela = 'categorias';
    private $id;
    private $nome;
    
    function getTabela() {
        return $this->tabela;
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function setTabela($tabela) {
        $this->tabela = $tabela;
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


}