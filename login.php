<?php require_once("conexao/conexao.php"); ?>
<?php
    //variavel de sessao
    session_start();

    if ( isset( $_POST["usuario"]) ){
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        $login = "SELECT * ";
        $login .= "FROM tb_usuario ";
        $login .= "WHERE email = '{$usuario}' and senha = '{$senha}' and tipo";

        $acesso = mysqli_query($conecta, $login);
        if ( !$acesso ) {
            die("Falha na consulta ao banco");
        }

        
        
        $informacao = mysqli_fetch_assoc($acesso);
        
        if ( empty($informacao) ) {
            $mensagem = "<script>alert('Login incorreto'); location.href='index.php';</script>";
            header("location:Index/Index.php");
        } 
         
        else{
            // $_SESSION["user_portal"] = $informacao["usuario_instituicaoID"] ;
            // header("location:afterLogin/usuario.php");
            $_SESSION['usuario_instituicaoID'] = $informacao['usuario_instituicaoID'];
            $_SESSION['nomeUsuario_nomeFantasia'] = $informacao['usuario_instituicaoID'];
            $_SESSION['tipo'] = $informacao['tipo'];

             // Redireciona o visitante
                header("Location:afterLogin/instituicao.php"); exit;

        }

        




        // echo $usuario . "<br>";
        // echo $senha;    
    }
?>