<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/livro.php";

class LivroController{
    private $livroModel;
    public function __construct(){
        
    $this->livroModel= new livro();
    
 }
 
 public function listarlivro(){
    return $this->livroModel->listar();
 }
 public function editarlivro($id_livro){
   $id_usuario =$_GET['id_livro'];
   if($_SERVER['REQUEST_METHOD']== 'POST'){
     if(isset($_POST['senha'])&& !empty($_POST['senha'])){
      //criar nova senha
      $senha = password_hash($_POST['senha'],PASSWORD_DEFAULT);
     }else{
      //manter senha antiga
      $id_livro= $this->livroModel->buscar($id_livro);
      $senha= $id_livro->senha;

     }
      $dados=[
         'titulo'=> $_POST['titulo'],
         'autor'=> $_POST['autor'],
         'numero_pagina'=> $_POST['numero_pagina'],
         'perco'=> $_POST['perco'],
         'isbn'=> $_POST['isbn'],
         'ano_publicacao'=> $_POST['ano_publicacao']
      ];
      $this->livroModel->editar($id_livro,$dados);
      header('location: index.php');
      exit;
   }

   return $this->livroModel->buscar($id_livro);
}
public function excluirlivro(){
   $this->livroModel->excluir($_GET['id_usuario']);
   header('location: index.php');
   exit;
}
}