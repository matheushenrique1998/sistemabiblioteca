<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/AlunoController.php";

?>
<main class="container mt-3 mb-3">
    <h1>lista de aluno <h1>
    <table class="table table-striped">
        <thead>
            <tr>
            <th>#</th>
                <th>Nome</th>
                <th>cpf</th>
                <th>E-mail</th>
                <th>telefone</th>
                <th>celular</th>
                <th>data_nascimento</th>
                <th style="width :200px;">Ação</th>
            </tr>
        </thead>
        <tbody>

        <?php
         $AlunoController =new AlunoController();
         $alunos = $AlunoController->listaralunos();
         //var_dump($usuarios);
         foreach($alunos as $alunos):

        ?>


            <tr>
            <td><?=$alunos->id_aluno?></td>
                <td><?=$alunos->nome ?></td>
                <td><?=$alunos->cpf ?></td>
                <td><?=$alunos->email ?></td>
                <td><?=$alunos->telefone?></td>
                <td><?=$alunos->celular?></td>
                <td><?=$alunos->data_nascimento ?></td>
                
                <td>
                    <a href='#' class='btn btn-primary'>editar</a>
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