<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";
class Usuario{
    protected $db;
    protected $table = "usuarios";
    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }
    /**
     * Buscar registro unico
     * @param int $id
     * @return Usuario|null
     */ 
    public function buscar($id){
        try{
            $sql = "SELECT * FROM {$this->table} WHERE id_usuario=:id";
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
    /**
     * Listar todos os registros da tabela usuário
     */
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
    /**
     * Cadastrar Usuário
     * @param array $dados
     * @return bool
     */
    public function cadastrar($dados){
        try {
            $query = "INSERT INTO {$this->table} (nome, email, senha, perfil) VALUES (:nome, :email, :senha, :perfil)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':senha', $dados['senha']);
            $stmt->bindParam(':perfil', $dados['perfil']);
            $stmt->execute();
            $_SESSION['sucesso']="cadastro realizado com sucesso";
            return false;
        } catch (PDOException $e) {
            echo "Erro ao cadastrar: ".$e->getMessage();
            $_SESSION['erro']="erro ao cadatrar  o usuário";
             return false;
        }
    }
    /**
     * Editar Usuário
     * 
     * @param int $id
     * @param array $dados
     * @return bool
     */
    public function editar($id, $dados){
        try {
            $sql = "UPDATE {$this->table} SET nome = :nome, email = :email, senha = :senha, perfil = :perfil WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':senha', $dados['senha']);
            $stmt->bindParam(':perfil', $dados['perfil']);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao editar: ".$e->getMessage();
            return false;
        }
    }
    //Excluir usuário
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