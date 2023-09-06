<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/aluno.php";

class alunoController{
    private $alunoModel;
    public function __construct(){
        
    $this->alunoModel= new aluno();
    
 }
 
 public function listaralunos(){
    return $this->alunoModel->listar();
 }
}