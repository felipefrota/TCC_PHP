<?php require_once("../conexao/conexao.php"); ?>
<?php
    if ( isset( $_POST["email"]) ){
        $usuario = $_POST["email"];
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
            header("location:../listagens.php");
        }




        // echo $usuario . "<br>";
        // echo $senha;    
    }
?>









<!doctype html>
    <html lang="pt-BR">
        <head>
            <meta charset="utf-8">
            <title>Curso HTML5 Essencial</title>

            <link href="styles.css" rel="stylesheet" media="screen">
        </head>

        <body>  

            <h2 id="Login_2" >Login</h2>
            <div id="janela_login">
            <form action="login_sucesso.php" method="post">


                   <label for="email">Email  </label>
                <input type="email" name="email" id="email">

                <label for="senha">Senha  </label>
                <input type="password" name="senha" id="senha">

                
                <input type="submit" value="Enviar" id="Enviar" name="Enviar">
                <main>
                 

                </main>

        </body>
    </html>