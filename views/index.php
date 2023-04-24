<?php
require_once("../models/conexao.php");
require_once("./blades/header.php");
?>
<main class="container bg-white mt-5 rounded-2 p-3 shadow-lg">
    <a href="./cadastro.php" class="btn btn-success">
        <span class="material-symbols-outlined d-flex">add_circle</span>
    </a>
    <hr />
    <form action="./index.php" method="post">
        <input class="form-control" type="text" name="buscar" size="30" placeholder="Buscar" />
    </form>
    <hr />

    <?php

    if (empty($_POST["buscar"])) {
        echo "<p>Nenhum resultado</p>";
    } else {
        $varBusca = $_POST["buscar"];
    ?>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Frase</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            <tbody>
                <?php

                $query = mysqli_query($conexao, "SELECT * FROM aluno WHERE nome LIKE '%$varBusca%'");
                while ($exibe = mysqli_fetch_array($query)) {
                    $varSexo = ($exibe[3] == "m") ? "o" : "a";
                    echo "<tr>" .
                        "<td>" . strtoupper($varSexo) . " alun$varSexo <b>" . $exibe[1] . "</b> mora na cidade de " . $exibe[2] . ".</td>" .
                        "<td><a class='btn btn-primary' href='./cadastroAtualiza.php?ida=" . $exibe[0] . "'><span class='material-symbols-outlined d-flex'>save_as</span></a></td>" .
                        "<td><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#modalPopup" . $exibe[0] . "'><span class='material-symbols-outlined d-flex'>delete</span></button></td>" .
                        "</tr>";

                ?>

                    <div id="modalPopup<?php echo $exibe[0] ?>" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Atenção!</h3>
                                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">Tem certeza que deseja excluir o registro?</div>
                                <div class="modal-footer">
                                    <a href="../controllers/deletarAluno.php?ida=<?php echo $exibe[0] ?>" class="btn btn-danger">Confirmar</a>
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </tbody>
        </table>

    <?php } ?>
</main>
<?php require_once("./blades/footer.php") ?>