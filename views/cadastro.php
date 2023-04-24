<?php require_once("./blades/header.php") ?>
<main class="container bg-white mt-5 shadow-lg p-3 rounded-2">
    <form action="../controllers/cadastrarAluno.php" method="post">
        <label class="form-label">Nome</label>
        <input class="form-control" type="text" name="alunoNome" /><br>

        <label class="form-label">Cidade</label>
        <input class="form-control" type="text" name="alunoCidade" /><br>

        M<input class="ms-2" type="radio" value="m" name="alunoSexo" /><br>
        F<input class="ms-2" type="radio" value="f" name="alunoSexo" /><br>

        <button type="submit" class="btn btn-success mt-3">
            <span class="material-symbols-outlined d-flex">save</span>
        </button>
    </form>
</main>
<?php require_once("./blades/footer.php") ?>