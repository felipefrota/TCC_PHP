<html>

<head>
    <title>Cadastro</title>
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=devide-width, initial-scale=1">

    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../_CSS/styles.css" rel="stylesheet">


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


    <span class="d-block p-3 bg-primary text-white">Cadastro Instituição</span>

    <div class="container-fluid">

        <form class="was-validated" action="../cadastroInstituicao.php" method="post">

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="razao_Social">Razão Social:</label>
                    <input class="form-control" type="text" name="razao_Social" id="razao_Social" placeholder="">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nome_Fantasia">Nome Fantasia:</label>
                    <input class="form-control" type="text" name="nome_Fantasia" id="nome_Fantasia" placeholder="">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="cnpj">CNPJ:</label>
                    <input class="form-control" type="text" name="cnpj" id="cnpj" placeholder="">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="">
                </div>

                <div class="form-group col-md-6">
                    <label for="senha">Senha:</label>
                    <input class="form-control" type="password" name="senha" id="senha" placeholder="">
                </div>
            </div>

            <!---------------------------------------------------------------------------------------------------------->
            <hr>
            <span class="d-block p-2 bg-dark text-white">Dados da Instituição</span>
            <br>
            <!---------------------------------------------------------------------------------------------------------->

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tel1">Telefone 1:</label>
                    <input class="form-control" type="tel" name="telefoneFixo1" id="telefoneFixo1" placeholder="">
                </div>

                <div class="form-group col-md-6">
                    <label for="tel2">Telefone 2:</label>
                    <input class="form-control" type="tel" name="telefoneFixo2" id="telefoneFixo2" placeholder="">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cel1">Telefone Celular:</label>
                    <input class="form-control" type="tel" name="telefoneCelular" id="telefoneCelular" placeholder="">
                </div>

                <div class="form-group col-md-6">
                    <label for="wpp">WhatsApp:</label>
                    <input class="form-control" type="tel" name="wpp" id="wpp" placeholder="">
                </div>
            </div>



            <button type="submit" class="btn btn-info">Enviar</button>


        </form>
    </div>

    <!-------------------------------------------------------------------------------------------------------------->
    <script src="https://unpkg.com/popper.js@1.15.0/dist/umd/popper.min.js"></script>
    <script src="../Bootstrap/js/jquery-3.4.1.min.js "></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="fields.js" type="text/javascript"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
</body>

</html>