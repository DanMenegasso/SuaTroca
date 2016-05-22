<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Daniel Menegasso">
    <link rel="page icon" href="businessmen-exchange.ico">

    <title>Sua Troca</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Links -->
    <link href="css/index.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">

</head>

<body>

    <!-- Barra de Navegação -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <ul class="menutop">
                <li><a class="activex" href="index.php"><img src="img/businessmen-exchange.png" alt="shortcut icon" width="20"></a></li>
                <li><a href="links/catalogo.php">Compre</a></li>
                <li><a href="links/venda.php">Venda</a></li>
                <li id="conta"><a class="active" href="links/login.php">Minha Conta</a></li>
            </ul>
        </div>
    </nav>

    <!-- Conteúdo -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Pesquisar produtos:</p>
                <div class="list-group">
                    <form class="form" action="links/pesquisar.php" method="GET" role="form">
                      <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome_produto">
                      </div>
                      <div class="form-group">
                        <label for="tipo">Tipo:</label>
                        <select id="tipo" name="tipo" class="form-control">
                          <option value="0">Compra</option>
                          <option value="1">Venda</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-default">Pesquisar</button>
                    </form>
                </div>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">

                  <?php
                  //Código para Array de produtos dentro do BD ->INDEX e CATÁLOGO

                  //session_start(); //início da sessão em que verifica se o usuário está online (Só com Login)

                  include_once "conn/config.php"; //inclui a configuração do BD
                  include_once('class/BD.class.php'); //inclui a classe de conexão ao BD
                  BD::conn(); //abertura de conexão


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
                    								<h4><a href='links/px.php?codigo=".$row['idMercadoria']."'>".$row['Nome']."</a>
                    								</h4>
                    						</div>
                    				</div>
                    		</div>

                    		";
                    		echo $produto;
                    		}
                  ?>
                  </div>

            </div>

        </div>

    </div>

    <!-- /Conteúdo -->

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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
