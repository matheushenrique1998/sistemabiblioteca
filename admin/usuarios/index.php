<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";

?>
<main class="container mt-3 mb-3">
    <h1>lista de Usuários</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>E-mail</th>
                <th>Perfil</th>
                <th style="width :200px;">Ação</th>
            </tr>
        </thead>
        <tbody>

        <?php
         $usuarioController =new UsuarioController();

        ?>


            <tr>
                <td>1</td>
                <td>matheus</td>
                <td>matheus@gmail.com</td>
                <td>Usuários</td>
                <td>
                    <a href='#' class='btn btn-primary'>editar</a>
                    <a href='#' class='btn btn-danger'>excluir</a>

                </td>
            </tr>


        </tbody>

    </table>



</main>
<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";

?>