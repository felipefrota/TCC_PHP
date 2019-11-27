<?php require_once("conexao/conexao.php") ?>
<?php
//--------------------------------------------------------------------------//
//TESTE DE SEGURANÇA
session_start();
$id_usuario_cadastro = $_SESSION['nao_registrado'];
echo $id_usuario_cadastro;
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
//    $escol = $_GET["codigo"];
// } else { 
//     header ("location: instituicao.php");
// }

?>
<?php
if (isset($_POST["escolaridade"])) {
    print_r($_POST);
     // recuperando dados sociodemográficos
    $EstadoCivil =   $_POST["EstadoCivil"];
    $Prole   =       $_POST["prole"];
    $escolaridade =  $_POST["escolaridade"];
    $profissao =     $_POST["profissao"];
    $renda =         $_POST["renda"];
    $responsavel =   $_POST["responsavel"];
    $religiao =      $_POST["religiao"];

    // recuperando histórico familiar de dependência química
    $pai =           $_POST["pai"];
    $mae =           $_POST["mae"];
    $irmao =         $_POST["irmao"];
    $avo =           $_POST["avo"];
    $filho =         $_POST["filho"];
    $outros =        $_POST["outros"];

    // recuperando dados comorbidades principais
    $hipertensao =    $_POST["hipertensao"];
    $diabetes =       $_POST["diabetes"];
    $dislipidemia =   $_POST["dislipidemia"];
    $cirrose =        $_POST["cirrose"];
    $pulmonar =       $_POST["pulmonar"];
    $asma =           $_POST["asma"];
    $anemia =         $_POST["anemia"];
    $hiv =            $_POST["hiv"];
    $hepatite =       $_POST["hepatite"];

    // recuperando dados substâncias psicoativas
    $tabaco =             $_POST["tabaco"];
    $alcool =             $_POST["alcool"];
    $cocaina =            $_POST["cocaina"];
    $crack =              $_POST["crack"];
    $maconha =            $_POST["maconha"];
    $inalantes =          $_POST["inalantes"];
    $alucinogenos =       $_POST["alucinogenos"];
    $anfetaminas =        $_POST["anfetaminas"];
    $benzodiazepinicos =  $_POST["benzodiazepinicos"];
    $opioides =           $_POST["opioides"];

     // recuperando dados diagnóstico e receituário
     $diagnostico =         $_POST["diagnostico"];
     $receituario =         $_POST["receituario"];

// consuta inserção de dados na tabela sociodemográficos
    $inserir = "INSERT INTO tb_prontuario_sociodemograficos ";
    $inserir .= "(estado_civil, prole, escolaridade, profissao, responsavel_sustento_familia, renda, religiao, id_usuario) ";
    $inserir .= "VALUES ";
    $inserir .= "('$EstadoCivil', '$Prole', '$escolaridade', '$profissao', '$responsavel', '$renda', '$religiao', $id_usuario_cadastro ) ";

    $operacao_inserir = mysqli_query($conecta, $inserir);
    if ($operacao_inserir) {
        $_SESSION['registrado'] = $id_usuario_cadastro;
       
    }
     // consuta inserção de dados na tabela histórico familiar e dependência quimica
     $inserirhistorico = "INSERT INTO tb_prontuario_historico_familiar ";
     $inserirhistorico .= "(pai, mae, irmao, avo, filho, outros, id_usuario) ";
     $inserirhistorico .= "VALUES ";
     $inserirhistorico .= "('$pai', '$mae', '$irmao', '$avo', '$filho', '$outros', $id_usuario_cadastro ) ";

     $operacao_inserir = mysqli_query($conecta, $inserirhistorico);
     if ($operacao_inserir) {
         $_SESSION['registrado'] = $id_usuario_cadastro;
     }

     // consuta inserção de dados na tabela comorbidades clínicas principais
    $inserircomorbidades = "INSERT INTO tb_prontuario_comorbidades_principais ";
    $inserircomorbidades .= "(hipertensao_arterial_sistemica, diabetes_mellitus, dislipidemia, cirrose_hepatica, doenca_pulmonar, asma, anemia, hiv, hepatite_bc, id_usuario) ";
    $inserircomorbidades .= "VALUES ";
    $inserircomorbidades .= "('$hipertensao', '$diabetes', '$dislipidemia', '$cirrose', '$pulmonar', '$asma', '$anemia', '$hiv', '$hepatite', $id_usuario_cadastro ) ";

    $operacao_inserir = mysqli_query($conecta, $inserircomorbidades);
    if ($operacao_inserir) {
        $_SESSION['registrado'] = $id_usuario_cadastro;
       
    }

// consuta inserção de dados na tabela substâncias psicotivas
    $inserirsubstancias = "INSERT INTO tb_prontuario_substancias_psicoativas ";
    $inserirsubstancias .= "(tabaco, alcool, cocaina, crack, maconha, inalantes, alucinogenos, anfetaminas, benzodiazepinicos, opioides, id_usuario) ";
    $inserirsubstancias .= "VALUES ";
    $inserirsubstancias .= "('$tabaco', '$alcool', '$cocaina', '$crack', '$maconha', '$inalantes', '$alucinogenos', '$anfetaminas', '$benzodiazepinicos', '$opioides', $id_usuario_cadastro ) ";

    $operacao_inserir = mysqli_query($conecta, $inserirsubstancias);
    if ($operacao_inserir) {
        $_SESSION['registrado'] = $id_usuario_cadastro;
       
    }

    // consuta inserção de dados na tabela diagnóstico e receituário
    $inserirdiagnostico = "INSERT INTO tb_prontuario_diagnostico_receituario ";
    $inserirdiagnostico .= "(diagnostico, receituario, id_usuario) ";
    $inserirdiagnostico .= "VALUES ";
    $inserirdiagnostico .= "('$diagnostico', '$receituario', $id_usuario_cadastro ) ";

    $operacao_inserir = mysqli_query($conecta, $inserirdiagnostico);
    if ($operacao_inserir) {
        $_SESSION['registrado'] = $id_usuario_cadastro;
       
    }

         header("Location:../TCC_PHP/afterLogin/viewpromptuary.php");
         die("ERRO NO BANCO");
}
