<!DOCTYPE html>
<?php
//Código para Array de produtos dentro do BD ->INDEX e CATÁLOGO

//session_start(); //início da sessão em que verifica se o usuário está online É SEMPRE A PRIMEIRA COISA NA PÁGINA!

include_once "../conn/config.php"; //inclui a configuração do BD
include_once('../class/BD.class.php'); //inclui a classe de conexão ao BD
BD::conn(); //abertura de conexão

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
                <li><a href="catalogo.php">Compre</a></li>
                <li><a href="#">Venda</a></li>
                <li id="conta"><a class="active" href="em_breve.html">Minha Conta</a></li>
            </ul>
        </div>
    </nav>

    <!-- Conteúdo -->
    <div class="container">

        <!-- Titulo do Catalogo -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cadastrar
                    <small>(Cadastro de produtos)</small>
                </h1>
            </div>
        </div>

        <!-- Catalogo Linha 1 -->
        <div class="row">
          <div  class="col-md-6 col-md-offset-3">
            <form class="form" role="form" action="../function/cadastro.php" method="GET" class="col-md-4 col-offset-4">

                <div class="form-group">
                  <label for="nome">Nome:</label>
                  <input type="text" class="form-control" id="nome" name="nome">
                </div>

                <div class="form-group">
                  <label for="Qtde">Quantidade:</label>
                  <input type="number" class="form-control" id="Qtde" name="Qtde">
                </div>

                <div class="form-group">
                  <label for="preco">Preço:</label>
                  <input type="number" class="form-control" id="preco" name="Preco">
                </div>

                <div class="form-group">
                  <label for="Desc">Descrição:</label>
                  <textarea class="form-control" name="descricao"></textarea>
                </div>

                <div class="form-group">
                  <label for="tipoMercadoria">Tipo de mercadoria:</label>
                  <select id="tipoMercadoria" name="tipoMercadoria" class="form-control">
                    <?php
                    $tipo = "SELECT * FROM tipomercadoria";
                    foreach (BD::conn()->query($tipo) as $row) {
                      $tipo_mercadoria = "<option class='form-control' value=".$row['idTipoMercadoria'].">".$row['Descricao']."</option>";
                      echo $tipo_mercadoria;
                    }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="tipo">Tipo de negócio:</label>
                  <select id="tipo" name="tipoNegocio" class="form-control">
                    <option value="0">Compra</option>
                    <option value="1">Venda</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-default">Cadastrar</button>
              </form>
          </div>
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
