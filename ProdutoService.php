<?php
class ProdutoService
{
    private $db;
    private $produto;
    
    public function __construct(\PDO $db, ProdutoEntity $produto)
    {
        $this->db = $db;
        $this->produto = $produto;
    }
    
    public function find($id)
    {
        $query = "Select * from {$this->produto->getTable()} where id={$id}";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    
    public function insert()
    {
        $query = "Insert into {$this->produto->getTable()} (nome, categoria) Values (:nome, :categoria)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->produto->getNome());
        $stmt->bindValue(':categoria', $this->produto->getCategoria());
        if($stmt->execute()){
            return true;
        }
    }
    
    public function update()
    {
        $query = "Update {$this->produto->getTable()} set nome=:nome, categoria=:categoria Where id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->produto->getId());
        $stmt->bindValue(':nome', $this->produto->getNome());
        $stmt->bindValue(':categoria', $this->produto->getCategoria());
        if($stmt->execute()){
            return TRUE;
        }
    }
    
    public function delete()
    {
        $query = "Delete from {$this->produto->getTable()} Where id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->produto->getId());
        if($stmt->execute()){
            return TRUE;
        }
    }
    
    public function listar()
    {
        $query = "Select * from {$this->produto->getTable()}";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}