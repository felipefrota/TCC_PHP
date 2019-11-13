<?php require_once("../conexao/conexao.php")?>


<?php 
//--------------------------------------------------------------------------//
//TESTE DE SEGURANÇA
session_start();
// if (!isset($_SESSION["user_portal"])) {
//     header("location:../Index/index.php");
// }

 // A sessão precisa ser iniciada em cada página diferente
 if (!isset($_SESSION)) session_start();
    
 $nivel_necessario = 1;
   
 // Verifica se não há a variável da sessão que identifica o usuário
 if (!isset($_SESSION['usuario_instituicaoID']) OR ($_SESSION['tipo'] <$nivel_necessario)) {
     // Destrói a sessão por segurança
    //  session_destroy();
     // Redireciona o visitante de volta pro login
     $sql = "SELECT * FROM tb_usuario where id = $_SESSION[usuarioID]";


     header("Location:../Index/Index.php"); exit;
 }
//FIM DO TESTE DE SEGURANÇA
//--------------------------------------------------------------------------//

//--------------------------------------------------------------------------//
//Puxando todos os dados do usuario do banco 

if (isset($_SESSION["nomeUsuario_nomeFantasia"])) {
    $user = $_SESSION["nomeUsuario_nomeFantasia"];

    $dataUser = "SELECT * ";
    $dataUser .= "FROM tb_usuario ";
    $dataUser .= "WHERE usuario_instituicaoID = {$user} ";

    $dataUser_login = mysqli_query($conecta, $dataUser);
    if (!$dataUser_login) {
        die("Falha no banco");
    }

    $dataUser_login = mysqli_fetch_assoc($dataUser_login);
    $nome = $dataUser_login["nomeUsuario_nomeFantasia"];
}







//--------------------------------------------------------------------------//
//PARTE DE UPLOAD DE DADOS
//--------------------------------------------------------------------------//
//Campo upload_file
//Codigo dos para o upload das imagens
$array_erro = array(
    UPLOAD_ERR_OK => "Sem erro.",
    UPLOAD_ERR_INI_SIZE => "O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.",
    UPLOAD_ERR_FORM_SIZE => "O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML",
    UPLOAD_ERR_PARTIAL => "O upload do arquivo foi feito parcialmente.",
    UPLOAD_ERR_NO_FILE => "Nenhum arquivo foi enviado.",
    UPLOAD_ERR_NO_TMP_DIR => "Pasta temporária ausente.",
    UPLOAD_ERR_CANT_WRITE => "Falha em escrever o arquivo em disco.",
    UPLOAD_ERR_EXTENSION => "Uma extensão do PHP interrompeu o upload do arquivo."
); 
if( isset($_POST["alterar"]) ) {
    $numero_erro = $_FILES['upload_file']['error'];
    $mensagem =  $array_erro[$numero_erro];

    $arquivo_temporario = $_FILES['upload_file']['tmp_name'];
    $arquivo = basename($_FILES['upload_file']['name']);
    $diretorio = "C:/xampp/htdocs/TCC_PHP/Uploads";
    

    print_r($caminho);


    //Upando as imagens
    if(move_uploaded_file($arquivo_temporario, $diretorio."/". $arquivo)) {
        $mensagem = "Arquivo publicado";
    } else {
        $numero_erro = $_FILES['upload_file']['error'];
        $mensagem =  $array_erro[$numero_erro];
    }
    
    
    // echo("<pre>");
    // print_r($_FILES['upload_file']);
    // echo("</pre>");
    // echo $mensagem;

}

