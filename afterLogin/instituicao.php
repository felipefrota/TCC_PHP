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
<<<<<<< HEAD
}

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
$instituicoes .= "WHERE tipo = $user ";
$lista_instituicoes = mysqli_query($conecta, $instituicoes);
if(!$lista_instituicoes) {
    die("erro no banco ao procurar instituções");
=======
>>>>>>> 0935313b07e1598c4cc610a6cff897f12d55bf0d
}
?>


<!DOCTYPE HTML>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Alguma Coisa Lfie</title>
<<<<<<< HEAD
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
=======
>>>>>>> 0935313b07e1598c4cc610a6cff897f12d55bf0d
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=devide-width, initial-scale=1">

    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../_CSS/styles.css" rel="stylesheet">
<<<<<<< HEAD

=======
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
>>>>>>> 0935313b07e1598c4cc610a6cff897f12d55bf0d
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
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
<<<<<<< HEAD
                                    <img class="logo "src="../Images/logo.png">
=======
                                    <img src="../Images/logo.png">
>>>>>>> 0935313b07e1598c4cc610a6cff897f12d55bf0d
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
<<<<<<< HEAD
=======
                                    <li class="navbar-text nav-instituicoes"><a class="nav-link text-dark font-weight-bold" href="../afterLogin/instituicao_instituicoes.php">Instituições</a></li>
>>>>>>> 0935313b07e1598c4cc610a6cff897f12d55bf0d
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

    <span id="conteudo"></span>
    </div>

    <script>
        $(document).ready(function() {
            $.post('listar_usuario_interessados.php', function(retorna) {
                //Subtitui o valor no seletor id="conteudo"
                $("#conteudo").html(retorna);
            });
        });
    </script>


<<<<<<< HEAD
    <!----------------------------------------------------------------------------------------->
    <script src="https://unpkg.com/popper.js@1.15.0/dist/umd/popper.min.js"></script>
    <script src="../Bootstrap/js/jquery-3.4.1.min.js "></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="../Bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="Index.js" type="text/javascript"></script>

  
=======
      <!----------------------------------------------------------------------------------------->
      <script src="https://unpkg.com/popper.js@1.15.0/dist/umd/popper.min.js"></script>
    <script src="../Bootstrap/js/jquery-3.4.1.min.js "></script>
    <!-- <script src="../Bootstrap/js/bootstrap.min.js"></script> -->
    <script src="../Bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="Index.js" type="text/javascript"></script>
>>>>>>> 0935313b07e1598c4cc610a6cff897f12d55bf0d
</body>

</html>