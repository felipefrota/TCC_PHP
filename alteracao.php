<?php require_once("../conexao/conexao.php")?>

<?php
    $usr = "SELECT * ";
    $usr .= "FROM tb_usuario ";
    if(isset($_POST["usuario_instituicaoID"]) ) {
        $id = $_POST["usuario_instituicaoID"];
        $usr .= "WHERE usuario_instituicaoID = {$id} ";
    }

    $acesso = mysqli_query($conecta, $id);
    if ( !$acesso ) {
        die("Falha na consulta ao banco");
    }

    $informacao = mysqli_fetch_assoc($acesso);
    print_r($informacao)

?>