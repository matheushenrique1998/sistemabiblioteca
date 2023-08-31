<?php

class DBConexao{
    //configurações do banco de dados
    private $host = "localhost";
    private $dbname = "bibilioteca";
    private $username = "root";
    private $password = "senac2023";
 
    private $conx;
    private static $instance = null;
    public function __construct()
    {
        Try{
            //inicializar a conexão
            $this->conx = new PDO("msql:host=$this->host,dbname=$this->dbname,charset=utf8",$this->username,$this->password);
            $this->conx->setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
           //capturar o erro da conexão
           echo "Erro na conexão com  banco de dados".$e->getMessage();
            
           
        }
    }
    /**
     * método estatico para obter a intancia única da cenexãp(implementação do singeton)
     */
       public static function getConexao(){
        if(!self::$instance){
            self::$instance = new DBConexao();
        }
        return self::$instance->conx;
       }
    }
