<?php

 

class Usuario

{

 

    protected $db;

    protected $table = "usuarios";

 

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
            $sql= "select * from {$this->table} where id_usuario = id";
            $stmt = $this->db->prepare($sql);
        }catch(PDOException $e){
            ECHO "erro na preparação da consulta:".$e->getMessage();
           
        }
        
        $stmt->bindParam(':id_usuario',[$id]); 
        try{
            $stmt->execute();
            $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
            if($aluno){
                echo "id:".$aluno['id']."<br>";
                echo "nome:".$aluno['nome']."<br>";
               echo "email:".$aluno['email']."<br>";
               
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

 

            $sql = "INSERT INTO{$this->table} (nome, email,senha, perfil)

 

            VALUES (nome, :email, :senha :perfil) ";

 

            $stmt = $this->db->prepare($sql);

 

        }catch(PDOException $e){

 

            echo "erro na preparação da consulta:".$e->getMessage();

 

        }

 

        $stmt->bindParam(':nome',$dados['nome']);

 

        $stmt->bindParam(':email',$dados['email']);

 

        $stmt->bindParam(':senha',$dados['senha']);

 

        $stmt->bindParam(':perfil',$dados['perfil']);

 

 

 

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

 

            $sql = "UPDATE {$this->table} set nome = :nome, email = :email,

 

            senha = :senha, perfil = :perfil WHERE id_usuario = :id";

 

            $stmt = $this->db->prepare($sql);

 

        }catch (PDOException $e){

 

            echo"erro na preparação da consulta:".$e->getMessage();

 

        }

 

        $stmt->bindparam(':nome',$dados['nome']);

 

        $stmt->bindParam(':email',$dados['email']);

 

        $stmt->bindParam(':senha',$dados['senha']);

 

        $stmt->bindParam(':perfil',$dados['perfil']);

 

 

 

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
            $sql="delete from {$this->table} where id_usuario = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id, $id_usuario,PDO::PARAM_INT');
            $stmt->execute();
            echo "execluir bem-sucedida!";
        }catch(PDOException $e){
            echo "erro na execluir: ".$e->getMessage();
        }
    }
    

}

 