<?php require_once("../conexao/conexao.php"); ?>

<?php
//--------------------------------------------------------------------------//
//TESTE DE SEGURANÇA
session_start();
$id_usuario_cadastro = $_SESSION['registrado'];
// echo $id_usuario_cadastro;
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
// Verificando se o "código" não está vazio
// if ( isset($_GET["codigo"]) ) {
//    $id_usuario_cadastro = $_GET["codigo"];
// } else { 
//     header ("location: instituicao.php");
// }

?>
<html>

<body>
    <!DOCTYPE HTML>

    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <title>Alguma Coisa Lfie</title>
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=devide-width, initial-scale=1">

        <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../_CSS/styles.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

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
    </body>

    </html>

    <?php

    // if ( isset($_GET["codigo"]) ) {
    //     $id_usuario = $_GET["codigo"];
    //  } else { 
    //      header ("location: instituicao.php");
    //  }




    //consultar no banco de dados 
    $result_usuario = "SELECT * ";
    $result_usuario .= "FROM tb_prontuario_sociodemograficos ";
    $result_usuario .= "where id_usuario= '$id_usuario_cadastro ' ";
    $resultado_usuario  = mysqli_query($conecta, $result_usuario);

    // testar erro
    if (!$resultado_usuario) {
        die("Falha no banco de dados");
    } else {
        $dados_detalhes = mysqli_fetch_assoc($resultado_usuario);
        $id_prontuario_sociodemograficos  = $dados_detalhes["id_prontuario_sociodemograficos"];
        $idade                            = $dados_detalhes["idade"];
        $estado_civil                     = $dados_detalhes["estado_civil"];
        $prole                            = $dados_detalhes["prole"];
        $escolaridade                     = $dados_detalhes["escolaridade"];
        $responsavel_sustento_familia     = $dados_detalhes["responsavel_sustento_familia"];
        $religiao                         = $dados_detalhes["religiao"];
        $id_usuario                       = $dados_detalhes["id_usuario"];
    }
 ?>



    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Visualizar Prontuário</title>

        <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../_CSS/styles.css" rel="stylesheet">
    </head>

    <body>

        <div id="main" class="container-fluid">
            <h3 class="page-header">Prontuário</h3>

            <div class="row">
                <!-- <div class="col-md-4">
                    <p><strong>Idade</strong></p>
                    <p><?php echo $idade ?></p>
                </div> -->

                <div class="col-md-4">
                    <p><strong>Estado Civil</strong></p>
                    <p><?php echo $estado_civil ?></p>
                </div>

                <div class="col-md-4">
                    <p><strong>Prole</strong></p>
                    <p><?php echo $prole ?></p>
                </div>

                <div class="col-md-4">
                    <p><strong>Escolaridade</strong></p>
                    <p><?php echo $escolaridade ?></p>
                </div>

                <div class="col-md-4">
                    <p><strong>Responsável Pelo Sustento da Família</strong></p>
                    <p><?php echo $responsavel_sustento_familia ?></p>
                </div>

                <div class="col-md-4">
                    <p><strong>Religião</strong></p>
                    <p><?php echo $religiao ?></p>
                </div>
                
            </div>

            <hr/>
            <div id="actions" class="row">
                <div class="col-md-12">
                    <a href=".php" class="btn btn-primary">Editar</a>
                    <a href="instituicao.php" class="btn btn-default">Fechar</a>
                </div>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

            <!-- Latest compiled and minified JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>

    </html>