//--------------------------------------------------------------------------//
//Campo upload_file2
//Codigo dos para o upload das imagens
$array_erro2 = array(
    UPLOAD_ERR_OK => "Sem erro.",
    UPLOAD_ERR_INI_SIZE => "O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.",
    UPLOAD_ERR_FORM_SIZE => "O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML",
    UPLOAD_ERR_PARTIAL => "O upload do arquivo foi feito parcialmente.",
    UPLOAD_ERR_NO_FILE => "Nenhum arquivo foi enviado.",
    UPLOAD_ERR_NO_TMP_DIR => "Pasta temporária ausente.",
    UPLOAD_ERR_CANT_WRITE => "Falha em escrever o arquivo em disco.",
    UPLOAD_ERR_EXTENSION => "Uma extensão do PHP interrompeu o upload do arquivo."
); 
if( isset($_POST["alterar"]) ) {
    $numero_erro2 = $_FILES['upload_file2']['error'];
    $mensagem2 =  $array_erro2[$numero_erro2];

    $arquivo_temporario2 = $_FILES['upload_file2']['tmp_name'];
    $arquivo2 = basename($_FILES['upload_file2']['name']);
    $diretorio2 = "C:/xampp/htdocs/TCC_PHP/Uploads";

    print_r($caminho);


    //Upando as imagens
    if(move_uploaded_file($arquivo_temporario2, $diretorio2."/". $arquivo2)) {
        $mensagem2 = "Arquivo publicado";
    } else {
        $numero_erro2 = $_FILES['upload_file2']['error'];
        $mensagem2 =  $array_erro2[$numero_erro2];
    }
    
    
    // echo("<pre>");
    // print_r($_FILES['upload_file']);
    // echo("</pre>");
    // echo $mensagem;

}

//--------------------------------------------------------------------------//
//Campo upload_file3
//Codigo dos para o upload das imagens
$array_erro3 = array(
    UPLOAD_ERR_OK => "Sem erro.",
    UPLOAD_ERR_INI_SIZE => "O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.",
    UPLOAD_ERR_FORM_SIZE => "O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML",
    UPLOAD_ERR_PARTIAL => "O upload do arquivo foi feito parcialmente.",
    UPLOAD_ERR_NO_FILE => "Nenhum arquivo foi enviado.",
    UPLOAD_ERR_NO_TMP_DIR => "Pasta temporária ausente.",
    UPLOAD_ERR_CANT_WRITE => "Falha em escrever o arquivo em disco.",
    UPLOAD_ERR_EXTENSION => "Uma extensão do PHP interrompeu o upload do arquivo."
); 
if( isset($_POST["alterar"]) ) {
    $numero_erro3 = $_FILES['upload_file3']['error'];
    $mensagem3 =  $array_erro3[$numero_erro3];

    $arquivo_temporario3 = $_FILES['upload_file3']['tmp_name'];
    $arquivo3 = basename($_FILES['upload_file3']['name']);
    $diretorio3 = "C:/xampp/htdocs/TCC_PHP/Uploads";

    print_r($caminho);


    //Upando as imagens
    if(move_uploaded_file($arquivo_temporario3, $diretorio3."/". $arquivo3)) {
        $mensagem3 = "Arquivo publicado";
    } else {
        $numero_erro3 = $_FILES['upload_file3']['error'];
        $mensagem3 =  $array_erro3[$numero_erro3];
    }
    
    
    // echo("<pre>");
    // print_r($_FILES['upload_file']);
    // echo("</pre>");
    // echo $mensagem;

}

//--------------------------------------------------------------------------//
//Campo upload_file4
//Codigo dos para o upload das imagens
$array_erro4 = array(
    UPLOAD_ERR_OK => "Sem erro.",
    UPLOAD_ERR_INI_SIZE => "O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.",
    UPLOAD_ERR_FORM_SIZE => "O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML",
    UPLOAD_ERR_PARTIAL => "O upload do arquivo foi feito parcialmente.",
    UPLOAD_ERR_NO_FILE => "Nenhum arquivo foi enviado.",
    UPLOAD_ERR_NO_TMP_DIR => "Pasta temporária ausente.",
    UPLOAD_ERR_CANT_WRITE => "Falha em escrever o arquivo em disco.",
    UPLOAD_ERR_EXTENSION => "Uma extensão do PHP interrompeu o upload do arquivo."
); 
if( isset($_POST["alterar"]) ) {
    $numero_erro4 = $_FILES['upload_file4']['error'];
    $mensagem4 =  $array_erro4[$numero_erro4];

    $arquivo_temporario4 = $_FILES['upload_file4']['tmp_name'];
    $arquivo4 = basename($_FILES['upload_file4']['name']);
    $diretorio4 = "C:/xampp/htdocs/TCC_PHP/Uploads";

    print_r($caminho);


    //Upando as imagens
    if(move_uploaded_file($arquivo_temporario4, $diretorio4."/". $arquivo4)) {
        $mensagem4 = "Arquivo publicado";
    } else {
        $numero_erro4 = $_FILES['upload_file4']['error'];
        $mensagem4 =  $array_erro4[$numero_erro4];
    }
    
    
    // echo("<pre>");
    // print_r($_FILES['upload_file']);
    // echo("</pre>");
    // echo $mensagem;

}

