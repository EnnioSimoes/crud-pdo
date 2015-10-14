<?php

class CategoriaService
{
    private $db;
    private $categoria;
    public function __construct(\PDO $db, CategoriaEntity $categoria)
    {
        $this->db = $db;
        $this->categoria = $categoria;
    }
    
    public function insert()
    {
        $query = "Insert into {$this->categoria->getTabela()} (nome) Values (:nome)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->categoria->getNome());
        if($stmt->execute()){
            return TRUE;
        }
    }
    
    public function update()
    {
        $query = "Update {$this->categoria->getTabela()} set nome=:nome Where id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue('id', $this->categoria->getId());
        $stmt->bindValue('nome', $this->categoria->getNome());
        if($stmt->execute()){
            return TRUE;
        }
    }
    
    public function delete($id)
    {
        $query = "Delete from {$this->categoria->getTabela()} Where id={$id}";
        $stmt = $this->db->prepare($query);
        if($stmt->execute()){
            return TRUE;
        }
    }
    
    public function listar()
    {
     $query = "Select * from {$this->categoria->getTabela()}";
     $stmt = $this->db->query($query);
     return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function find($id)
    {
        $query = "Select * from {$this->categoria->getTabela()} Where id={$id}";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}