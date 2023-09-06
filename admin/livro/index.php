<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/LivroController.php";

?>
<main class="container mt-3 mb-3">
    <h1>lista de livro</h1>
    <table class="table table-striped">
        <thead>
            <tr>
            <th>#</th>
                <th>titulo</th>
                <th>autor</th>
                <th>numero_pagina/th>
                <th>perco</th>
                <th>isbn</th>
                <th>ano_publicacao</th>
                <th style="width :200px;">Ação</th>
            </tr>
        </thead>
        <tbody>

        <?php
         $LivroController =new LivroCotroller();
         $livros= $LivroController->listarlivros();
         //var_dump($usuarios);
         foreach($livros as $livros):

        ?>


            <tr>
            <td><?=$livros->id_livro?></td>
                <td><?=$livros->titulo ?></td>
                <td><?=$livros->autor ?></td>
                <td><?=$livros->numero_pagina ?></td>
                <td><?=$livros->perco?></td>
                <td><?=$livros->isbn ?></td>
                <td><?=$livros->ano_publicacao ?></td>
                
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