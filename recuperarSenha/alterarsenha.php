<?php require_once("../conexao/conexao.php") ?>

<?php

if (isset($_POST["senha"])) {
    $senha = $_POST["senha"];
    // $cpf_cnpj= $_POST["cpf_cnpj"];
    $usuario_instituicaoID = $_POST["usuario_instituicaoID"];

    

    $login = "SELECT * ";
    $login .= "FROM tb_usuario ";
    $login .= "where cpf_cnpj= '$cpf_cnpj' ";
    $acesso = mysqli_query($conecta, $login);
    if (!$acesso) {
        die("Falha na consulta ao banco");
    }


    // $informacao = mysqli_fetch_assoc($acesso);
    // echo $senha, $cpf_cnpj;
    echo $senha, $usuario_instituicaoID;
    

    //     //Alterar
    $alterar = "UPDATE tb_usuario ";
    $alterar .= "SET ";
    $alterar .= "senha = '{$senha}' ";
    $alterar .= "WHERE usuario_instituicaoID = {$usuario_instituicaoID}";
    
    $operacao_alterar = mysqli_query($conecta, $alterar);
    if (!$operacao_alterar) {
        die("Erro na alteracao");
    } else {
        header("location:../Index/Index.php");
    }
}

// echo $usuario . "<br>";
// echo $senha;    


?>