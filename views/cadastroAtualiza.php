<?php
require_once("../models/conexao.php");
require_once("./blades/header.php");
?>
<main class="container mt-5 bg-white shadow-lg p-3 rounded-2">
    <a href="./index.php" class="btn btn-primary">
        <span class="material-symbols-outlined d-flex">undo</span>
    </a>
    <hr />

    <?php

    $query = mysqli_query($conexao, "SELECT * FROM aluno WHERE codigo = " . $_GET["ida"]);
    while ($exibe = mysqli_fetch_array($query)) {
    ?>
        <form action="../controllers/atualizarAluno.php" method="post">
            <input type="hidden" name="alunoCodigo" value="<?php echo $exibe[0] ?>" />

            <label class="form-label">Nome</label>
            <input class="form-control" type="text" name="alunoNome" value="<?php echo $exibe[1] ?>" /><br>

            <label class="form-label">Cidade</label>
            <input class="form-control" type="text" name="alunoCidade" value="<?php echo $exibe[2] ?>" /><br>

            M<input class="ms-2" type="radio" value="m" name="alunoSexo" <?php echo ($exibe[3] == "m") ? "checked" : "" ?> /><br>
            F<input class="ms-2" type="radio" value="f" name="alunoSexo" <?php echo ($exibe[3] == "f") ? "checked" : "" ?> /><br>

            <button type="button" class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#modalPopup">
                <span class="material-symbols-outlined d-flex">save_as</span>
            </button>

            <div id="modalPopup" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Atenção!</h3>
                            <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">Tem certeza que deseja alterar o registro?</div>
                        <div class="modal-footer">
                            <input class="btn btn-success" type="submit" value="Confirmar" />
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    <?php } ?>
</main>
<?php require_once("./blades/footer.php") ?>