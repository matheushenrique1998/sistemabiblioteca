<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";

?>
<main class="container mt-3 mb-3">
    <h1>a lista de Usuários <a href="cadastrar.php" class="btn btn-primary float-end">cadastrar</a>
    <<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/alerta.php"; ?>
    </h1>
    <table class="table table-striped">
        <thead>
            <tr>
            <th>#</th>
                <th>Nom</th>
                <th>E-mail</th>
                <th>Perfil</th>
                <th>#</th>
                
                <th style="width :200px;">Ação</th>
            </tr>
        </thead>
        <tbody>

        <?php
         $usuarioController =new usuarioController();
         $usuarios = $usuarioController->listarUsuarios();
         //var_dump($usuarios);
         foreach($usuarios as $user):

        ?>


            <tr>
            <td><?=$user->id_usuario ?></td>
                <td><?=$user->nome ?></td>
                <td><?=$user->email ?></td>
                <td><?=$user->perfil ?></td>
                <td>
                    <a href="editar.php?id=<?=$user->id_usuario ?>" class='btn btn-primary'>editar</a>
                    <a href='#' class='btn btn-danger'>excluir</a>

                </td>
            </tr>

              <?php
              endforeach;
              ?>
        </tbody>

    </table>



</main>
<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";

?>