<?php require_once("../conexao/conexao.php") ?>


<?php
//--------------------------------------------------------------------------//
//TESTE DE SEGURANÇA
session_start();
// if (!isset($_SESSION["user_portal"])) {
//     header("location:../Index/index.php");
// }

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

$nivel_necessario = 1;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['usuario_instituicaoID']) or ($_SESSION['tipo'] < $nivel_necessario)) {
    // Destrói a sessão por segurança
    //  session_destroy();
    // Redireciona o visitante de volta pro login
    $sql = "SELECT * FROM tb_usuario where id = $_SESSION[usuarioID]";


    header("Location:../Index/Index.php");
    exit;
}
//FIM DO TESTE DE SEGURANÇA
//--------------------------------------------------------------------------//

//--------------------------------------------------------------------------//
//Puxando todos os dados do usuario do banco 

if (isset($_SESSION["nomeUsuario_nomeFantasia"])) {
    $user = $_SESSION["nomeUsuario_nomeFantasia"];

    $dataUser = "SELECT * ";
    $dataUser .= "FROM tb_usuario ";
    $dataUser .= "WHERE usuario_instituicaoID = {$user} ";

    $dataUser_login = mysqli_query($conecta, $dataUser);
    if (!$dataUser_login) {
        die("Falha no banco");
    }

    $dataUser_login = mysqli_fetch_assoc($dataUser_login);
    $nome = $dataUser_login["nomeUsuario_nomeFantasia"];
}


//--------------------------------------------------------------------------//

//--------------------------------------------------------------------------//
//Puxando as instituições do banco
$instituicoes = "SELECT nomeUsuario_nomeFantasia ";
$instituicoes .= "FROM tb_usuario ";
$instituicoes .= "WHERE tipo = 2 ";
$lista_instituicoes = mysqli_query($conecta, $instituicoes);
if (!$lista_instituicoes) {
    die("erro no banco ao procurar instituções");
}

//--------------------------------------------------------------------------//

//--------------------------------------------------------------------------//
//Pegando os dados enviados do formulario//
if (isset($_POST["usuario"])) {
    $nomeUsuario_nomeFantasia =           $_POST["usuario"];
    $sobrenome                =           $_POST["sobrenome"];
    $senha =                              $_POST["senha"];
    $email =                              $_POST["email"];
    $cpf_cnpj =                           $_POST["cpf"];
    $dataNascimento =                     $_POST["dataNascimento"];
    $sexo =                               $_POST["sexo"];
    $estadoCivil =                        $_POST["estadoCivil"];
    $telefoneCelular =                    $_POST["telefoneCelular"];
    $telefoneFixo =                       $_POST["telefoneFixo"];

    $cep =                                $_POST["cep"];
    $estado =                             $_POST["estado"];
    $cidade =                             utf8_decode($_POST["cidade"]);
    $bairro =                             utf8_decode($_POST["bairro"]);
    $rua_avenida =                        utf8_decode($_POST["rua_avenida"]);
    $numero =                             $_POST["numero"];
    $adicional =                          utf8_decode($_POST["adicional"]);

    $motivoInternacao =                   $_POST["motivoInternacao"];
    $motiv_Adicional =                    utf8_decode($_POST["motiv_Adicional"]);
    $remed =                              utf8_decode($_POST["remed"]);
    $alergRemedio =                       utf8_decode($_POST["alergRemedio"]);
    $sintom =                             utf8_decode($_POST["sintom"]);
    $doenc_Cronic =                       utf8_decode($_POST["doenc_Cronic"]);

    $instit =                             utf8_decode($_POST["instit"]);
    $levar_Inst =                         utf8_decode($_POST["levar_Inst"]);
    $obs_Inst =                           utf8_decode($_POST["obs_Inst"]);
    $obs_Intolerancia =                   utf8_decode($_POST["obs_Intolerancia"]);

    $usuario_instituicaoID                = $_POST["usuario_instituicaoID"];



    //--------------------------------------------------------------------------//

    //--------------------------------------------------------------------------//
    //Alterar
    $alterar = "UPDATE tb_usuario ";
    $alterar .= "SET ";
    $alterar .= "nomeUsuario_nomeFantasia = '{$nomeUsuario_nomeFantasia}', ";
    $alterar .= "sobrenome = '{$sobrenome}', ";
    $alterar .= "senha = '{$senha}', ";
    $alterar .= "email = '{$email}', ";
    $alterar .= "cpf_cnpj = '{$cpf_cnpj}', ";
    $alterar .= "dataNascimento = '{$dataNascimento}', ";
    $alterar .= "sexo = '{$sexo}', ";
    $alterar .= "estadoCivil = '{$estadoCivil}', ";
    $alterar .= "telefoneCelular = '{$telefoneCelular}', ";
    $alterar .= "telefoneFixo = '{$telefoneFixo}', ";

    $alterar .= "cep = '{$cep}', ";
    $alterar .= "estado = '{$estado}', ";
    $alterar .= "cidade = '{$cidade}', ";
    $alterar .= "bairro = '{$bairro}', ";
    $alterar .= "rua_avenida = '{$rua_avenida}', ";
    $alterar .= "numero = '{$numero}', ";
    $alterar .= "adicional = '{$adicional}', ";

    $alterar .= "motivoInternacao = '{$motivoInternacao}', ";
    $alterar .= "motiv_Adicional = '{$motiv_Adicional}', ";
    $alterar .= "remed = '{$remed}', ";
    $alterar .= "alergRemedio = '{$alergRemedio}', ";
    $alterar .= "sintom = '{$sintom}', ";
    $alterar .= "doenc_Cronic = '{$doenc_Cronic}', ";

    $alterar .= "instit = '{$instit}', ";
    $alterar .= "levar_Inst = '{$levar_Inst}', ";
    $alterar .= "obs_Inst = '{$obs_Inst}', ";
    $alterar .= "obs_Intolerancia = '{$obs_Intolerancia}' ";

    $alterar .= "WHERE usuario_instituicaoID = {$usuario_instituicaoID} ";

    $operacao_alterar = mysqli_query($conecta, $alterar);
    if (!$operacao_alterar) {
        die("Erro na alteracao");
    } else {
        header("location:edit.people.php");
    }
}

