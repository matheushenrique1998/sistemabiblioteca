<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";

$livroController= new livroController();
$livro=$livroController->editarUlivro();
//var_dump($uorsuario);
?>
<main class="container mt-3 mb-3">
    <h1>editar livro</h1>
        <form action="editar.php?id_usuario=<?=$livro->id_livro?>"  method="POST"  class="row g-3">
    
  <div class="col-md-12">
    <label for="nome" class="form-label"> titulo</label>
    <input type="text" name="titulo" id="titulo"
     class="form-control" required value="<?=$livro>titulo ?>">
</div>
<div class="col-md-6">
    <label for="nome" class="form-label">autor</label>
    <input type="text" name="autor" id="autor" 
    class="form-control" required value="<?=$livro->autor?>">
</div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">salvar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>

    </div>
</form>

</main>