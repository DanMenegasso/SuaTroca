<?php
//session_start(); //início da sessão em que verifica se o usuário está online É SEMPRE A PRIMEIRA COISA NA PÁGINA!

include_once "conn/config.php"; //inclui a configuração do BD
include_once('class/BD.class.php'); //inclui a classe de conexão ao BD
BD::conn(); //abertura de conexão

$variavel = $_POST['variavel'];

//Adicionar usuário ao BD, pode ser usado para qualquer inserção de dados no BD ao fazer as alterações devidas
$inserir = BD::conn()->prepare("INSERT INTO TABELA ...");
$inserir->execute(array($variaveis));

//Será redirecionado ao término da inserção de dados
echo'<script>alert("Cadastro realizado com sucesso. Faça o login para aproveitar o que o site tem a oferecer."); location.href="#"</script>';

?>