//--------------------------------------------------------------------------//
//Campo upload_file5
//Codigo dos para o upload das imagens
$array_erro5 = array(
    UPLOAD_ERR_OK => "Sem erro.",
    UPLOAD_ERR_INI_SIZE => "O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.",
    UPLOAD_ERR_FORM_SIZE => "O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML",
    UPLOAD_ERR_PARTIAL => "O upload do arquivo foi feito parcialmente.",
    UPLOAD_ERR_NO_FILE => "Nenhum arquivo foi enviado.",
    UPLOAD_ERR_NO_TMP_DIR => "Pasta temporária ausente.",
    UPLOAD_ERR_CANT_WRITE => "Falha em escrever o arquivo em disco.",
    UPLOAD_ERR_EXTENSION => "Uma extensão do PHP interrompeu o upload do arquivo."
); 
if( isset($_POST["alterar"]) ) {
    $numero_erro5 = $_FILES['upload_file5']['error'];
    $mensagem5 =  $array_erro5[$numero_erro5];

    $arquivo_temporario5 = $_FILES['upload_file5']['tmp_name'];
    $arquivo5 = basename($_FILES['upload_file5']['name']);
    $diretorio5 = "C:/xampp/htdocs/TCC_PHP/Uploads";

    print_r($caminho);


    //Upando as imagens
    if(move_uploaded_file($arquivo_temporario5, $diretorio5."/". $arquivo5)) {
        $mensagem5 = "Arquivo publicado";
    } else {
        $numero_erro5 = $_FILES['upload_file5']['error'];
        $mensagem5 =  $array_erro5[$numero_erro5];
    }
    
    
    // echo("<pre>");
    // print_r($_FILES['upload_file']);
    // echo("</pre>");
    // echo $mensagem;

}

//--------------------------------------------------------------------------//
//Campo upload_file5
//Codigo dos para o upload das imagens
$array_erro6 = array(
    UPLOAD_ERR_OK => "Sem erro.",
    UPLOAD_ERR_INI_SIZE => "O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.",
    UPLOAD_ERR_FORM_SIZE => "O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML",
    UPLOAD_ERR_PARTIAL => "O upload do arquivo foi feito parcialmente.",
    UPLOAD_ERR_NO_FILE => "Nenhum arquivo foi enviado.",
    UPLOAD_ERR_NO_TMP_DIR => "Pasta temporária ausente.",
    UPLOAD_ERR_CANT_WRITE => "Falha em escrever o arquivo em disco.",
    UPLOAD_ERR_EXTENSION => "Uma extensão do PHP interrompeu o upload do arquivo."
); 
if( isset($_POST["alterar"]) ) {
    $numero_erro6 = $_FILES['upload_file6']['error'];
    $mensagem6 =  $array_erro6[$numero_erro6];

    $arquivo_temporario6 = $_FILES['upload_file6']['tmp_name'];
    $arquivo6 = basename($_FILES['upload_file6']['name']);
    $diretorio6 = "C:/xampp/htdocs/TCC_PHP/Uploads";

    print_r($caminho);


    //Upando as imagens
    if(move_uploaded_file($arquivo_temporario6, $diretorio6."/". $arquivo6)) {
        $mensagem6 = "Arquivo publicado";
    } else {
        $numero_erro6 = $_FILES['upload_file6']['error'];
        $mensagem6 =  $array_erro6[$numero_erro6];
    }
    
    
    // echo("<pre>");
    // print_r($_FILES['upload_file']);
    // echo("</pre>");
    // echo $mensagem;

}










//--------------------------------------------------------------------------//