//  print_r($_POST["usuario"]);



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



    <header>
        <div id="Principal">

            <div class="">
                <!----------------------------------------------------------------------------------------->
                <!--<object type="text/html" data="../nav-bar.html"></object>-->
                <div id="Nav-Bar">

                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a href="../IndexProject/Index.html" class="navbar-brand"></a>
                                <!------------------------------------ Logo abaixo ----------------------------------------------------------->
                                <a href="../afterLogin/usuario.php">
                                    <img src="../Images/logo6.png" width=100px height=75px>
                                </a>
                                <!------------------------------------ Fechando Logo ----------------------------------------------------------->


                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#menuCelular" aria-controls="menu" aria-expanded="false"
                                    aria-label="Menu Colapso">
                                    <span class="navbar-toggler-icon text-black"></span>
                                </button>
                            </div>

                            <div id="menuCelular" class="collapse navbar-collapse">

                                <ul class="navbar-nav ml-auto text-light nav-menu">
                                    <li class="navbar-text"><a class="nav-link text-dark font-weight-bold"
                                            href="../afterLogin/usuario.php">Home</a></li>
                                    <li class="navbar-text navHistorias"><a class="nav-link text-dark font-weight-bold"
                                            href="../afterLogin/usuario.php">Historia</a></li>
                                    <li class="navbar-text nav-instituicoes"><a
                                            class="nav-link text-dark font-weight-bold"
                                            href="../afterLogin/usuario.php">Instituições</a></li>
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
                                            <button class="btn btn-outline-dark dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <h8> Bem vindo, <?php echo $nome ?> </h8>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="../EditData/edit.people.php">Perfil</a>
                                                <a class="dropdown-item"
                                                    href="../list_Instituition/list.institution.php">Empresa
                                                    Cadastrada</a>
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
    <!--Fechando o Div:Nav-Bar-->


    <!----------------------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------------------->


    <span class="d-block p-3 bg-dark text-warning">Cadastro Usuário</span>

    <!-------------------------------------------------------------------------------------------------------------->

    <div class="container-fluid">

        <form class="was-validated" action="../EditData/edit.people.php" method="post">

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="usuario">Seu Nome</label>
                    <input class="form-control" type="text" name="usuario" id="usuario"
                        value="<?php echo $dataUser_login["nomeUsuario_nomeFantasia"] ?>" required minlength="2">
                    <div class="invalid-feedback">
                        Nome Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="senha">Sobrenome:</label>
                    <input class="form-control" type="text" name="sobrenome" id="sobrenome"
                        value="<?php echo $dataUser_login["sobrenome"] ?>" required minlength="4">
                    <div class="invalid-feedback">
                        Sobrenome Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="senha">Senha</label>
                    <input class="form-control" type="password" name="senha" id="senha"
                        value="<?php echo $dataUser_login["senha"] ?>" required minlength="4">
                    <div class="invalid-feedback">
                        Senha Obrigatoria!
                    </div>
                </div>

            </div>


            <div class="form-group">
                <label for="email">Seu Email</label>
                <input class="form-control" type="email" name="email" id="email"
                    value="<?php echo $dataUser_login["email"] ?>" required>
                <div class="invalid-feedback">
                    Email Obrigatorio!
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="cpf">CPF</label>
                    <input class="form-control" type="text" name="cpf" id="cpf"
                        value="<?php echo $dataUser_login["cpf_cnpj"] ?>" required minlength="14">
                    <div class="invalid-feedback">
                        CPF Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="dataNascimento">Data de Nascimento</label>
                    <input class="form-control" name="dataNascimento" id="dataNascimento" type="date"
                        value="<?php echo $dataUser_login["dataNascimento"] ?>" required>
                    <div class="invalid-feedback">
                        Data de Nascimento Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" id="sexo" class="form-control" required>
                        <option selected><?php echo $dataUser_login["sexo"] ?></option>
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
                        <option selected><?php echo $dataUser_login["estadoCivil"] ?></option>
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
                    <input class="form-control" type="tel" name="telefoneCelular" id="telefoneCelular"
                        value="<?php echo $dataUser_login["telefoneCelular"] ?>">
                </div>

                <div class="form-group col-md-3">
                    <label for="telefoneFixo">Telefone Fixo</label>
                    <input class="form-control" type="tel" name="telefoneFixo" id="telefoneFixo"
                        value="<?php echo $dataUser_login["telefoneFixo"] ?>">
                </div>
            </div>




            <!---------------------------------------------------------------------------------------------------------->
            <hr>
            <span class="d-block p-2 bg-dark text-warning">Endereço</span>
            <br />
            <!---------------------------------------------------------------------------------------------------------->
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="cep">CEP</label>
                    <input class="form-control" type="text" name="cep" id="cep" id="cep"
                        value="<?php echo $dataUser_login["cep"] ?>" required minlength="9">
                    <div class="invalid-feedback">
                        CEP Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="estado">Estado</label>
                    <input class="form-control" type="text" name="estado" id="estado"
                        value="<?php echo $dataUser_login["estado"] ?>" required minlength="4">
                    <div class="invalid-feedback">
                        Estado Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="cidade">Cidade</label>
                    <select class="form-control" name="cidade" id="cidade" required>
                        <option selected value="estado"><?php echo $dataUser_login["cidade"] ?></option>
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
                    <input class="form-control" type="text" name="bairro" id="bairro"
                        value="<?php echo $dataUser_login["bairro"] ?>" required minlength="3">
                    <div class="invalid-feedback">
                        Bairro Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="rua_avenida">Rua/Avenida</label>
                    <input class="form-control" type="text" name="rua_avenida" id="rua_avenida"
                        value="<?php echo $dataUser_login["rua_avenida"] ?>" required minlength="2">
                    <div class="invalid-feedback">
                        Rua ou Avenida Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="numero">Numero</label>
                    <input class="form-control" type="number" name="numero" id="numero"
                        value="<?php echo $dataUser_login["numero"] ?>" required minlength="1">
                    <div class="invalid-feedback">
                        Número Obrigatorio!
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="adicional">Adicional</label>
                <input class="form-control" type="text" name="adicional" id="adicional"
                    value="<?php echo $dataUser_login["adicional"] ?>">
            </div>



            <!---------------------------------------------------------------------------------------------------------->
            <hr>
            <span class="d-block p-2 bg-dark text-warning">Prontuario</span>
            <br />
            <!---------------------------------------------------------------------------------------------------------->



            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="motivoInternacao">Qual o motivo da internação?</label>
                    <select name="motivoInternacao" id="motivoInternacao" class="form-control" required>
                        <option selected><?php echo $dataUser_login["motivoInternacao"] ?></option>
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
                    <input class="form-control" type="text" name="motiv_Adicional" id="motiv_Adicional"
                        value="<?php echo $dataUser_login["motiv_Adicional"] ?>">
                </div>
            </div>
            <!------------------------------------------------------------------------------------------------>
            <hr>
            <span class="d-block p-2 bg-dark text-warning">Remédios</span>
            <br />
            <!------------------------------------------------------------------------------------------------>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="remed">Toma algum remédio?</label>
                    <input class="form-control" type="text" name="remed" id="remed"
                        value="<?php echo $dataUser_login["remed"] ?>">
                </div>

                <div class="form-group col-md-6">
                    <label for="alergRemedio">Alérgico a alguma medicação?</label>
                    <input class="form-control" type="text" name="alergRemedio" id="alergRemedio"
                        value="<?php echo $dataUser_login["alergRemedio"] ?>">
                </div>
            </div>


            <div class="form-group">
                <label for="sintom">Tem sintomas? Quais?</label>
                <input class="form-control" type="text" name="sintom" id="sintom"
                    value="<?php echo $dataUser_login["sintom"] ?>">
            </div>


            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="doenc_Cronic">Alguma doença cronica?</label>
                    <input class="form-control" type="text" name="doenc_Cronic" id="doenc_Cronic"
                        value="<?php echo $dataUser_login["doenc_Cronic"] ?>">
                </div>

            </div>

            <!------------------------------------------------------------------------------------------------>
            <hr>
            <span class="d-block p-2 bg-dark text-warning">Instituição</span>
            <br />
            <!------------------------------------------------------------------------------------------------>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="instit">Qual instituição de preferencia?</label>
                    <select name="instit" id="instit" class="form-control" required>
                        <?php
                        // $minhaInst = $dataUser_login["instit"];
                        // while($linha = mysqli_fetch_assoc($lista_instituicoes)) {

                        $minhaInst = $dataUser_login["instit"];
                        while ($linha = mysqli_fetch_assoc($lista_instituicoes)) {
                            $inst_principal = $linha["nomeUsuario_nomeFantasia"];
                            if ($minhaInst == $inst_principal) {
                                ?>

                        <option value="<?php echo $linha["nomeUsuario_nomeFantasia"] ?>" selected>
                            <?php echo utf8_encode($linha["nomeUsuario_nomeFantasia"]) ?>
                        </option>
                        <?php
                                } else {
                                    ?>
                        <option value="<?php echo $linha["nomeUsuario_nomeFantasia"] ?>">
                            <?php echo utf8_encode($linha["nomeUsuario_nomeFantasia"]) ?>
                        </option>
                        <?php
                            }
                        }
                        ?>

                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="levar_Inst">Vai levar alguma coisa para a instituição?</label>
                    <input class="form-control" type="text" name="levar_Inst" id="levar_Inst"
                        value="<?php echo $dataUser_login["levar_Inst"] ?>">
                </div>

            </div>


            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="obs_Inst">Alergia a algum produto?</label>
                    <input class="form-control" type="text" name="obs_Inst" id="obs_Inst"
                        value="<?php echo $dataUser_login["obs_Inst"] ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="obs_Intolerancia">Intolerância a algum alimento?</label>
                    <input class="form-control" type="text" name="obs_Intolerancia" id="obs_Intolerancia"
                        value="<?php echo $dataUser_login["obs_Intolerancia"] ?>">
                </div>
            </div>


            <input type="hidden" name="usuario_instituicaoID"
                value="<?php echo $dataUser_login["usuario_instituicaoID"] ?>">
            <button type="submit" class="btn btn-dark text-warning">Enviar</button>






        </form>






        </main>
    </div>

    </div>
    <!--Fechando div principal -->


    <!-------------------------------------------------------------------------------------------------------------->
    <script src="https://unpkg.com/popper.js@1.15.0/dist/umd/popper.min.js"></script>
    <script src="../Bootstrap/js/jquery-3.4.1.min.js "></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="fields.js" type="text/javascript"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js">
    </script>
</body>

</html>