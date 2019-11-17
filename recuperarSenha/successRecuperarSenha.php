<?php require_once("../conexao/conexao.php") ?>

<?php
if ( isset($_POST["cpf_cnpj"]) ) {
    $cpf_cnpj = $_POST["cpf_cnpj"];
    $email = $_POST["email"];
    
 } 
 //consultar no banco de dados
 $result_usuario = "SELECT * ";
 $result_usuario .= "FROM tb_usuario "; 
 $result_usuario .= "where cpf_cnpj= '$cpf_cnpj ' ";
 $resultado_usuario  = mysqli_query($conecta, $result_usuario);
 
 // testar erro
 // if (!$resultado_usuario){
 //   die ("Falha no banco de dados");
 // } else {
   $dados_detalhes = mysqli_fetch_assoc($resultado_usuario);
//    $cpfcnpj = $dados_detalhes["cpf_cnpj"];



?>

<html>

<head>
    <title>PROJETO TCC</title>
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=devide-width, initial-scale=1">

    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../_CSS/styles.css" rel="stylesheet">


    <!------------------------------------ERROR LOGIN---------------------------------------------->
    <?php
    if (isset($mensagem)) {
        ?>
        <p><?php echo $mensagem ?></p>

    <?php
    }
    ?>
    <!--------------------------------------------------------------------------------------------->
</head>

<body>
    <header>
        <!-----------------------------------------Botão fluuante whatsapp-------------------------------------------------->
        <a href="https://api.whatsapp.com/send?l=pt&amp;phone=5561985294948"><img src="../Images/botao_flutuante.png" style="height:80px; position:fixed; bottom: 25px; right: 25px; z-index:100;" data-selector="img"></a>


        <div id="Principal">

            <div class="">
                <!----------------------------------------------------------------------------------------->
                <!--<object type="text/html" data="../nav-bar.html"></object>-->
                <div id="Nav-Bar">

                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a href="../IndexProject/Index.html" class="navbar-brand"> </a>
                                <!------------------------------------ Logo abaixo ----------------------------------------------------------->
                                <a href="../Index/index.php">
                                    <img src="../Images/logo5.png" width=100px height=75px>
                                </a>
                                <!----------------FECHANDO LOGO----------------->

                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuCelular" aria-controls="menu" aria-expanded="false" aria-label="Menu Colapso">
                                    <span class="navbar-toggler-icon text-black"></span>
                                </button>
                            </div>

                            <div id="menuCelular" class="collapse navbar-collapse">

                                <ul class="navbar-nav ml-auto text-light nav-menu">
                                    <li class="navbar-text"><a class="nav-link text-dark font-weight-bold" href="../Index/Index.php">Home</a></li>
                                    <li class="navbar-text navHistorias"><a class="nav-link text-dark font-weight-bold" href="#historias">Historia</a></li>
                                    <li class="navbar-text nav-instituicoes"><a class="nav-link text-dark font-weight-bold" href="../Institutions/Institutions.php">Instituições</a></li>
                                    <li>
                                        <a class="nav-link">
                                            <button type="button" class="btn btn-outline-success janelaLogin" data-toggle="modal" data-target="#telaLogin">Login</button>
                                        </a>


                                        <!--Mostrar Janela Login-->
                                        <form action="../login.php" method="post">

                                            <div class="container-fluid">
                                                <div class="modal fade" id="telaLogin" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="login">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-black-50" id="tituloTela">
                                                                    Faca seu Login</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal">
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-10">
                                                                            <input class="form-control" type="email" name="usuario" placeholder="Email">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-10">
                                                                            <input class="form-control" type="password" name="senha" placeholder="Senha">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-10">
                                                                            <a href="#">Esqueceu sua senha?</a>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="submit" id="submit" value="login" class="btn btn-info">Login</button>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Fechando modal/ Fechando tela login-->

                                            </div>
                                        </form>


                                    </li>

                                    <!--Modal login ou senha invalido-->
                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modalExemplo">
                                        Abrir modal de demonstração
                                    </button> -->

                                    <!-- Modal -->


                                    <!---------------------------------------------------------------------------->
                                    <!--Botao Cadastro-->
                                    <li>
                                        <div class="nav-link">
                                            <button type="button" class="btn btn-outline-info" data-toggle="dropdown" data-target="">Cadastro</button>


                                            <form class="dropdown-menu p-3 dropdown-menu-right mr-5 ">
                                                <div class="form-group">
                                                    <a href="../DataRegister/registerPeople.php" class="btn btn-info" role="button" aria-pressed="true">Usuario</a>
                                                </div>
                                                <div class="form-group">
                                                    <a href="../DataRegister/registerInstitution.php" class="btn btn-secondary" role="button" aria-pressed="true">Instituição</a>


                                                </div>

                                            </form>

                                        </div>
                                    </li>



                                </ul>
                            </div>
                        </div>
                    </nav>


                </div>
            </div>


    </header>
    <!--Fechando o Div:Nav-Bar-->


    <!----------------------------------------------------------------------------------------->


    <form class="" action="alterarsenha.php" method="post">



        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Recuperar Senha</h5>
                            <form class="form-signin">
                                <div class="form-group row">
                                    <label for="senha">Digite sua nova senha:</label>
                                    <input type="password" id="senha" name="senha" class="form-control" placeholder="Digite seu Email" required autofocus>
                                </div>

                                <input class="text" name="usuario_instituicaoID" value="<?php echo $dados_detalhes['usuario_instituicaoID']?>">    
                                <button type="submit" class="btn btn-info">Recuperar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </form>
    </div>
    <!--Fechando o DivPrincipal-->



    <!----------------------------------------------------------------------------------------->
    <script src="https://unpkg.com/popper.js@1.15.0/dist/umd/popper.min.js"></script>
    <script src="../Bootstrap/js/jquery-3.4.1.min.js "></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="../DataRegister/fields.js" type="text/javascript"></script>

    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>


</body>

</html>