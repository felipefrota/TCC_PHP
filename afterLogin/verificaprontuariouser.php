<?php require_once("../conexao/conexao.php"); ?>
<?php
//--------------------------------------------------------------------------//
//TESTE DE SEGURANÇA
session_start();
// $id_usuario_cadastro = $_GET["codigo"];

// if (!isset($_SESSION["user_portal"])) {
//     header("location:../Index/index.php");
// }
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

$nivel_necessario = 1;


// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['usuario_instituicaoID']) or ($_SESSION['tipo'] < $nivel_necessario)) {
    // Destrói a sessão por segurança
    // session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location:../afterLogin/usuario.php");
}
// Verificando se o "código" não está vazio
if (isset($_SESSION["usuario_instituicaoID"])) {
    $id_usuario_cadastro = $_SESSION["usuario_instituicaoID"];
    $result_usuario = "SELECT * ";
    $result_usuario .= "FROM tb_prontuario_sociodemograficos ";
    $result_usuario .= "where id_usuario= '$id_usuario_cadastro ' ";
    $resultado_usuario  = mysqli_query($conecta, $result_usuario);
}


// testar erro
// if (!$resultado_usuario){
//   die ("Falha no banco de dados");
// } else {
$dados_detalhes = mysqli_fetch_assoc($resultado_usuario);
$id_prontuario_sociodemograficos  = $dados_detalhes["id_usuario"];


if ($id_prontuario_sociodemograficos == $id_usuario_cadastro) {
    header("Location:viewpromptuaryuser.php");
} else {
    header("Location:prontuario_nao_cadastrado.php");
}


//   echo $id_prontuario_sociodemograficos ;



?>