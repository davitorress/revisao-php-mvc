<?php

require("../models/conexao.php");

if ($_FILES["alunoImagem"]["error"] == UPLOAD_ERR_NO_FILE) {
	mysqli_query($conexao, "INSERT INTO aluno (nome, cidade, sexo) VALUES ('" . $_POST["alunoNome"] . "','" . $_POST["alunoCidade"] . "','" . $_POST["alunoSexo"] . "')");
	header("location:../views/");
}

$folder = "../views/img/";
if (!is_dir($folder)) {
	mkdir($folder);
}

$file = $_FILES["alunoImagem"];
$filetype = strrchr($file["name"], ".");

if (in_array($filetype, [".jpg", ".jpeg", ".png"]) && 1024 * 1024 >= $file["size"]) {
	$filename = md5(uniqid(time())) . $filetype;
	$destiny = $folder . $filename;

	try {
		move_uploaded_file($file["tmp_name"], $destiny);
		mysqli_query($conexao, "INSERT INTO aluno (nome, cidade, sexo, imagem) VALUES ('" . $_POST["alunoNome"] . "','" . $_POST["alunoCidade"] . "','" . $_POST["alunoSexo"] . "','" . $filename . "')");
	} catch (\Throwable $th) {
		unlink($destiny);
		throw $th;
	}
} else {
	throw new \RuntimeException("Imagem não passou na validação.");
}

header("location:../views/");
