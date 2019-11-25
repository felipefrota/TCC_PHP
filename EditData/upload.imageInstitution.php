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
$array_erro = array(
    UPLOAD_ERR_OK => "Sem erro.",
    UPLOAD_ERR_INI_SIZE => "O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.",
    UPLOAD_ERR_FORM_SIZE => "O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML",
    UPLOAD_ERR_PARTIAL => "O upload do arquivo foi feito parcialmente.",
    UPLOAD_ERR_NO_FILE => "Nenhum arquivo foi enviado.",
    UPLOAD_ERR_NO_TMP_DIR => "Pasta temporária ausente.",
    UPLOAD_ERR_CANT_WRITE => "Falha em escrever o arquivo em disco.",
    UPLOAD_ERR_EXTENSION => "Uma extensão do PHP interrompeu o upload do arquivo."
); 
if( isset($_POST["alterar"]) ) {
    $numero_erro = $_FILES['upload_file']['error'];
    $mensagem =  $array_erro[$numero_erro];

    $arquivo_temporario = $_FILES['upload_file']['tmp_name'];
    $arquivo = basename($_FILES['upload_file']['name']);
    $diretorio = "C:/xampp/htdocs/TCC_PHP/Uploads";
    



    //Upando as imagens
    if(move_uploaded_file($arquivo_temporario, $diretorio."/". $arquivo)) {
        $mensagem = "Arquivo publicado";
    } else {
        $numero_erro = $_FILES['upload_file']['error'];
        $mensagem =  $array_erro[$numero_erro];
    }
    
    
    // echo("<pre>");
    // print_r($_FILES['upload_file']);
    // echo("</pre>");
    // echo $mensagem;

}



//--------------------------------------------------------------------------//

//--------------------------------------------------------------------------//
//Pegando os dados enviados do formulario//
if( isset($_POST["usuario_instituicaoID"]) ) {
    $upload_file =                        $_POST["upload_file"];
    $usuario_instituicaoID                = $_POST["usuario_instituicaoID"];

    //--------------------------------------------------------------------------//

    //--------------------------------------------------------------------------//
    //Alterar
    $alterar = "UPDATE tb_usuario ";
    $alterar .= "SET ";
    $alterar .= "upload_file = '{$arquivo}' ";



    $alterar .= "WHERE usuario_instituicaoID = {$usuario_instituicaoID} ";

    $operacao_alterar = mysqli_query($conecta, $alterar);
    if(!$operacao_alterar) {
        die("Erro na alteracao");   
    } else {
        header("location:../EditData/upload.imageInstitution.php");   
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

                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <div class="container-fluid">
                            <div class="navbar-header ">
                                <a href="../IndexProject/Index.html" class="navbar-brand"></a>
                                <!------------------------------------ Logo abaixo ----------------------------------------------------------->
                                <a href="../afterLogin/instituicao.php">
                                    <img src="../Images/logo6.png" width=100px height=70px>
                                </a>
                                <!------------------------------------ Fechando Logo ----------------------------------------------------------->


                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#menuCelular" aria-controls="menu" aria-expanded="false"
                                    aria-label="Menu Colapso">
                                    <span class="navbar-toggler-icon text-white"></span>
                                </button>
                            </div>

                            <div id="menuCelular" class="collapse navbar-collapse">

                                <ul class="navbar-nav ml-auto text-light nav-menu">
                                    <li class="navbar-text"><a class="nav-link text-white btn-outline-dark"
                                            href="../afterLogin/instituicao.php">Home</a></li>
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
                                            <button class="btn btn-outline-secondary text-white dropdown-toggle"
                                                type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <h8> Bem vindo, <?php echo $nome ?> </h8>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item"
                                                    href="../EditData/edit.instituition.php">Perfil</a>
                                                <a class="dropdown-item"
                                                    href="../EditData/upload.imageInstitution.php">Imagens
                                                    instituição</a>

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
    <br />
    <!----------------------------------------------------------------------------------------->


    <span class="d-block p-3 bg-dark text-warning text-center">Cadastrando Imagem</span>
    <br/>

    <div class="container-fluid">

        <form class="" action="../EditData/upload.imageInstitution.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                Enviar esse arquivo: <input name="upload_file" value="imagem" type="file" />
                <!-- echo '<a href=""><img src="C:/xampp/htdocs/TCC_PHP/Uploads".$upload_file /></a>'; -->


            </div>
            <div class="form-group">
                <!-- <img src="../Uploads/<?php echo $dataUser_login["upload_file"] ?>" alt="..." class="img-thumbnail"> -->
                <img src="../Uploads/<?php echo $dataUser_login["upload_file"] ?>" class="rounded mx-auto d-block"
                    alt="...">

            </div>


            <input type="hidden" name="usuario_instituicaoID"
                value="<?php echo $dataUser_login["usuario_instituicaoID"] ?>">
            <button type="submit" name="alterar" class="btn btn-info">Alterar</button>


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