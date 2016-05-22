<?php
//Código para Array de produtos dentro do BD ->INDEX e CATÁLOGO

//session_start(); //início da sessão em que verifica se o usuário está online É SEMPRE A PRIMEIRA COISA NA PÁGINA!

include_once "conn/config.php"; //inclui a configuração do BD
include_once('class/BD.class.php'); //inclui a classe de conexão ao BD
BD::conn(); //abertura de conexão

	$pesquisa =$_get['nome_produto']; //Variável de pesquisa vinda através de nome

		$sql1 = "SELECT * FROM mercadoria";

	//zero as variáveis para as possíveis aberturas de SQL que podem aparecer na página
	$res = null;
	$conn = null;
	//Inicio a repetição para cada linha de produto encontrado no BD
	foreach (BD::conn()->query($sql1) as $row) {

		$produto = "
		<div class='col-sm-4 col-lg-4 col-md-4'>
				<div class='thumbnail'>
						<img src='http://placehold.it/320x150' alt= ".$row['Nome'].">
						<div class='caption'>
								<h4 class='pull-right'>R$ ".$row['Preco']."</h4>
								<h4><a href='link/px.html'>".$row['Nome']."</a>
								</h4>
						</div>
				</div>
		</div>

		";
		echo $produto;
		}
?>
