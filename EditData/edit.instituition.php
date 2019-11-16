<?php require_once("../conexao/conexao.php")?>


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
//PARTE DE UPLOAD DE DADOS
//--------------------------------------------------------------------------//
//Campo upload_file
//Codigo dos para o upload das imagens
// $array_erro = array(
//     UPLOAD_ERR_OK => "Sem erro.",
//     UPLOAD_ERR_INI_SIZE => "O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.",
//     UPLOAD_ERR_FORM_SIZE => "O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML",
//     UPLOAD_ERR_PARTIAL => "O upload do arquivo foi feito parcialmente.",
//     UPLOAD_ERR_NO_FILE => "Nenhum arquivo foi enviado.",
//     UPLOAD_ERR_NO_TMP_DIR => "Pasta temporária ausente.",
//     UPLOAD_ERR_CANT_WRITE => "Falha em escrever o arquivo em disco.",
//     UPLOAD_ERR_EXTENSION => "Uma extensão do PHP interrompeu o upload do arquivo."
// ); 
// if( isset($_POST["alterar"]) ) {
//     $numero_erro = $_FILES['upload_file']['error'];
//     $mensagem =  $array_erro[$numero_erro];

//     $arquivo_temporario = $_FILES['upload_file']['tmp_name'];
//     $arquivo = basename($_FILES['upload_file']['name']);
//     $diretorio = "C:/xampp/htdocs/TCC_PHP/Uploads";
    

//     print_r($caminho);


//     //Upando as imagens
//     if(move_uploaded_file($arquivo_temporario, $diretorio."/". $arquivo)) {
//         $mensagem = "Arquivo publicado";
//     } else {
//         $numero_erro = $_FILES['upload_file']['error'];
//         $mensagem =  $array_erro[$numero_erro];
//     }
    
    
    // echo("<pre>");
    // print_r($_FILES['upload_file']);
    // echo("</pre>");
    // echo $mensagem;

// }



//--------------------------------------------------------------------------//

//--------------------------------------------------------------------------//
//Pegando os dados enviados do formulario//
if( isset($_POST["razao_Social"]) ) {
    $razao_Social             =           $_POST["razao_Social"];
    $nomeUsuario_nomeFantasia =           $_POST["nome_Fantasia"];
    $cpf_cnpj                =            $_POST["cnpj"];
    $email =                              $_POST["email"];
    $senha =                              $_POST["senha"];
    $telefoneFixo =                       $_POST["telefoneFixo1"];
    $telefoneFixo2 =                      $_POST["telefoneFixo2"];
    $telefoneCelular =                    $_POST["telefoneCelular"];
    $wpp =                                $_POST["wpp"];
    $brev_apresent =                      $_POST["brev_apresent"];
    $apresent_complet =                   $_POST["apresent_complet"];

    $cep =                                $_POST["cep"];
    $estado =                             $_POST["estado"];
    $cidade =                             $_POST["cidade"];
    $bairro =                             $_POST["bairro"];
    $rua_avenida =                        $_POST["rua_avenida"];
    $numero =                             $_POST["numero"];
    $adicional =                          $_POST["adicional"];


    // $upload_file =                        $_POST["upload_file"];
    $usuario_instituicaoID                = $_POST["usuario_instituicaoID"];

    //--------------------------------------------------------------------------//

    //--------------------------------------------------------------------------//
    //Alterar
    $alterar = "UPDATE tb_usuario ";
    $alterar .= "SET ";
    $alterar .= "razao_Social = '{$razao_Social}', ";
    $alterar .= "nomeUsuario_nomeFantasia = '{$nomeUsuario_nomeFantasia}', "; 
    $alterar .= "cpf_cnpj = '{$cpf_cnpj}', ";
    $alterar .= "email = '{$email}', ";
    $alterar .= "senha = '{$senha}', ";
    $alterar .= "telefoneFixo = '{$telefoneFixo}', ";
    $alterar .= "telefoneFixo2 = '{$telefoneFixo2}', ";
    $alterar .= "telefoneCelular = '{$telefoneCelular}', ";
    $alterar .= "cep = '{$cep}', ";
    $alterar .= "estado = '{$estado}', ";
    $alterar .= "cidade = '{$cidade}', ";
    $alterar .= "bairro = '{$bairro}', ";
    $alterar .= "rua_avenida = '{$rua_avenida}', ";
    $alterar .= "numero = '{$numero}', ";
    $alterar .= "adicional = '{$adicional}', ";
    $alterar .= "brev_apresent = '{$brev_apresent}' ";
    // $alterar .= "upload_file = '{$arquivo}' ";



    $alterar .= "WHERE usuario_instituicaoID = {$usuario_instituicaoID} ";

    $operacao_alterar = mysqli_query($conecta, $alterar);
    if(!$operacao_alterar) {
        die("Erro na alteracao");   
    } else {
        header("location:../EditData/edit.instituition.php");   
    }

}

