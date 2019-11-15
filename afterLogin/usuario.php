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
        <div id="Principal">

            <div class="background00">
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
                                    <li class="navbar-text"><a class="nav-link text-dark font-weight-bold" href="../afterLogin/usuario.php">Home</a></li>
                                    <li class="navbar-text navHistorias"><a class="nav-link text-dark font-weight-bold" href="#historias">Historia</a></li>
                                    <li class="navbar-text nav-instituicoes"><a class="nav-link text-dark font-weight-bold" href="../afterLogin/usuario_instituicao.php">Instituições</a></li>
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
                                                    <a class="dropdown-item" href="../EditData/edit.people.php">Perfil</a>
                                                    <a class="dropdown-item" href="../list_Instituition/list.institution.php">Empresa Cadastrada</a>
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

        <section class="background2">

<div class="container-fluid">
    <div id="historias">
        <h1 class="text-center">Inicio da Historia</h1>
        <p class="text-center">Proin quis sapien id mi fringilla pharetra. Nullam vitae sapien sit amet risus
            elementum vehicula ac sed felis. Nullam molestie lobortis magna ac finibus. Aenean consequat
            sagittis tempor. Morbi mollis nibh et turpis tincidunt, nec aliquam
            sem tempor. Phasellus mattis ligula ac urna mollis, in porttitor justo faucibus. In efficitur vitae
            metus tristique varius. Praesent id arcu auctor, ornare odio eget, aliquet urna. Nam a ornare dui.
        </p>

        <p class="text-center"> Pellentesque rutrum vulputate risus, in placerat ex facilisis vitae. Quisque
            hendrerit rutrum lorem, vitae venenatis velit porta non. Suspendisse at urna dapibus, volutpat risus
            at, lobortis ex. Morbi et nisl eget arcu ultrices rutrum.
            Praesent et enim et orci euismod mattis. Mauris rhoncus, sem sit amet porttitor condimentum, metus
            ex laoreet lorem, ac blandit nisi libero a diam. Aliquam erat volutpat. Mauris faucibus lorem eu
            imperdiet porta. Etiam vitae egestas
            nisl. Curabitur ac erat nunc. Morbi dictum blandit felis, a feugiat ligula luctus eget. Sed pharetra
            fringilla placerat. In facilisis auctor risus. Nulla vel lectus sapien. Pellentesque vel mauris
            libero. Mauris placerat dictum diam
            sed tincidunt.</p>

        <p class="text-center"> Fusce ac libero non justo volutpat venenatis in non elit. Cras fermentum
            ultricies rhoncus. Aliquam nec nisl ut erat congue faucibus et at ex. Nunc rhoncus nisi leo, in
            sagittis tellus ullamcorper id. Sed sit amet massa lacinia, euismod
            nulla in, gravida leo. Etiam cursus porta felis ut tempus. Phasellus tincidunt finibus nulla et
            laoreet. Nunc est ex, pretium at odio sit amet, euismod volutpat ex. Vestibulum et justo at libero
            imperdiet gravida. Fusce sed egestas
            enim. Pellentesque euismod, sapien eget pellentesque ornare, sem sem blandit neque, vel consequat
            dolor mauris in diam. Etiam accumsan id nisl ut dignissim. Nullam ac vulputate sem. Etiam et nunc
            pharetra dui viverra venenatis in ac
            dolor. Sed maximus urna a volutpat egestas. Vivamus in interdum nisi.</p>

        <p class="text-center"> Etiam non scelerisque neque. Donec tincidunt sollicitudin neque, et fermentum
            orci imperdiet a. Praesent sagittis ultricies elit eu consectetur. Nam non molestie ligula. Aenean
            ornare feugiat leo, ut porta ante volutpat sed. Fusce porttitor
            bibendum justo nec suscipit. Donec mattis tristique nulla sed viverra. Suspendisse id turpis a nunc
            sodales faucibus. Proin eu ligula feugiat, malesuada velit vitae, tempus lacus. Nulla finibus
            volutpat urna, et egestas mi egestas
            eget. Phasellus urna ligula, finibus vitae lacinia quis, cursus ac nunc.</p>

        <p class="text-center"> Cras a fermentum massa. Pellentesque suscipit ut mauris at ultrices. Nulla
            malesuada eget leo ac condimentum. Maecenas ultrices neque nibh, at dictum libero pulvinar at.
            Praesent euismod sagittis neque, eget eleifend nisl accumsan a. Suspendisse
            euismod tristique lorem, ac dictum urna mattis id. Sed nec lectus dui.</p>
    </div>
</div>


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