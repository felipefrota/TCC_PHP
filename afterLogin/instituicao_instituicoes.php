<?php require_once("../conexao/conexao.php"); ?>
<?php
//--------------------------------------------------------------------------//
//TESTE DE SEGURANÇA
session_start();
// if (!isset($_SESSION["user_portal"])) {
//     header("location:../Index/index.php");
// }
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

$nivel_necessario = 2;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['usuario_instituicaoID']) or ($_SESSION['tipo'] < $nivel_necessario)) {
    // Destrói a sessão por segurança
    // session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location:../afterLogin/usuario.php");
}
?>
<!DOCTYPE HTML>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Alguma Coisa Lfie</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=devide-width, initial-scale=1">

    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../_CSS/styles.css" rel="stylesheet">
    
</head>

<body>

    <header>
        <div id="">

            <div class="Principal">
                <!----------------------------------------------------------------------------------------->
                <!--<object type="text/html" data="../nav-bar.html"></object>-->
                <div id="Nav-Bar">

                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a href="../IndexProject/Index.html" class="navbar-brand">
                                    <!------------------------------------ Logo abaixo ----------------------------------------------------------->
                                    <img src="../Images/logo.png">
                                </a>
                                <!------------------------------------ Fechando Logo ----------------------------------------------------------->


                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuCelular" aria-controls="menu" aria-expanded="false" aria-label="Menu Colapso">
                                    <span class="navbar-toggler-icon text-black"></span>
                                </button>
                            </div>

                            <div id="menuCelular" class="collapse navbar-collapse">

                                <ul class="navbar-nav ml-auto text-light nav-menu">
                                    <li class="navbar-text"><a class="nav-link text-dark font-weight-bold" href="../afterLogin/instituicao.php">Home</a></li>
                                    <li class="navbar-text navHistorias"><a class="nav-link text-dark font-weight-bold" href="../afterLogin/instituicao.php">Historia</a></li>
                                    <li class="navbar-text nav-instituicoes"><a class="nav-link text-dark font-weight-bold" href="../afterLogin/instituicao_instituicoes.php">Instituições</a></li>
                                    <li>
                                        <!----------------------------------------------------------------------------------------->
                                        <!---------------------------------Botao Saudação------------------------------------------>
                                        <?php
                                        if (isset($_SESSION["nomeUsuario_nomeFantasia"])) {
                                            $user = $_SESSION["nomeUsuario_nomeFantasia"];
                                            $saudacao = "SELECT nomeUsuario_nomeFantasia ";
                                            $saudacao .= "FROM tb_usuario ";
                                            $saudacao .= "WHERE usuario_instituicaoID = {$user} ";
                                            $saudacao_login = mysqli_query($conecta, $saudacao);
                                            if (!$saudacao_login) {
                                                die("Falha no banco");
                                            }
                                            $saudacao_login = mysqli_fetch_assoc($saudacao_login);
                                            $nome = $saudacao_login["nomeUsuario_nomeFantasia"];
                                            ?>
                                            <div class="dropdown nav-link">
                                                <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <h8> Bem vindo, <?php echo $nome ?> </h8>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="../EditData/edit.instituition.php">Perfil</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="../sair.php">Sair</a>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                    </li>
                                    <!---------------------------------Fechando Saudação--------------------------------------->
                                    <!----------------------------------------------------------------------------------------->
                                    <!--Modal login ou senha invalido-->
                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modalExemplo">
                            Abrir modal de demonstração
                        </button> -->

                                    <!-- Modal -->

                                </ul>
                            </div>
                        </div>
                    </nav>


                </div>
            </div>

    </header>
    <!--Fechando header-->
    <!----------------------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------------------->

    <section class="background2">

        <!----------------------------------------------------------------------------------------->


        <h1>Instituições de Apoio</h1>


        <!--Carousel Wrapper-->
        <div class="container-fluid">
            <div id="multi-item-example" class="carousel slide carousel-multi-item carousel-multi-item-2" data-ride="carousel">

                <ol class="carousel-indicators">
                    <li data-target="#multi-item-example" data-slide-to="0" class="active bg-dark"></li>
                    <li data-target="#multi-item-example" data-slide-to="1" class="bg-dark"></li>
                </ol>

                <!--Slides-->
                <div class="carousel-inner" role="listbox">

                    <!--First slide-->
                    <div class="carousel-item active">

                        <div class="col-md-3 mb-3">
                            <div class="card bg-light">
                                <img class="card-img-top img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(38).jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Cobaia</h5>
                                    <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
                                    <a href="../Institutions/teste.html" class="btn btn-primary">Visitar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="card bg-light">
                                <img class="card-img-top img-fluid" src="../Images/salve_a_si.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"> Instituição Salve a Si</h5>
                                    <p class="card-text">Centro de tratamento para dependência química.</br> Gleba nº 9, Fazenda Salve a Si<br />
                                        Cidade Ocidental<br />
                                        Goiás/GO</p>
                                    </p>
                                    <a href="../Institutions/salve_a_si.html" class="btn btn-primary">Visitar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="card bg-light">
                                <img class="card-img-top img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(42).jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Titulo Card</h5>
                                    <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
                                    <a href="#" class="btn btn-primary">Visitar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="card bg-light">
                                <img class="card-img-top img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(8).jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Titulo Card</h5>
                                    <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
                                    <a href="#" class="btn btn-primary">Visitar</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--/.First slide-->

                    <!--Second slide-->
                    <div class="carousel-item">

                        <div class="col-md-3 mb-3">
                            <div class="card bg-light">
                                <img class="card-img-top img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(53).jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Titulo Card</h5>
                                    <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
                                    <a href="#" class="btn btn-primary">Visitar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="card bg-light">
                                <img class="card-img-top img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(25).jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Titulo Card</h5>
                                    <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
                                    <a href="#" class="btn btn-primary">Visitar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="card bg-light">
                                <img class="card-img-top img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(47).jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Titulo Card</h5>
                                    <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
                                    <a href="#" class="btn btn-primary">Visitar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="card bg-light">
                                <img class="card-img-top img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(26).jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Titulo Card</h5>
                                    <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
                                    <a href="#" class="btn btn-primary">Visitar</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--/.Second slide-->
                </div>

                <!--Carousel-Controls-->
                <a class="carousel-control-prev" href="#multi-item-example" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#multi-item-example" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>




        <!---------------------------------------------------------------------------------------------------------------->

        <hr>

        <!---------------------------------------------------------------------------------------------------------------->
        <!--Titulo GRID/CARD-->
        <h1>Proximos Eventos</h1>
        <!---------------------------------------------------------------------------------------------------------------->
        <!--GRID-->
        <div class="container-fluid">
            <div class="row">
                <div class=" col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="card bg-light">
                        <img class="card-img-top img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(38).jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Titulo Card</h5>
                            <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
                            <a href="#" class="btn btn-primary">Visitar</a>
                        </div>
                    </div>
                </div>
                <!--Fechando a div col-xs-12 col-sm-6 col-md-4 col-lg-4-->


                <div class=" col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="card bg-light">
                        <img class="card-img-top img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(19).jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Titulo Card</h5>
                            <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
                            <a href="#" class="btn btn-primary">Visitar</a>
                        </div>
                    </div>
                </div>
                <!--Fechando a div col-xs-12 col-sm-6 col-md-4 col-lg-4-->


                <div class=" col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="card bg-light">
                        <img class="card-img-top img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(42).jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Titulo Card</h5>
                            <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
                            <a href="#" class="btn btn-primary">Visitar</a>
                        </div>
                    </div>
                </div>
                <!--Fechando a div col-xs-12 col-sm-6 col-md-4 col-lg-4-->


                <div class=" col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="card bg-light">
                        <img class="card-img-top img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(8).jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Titulo Card</h5>
                            <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
                            <a href="#" class="btn btn-primary">Visitar</a>
                        </div>
                    </div>
                </div>
                <!--Fechando a div col-xs-12 col-sm-6 col-md-4 col-lg-4-->


                <div class=" col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="card bg-light">
                        <img class="card-img-top img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(53).jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Titulo Card</h5>
                            <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
                            <a href="#" class="btn btn-primary">Visitar</a>
                        </div>
                    </div>
                </div>
                <!--Fechando a div col-xs-12 col-sm-6 col-md-4 col-lg-4-->


                <div class=" col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="card bg-light">
                        <img class="card-img-top img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(25).jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Titulo Card</h5>
                            <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
                            <a href="#" class="btn btn-primary">Visitar</a>
                        </div>
                    </div>
                </div>
                <!--Fechando a div col-xs-12 col-sm-6 col-md-4 col-lg-4-->

            </div>
            <!--Fechando a div row-->

        </div>
        <!--Fechando a div container-fluid-->

    </section>


    </div>
    <!--Fechendo div principal-->


    <!----------------------------------------------------------------------------------------->
    <script src="https://unpkg.com/popper.js@1.15.0/dist/umd/popper.min.js"></script>
    <script src="../Bootstrap/js/jquery-3.4.1.min.js "></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="../Bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="Index.js" type="text/javascript"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>