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
    
 $nivel_necessario = 1;
   
 // Verifica se não há a variável da sessão que identifica o usuário
 if (!isset($_SESSION['usuario_instituicaoID']) OR ($_SESSION['tipo'] <$nivel_necessario)) {
     // Destrói a sessão por segurança
    //  session_destroy();
     // Redireciona o visitante de volta pro login
     header("Location:../Index/Index.php"); exit;
 }
//FIM DO TESTE DE SEGURANÇA
//--------------------------------------------------------------------------//


// session_start();
// if ( !isset($_SESSION["user_portal"] ) ) {
//     header("location:../login.php")
// }
?>
<html>

<head>
    <title>PROJETO TCC</title>
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
                                    <li class="navbar-text"><a class="nav-link text-dark font-weight-bold" href="../Index/Index.php">Home</a></li>
                                    <li class="navbar-text navHistorias"><a class="nav-link text-dark font-weight-bold" href="#historias">Historia</a></li>
                                    <li class="navbar-text nav-instituicoes"><a class="nav-link text-dark font-weight-bold" href="../Institutions/Institutions.php">Instituições</a></li>
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
                                                    <a class="dropdown-item" href="#">Action</a>
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
    <!--Fechando o Div:Nav-Bar-->


    <!----------------------------------------------------------------------------------------->



    <main>
        USuARIO
        <?php
        if (isset($_SESSION["usuario_instituicaoID"])) {
            echo $_SESSION["usuario_instituicaoID"];
        }
        ?>
        TIPO DE USUARIO
        <?php
        if (isset($_SESSION["tipo"])) {
            echo $_SESSION["tipo"];
        }
        ?>
    </main>


    <!----------------------------------------------------------------------------------------->



    </section>





    <!----------------------------------------------------------------------------------------->












    </div>
    <!--Fechando o DivPrincipal-->



    <!----------------------------------------------------------------------------------------->
    <script src="https://unpkg.com/popper.js@1.15.0/dist/umd/popper.min.js"></script>
    <script src="../Bootstrap/js/jquery-3.4.1.min.js "></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="../Bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="Index.js" type="text/javascript"></script>

</body>

</html>