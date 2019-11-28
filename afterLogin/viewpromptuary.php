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

                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                            <div class="container-fluid">
                                <div class="navbar-header ">
                                    <a href="../IndexProject/Index.html" class="navbar-brand"></a>
                                    <!------------------------------------ Logo abaixo ----------------------------------------------------------->
                                   
                                    <a class="navbar-brand js-scroll-trigger text-warning cssLogo" href="../afterLogin/instituicao.php">Novel Life</a>

                                    <!------------------------------------ Fechando Logo ----------------------------------------------------------->


                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuCelular" aria-controls="menu" aria-expanded="false" aria-label="Menu Colapso">
                                        <span class="navbar-toggler-icon text-white"></span>
                                    </button>
                                </div>

                                <div id="menuCelular" class="collapse navbar-collapse">

                                    <ul class="navbar-nav ml-auto text-light nav-menu">
                                        <li class="navbar-text"><a class="nav-link text-white btn-outline-dark" href="../afterLogin/instituicao.php">HOME</a></li>
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
                                                    <button class="btn btn-outline-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <h8> Bem vindo, <?php echo $nome ?> </h8>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="../EditData/edit.instituition.php">PERFIL</a>
                                                        <a class="dropdown-item" href="../EditData/upload.imageInstitution.php">IMAGENS INSTITUIÇÃO</a>

                                                        <a class="dropdown-item" href="../sair.php">SAIR</a>
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
    </body>

    </html>

    <?php

    // if ( isset($_GET["codigo"]) ) {
    //     $id_usuario = $_GET["codigo"];
    //  } else { 
    //      header ("location: instituicao.php");
    //  }




    //consultar no banco de dados tabela socio
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

    //consultar no banco de dados tabela dependencia
    $result_dependencia = "SELECT * ";
    $result_dependencia .= "FROM tb_prontuario_historico_familiar ";
    $result_dependencia .= "where id_usuario= '$id_usuario_cadastro ' ";
    $resultado_dependencia  = mysqli_query($conecta, $result_dependencia);

    // testar erro
    if (!$resultado_dependencia) {
        die("Falha no banco de dados");
    } else {
        $dados_dependencia = mysqli_fetch_assoc($resultado_dependencia);
        $id_prontuario_historico_familiar  = $dados_dependencia["id_prontuario_historico_familiar"];
        $pai                               = $dados_dependencia["pai"];
        $mae                               = $dados_dependencia["mae"];
        $irmao                             = $dados_dependencia["irmao"];
        $avo                               = $dados_dependencia["avo"];
        $filho                             = $dados_dependencia["filho"];
        $outros                            = $dados_dependencia["outros"];
        $id_usuario                        = $dados_dependencia["id_usuario"];
    }

    //consultar no banco de dados tabela comorbidades
    $result_comorbidades = "SELECT * ";
    $result_comorbidades .= "FROM tb_prontuario_comorbidades_principais ";
    $result_comorbidades .= "where id_usuario= '$id_usuario_cadastro ' ";
    $resultado_comorbidades  = mysqli_query($conecta, $result_comorbidades);

    // testar erro
    if (!$resultado_comorbidades) {
        die("Falha no banco de dados");
    } else {
        $dados_comorbidades = mysqli_fetch_assoc($resultado_comorbidades);
        $id_prontuario_comorbidades_principais  = $dados_comorbidades["id_prontuario_comorbidades_principais"];
        $hiper                                  = $dados_comorbidades["hipertensao_arterial_sistemica"];
        $diabetes                               = $dados_comorbidades["diabetes_mellitus"];
        $dislipidemia                           = $dados_comorbidades["dislipidemia"];
        $cirrose                                = $dados_comorbidades["cirrose_hepatica"];
        $pulmonar                               = $dados_comorbidades["doenca_pulmonar"];
        $asma                                   = $dados_comorbidades["asma"];
        $anemia                                 = $dados_comorbidades["anemia"];
        $hiv                                    = $dados_comorbidades["hiv"];
        $hepatite                               = $dados_comorbidades["hepatite_bc"];
        $id_usuario                             = $dados_comorbidades["id_usuario"];
    }

    //consultar no banco de dados tabela substancias
    $result_substancias = "SELECT * ";
    $result_substancias .= "FROM tb_prontuario_substancias_psicoativas ";
    $result_substancias .= "where id_usuario= '$id_usuario_cadastro ' ";
    $resultado_substancias  = mysqli_query($conecta, $result_substancias);

    // testar erro
    if (!$resultado_substancias) {
        die("Falha no banco de dados");
    } else {
        $dados_substancias = mysqli_fetch_assoc($resultado_substancias);
        $id_prontuario_substancias_psicoativas  = $dados_substancias["id_prontuario_substancias_psicoativas"];
        $tabaco                                 = $dados_substancias["tabaco"];
        $alcool                                 = $dados_substancias["alcool"];
        $cocaina                                = $dados_substancias["cocaina"];
        $crack                                  = $dados_substancias["crack"];
        $maconha                                = $dados_substancias["maconha"];
        $inalantes                              = $dados_substancias["inalantes"];
        $alucinogenos                           = $dados_substancias["alucinogenos"];
        $anfetaminas                            = $dados_substancias["anfetaminas"];
        $benzodiazepinicos                      = $dados_substancias["benzodiazepinicos"];
        $opioides                               = $dados_substancias["opioides"];
        $id_usuario                             = $dados_substancias["id_usuario"];
    }

    //consultar no banco de dados tabela diagnóstico e receituário
    $result_diagnostico = "SELECT * ";
    $result_diagnostico .= "FROM tb_prontuario_diagnostico_receituario ";
    $result_diagnostico .= "where id_usuario= '$id_usuario_cadastro ' ";
    $resultado_diagnostico  = mysqli_query($conecta, $result_diagnostico);

    // testar erro
    if (!$resultado_diagnostico) {
        die("Falha no banco de dados");
    } else {
        $dados_diagnostico = mysqli_fetch_assoc($resultado_diagnostico);
        $id_prontuario_diagnostico_receituario  = $dados_diagnostico["id_prontuario_diagnostico_receituario"];
        $diagnostico                                 = $dados_diagnostico["diagnostico"];
        $receituario                                 = $dados_diagnostico["receituario"];
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
            <!----------------------------------------------------------------------------------------->
            <span class="d-block p-3 bg-dark text-warning text-center">Dados Sociodemográficos</span>
            <br />
            <!----------------------------------------------------------------------------------------->

            <div class="row">

                <div class="col-md-12">
                    <p><strong>Estado Civil: </strong> <?php echo $estado_civil ?></p>
                </div>

                <div class="col-md-12">
                    <p><strong>Prole: </strong> <?php echo $prole ?></p>
                </div>

                <div class="col-md-12">
                    <p><strong>Escolaridade: </strong><?php echo $escolaridade ?></p>
                </div>

                <div class="col-md-12">
                    <p><strong>Responsável Pelo Sustento da Família: </strong> <?php echo $responsavel_sustento_familia ?></p>
                </div>

                <div class="col-md-12">
                    <p><strong>Religião: </strong><?php echo $religiao ?></p>
                </div>
            </div></br></br>

            <!----------------------------------------------------------------------------------------->
            <div id="main" class="container-fluid">
                <span class="d-block p-3 bg-dark text-warning text-center">Histórico Familiar de Dependência Química</span>
                <br />
                <!----------------------------------------------------------------------------------------->

                <div class="row">

                    <div class="col-md-12">
                        <p><strong>Pai: </strong><?php echo $pai ?></p>

                    </div>


                    <div class="col-md-12">
                        <p><strong>Mãe: </strong><?php echo $mae ?></p>

                    </div>

                    <div class="col-md-12">
                        <p><strong>Irmão: </strong><?php echo $irmao ?></p>

                    </div>

                    <div class="col-md-12">
                        <p><strong>Avô(ó): </strong><?php echo $avo ?></p>

                    </div>
                </div></br></br>

                <div id="main" class="container-fluid">
                    <!----------------------------------------------------------------------------------------->
                    <span class="d-block p-3 bg-dark text-warning text-center">Comorbidades Clínicas Principais</span>
                    <br />
                    <!----------------------------------------------------------------------------------------->

                    <div class="row">

                        <div class="col-md-12">
                            <p><strong>Hipertensão Arterial Sistêmica: </strong><?php echo $hiper ?></p>

                        </div>

                        <div class="col-md-12">
                            <p><strong>Diabetes Mlellitus: </strong><?php echo $diabetes ?></p>

                        </div>

                        <div class="col-md-12">
                            <p><strong>Dislipidemia: </strong><?php echo $dislipidemia ?></p>

                        </div>

                        <div class="col-md-12">
                            <p><strong>Cirrose Hepática: </strong><?php echo $cirrose ?></p>

                        </div>

                        <div class="col-md-12">
                            <p><strong>Doença Pulmonar Obstrutiva Crônica: </strong><?php echo $pulmonar ?></p>

                        </div>

                        <div class="col-md-12">
                            <p><strong>Asma: </strong><?php echo $asma ?></p>

                        </div>

                        <div class="col-md-12">
                            <p><strong>Anemia: </strong><?php echo $anemia ?></p>

                        </div>

                        <div class="col-md-12">
                            <p><strong>HIV: </strong><?php echo $hiv ?></p>

                        </div>

                        <div class="col-md-12">
                            <p><strong>Hepatite B ou C: </strong><?php echo $hepatite ?></p>

                        </div>
                    </div></br></br>

                    <div id="main" class="container-fluid">
                        <!----------------------------------------------------------------------------------------->
                        <span class="d-block p-3 bg-dark text-warning text-center">Substâncias Psicoativas – Dependência Química (atual ou prévia)</span>
                        <br />
                        <!----------------------------------------------------------------------------------------->

                        <div class="row">

                            <div class="col-md-12">
                                <p><strong>Tabaco: </strong><?php echo $tabaco ?></p>

                            </div>

                            <div class="col-md-12">
                                <p><strong>Álcool: </strong><?php echo $alcool ?></p>

                            </div>

                            <div class="col-md-12">
                                <p><strong>Cocaína: </strong><?php echo $cocaina ?></p>

                            </div>

                            <div class="col-md-12">
                                <p><strong>Crack: </strong><?php echo $crack ?></p>

                            </div>

                            <div class="col-md-12">
                                <p><strong>Maconha: </strong><?php echo $maconha ?></p>

                            </div>

                            <div class="col-md-12">
                                <p><strong>Inalantes: </strong><?php echo $inalantes ?></p>

                            </div>

                            <div class="col-md-12">
                                <p><strong>Alucinógenos: </strong><?php echo $alucinogenos ?></p>

                            </div>

                            <div class="col-md-12">
                                <p><strong>Anfetaminas: </strong><?php echo $anfetaminas ?></p>

                            </div>

                            <div class="col-md-12">
                                <p><strong>Benzodiazpínicos: </strong><?php echo $benzodiazepinicos ?></p>

                            </div>

                            <div class="col-md-12">
                                <p><strong>Opioides: </strong><?php echo $opioides ?></p>

                            </div>
                        </div></br></br>

                        <div id="main" class="container-fluid">
                            <!----------------------------------------------------------------------------------------->
                            <span class="d-block p-3 bg-dark text-warning text-center">Diagnóstico</span>
                            <br />
                            <!----------------------------------------------------------------------------------------->
                            <p><strong> </strong><?php echo $diagnostico ?></p>


                        </div></br></br>

                        <div id="main" class="container-fluid">
                            <!----------------------------------------------------------------------------------------->
                            <span class="d-block p-3 bg-dark text-warning text-center">Receituário</span>
                            <br />
                            <!----------------------------------------------------------------------------------------->
                            <p><strong> </strong><?php echo $receituario ?></p>

                            <hr />
                            <div id="actions" class="row">
                                <div class="col-md-12">
                                    <a href="..\EditData\edit.promptuary.php" class="btn btn-dark text-warning">Editar</a>
                                    <a href="instituicao.php" class="btn btn-dark text-danger">Fechar</a>
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