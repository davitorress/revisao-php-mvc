<?php

require("../models/conexao.php");
unlink("../views/img/" . $_GET["imagem"]);
mysqli_query($conexao, "DELETE FROM aluno WHERE codigo = " . $_GET["ida"]);
header("location:../views/");
