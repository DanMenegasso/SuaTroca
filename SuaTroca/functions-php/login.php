<?php
//session_start(); //início da sessão em que verifica se o usuário está online É SEMPRE A PRIMEIRA COISA NA PÁGINA!

include_once "conn/config.php"; //inclui a configuração do BD
include_once('class/BD.class.php'); //inclui a classe de conexão ao BD
BD::conn(); //abertura de conexão

$nome = $_POST['nome'];
$senha = $_POST['senha'];

//abre a conexão para acessar o BD
$pegar_user = BD::conn()->prepare("SELECT * FROM users WHERE nome = ? AND senha = ?");
$pegar_user->execute(array($nome,$senha));

//Procura no BD se o usuário existe
if($pegar_user->rowCount()==0){
  //será redirecionado para página X caso não seja encontrado
  echo'<script>alert("Usuário não encontrado. Se necessário, faça o cadastro primeiramente."); location.href="#"</script>';
}else{
  //transforma dados encontrados em dados reais
  $fetch = $pegar_user->fetchObject();

  //Iniciando sessão
  $_SESSION['id_users'] = $fetch->id_users;
  //será redirecionado para página X caso seja encontrado
  echo'<script>alert("Bem vindo!"); location.href="#"</script>';


}
?>
