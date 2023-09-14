<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/LivroController.php";

$LivroController= new LivroController();
$livro=$LivroController->editarlivro();
//var_dump($uorsuario);
?>
<main class="container mt-3 mb-3">
    <h1>editar livro</h1>
        <form action="editar.php?id_usuario=<?=$livro->id_livro?>"  method="POST"  class="row g-3">
    
        <div class="col-md-12">
    <label for="nome" class="form-label">titulo</label>
    <input type="text" name="titulo" id="titulo" 
    class="form-control" required value="<?=$livro->titulo?>">
</div>
<div class="col-md-6">
    <label for="nome" class="form-label">autor</label>
    <input type="text" name="autor" id="autor" 
    class="form-control" required value="<?=$livro->autor?>">
</div>
<div class="col-md-6">
    <label for="nome" class="form-label">autor</label>
    <input type="text" name="autor" id="autor" 
    class="form-control" required value="<?=$livro->autor?>">
</div>
<div class="col-md-6">
    <label for="nome" class="form-label">numero_pagina</label>
    <input type="text" name="numero_pagina" id="numero_pagina" 
    class="form-control" required value="<?=$livro->numero_pagina?>">
</div>
<div class="col-md-6">
    <label for="nome" class="form-label">perco</label>
    <input type="text" name="perco" id="perco" 
    class="form-control" required value="<?=$livro->perco?>">
</div>
<div class="col-md-6">
    <label for="nome" class="form-label">isbn</label>
    <input type="text" name="isbn" id="isbn" 
    class="form-control" required value="<?=$livro->isbn?>">
</div>
<div class="col-md-6">
    <label for="nome" class="form-label">ano_publicacao</label>
    <input type="text" name="ano_publicacao" id="ano_publicacao" 
    class="form-control" required value="<?=$livro->ano_publicacao?>">
</div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">salvar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>

    </div>
</form>

</main>

<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";

?>