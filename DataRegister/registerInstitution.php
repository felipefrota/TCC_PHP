<html>

<head>
    <title>Cadastro</title>
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=devide-width, initial-scale=1">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">

    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../_CSS/styles.css" rel="stylesheet">


</head>

<body>

    <!-- Modal voce se cadastrou com sucesso-->
    <div class="modal fade" id="modalCadastrado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Você foi cadastrado com sucesso! </br> Agora faça login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <header>
        <div id="Principal">

            <div class="">
                <!----------------------------------------------------------------------------------------->
                <!--<object type="text/html" data="../nav-bar.html"></object>-->
                <div id="Nav-Bar">

                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a href="../IndexProject/Index.html" class="navbar-brand"></a>
                                <!------------------------------------ Logo abaixo ----------------------------------------------------------->
                                <a href="../afterLogin/usuario.php">
                                    <img src="../Images/logo6.png" width=100px height=70px>
                                </a>
                                <!------------------------------------ Fechando Logo ----------------------------------------------------------->


                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuCelular" aria-controls="menu" aria-expanded="false" aria-label="Menu Colapso">
                                    <span class="navbar-toggler-icon text-black"></span>
                                </button>
                            </div>

                            <div id="menuCelular" class="collapse navbar-collapse">

                                <ul class="navbar-nav ml-auto text-light nav-menu">
                                    <li class="navbar-text"><a class="nav-link text-white btn-outline-dark" href="../Index/Index.php">HOME</a></li>
                                    <li class="navbar-text"><a class="nav-link text-white btn-outline-dark" href="../Index/Index.php#services">SERVIÇOS</a></li>
                                    <li class="navbar-text"><a class="nav-link text-white btn-outline-dark" href="../Index/Index.php#portfolio">INSTITUIÇÕES</a></li>
                                    <li class="navbar-text"><a class="nav-link text-white btn-outline-dark" href="../Index/Index.php#about">SOBRE</a></li>
                                    <li class="navbar-text"><a class="nav-link text-white btn-outline-dark" href="../Index/Index.php#team">NOSSO TIME</a></li>
                                    <li class="navbar-text"><a class="nav-link text-white btn-outline-dark" href="../Index/Index.php#contact">CONTATO</a></li>
                                    <!----------------------------------------------------------------------------------------->
                                    <li>
                                        <a class="nav-link">
                                            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#telaLogin">Login</button>
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
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="submit" id="submit" value="login" class="btn btn-dark text-warning">Login</button>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Fechando modal/ Fechando tela login-->

                                            </div>
                                        </form>

                                    </li>

                                    <!-- Modal -->


                                    <!---------------------------------------------------------------------------->
                                    <!--Botao Cadastro-->
                                    <li>
                                        <div class="dropdown nav-link">
                                            <button class="btn btn-outline-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <h8> Cadastro </h8>
                                            </button>
                                            <div class="dropdown-menu dropdown-menuIndex " style="color: red;" aria-labelledby="dropdownMenuButton">
                                                <a class="nav-link active text-warning js-scroll-trigger btn-dark" href="../DataRegister/registerPeople.php" role="button" aria-pressed="true">Usuario</a>
                                                <a class="nav-link active text-warning js-scroll-trigger btn-dark" href="../DataRegister/registerInstitution.php">Instituição</a>

                                            </div>
                                        </div>
                                    </li>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>


    </header>
    <!--Fechando o Div:Nav-Bar-->


    <!----------------------------------------------------------------------------------------->
    <br />
    <!----------------------------------------------------------------------------------------->

    <span class="d-block p-3 bg-dark text-warning text-center">Cadastro Instituição</span>

    <!----------------------------------------------------------------------------------------->

        <form class="was-validated" action="../cadastroInstituicao.php" method="post">
        <div class="container-fluid">
        <div class="formularios">

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="razao_Social">Razão Social:</label>
                    <input class="form-control" type="text" name="razao_Social" id="razao_Social" placeholder="" required minlength="2">
                    <div class="invalid-feedback">
                        Razão Social Obrigatoria!
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nome_Fantasia">Nome Fantasia:</label>
                    <input class="form-control" type="text" name="nome_Fantasia" id="nome_Fantasia" placeholder="" required minlength="2">
                    <div class="invalid-feedback">
                        Nome Fantasia Obrigatorio!
                    </div>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="cnpj">CNPJ:</label>
                    <input class="form-control" type="text" name="cnpj" id="cnpj" placeholder="" required minlength="18">
                    <div class="invalid-feedback">
                        CNPJ Obrigatorio!
                    </div>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="" required minlength="2">
                    <div class="invalid-feedback">
                        Email Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="senha">Senha:</label>
                    <input class="form-control" type="password" name="senha" id="senha" placeholder="" required minlength="4">
                    <div class="invalid-feedback">
                        Senha Obrigatorio!
                    </div>
                </div>
            </div>
            </div>
            <!--Fechando div class formularios-->

            <!---------------------------------------------------------------------------------------------------------->
            <hr>
            <span class="d-block p-3 bg-dark text-warning text-center">Dados da Instituição</span>
            <br>
            <!---------------------------------------------------------------------------------------------------------->
            <div class="formularios">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tel1">Telefone 1:</label>
                    <input class="form-control" type="tel" name="telefoneFixo1" id="telefoneFixo1" placeholder="" required minlength="14">
                    <div class="invalid-feedback">
                        Telefone Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="tel2">Telefone 2:</label>
                    <input class="form-control" type="tel" name="telefoneFixo2" id="telefoneFixo2" placeholder="">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cel1">Telefone Celular:</label>
                    <input class="form-control" type="tel" name="telefoneCelular" id="telefoneCelular" placeholder="" required minlength="15">
                    <div class="invalid-feedback">
                        Telefone Celular Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="wpp">WhatsApp:</label>
                    <input class="form-control" type="tel" name="wpp" id="wpp" placeholder="">
                </div>
            </div>
            </div>
            <!--Fechando div class formularios-->

            <!---------------------------------------------------------------------------------------------------------->
            <hr>
            <span class="d-block p-3 bg-dark text-warning text-center">Endereço</span>
            <br />
            <!---------------------------------------------------------------------------------------------------------->
            <div class="formularios">

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="cep">CEP</label>
                    <input class="form-control" type="text" name="cep" id="cep" id="cep" placeholder="EX: 00000-000" required minlength="9">
                    <div class="invalid-feedback">
                        CEP Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="estado">Estado</label>
                    <input class="form-control" type="text" name="estado" id="estado" placeholder="EX: Distrito Federal" required minlength="4">
                    <div class="invalid-feedback">
                        Estado Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="cidade">Cidade</label>
                    <select class="form-control" name="cidade" id="cidade" required>
                        <option selected value="">Selecione o Estado...</option>
                        <option value="AC">AC</option>
                        <option value="AC">AC</option>
                        <option value="AM">AM</option>
                        <option value="AP">AP</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="DF">DF</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MT">MT</option>
                        <option value="MS">MS</option>
                        <option value="MG">MG</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PR">PR</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RO">RO</option>
                        <option value="RS">RS</option>
                        <option value="RR">RR</option>
                        <option value="SC">SC</option>
                        <option value="SE">SE</option>
                        <option value="SP">SP</option>
                        <option value="TO">TO</option>
                    </select>
                    <div class="invalid-feedback">
                        Cidade Obrigatoria!
                    </div>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="bairro">Bairro</label>
                    <input class="form-control" type="text" name="bairro" id="bairro" placeholder="EX: Asa Norte" required minlength="3">
                    <div class="invalid-feedback">
                        Bairro Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="rua_avenida">Rua/Avenida</label>
                    <input class="form-control" type="text" name="rua_avenida" id="rua_avenida" required minlength="2">
                    <div class="invalid-feedback">
                        Rua ou Avenida Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="numero">Número</label>
                    <input class="form-control" type="number" name="numero" id="numero" placeholder="Numero casa ou Apt" required minlength="1">
                    <div class="invalid-feedback">
                        Número Obrigatorio!
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="adicional">Adicional</label>
                <input class="form-control" type="text" name="adicional" id="adicional" placeholder="Dados adicionais(Opcional)">
            </div>
            </div>
            <!--Fechando div class formularios-->


            <!---------------------------------------------------------------------------------------------------------->
            <hr>
            <span class="d-block p-3 bg-dark text-warning text-center">Coloque o site da instituição</span>
            <br>
            <!---------------------------------------------------------------------------------------------------------->
            <div class="formularios">

            <div class="form-group">
                <label for="url">URL</label>
                <input class="form-control" type="text" name="url" id="url" placeholder="Coloque o link do site da empresa">
            </div>




            <button type="submit" class="btn btn-dark text-warning" data-toggle="modal" data-target="#modalCadastrado">
                Enviar
            </button>

            </div>
            <!--Fechando div class formularios-->
            </div>
        </form>

    <!-------------------------------------------------------------------------------------------------------------->
    <script src="https://unpkg.com/popper.js@1.15.0/dist/umd/popper.min.js"></script>
    <script src="../Bootstrap/js/jquery-3.4.1.min.js "></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="fields.js" type="text/javascript"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
</body>

</html>