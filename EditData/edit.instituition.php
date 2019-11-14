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
// $array_erro = array(
//     UPLOAD_ERR_OK => "Sem erro.",
//     UPLOAD_ERR_INI_SIZE => "O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.",
//     UPLOAD_ERR_FORM_SIZE => "O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML",
//     UPLOAD_ERR_PARTIAL => "O upload do arquivo foi feito parcialmente.",
//     UPLOAD_ERR_NO_FILE => "Nenhum arquivo foi enviado.",
//     UPLOAD_ERR_NO_TMP_DIR => "Pasta temporária ausente.",
//     UPLOAD_ERR_CANT_WRITE => "Falha em escrever o arquivo em disco.",
//     UPLOAD_ERR_EXTENSION => "Uma extensão do PHP interrompeu o upload do arquivo."
// ); 
// if( isset($_POST["alterar"]) ) {
//     $numero_erro = $_FILES['upload_file']['error'];
//     $mensagem =  $array_erro[$numero_erro];

//     $arquivo_temporario = $_FILES['upload_file']['tmp_name'];
//     $arquivo = basename($_FILES['upload_file']['name']);
//     $diretorio = "C:/xampp/htdocs/TCC_PHP/Uploads";
    

//     print_r($caminho);


//     //Upando as imagens
//     if(move_uploaded_file($arquivo_temporario, $diretorio."/". $arquivo)) {
//         $mensagem = "Arquivo publicado";
//     } else {
//         $numero_erro = $_FILES['upload_file']['error'];
//         $mensagem =  $array_erro[$numero_erro];
//     }
    
    
    // echo("<pre>");
    // print_r($_FILES['upload_file']);
    // echo("</pre>");
    // echo $mensagem;

// }



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
    // $upload_file =                        $_POST["upload_file"];
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
    $alterar .= "apresent_complet = '{$apresent_complet}' ";
    // $alterar .= "upload_file = '{$arquivo}' ";



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

            <!-- <div class="form-group">
                <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                Enviar esse arquivo: <input name="upload_file" value="imagem" type="file" />
                <img src="../Uploads/<?php echo $dataUser_login["upload_file"] ?>" alt="..." class="img-thumbnail">
                <button type="submit" name="alterar" class="btn btn-info">Alterar</button>


            </div> -->


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