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
}
?>


<!DOCTYPE HTML>

<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <title>Registrar Prontuário</title>
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=devide-width, initial-scale=1">

    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../_CSS/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="../DataRegister/fields.js" type="text/javascript"></script>

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
                                    <a href="../afterLogin/instituicao.php">
                                    <img src="../Images/logo6.png" width=100px height=75px>
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


    <!----------------------------------------------------------------------------------------->


    <!-------------------------------------------------------------------------------------------------------------->



    <form class="" action="../cadastroProntuario.php" method="post">
        <div class="container-fluid">
            <span class="d-block p-2 bg-dark text-white">Dados Sociodemográficos</span>
            <br />
            <!-- <div class="form-group col-md-4">
                    <label for="senha">Idade</label>
                    <input class="form-control" type="password" name="idade" id="idade" placeholder="idade">
                </div -->
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="estadoCivil">Estado Civil</label>
                    <select class="form-control" name="EstadoCivil" id="EstadoCivil">
                        <option selected>Escolher...</option>
                        <option value="Solteiro">Solteiro</option>
                        <option value="Casado">Casado</option>
                        <option value="Divorciado">Divorciado</option>
                        <option value="Separado">Separado</option>
                        <option value="Viúvo">Viúvo</option>
                        <option value="União consensual">União consensual</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="prole">Filhos(a)</label>
                    <select class="form-control" name="prole" id="prole">
                        <option selected>Escolher...</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05 ou mais">05 ou mais</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="Escolaridade">Escolaridade</label>
                    <select class="form-control" name="escolaridade" id="escolaridade">
                        <option selected>Escolher...</option>
                        <option value="Nunca estudou">Nunca estudou</option>
                        <option value="Fundamental incompleto">Fundamental incompleto</option>
                        <option value="Médio incompleto">Médio incompleto</option>
                        <option value="Médio completo">Médio completo</option>
                        <option value="Superior incompleto">Superior incompleto</option>
                        <option value="Superior completo">Superior completo</option>
                        <option value="Curso técnico incompleto">Curso técnico incompleto</option>
                        <option value="Curso técnico completo">Curso técnico completo</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="profissao">Profissão</label>
                    <select class="form-control" name="profissao" id="profissao">
                        <option selected>Escolher...</option>
                        <option value="Empregado">Empregado</option>
                        <option value="Desempregado">Desempregado</option>
                        <option value="Outros">Outros</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="renda">Renda</label>
                    <select class="form-control" name="renda" id="renda">
                        <option selected>Escolher...</option>
                        <option value="≤ 1 salário mínimo">≤ 1 salário mínimo</option>
                        <option value="> 1 e ≤ 2 salários mínimos">> 1 e ≤ 2 salários mínimos</option>
                        <option value="> 2 e ≤ 3 salários mínimos">> 2 e ≤ 3 salários mínimos</option>
                        <option value="3 salários mínimos">> 3 salários mínimos</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="responsavel">Responsável pelo Sustento da Família</label>
                    <select class="form-control" name="responsavel" id="responsavel">
                        <option selected>Escolher...</option>
                        <option value="O próprio">O próprio</option>
                        <option value="Pai">Pai</option>
                        <option value="Mãe">Mãe</option>
                        <option value="Cônjuge">Cônjuge</option>
                        <option value="Irmão(ã)">Irmão(ã)</option>
                        <option value="Filho(a)">Filho(a)</option>
                        <option value="Avô(ó)">Avô(ó)</option>
                        <option value="Outros">Outros</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="religiao">Religião</label>
                    <select class="form-control" name="religiao" id="religiao">
                        <option selected>Escolher...</option>
                        <option value="Católico">Católico</option>
                        <option value="Evangélico">Evangélico</option>
                        <option value="Espírita">Espírita</option>
                        <option value="Ateu">Ateu</option>
                        <option value="Outras">Outros</option>
                    </select>
                </div>
            </div>
            <br /><br />


            <span class="d-block p-2 bg-dark text-white">Histórico Familiar de Dependência Química</span>
            <br />


            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="pai">Pai</label>
                    <select class="form-control" name="pai" id="pai">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="mae">Mãe</label>
                    <select class="form-control" name="mae" id="mae">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="irmao">Irmão(a)</label>
                    <select class="form-control" name="irmao" id="irmao">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="avo">Avô(ó)</label>
                    <select class="form-control" name="avo" id="avo">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="filho">Filho(a)</label>
                    <select class="form-control" name="filho" id="filho">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="outros">Outros</label>
                    <select class="form-control" name="outros" id="outros">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
            </div></br></br>
            <span class="d-block p-2 bg-dark text-white">Comorbidades Clínicas Principais</span>
            <br />


            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="hipertensao">Hipertensão Arterial Sistêmica</label>
                    <select class="form-control" name="hipertensao" id="hipertensao">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="diabetes">Diabetes Mlellitus</label>
                    <select class="form-control" name="diabetes" id="diabetes">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="dislipidemia">Dislipidemia</label>
                    <select class="form-control" name="dislipidemia" id="dislipidemia">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="cirrose">Cirrose Hepática</label>
                    <select class="form-control" name="cirrose" id="cirrose">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="pulmonar">Doença Pulmonar Obstrutiva Crônica</label>
                    <select class="form-control" name="pulmonar" id="pulmonar">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="asma">Asma</label>
                    <select class="form-control" name="asma" id="asma">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="anemia">Anemia</label>
                    <select class="form-control" name="anemia" id="anemia">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="hiv">HIV</label>
                    <select class="form-control" name="hiv" id="hiv">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="hepatite">Hepatite B ou C</label>
                    <select class="form-control" name="hepatite" id="hepatite">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
            </div></br></br>

            <span class="d-block p-2 bg-dark text-white">Substâncias Psicoativas – Dependência Química (atual ou prévia)</span>
            <br />


            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="tabaco">Tabaco</label>
                    <select class="form-control" name="tabaco" id="tabaco">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="alcool">Álcool</label>
                    <select class="form-control" name="alcool" id="alcool">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="cocaina">Cocaína</label>
                    <select class="form-control" name="cocaina" id="cocaina">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="crack">Crack</label>
                    <select class="form-control" name="crack" id="crack">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="maconha">Maconha</label>
                    <select class="form-control" name="maconha" id="maconha">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inalantes">Inalantes</label>
                    <select class="form-control" name="inalantes" id="inalantes">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="alucinogenos">Alucinógenos</label>
                    <select class="form-control" name="alucinogenos" id="alucinogenos">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="anfetaminas">Anfetaminas</label>
                    <select class="form-control" name="anfetaminas" id="anfetaminas">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="benzodiazepinicos">Benzodiazepínicos</label>
                    <select class="form-control" name="benzodiazepinicos" id="benzodiazepinicos">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="opioides">Opioides</label>
                    <select class="form-control" name="opioides" id="opioides">
                        <option selected>Escolher...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
            </div></br></br>

            <span class="d-block p-2 bg-dark text-white">Diagnóstico</span>
            <br />

            <div class="form-group">
                <label for="diagnostico"></label>
                <textarea class="form-control" name="diagnostico" id="diagnostico" rows="10" placeholder="Digite aqui o diagnóstico do paciente"></textarea>
            </div>
            </br></br>


            <span class="d-block p-2 bg-dark text-white">Receituário</span>
            <br />

            <div class="form-group">
                <label for="receituario"></label>
                <textarea class="form-control" name="receituario" id="receituario" rows="10" placeholder="Digite aqui o receituário do paciente"></textarea>
            </div>
        </div></br></br>

        </div>
        <button type="submit" class="btn btn-info" >Enviar</button>
</body>

</html>