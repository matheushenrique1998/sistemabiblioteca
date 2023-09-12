<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";

$usuarioController=new UsuarioController();
$usuarioController->cadastrarUsuario();
?>
<main class="container mt-3 mb-3">
    <h1>cadastrar Usuários</h1>
        <form action="cadastrar.php"  method="POST"  class="row g-3">
    
  <div class="col-md-12">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" name="nome" id="nome"
     class="form-control" required>
</div>
<div class="col-md-6">
    <label for="nome" class="form-label">email</label>
    <input type="email" name="email" id="email" 
    class="form-control" required>
</div>
<div class="col-md-6">
    <label for="senha" class="form-label">senha</label>
    <input type="passaword" name="senha" id="senha" 
    class="form-control" required>
</div>
<div class="col-md-8">
<label for="perfil" class="form-label">perfil</label>
    <select name="perfil" class="form-select" id="perfil" required>
        <option>selecione o Perfil</option>
        <option vale="usuario">Usuários</option>
        <option vale="administrador">administrador</option>
    </select>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">cadastrar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>

    </div>
</form>

</main>








<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";

?>