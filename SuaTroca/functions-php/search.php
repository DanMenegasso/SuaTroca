<?php
session_start(); //início da sessão em que verifica se o usuário está online
include_once "conn/config.php"; //inclui a configuração do BD
include_once('class/BD.class.php'); //inclui a classe de conexão ao BD
BD::conn(); //abertura de conexão

	$pesquisa =$_get['nome_produto']; //Variável de pesquisa vinda através de nome
	$tipo =$_get['tipo']; //Compra ou venda

	//SQL em que é pesquisado o produto, em que no nome ou parte dele	contenha o conteúdo pesquisado
	$sql1 = "SELECT * FROM mercadoria WHERE Nome LIKE '%".$pesquisa."%'";
	#Contagem de linhas, caso seja igual a 0 significa que não existem registros
	if ($res = BD::conn()->query($sql1)) {
		if ($res->fetchColumn() == 0) {
			echo "<p>Nenhum produto encontrado.</p>";
		}
	}
	else{
		$sql1 = "SELECT * FROM mercadoria WHERE Nome LIKE '%".$pesquisa."%' ORDER BY Nome ASC";
	}

	//zero as variáveis para as possíveis aberturas de SQL que podem aparecer na página
	$res = null;
	$conn = null;
	//Inicio a repetição para cada linha de produto encontrado no BD
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
