<?php require_once("../conexao/conexao.php") ?>


<?php
$select = "SELECT usuario_instituicaoID, nomeUsuario_nomeFantasia, tipo ";
$select .= "FROM TB_USUARIO ";
$lista_TB_USUARIO = mysqli_query($conecta, $select);

if (!$lista_TB_USUARIO) {
    die("Erro no banco");
}



$instituicoes = "SELECT nomeUsuario_nomeFantasia ";
$instituicoes .= "FROM tb_usuario ";
$instituicoes .= "WHERE tipo = 2 ";
$lista_instituicoes = mysqli_query($conecta, $instituicoes);
if (!$lista_instituicoes) {
    die("erro no banco ao procurar instituções");
}

?>
<html>

<head>
    <title>Cadastro Pessoa</title>
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=devide-width, initial-scale=1">

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

    <span class="d-block p-3 bg-dark text-warning text-center">Cadastro Usuário</span>

    <!-------------------------------------------------------------------------------------------------------------->

        <form class="was-validated" id="register" action="../cadastroUsuario.php" method="post">
        <div class="container-fluid">
        <div class="formularios">

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="usuario">Seu Nome</label>
                    <input class="form-control" type="text" name="usuario" id="usuario" placeholder="Usuario" required minlength="2">
                    <div class="invalid-feedback">
                        Nome Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="senha">Sobrenome:</label>
                    <input class="form-control" type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" required minlength="4">
                    <div class="invalid-feedback">
                        Sobrenome Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="senha">Senha</label>
                    <input class="form-control" type="password" name="senha" id="senha" placeholder="Senha" required minlength="4">
                    <div class="invalid-feedback">
                        Senha Obrigatoria!
                    </div>
                </div>

            </div>


            <div class="form-group">
                <label for="email">Seu Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="seuemail@email.com" required>
                <div class="invalid-feedback">
                    Email Obrigatorio!
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="cpf">CPF</label>
                    <input class="form-control" type="text" name="cpf" id="cpf" placeholder="000.000.000.00" required minlength="14">
                    <div class="invalid-feedback">
                        CPF Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="dataNascimento">Data de Nascimento</label>
                    <input class="form-control" name="dataNascimento" id="dataNascimento" type="date" required>
                    <div class="invalid-feedback">
                        Data de Nascimento Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" id="sexo" class="form-control" required>
                        <option value="" selected>Escolher...</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Outro">Outro...</option>
                    </select>
                    <div class="invalid-feedback">
                        Sexo Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="estadoCivil">Estado Civil</label>
                    <select class="form-control" name="estadoCivil" id="estadoCivil" required>
                        <option value="" selected>Escolher...</option>
                        <option value="Solteiro(a)">Solteiro(a)</option>
                        <option value="Casado(a)">Casado(a)</option>
                        <option value="Divorciado(a)">Divorciado(a)</option>
                        <option value="Viuvo(a)">Viuvo(a)</option>
                    </select>
                    <div class="invalid-feedback">
                        Estado Civil Obrigatorio!
                    </div>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="telefoneCelular">Telefone Celular</label>
                    <input class="form-control" type="tel" name="telefoneCelular" id="telefoneCelular" placeholder="EX: (ddd)90000-0000">
                </div>

                <div class="form-group col-md-3">
                    <label for="telefoneFixo">Telefone Fixo</label>
                    <input class="form-control" type="tel" name="telefoneFixo" id="telefoneFixo" placeholder="EX: (ddd)0000-0000">
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
                    <label for="UF">UF</label>
                    <select class="form-control" name="UF" id="UF" required>
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
                        UF Obrigatorio!
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
            <span class="d-block p-3 bg-dark text-warning text-center">Prontuario</span>
            <br />
            <!---------------------------------------------------------------------------------------------------------->
            <div class="formularios">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="motivoInternacao">Qual o motivo da internação?</label>
                    <select name="motivoInternacao" id="motivoInternacao" class="form-control" required>
                        <option value="" selected>Escolher...</option>
                        <option value="Drogas">Drogas</option>
                        <option value="Depressao">Depressão</option>
                        <option value="Reabilitacao Social">Reabilitação Social</option>
                        <option value="Outros">Outros</option>
                    </select>
                    <div class="invalid-feedback">
                        Motivo Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="motiv_Adicional">Se clicou em outros nós conte qual foi o motivo?</label>
                    <input class="form-control" type="text" name="motiv_Adicional" id="motiv_Adicional" placeholder="Opcional...">
                </div>
            </div>
            </div>
            <!--Fechando div class formularios-->

            <!------------------------------------------------------------------------------------------------>
            <hr>
            <span class="d-block p-2 bg-dark text-warning">Remédios</span>
            <br />
            <!------------------------------------------------------------------------------------------------>
            <div class="formularios">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="remed">Toma algum remédio?</label>
                    <input class="form-control" type="text" name="remed" id="remed" placeholder="Ex:Remédio, Remédio 2, Remédio 3">
                </div>

                <div class="form-group col-md-6">
                    <label for="alergRemedio">Alérgico a alguma medicação?</label>
                    <input class="form-control" type="text" name="alergRemedio" id="alergRemedio" placeholder="Ex: Remédio, Remédio 02, Remédio 03">
                </div>
            </div>


            <div class="form-group">
                <label for="sintom">Tem sintomas? Quais?</label>
                <input class="form-control" type="text" name="sintom" id="sintom" placeholder="Descreva os sintomas">
            </div>


            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="doenc_Cronic">Alguma doença cronica?</label>
                    <input class="form-control" type="text" name="doenc_Cronic" id="doenc_Cronic" placeholder="Digite aqui a doença">
                </div>

            </div>
            </div>
            <!--Fechando div class formularios-->

            <!------------------------------------------------------------------------------------------------>
            <hr>
            <span class="d-block p-3 bg-dark text-warning text-center">Instituição</span>
            <br />
            <!------------------------------------------------------------------------------------------------>
            <div class="formularios">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="instit">Qual instituição de preferencia?</label>
                    <select name="instit" id="instit" class="form-control" required>
                        <?php
                        // $minhaInst = $dataUser_login["instit"];
                        // while($linha = mysqli_fetch_assoc($lista_instituicoes)) {
                        while ($linha = mysqli_fetch_assoc($lista_instituicoes)) {
                            ?>
                            <option value="<?php echo $linha["nomeUsuario_nomeFantasia"];  ?>">
                                <?php echo utf8_encode($linha["nomeUsuario_nomeFantasia"]);  ?>
                            </option>
                        <?php
                        }

                        ?>

                        <!------->


                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="levar_Inst">Vai levar alguma coisa para a instituição?</label>
                    <input class="form-control" type="text" name="levar_Inst" id="levar_Inst" placeholder="Ex: cobertor, tavesseiro, etc...">
                </div>

            </div>


            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="obs_Inst">Alergia a algum produto?</label>
                    <input class="form-control" type="text" name="obs_Inst" id="obs_Inst" placeholder="Ex: amaciante, sabão em pó, etc...">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="obs_Intolerancia">Intolerância a algum alimento?</label>
                    <input class="form-control" type="text" name="obs_Intolerancia" id="obs_Intolerancia" placeholder="Ex: lactose, glúten, etc...">
                </div>
            </div>



            <button type="submit" class="btn btn-dark text-warning" data-toggle="modal" data-target="#modalCadastrado">
                Enviar
            </button>




            </div>
            <!--Fechando div class formularios-->
            </div>
        </form>
    

    <!-- <div class="container-fluid">
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Senha</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Senha">
            </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Endereço</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Rua dos Bobos, nº 0">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Endereço 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartamento, hotel, casa, etc.">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity">UF</label>
            <input type="text" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-4">
            <label for="inputEstado">Estado</label>
            <select id="inputEstado" class="form-control">
                  <option selected>Escolher...</option>
                  <option>...</option>
                </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputCEP">CEP</label>
            <input type="text" class="form-control" id="inputCEP">
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
                  Clique em mim
                </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
    </div> -->





    <!-------------------------------------------------------------------------------------------------------------->
    <script src="https://unpkg.com/popper.js@1.15.0/dist/umd/popper.min.js"></script>
    <script src="../Bootstrap/js/jquery-3.4.1.min.js "></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="fields.js" type="text/javascript"></script>

    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
</body>

</html>