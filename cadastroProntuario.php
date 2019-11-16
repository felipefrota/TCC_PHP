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
    $EstadoCivil =   $_POST["EstadoCivil"];
    $Prole   =       $_POST["prole"];
    $escolaridade =  $_POST["escolaridade"];
    $profissao =     $_POST["profissao"];
    $renda =         $_POST["renda"];
    $responsavel =   $_POST["responsavel"];
    $religiao =      $_POST["religiao"];
  

    // $cep =                                $_POST["cep"];
    // $estado =                             $_POST["estado"];
    // $cidade =                             $_POST["cidade"];
    // $bairro =                             $_POST["bairro"];
    // $rua_avenida =                        $_POST["rua_avenida"];
    // $numero =                             $_POST["numero"];
    // $adicional =                          $_POST["adicional"];

    // $motivoInternacao =                   $_POST["motivoInternacao"];
    // $motiv_Adicional =                    $_POST["motiv_Adicional"];
    // $remed =                              $_POST["remed"];
    // $alergRemedio =                       $_POST["alergRemedio"];
    // $sintom =                             $_POST["sintom"];
    // $doenc_Cronic =                       $_POST["doenc_Cronic"];

    // $instit =                             $_POST["instit"];
    // $levar_Inst =                         $_POST["levar_Inst"];
    // $obs_Inst =                           $_POST["obs_Inst"];
    // $obs_Intolerancia =                   $_POST["obs_Intolerancia"];

    $inserir = "INSERT INTO tb_prontuario_sociodemograficos ";
    $inserir .= "(estado_civil, prole, escolaridade, profissao, responsavel_sustento_familia, renda, religiao, id_usuario) ";
    $inserir .= "VALUES ";
    $inserir .= "('$EstadoCivil', '$Prole', '$escolaridade', '$profissao', '$responsavel', '$renda', '$religiao', $id_usuario_cadastro ) ";

    // $inserir = "INSERT INTO tb_usuario ";
    // $inserir .= "(nomeUsuario_nomeFantasia, sobrenome, senha, email, cpf_cnpj, dataNascimento, sexo, estadoCivil, telefoneCelular, telefoneFixo, cep, estado, cidade, bairro, rua_avenida, numero, adicional, motivoInternacao, motiv_Adicional, remed, alergRemedio, sintom, doenc_Cronic, instit, levar_Inst, obs_Inst, obs_Intolerancia, tipo) "; 
    // $inserir .= "VALUES ";
    // $inserir .= "('$nomeUsuario_nomeFantasia','$sobrenome' ,'$senha', '$email', '$cpf_cnpj', '$dataNascimento', '$sexo', '$estadoCivil', '$telefoneCelular', '$telefoneFixo', '$cep', '$estado', '$cidade', '$bairro', '$rua_avenida', '$numero', '$adicional', '$motivoInternacao', '$motiv_Adicional', '$remed', '$alergRemedio', '$sintom', '$doenc_Cronic', '$instit', '$levar_Inst', '$obs_Inst', '$obs_Intolerancia', '1') ";
    // // var_dump($inserir);exit;
    $operacao_inserir = mysqli_query($conecta, $inserir);
    if ($operacao_inserir) {
        $_SESSION['registrado'] = $id_usuario_cadastro;
        header("Location:../TCC_PHP/afterLogin/viewpromptuary.php");
        die("ERRO NO BANCO");
    }
}
