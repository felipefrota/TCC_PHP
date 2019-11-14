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

$nivel_necessario = 2;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['usuario_instituicaoID']) or ($_SESSION['tipo'] < $nivel_necessario)) {
    // Destrói a sessão por segurança
    // session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location:../afterLogin/usuario.php");
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

//--------------------------------------------------------------------------//
//Pegando os dados enviados do formulario//
if( isset($_POST["usuario_instituicaoID"]) ) {
    $upload_file =                        $_POST["upload_file"];
    $usuario_instituicaoID                = $_POST["usuario_instituicaoID"];

    //--------------------------------------------------------------------------//

    //--------------------------------------------------------------------------//
    //Alterar
    $alterar = "UPDATE tb_usuario ";
    $alterar .= "SET ";
    $alterar .= "upload_file = '{$arquivo}' ";



    $alterar .= "WHERE usuario_instituicaoID = {$usuario_instituicaoID} ";

    $operacao_alterar = mysqli_query($conecta, $alterar);
    if(!$operacao_alterar) {
        die("Erro na alteracao");   
    } else {
        header("location:../EditData/upload.imageInstitution.php");   
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
<span class="d-block p-3 bg-primary text-white">Cadastrando Imagem</span>

<div class="container-fluid">

    <form class="" action="../EditData/upload.imageInstitution.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
                <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                Enviar esse arquivo: <input name="upload_file" value="imagem" type="file" />
                <!-- echo '<a href=""><img src="C:/xampp/htdocs/TCC_PHP/Uploads".$upload_file /></a>'; -->


            </div>
            <div class="form-group">
            <!-- <img src="../Uploads/<?php echo $dataUser_login["upload_file"] ?>" alt="..." class="img-thumbnail"> -->
            <img src="../Uploads/<?php echo $dataUser_login["upload_file"] ?>" class="rounded mx-auto d-block" alt="...">

            </div>


            <input type="hidden" name="usuario_instituicaoID"
                value="<?php echo $dataUser_login["usuario_instituicaoID"] ?>">
                <button type="submit" name="alterar" class="btn btn-info">Alterar</button>


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