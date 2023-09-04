<?php

 

class Usuario

{

 

    protected $db;

    protected $table ="alunos";

 

    public function __construct()

    {

        $this->db = DBConexao::getConexao();

    }

 

    /**

     * Buscar registro unico

     * @param int $id

     * @return

     */

    public function buscar($id)

    {
       

    }

 

    /**

     * Listar todos os registros da tabela usuários

     */

    public function listar($id)

    {
        try{
            $sql= "select * from {$this->table} where id_aluno = id";
            $stmt = $this->db->prepare($sql);
        }catch(PDOException $e){
            ECHO "erro na preparação da consulta:".$e->getMessage();
           
        }
        
        $stmt->bindParam(':id_aluno',[$id]); 
        try{
            $stmt->execute();
            $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
            if($aluno){
                echo "id:".$aluno['id']."<br>";
                echo "nome:".$aluno['nome']."<br>";
                echo "cpf:".$aluno['cpf']."<br>";
                echo "email:".$aluno['email']."<br>";
                echo "telefone:".$aluno['telefone']."<br>";
                echo "celular:".$aluno['celular']."<br>";
                echo "data_nascimento:".$aluno['data_nascimento']."<br>";

            }
        

    }catch (PDOException $e){

 

        echo"erro na insercao:".$e->getMessage();



    }
}
 


 

    /**

     * Cadastrar usuário

     * @param array $dados

     * @return bool

     */

    public function Cadastrar($dados)

    {

        try{

 

            $sql = "INSERT INTO{$this->table} (nome,cpf,email, telefone,celular, data_nascimento)

 

            VALUES (:nome, :cpf, :email, :telefone, :celular :data_nascimento) ";

 

            $stmt = $this->db->prepare($sql);

 

        }catch(PDOException $e){

 

            echo "erro na preparação da consulta:".$e->getMessage();

 

        }

 

        $stmt->bindParam(':nome',$dados['nome']);
        $stmt->bindParam(':cpf',$dados['cpf']);

        $stmt->bindParam(':email',$dados['email']);

        $stmt->bindParam(':telefone',$dados['telefone']);

 

        $stmt->bindParam(':celular',$dados['celular']);

 

        $stmt->bindParam(':data_nascimento',$dados['data_nascimento']);

 

 

 

        try{

 

            $stmt->execute();

 

            echo "inserção bem-sucedida!";

 

        }catch (PDOException $e){

 

            echo"erro na insercao:".$e->getMessage();

 

        }

    }

 

    /*

    * Editar usuário

    *@param int $id

    *$param array @dados

    *@return bool

    */

    public function editar($id, $dados)

    {

        try{

 

            $sql = "UPDATE {$this->table} set nome = :nome, email = :email ,telefone = :telefone,

 

            celular = :celular  WHERE id_aluno = :id";

 

            $stmt = $this->db->prepare($sql);

 

        }catch (PDOException $e){

 

            echo"erro na preparação da consulta:".$e->getMessage();

 

        }

 

        $stmt->bindparam(':nome',$dados['nome']);
        $stmt->bindparam(':email',$dados['email']);
 

        $stmt->bindParam(':telefone',$dados['telefone']);

 

        $stmt->bindParam(':celular',$dados['celular']);

 

 

 

 

        try{

 

            $stmt->execute();

 

            echo "inserção bem-sucedida!";

 

        }catch (PDOException $e){

 

            echo"erro na insercao:".$e->getMessage();

 

        }

 

    }

 

    //Excluir usuário

    public function excluir($id)

    {
        try{
            $sql="delete from {$this->table} where id_aluno = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id, $id_aluno,PDO::PARAM_INT');
            $stmt->execute();
            echo "execluir bem-sucedida!";
        }catch(PDOException $e){
            echo "erro na execluir: ".$e->getMessage();
        }
    }

}

 