<?php
include_once "../conn/config.php"; //inclui a configuração do BD
include_once('../class/BD.class.php'); //inclui a classe de conexão ao BD
BD::conn(); //abertura de conexão

$Nome = $_GET['nome'];
$Qtde = $_GET['Qtde'];
$Preco = $_GET['Preco'];
$Descricao = $_GET['descricao'];
$tipoNegocio = $_GET['tipoNegocio'];
$tipoMercadoria = $_GET['tipoMercadoria'];

//Adicionar usuário ao BD, pode ser usado para qualquer inserção de dados no BD ao fazer as alterações devidas
$inserir = BD::conn()->prepare("INSERT INTO `mercadoria`(`idMercadoria`, `Nome`, `Qtde`, `Preco`, `Descricao`, `idTipoMercadoria`, `idTipoNegocio`) VALUES (NULL,'$Nome', $Qtde, $Preco, '$Descricao', '$tipoMercadoria', $tipoNegocio)");
$inserir->execute();

//Será redirecionado ao término da inserção de dados para o catálogo
header("location:../links/catalogo.php")
?>
