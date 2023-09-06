<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/livro.php";

class LivroCotroller{
    private $livroModel;
    public function __construct(){
        
    $this->livroModel= new livro();
    
 }
 
 public function listarlivros(){
    return $this->livroModel->listar();
 }
}