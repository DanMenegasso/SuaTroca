<!DOCTYPE html>
<?php
//Código para Array de produtos dentro do BD ->INDEX e CATÁLOGO

//session_start(); //início da sessão em que verifica se o usuário está online É SEMPRE A PRIMEIRA COISA NA PÁGINA!

include_once "../conn/config.php"; //inclui a configuração do BD
include_once('../class/BD.class.php'); //inclui a classe de conexão ao BD
BD::conn(); //abertura de conexão

  $pesquisa =$_GET['nome_produto']; //Variável de pesquisa vinda através de nome
  $tipo =$_GET['tipo']; //Compra ou venda

?>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Daniel Menegasso">
    <link rel="page icon" href="../businessmen-exchange.ico">

    <title>Sua Troca</title>

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Links -->
    <link href="../css/catalogo.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link href="../css/menu.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">

</head>

<body>

    <!-- Barra de Navegação -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <ul class="menutop">
                <li>
                    <a class="activex" href="../index.php"><img src="../img/businessmen-exchange.png" alt="shortcut icon" width="20"></a>
                </li>
                <li><a href="#">Compre</a></li>
                <li><a href="venda.php">Venda</a></li>
                <li id="conta"><a class="active" href="em_breve.html">Minha Conta</a></li>
            </ul>
        </div>
    </nav>

    <!-- Conteúdo -->
    <div class="container">

        <!-- Titulo do Catalogo -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Pesquisa
                    <small>(Você procurou por: <?php echo $pesquisa; ?>)</small>
                </h1>
            </div>
        </div>

        <!-- Catalogo Linha 1 -->
        <div class="row">
          <?php
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
            	foreach (BD::conn()->query($sql1) as $row) {

            		$produto = "
            		<div class='col-sm-4 col-lg-4 col-md-4'>
            				<div class='thumbnail'>
            						<img src='http://placehold.it/320x150' alt= ".$row['Nome'].">
            						<div class='caption'>
            								<h4 class='pull-right'>R$ ".$row['Preco']."</h4>
            								<h4><a href='px.php?codigo=".$row['idMercadoria']."'>".$row['Nome']."</a>
            								</h4>
            						</div>
            				</div>
            		</div>

            		";
            		echo $produto;
            		}
            ?>


        </div>
        <!-- Footer -->
        <footer align="center">
          <hr>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy;2016 - <b>Sua Troca</b> por <i>Daniel Menegasso</i></p>
                </div>
            </div>
        </footer>

    </div>
    </div>

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