?>

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
        <div id="">

            <div class="Principal">
                <!----------------------------------------------------------------------------------------->
                <!--<object type="text/html" data="../nav-bar.html"></object>-->
                <div id="Nav-Bar">

                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a href="../IndexProject/Index.html" class="navbar-brand"></a>
                                    <!------------------------------------ Logo abaixo ----------------------------------------------------------->
                                    <a href="../Index/index.php">
                                    <img src="../Images/logo5.png" width=100px height=75px >
                                    </a>
                                <!------------------------------------ Fechando Logo ----------------------------------------------------------->


                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuCelular" aria-controls="menu" aria-expanded="false" aria-label="Menu Colapso">
                                    <span class="navbar-toggler-icon text-black"></span>
                                </button>
                            </div>

                            <div id="menuCelular" class="collapse navbar-collapse">

                                <ul class="navbar-nav ml-auto text-light nav-menu">
                                    <li class="navbar-text"><a class="nav-link text-dark font-weight-bold" href="../afterLogin/instituicao.php">Home</a></li>
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
                                                    <a class="dropdown-item" href="../EditData/upload.imageInstitution.php">Imagens instituição</a>
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



    <span class="d-block p-3 bg-primary text-white">Cadastro Instituição</span>

    <div class="container-fluid">

        <form class="was-validated" action="../EditData/edit.instituition.php" method="post" enctype="multipart/form-data">

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="razao_Social">Razão Social:</label>
                    <input class="form-control" type="text" name="razao_Social" id="razao_Social"
                        value="<?php echo $dataUser_login["razao_Social"] ?>" required minlength="2">
                        <div class="invalid-feedback">
                        Razão Social Obrigatoria!
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nome_Fantasia">Nome Fantasia:</label>
                    <input class="form-control" type="text" name="nome_Fantasia" id="nome_Fantasia"
                        value="<?php echo $dataUser_login["nomeUsuario_nomeFantasia"] ?>" required minlength="2">
                        <div class="invalid-feedback">
                        Nome Fantasia Obrigatorio!
                    </div>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="cnpj">CNPJ:</label>
                    <input class="form-control" type="text" name="cnpj" id="cnpj"
                        value="<?php echo $dataUser_login["cpf_cnpj"] ?>" required minlength="18">
                        <div class="invalid-feedback">
                        CNPJ Obrigatorio!
                    </div>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" name="email" id="email"
                        value="<?php echo $dataUser_login["email"] ?>" required minlength="2">
                        <div class="invalid-feedback">
                        Email Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="senha">Senha:</label>
                    <input class="form-control" type="password" name="senha" id="senha"
                        value="<?php echo $dataUser_login["senha"] ?>" required minlength="4">
                        <div class="invalid-feedback">
                        Senha Obrigatorio!
                    </div>
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
                    <input class="form-control" type="tel" name="telefoneFixo1" id="telefoneFixo1"
                        value="<?php echo $dataUser_login["telefoneFixo"] ?>" required minlength="14">
                        <div class="invalid-feedback">
                        Telefone Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="tel2">Telefone 2:</label>
                    <input class="form-control" type="tel" name="telefoneFixo2" id="telefoneFixo2"
                        value="<?php echo $dataUser_login["telefoneFixo2"] ?>">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cel1">Telefone Celular:</label>
                    <input class="form-control" type="tel" name="telefoneCelular" id="telefoneCelular"
                        value="<?php echo $dataUser_login["telefoneCelular"] ?>" required minlength="15">
                        <div class="invalid-feedback">
                        Telefone Celular Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="wpp">WhatsApp:</label>
                    <input class="form-control" type="tel" name="wpp" id="wpp"
                        value="<?php echo $dataUser_login["wpp"] ?>">
                </div>
            </div>



