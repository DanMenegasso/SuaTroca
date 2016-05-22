<?php
include_once "../conn/config.php"; //inclui a configuração do BD
include_once('../class/BD.class.php'); //inclui a classe de conexão ao BD
BD::conn(); //abertura de conexão

$nome = $_POST['user'];
$senha = $_POST['senha'];
$email = $_POST['email'];

//Adicionar usuário ao BD, pode ser usado para qualquer inserção de dados no BD ao fazer as alterações devidas
$inserir = BD::conn()->prepare("INSERT INTO `user`(`nome`, `email`, `senha`, `idUser`) VALUES ($nome, $email, $senha, NULL)");
$inserir->execute();

//Será redirecionado ao término da inserção de dados para o index
header("location:../index.php")
?>