//--------------------------------------------------------------------------//
//Pegando os dados enviados do formulario//
if( isset($_POST["razao_Social"]) ) {
    $razao_Social             =           $_POST["razao_Social"];
    $nomeUsuario_nomeFantasia =           $_POST["nome_Fantasia"];
    $cpf_cnpj                =            $_POST["cnpj"];
    $email =                              $_POST["email"];
    $senha =                              $_POST["senha"];
    $telefoneFixo =                       $_POST["telefoneFixo1"];
    $telefoneFixo2 =                      $_POST["telefoneFixo2"];
    $telefoneCelular =                    $_POST["telefoneCelular"];
    $wpp =                                $_POST["wpp"];
    $brev_apresent =                      $_POST["brev_apresent"];
    $apresent_complet =                   $_POST["apresent_complet"];
    $upload_file =                        $_POST["upload_file"];
    $upload_file2 =                       $_POST["upload_file2"];  
    $upload_file3 =                       $_POST["upload_file3"];  
    $upload_file4 =                       $_POST["upload_file4"];  
    $upload_file5 =                       $_POST["upload_file5"];  
    $upload_file6 =                       $_POST["upload_file6"];  
    $usuario_instituicaoID                = $_POST["usuario_instituicaoID"];

    //--------------------------------------------------------------------------//

    //--------------------------------------------------------------------------//
    //Alterar
    $alterar = "UPDATE tb_usuario ";
    $alterar .= "SET ";
    $alterar .= "razao_Social = '{$razao_Social}', ";
    $alterar .= "nomeUsuario_nomeFantasia = '{$nomeUsuario_nomeFantasia}', "; 
    $alterar .= "cpf_cnpj = '{$cpf_cnpj}', ";
    $alterar .= "email = '{$email}', ";
    $alterar .= "senha = '{$senha}', ";
    $alterar .= "telefoneFixo = '{$telefoneFixo}', ";
    $alterar .= "telefoneFixo2 = '{$telefoneFixo2}', ";
    $alterar .= "telefoneCelular = '{$telefoneCelular}', ";
    $alterar .= "wpp = '{$wpp}', ";
    $alterar .= "brev_apresent = '{$brev_apresent}', ";
    $alterar .= "apresent_complet = '{$apresent_complet}', ";
    $alterar .= "upload_file = '{$arquivo}', ";
    $alterar .= "upload_file2 = '{$arquivo2}', ";
    $alterar .= "upload_file3 = '{$arquivo3}', ";
    $alterar .= "upload_file4 = '{$arquivo4}', ";
    $alterar .= "upload_file5 = '{$arquivo5}', ";
    $alterar .= "upload_file6 = '{$arquivo6}' ";




    $alterar .= "WHERE usuario_instituicaoID = {$usuario_instituicaoID} ";

    $operacao_alterar = mysqli_query($conecta, $alterar);
    if(!$operacao_alterar) {
        die("Erro na alteracao");   
    } else {
        header("location:../EditData/edit.instituition.php");   
    }

}

?>

<html>

<head>
    <title>Cadastro</title>
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=devide-width, initial-scale=1">

    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../_CSS/styles.css" rel="stylesheet">


</head>

