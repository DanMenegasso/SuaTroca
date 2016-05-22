<!DOCTYPE html>
<?php
//session_start(); //início da sessão em que verifica se o usuário está online

include_once "../conn/config.php"; //inclui a configuração do BD
include_once('../class/BD.class.php'); //inclui a classe de conexão ao BD
BD::conn(); //abertura de conexão

  //pega o código colocado na URL
  $codigo = $_GET['codigo'];

  //código SELECT em função de BD para pegar a mercadoria através do ID
	$produto = BD::conn()->prepare("SELECT * FROM mercadoria WHERE idMercadoria = ?");
	$produto->execute(array($codigo));

  //transforma dados de banco em dados reais
	$fetchProduto = $produto->fetchObject();

  //cada variável é um campo do BD
	$Nome = $fetchProduto->Nome;
	$Qtde = $fetchProduto->Qtde;
  $Preco = $fetchProduto->Preco;
  $Descricao = $fetchProduto->Descricao;

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
    <link href="../css/portifolio.css" rel="stylesheet">
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
                <li><a href="catalogo.php">Compre</a></li>
                <li><a href="venda.php">Venda</a></li>
                <li id="conta"><a class="active" href="">Minha Conta</a></li>
            </ul>
        </div>
    </nav>

    <!-- Conteúdo -->
    <div class="container">

        <!-- Titulo do Produto -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $Nome;?>
                    <small>(<?php echo $codigo;?>)</small>
                </h1>
            </div>
        </div>

        <!-- Produto Itens -->
        <div class="row">

            <div class="col-md-8">
                <img class="img-responsive" src="http://placehold.it/750x500" alt="">
            </div>

            <div class="col-md-4">
                <h3><?php echo $Nome;?></h3>
                <p><?php echo $Descricao;?></p>
                <h3>Valor do Produto</h3>
                <ul>
                    <li>R$ <?php echo $Preco;?></li>
                </ul>
                <br>
                <a href="em_breve.html"><input type="button" class="btn" name="comprar" value="Comprar"></a>
            </div>

        </div>
        <div class="container">

            <hr>

            <!-- Footer -->
            <footer align="center">
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
