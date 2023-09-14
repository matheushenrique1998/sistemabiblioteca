<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";

$usuarioController=new UsuarioController();
$usuario=$usuarioController->editarUsuraio();
//var_dump($uorsuario);
?>
<main class="container mt-3 mb-3">
    <h1>editar Usuários</h1>
        <form action="editar.php?id_usuario=<?=$usuario->id_usuario?>"  method="POST"  class="row g-3">
    
  <div class="col-md-12">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" name="nome" id="nome"
     class="form-control" required value="<?=$usuario->nome ?>">
</div>
<div class="col-md-6">
    <label for="nome" class="form-label">email</label>
    <input type="email" name="email" id="email" 
    class="form-control" required value="<?=$usuario->email ?>">
</div>
<div class="col-md-6">
    <label for="senha" class="form-label">senha</label>
    <input type="passaword" name="senha" id="senha" 
    class="form-control" >
    <p class="text-secondary"> caso queira manter a senha  ,deixe o campo em branco</p>
</div>

<div class="col-md-8">
<label for="perfil" class="form-label">perfil</label>
    <select name="perfil" class="form-select" id="perfil" required>
        <option>selecione o Perfil</option>
        <option value="usuario" <?=($usuario->perfil == "usuario")?"selected":""?>>Usuários</option>
        <option value="administrador" <?=($usuario->perfil == "administrador")?"selected":""?>>administrador</option>
    </select>
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