<body>

    <span class="d-block p-3 bg-primary text-white">Cadastro Instituição</span>

    <div class="container-fluid">

        <form class="" action="../EditData/edit.instituition.php" method="post" enctype="multipart/form-data">

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="razao_Social">Razão Social:</label>
                    <input class="form-control" type="text" name="razao_Social" id="razao_Social"
                        value="<?php echo $dataUser_login["razao_Social"] ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nome_Fantasia">Nome Fantasia:</label>
                    <input class="form-control" type="text" name="nome_Fantasia" id="nome_Fantasia"
                        value="<?php echo $dataUser_login["nomeUsuario_nomeFantasia"] ?>">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="cnpj">CNPJ:</label>
                    <input class="form-control" type="text" name="cnpj" id="cnpj"
                        value="<?php echo $dataUser_login["cpf_cnpj"] ?>">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" name="email" id="email"
                        value="<?php echo $dataUser_login["email"] ?>">
                </div>

                <div class="form-group col-md-6">
                    <label for="senha">Senha:</label>
                    <input class="form-control" type="password" name="senha" id="senha"
                        value="<?php echo $dataUser_login["senha"] ?>">
                </div>
            </div>

            <!---------------------------------------------------------------------------------------------------------->
            <hr>
            <span class="d-block p-2 bg-dark text-white">Dados da Instituição</span>
            <br>
            <!---------------------------------------------------------------------------------------------------------->

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tel1">Telefone 1:</label>
                    <input class="form-control" type="tel" name="telefoneFixo1" id="telefoneFixo1"
                        value="<?php echo $dataUser_login["telefoneFixo"] ?>">
                </div>

                <div class="form-group col-md-6">
                    <label for="tel2">Telefone 2:</label>
                    <input class="form-control" type="tel" name="telefoneFixo2" id="telefoneFixo2"
                        value="<?php echo $dataUser_login["telefoneFixo2"] ?>">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cel1">Telefone Celular:</label>
                    <input class="form-control" type="tel" name="telefoneCelular" id="telefoneCelular"
                        value="<?php echo $dataUser_login["telefoneCelular"] ?>">
                </div>

                <div class="form-group col-md-6">
                    <label for="wpp">WhatsApp:</label>
                    <input class="form-control" type="tel" name="wpp" id="wpp"
                        value="<?php echo $dataUser_login["wpp"] ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Breve Descrição da Empresa</label>
                <textarea class="form-control" type="text" id="brev_apresent" name="brev_apresent" id="brev_apresent"
                    rows="3"><?php echo $dataUser_login["brev_apresent"] ?></textarea>

            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Exemplo de textarea</label>
                <textarea class="form-control" id="apresent_complet" name="apresent_complet" id="apresent_complet"
                    rows="6" value="<?php echo $dataUser_login["apresent_complet"] ?>"></textarea>
            </div>



            <!-----------------------------------------------UPLOADS ARQUIVOS------------------------------------------------->

            <div class="form-group">
                <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                Enviar esse arquivo: <input name="upload_file" value="imagem" type="file" />
                <!-- echo '<a href=""><img src="C:/xampp/htdocs/TCC_PHP/Uploads".$upload_file /></a>'; -->
                <img src="../Uploads/<?php echo $dataUser_login["upload_file"] ?>" alt="..." class="img-thumbnail">
                <button type="submit" name="alterar" class="btn btn-info">Alterar</button>


            </div>

            <div class="form-group">
                <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                Enviar esse arquivo: <input name="upload_file2" value="imagem" type="file" />
                <!-- echo '<a href=""><img src="C:/xampp/htdocs/TCC_PHP/Uploads".$upload_file /></a>'; -->
                <img src="../Uploads/<?php echo $dataUser_login["upload_file2"] ?>" alt="..." class="img-thumbnail">


            </div>

            <div class="form-group">
                <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                Enviar esse arquivo: <input name="upload_file3" value="imagem" type="file" />
                <!-- echo '<a href=""><img src="C:/xampp/htdocs/TCC_PHP/Uploads".$upload_file /></a>'; -->
                <img src="../Uploads/<?php echo $dataUser_login["upload_file3"] ?>" alt="..." class="img-thumbnail">


            </div>

            <div class="form-group">
                <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                Enviar esse arquivo: <input name="upload_file4" value="imagem" type="file" />
                <!-- echo '<a href=""><img src="C:/xampp/htdocs/TCC_PHP/Uploads".$upload_file /></a>'; -->
                <img src="../Uploads/<?php echo $dataUser_login["upload_file4"] ?>" alt="..." class="img-thumbnail">


            </div>

            <div class="form-group">
                <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                Enviar esse arquivo: <input name="upload_file5" value="imagem" type="file" />
                <!-- echo '<a href=""><img src="C:/xampp/htdocs/TCC_PHP/Uploads".$upload_file /></a>'; -->
                <img src="../Uploads/<?php echo $dataUser_login["upload_file5"] ?>" alt="..." class="img-thumbnail">


            </div>

            <div class="form-group">
                <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                Enviar esse arquivo: <input name="upload_file6" value="imagem" type="file" />
                <!-- echo '<a href=""><img src="C:/xampp/htdocs/TCC_PHP/Uploads".$upload_file /></a>'; -->
                <img src="../Uploads/<?php echo $dataUser_login["upload_file6"] ?>" alt="..." class="img-thumbnail">


            </div>


            <input type="hidden" name="usuario_instituicaoID"
                value="<?php echo $dataUser_login["usuario_instituicaoID"] ?>">
            <button type="submit" name="enviar" class="btn btn-info">Enviar</button>


        </form>
    </div>

    <!-------------------------------------------------------------------------------------------------------------->
    <script src="https://unpkg.com/popper.js@1.15.0/dist/umd/popper.min.js"></script>
    <script src="../Bootstrap/js/jquery-3.4.1.min.js "></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="fields.js" type="text/javascript"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js">
    </script>
</body>

</html>