<?php

$hostname = 'localhost'; //nome do host de acesso
$username = 'root'; //usuário do bd
$senha = ''; //senha do bd
$banco = 'sua_troca'; //nome do bd que quero conectar

//abaixo estou abrindo uma conexão com o bd
$db = mysqli_connect($hostname, $username, $senha, $banco);
$db->select_db("sua_troca"); //nome do bd que quero conectar
?>
