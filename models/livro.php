<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";
class livro{
    protected $db;
    protected $table = "livros";
    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }
   
    public function buscar($id){
        try{
            $sql = "SELECT * FROM {$this->table} WHERE id=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id",$id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);            
        }catch(PDOException $e)
        {
            echo "Erro ao Buscar: ".$e->getMessage();
            return null;
        }
        
    }
    
    public function listar(){
        try{
            $sql = "SELECT * FROM {$this->table}";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_OBJ);            
        }catch(PDOException $e){
            echo "Erro ao listar: ".$e->getMessage();
            return null;
        }
    }
    
    public function cadastrar($dados){
        try {
            $query = "INSERT INTO {$this->table} (  titulo, autor, numero_pagina,  perco, isbn, ano_publicacao) VALUES (:titulo, :autor,:numero_pagina, :perco, :isbn )";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':titulo', $dados[' titulo']);
            $stmt->bindParam(':autor', $dados['autor']);
            $stmt->bindParam(':numero_pagina', $dados['numero_pagina']);
            $stmt->bindParam(':perco', $dados[' perco']);
            $stmt->bindParam(':isbn', $dados['isbn']);
            $stmt->bindParam(':ano_publicacao', $dados['ano_publicacao']);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao cadastrar: ".$e->getMessage();
            return false;
        }
    }
   
    public function editar($id, $dados){
        try {
            $sql = "UPDATE {$this->table} SET titulo = :titulo , autor = :autor , numero_pagina = :numero_pagina , perco= :perco , isbn=:isbn , ano_publicacao=:ano_publicacao  WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':titulo', $dados['titulo']);
            $stmt->bindParam(':autor', $dados['autor']);
            $stmt->bindParam(':numero_pagina', $dados['numero_pagina']);
            $stmt->bindParam(':perco', $dados['perco']);
            $stmt->bindParam(':isbn', $dados['isbn']);
            $stmt->bindParam(':ano_publicacao', $dados['ano_publicacao']);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao editar: ".$e->getMessage();
            return false;
        }
    }
  
    public function excluir($id){
        try {
            $sql = "DELETE FROM {$this->table} WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao excluir: ".$e->getMessage();
            return false;
        }
    }
}