<!---------------------------------------------------------------------------------------------------------->
<hr>
            <span class="d-block p-2 bg-dark text-white">Endereço</span>
            <br />
            <!---------------------------------------------------------------------------------------------------------->
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="cep">CEP</label>
                    <input class="form-control" type="text" name="cep" id="cep" id="cep" value="<?php echo $dataUser_login["cep"] ?>" required minlength="9">
                    <div class="invalid-feedback">
                        CEP Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="estado">Estado</label>
                    <input class="form-control" type="text" name="estado" id="estado" value="<?php echo $dataUser_login["estado"] ?>" required minlength="4">
                    <div class="invalid-feedback">
                        Estado Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="cidade">Cidade</label>
                    <select class="form-control" name="cidade" id="cidade" required>
                        <option selected><?php echo $dataUser_login["cidade"] ?></option>
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
                    <input class="form-control" type="text" name="bairro" id="bairro" value="<?php echo $dataUser_login["bairro"] ?>" required minlength="3">
                    <div class="invalid-feedback">
                        Bairro Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="rua_avenida">Rua/Avenida</label>
                    <input class="form-control" type="text" name="rua_avenida" id="rua_avenida" value="<?php echo $dataUser_login["rua_avenida"] ?>" required minlength="2">
                    <div class="invalid-feedback">
                        Rua ou Avenida Obrigatorio!
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="numero">Número</label>
                    <input class="form-control" type="number" name="numero" id="numero" value="<?php echo $dataUser_login["numero"] ?>" required minlength="1">
                    <div class="invalid-feedback">
                        Número Obrigatorio!
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="adicional">Adicional</label>
                <input class="form-control" type="text" name="adicional" id="adicional" value="<?php echo $dataUser_login["adicional"] ?>">
            </div>



<!---------------------------------------------------------------------------------------------------------->
<hr>
            <span class="d-block p-2 bg-dark text-white">Descrição Empresa</span>
            <br />
            <!---------------------------------------------------------------------------------------------------------->



            <div class="form-group">
                <label for="exampleFormControlTextarea1">Breve Descrição da Empresa</label>
                <textarea class="form-control" type="text" id="brev_apresent" name="brev_apresent" id="brev_apresent"
                    rows="3"><?php echo $dataUser_login["brev_apresent"] ?></textarea>

            </div>




            <!-----------------------------------------------UPLOADS ARQUIVOS------------------------------------------------->

            <!-- <div class="form-group">
                <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                Enviar esse arquivo: <input name="upload_file" value="imagem" type="file" />
                <img src="../Uploads/<?php echo $dataUser_login["upload_file"] ?>" alt="..." class="img-thumbnail">
                <button type="submit" name="alterar" class="btn btn-info">Alterar</button>


            </div> -->


            <input type="hidden" name="usuario_instituicaoID"
                value="<?php echo $dataUser_login["usuario_instituicaoID"] ?>">
            <button type="submit" name="enviar" class="btn btn-info">Enviar</button>


        </form>
    </div>

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