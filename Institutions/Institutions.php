<?php require_once("../conexao/conexao.php"); ?>
<?php
        //variavel de sessao
        session_start();

        if ( isset( $_POST["usuario"]) ){
            $usuario = $_POST["usuario"];
            $senha = $_POST["senha"];
    
            $login = "SELECT * ";
            $login .= "FROM tb_usuario ";
            $login .= "WHERE email = '{$usuario}' and senha = '{$senha}' ";
    
            $acesso = mysqli_query($conecta, $login);
            if ( !$acesso ) {
                die("Falha na consulta ao banco");
            }
            
            
            $informacao = mysqli_fetch_assoc($acesso);
            
            if ( empty($informacao) ) {
                $mensagem = "<script>alert('Login incorreto'); location.href='index.php';</script>";
                header("location:Index/Index.php");
            } else {
    
                $_SESSION["user_portal"] = $informacao["usuario_instituicaoID"];
                header("location:../afterLogin/usuario.php");
            }
    
    
    
    
            // echo $usuario . "<br>";
            // echo $senha;    
        }
    
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
                        if ( isset($mensagem)) { 
                    ?>
                        <p><?php echo $mensagem ?></p>
                    
                    <?php
                        }
                    ?>  
<!--------------------------------------------------------------------------------------------->
</head>

<body>
    <header>
        <div id="Principal">

            <div class="">
                <!----------------------------------------------------------------------------------------->
                <!--<object type="text/html" data="../nav-bar.html"></object>-->
                <div id="Nav-Bar">

                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a href="../IndexProject/Index.html" class="navbar-brand">      
        <!------------------------------------ Logo abaixo ----------------------------------------------------------->
                                  <!--  <img src="../Images/logo.png"> --> 
                                </a>

                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#menuCelular" aria-controls="menu" aria-expanded="false"
                                    aria-label="Menu Colapso">
                                    <span class="navbar-toggler-icon text-black"></span>
                                </button>
                            </div>

                            <div id="menuCelular" class="collapse navbar-collapse">

                                <ul class="navbar-nav ml-auto text-light nav-menu">
                                    <li class="navbar-text"><a class="nav-link text-dark font-weight-bold"
                                            href="../Index/Index.php">Home</a></li>
                                    <li class="navbar-text navHistorias"><a
                                            class="nav-link text-dark font-weight-bold"
                                            href="../Index/Index.php">Historia</a></li>
                                    <li class="navbar-text nav-instituicoes"><a
                                            class="nav-link text-dark font-weight-bold"
                                            href="../Institutions/Institutions.php">Instituições</a></li>
                                    <li>
                                        <a class="nav-link">
                                            <button type="button" class="btn btn-outline-success janelaLogin"
                                                data-toggle="modal" data-target="#telaLogin">Login</button>
                                        </a>


                                        <!--Mostrar Janela Login-->
                                        <form action="../login.php" method="post">

                                            <div class="container-fluid">
                                                <div class="modal fade" id="telaLogin" tabindex="-1" role="dialog"
                                                    aria-labelledby="" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="login">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-black-50" id="tituloTela">
                                                                    Faca seu Login</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Fechar">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal">
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-10">
                                                                            <input class="form-control" type="email"
                                                                                name="usuario" placeholder="Email">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-10">
                                                                            <input class="form-control" type="password"
                                                                                name="senha" placeholder="Senha">
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
                                            <button type="button" class="btn btn-outline-info" data-toggle="dropdown"
                                                data-target="">Cadastro</button>


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
                                       <br />
                                        
                                <a href="../Institutions/salve_a_si.html" class="btn btn-primary">Visitar</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card bg-light">
                            <img class="card-img-top img-fluid" src="../Images/viva_melhor.png" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Clínica terapêutica Viva Melhor</h5>
                                <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
                                <a href="../Institutions/viva_melhor.html" class="btn btn-primary">Visitar</a>
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

    <!---------------------------------------------------------------------------------------------------------->
    <script src="https://unpkg.com/popper.js@1.15.0/dist/umd/popper.min.js"></script>
    <script src="../Bootstrap/js/jquery-3.4.1.min.js "></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="Index.js" type="text/javascript"></script>
</body>

</html>