<?php require_once("conexao/conexao.php"); ?>
<?php
    if ( isset( $_POST["usuario"]) ){
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        $login = "SELECT * ";
        $login .= "FROM tb_usuario ";
        $login .= "WHERE email = '{$usuario}' and senha = '{$senha}' ";

        $acesso = mysqli_query($conecta, $login);
        if ( !$acesso ) {
            die("Falha na consulta ao banco");
        }
        
        
        $informacao = mysqli_fetch_assoc($acesso);
        
        if ( empty($informacao) ) {
            $mensagem = "<script>alert('Login incorreto'); location.href='index.php';</script>";
            header("location:Index/Index.php");
        } else {
            $_SESSION["user_portal"] = $informacao["usuario_instituicaoID"];
            header("location:listagens.php");
        }




        // echo $usuario . "<br>";
        // echo $senha;    
    }
?>