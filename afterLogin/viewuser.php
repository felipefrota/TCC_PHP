<?php require_once("../conexao/conexao.php"); ?>
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
// Verificando se o "código" não está vazio
if ( isset($_GET["codigo"]) ) {
   $id_usuario = $_GET["codigo"];
} else { 
    header ("location: instituicao.php");
}

?>
<html>
<body>
<!DOCTYPE HTML>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Alguma Coisa Lfie</title>
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=devide-width, initial-scale=1">

    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../_CSS/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   
</head>

<body>
 <header>
        <div id="">
         <div class="Principal">
                <!----------------------------------------------------------------------------------------->
                <!--<object type="text/html" data="../nav-bar.html"></object>-->
                <div id="Nav-Bar">

                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a href="../IndexProject/Index.html" class="navbar-brand"></a>
                                    <!------------------------------------ Logo abaixo ----------------------------------------------------------->
                                    <a href="../Index/index.php">
                                    <img src="../Images/logo5.png" width=100px height=75px >
                                    </a>
                                <!------------------------------------ Fechando Logo ----------------------------------------------------------->


                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuCelular" aria-controls="menu" aria-expanded="false" aria-label="Menu Colapso">
                                    <span class="navbar-toggler-icon text-black"></span>
                                </button>
                            </div>

                            <div id="menuCelular" class="collapse navbar-collapse">

                                <ul class="navbar-nav ml-auto text-light nav-menu">
                                    <li class="navbar-text"><a class="nav-link text-dark font-weight-bold" href="../afterLogin/instituicao.php">Home</a></li>
                                    <li class="navbar-text navHistorias"><a class="nav-link text-dark font-weight-bold" href="../afterLogin/instituicao.php">Historia</a></li>
                                    <li class="navbar-text nav-instituicoes"><a class="nav-link text-dark font-weight-bold" href="../afterLogin/instituicao_instituicoes.php">Instituições</a></li>
                                    <li>
                                        <!----------------------------------------------------------------------------------------->
                                        <!---------------------------------Botao Saudação------------------------------------------>
                                        <?php
                                        if (isset($_SESSION["nomeUsuario_nomeFantasia"])) {
                                            $user = $_SESSION["nomeUsuario_nomeFantasia"];
                                            $saudacao = "SELECT nomeUsuario_nomeFantasia ";
                                            $saudacao .= "FROM tb_usuario ";
                                            $saudacao .= "WHERE usuario_instituicaoID = {$user} ";
                                            $saudacao_login = mysqli_query($conecta, $saudacao);
                                            if (!$saudacao_login) {
                                                die("Falha no banco");
                                            }
                                            $saudacao_login = mysqli_fetch_assoc($saudacao_login);
                                            $nome = $saudacao_login["nomeUsuario_nomeFantasia"];
                                            ?>
                                            <div class="dropdown nav-link">
                                                <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <h8> Bem vindo, <?php echo $nome ?> </h8>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="../EditData/edit.instituition.php">Perfil</a>
                                                    <a class="dropdown-item" href="../EditData/upload.imageInstitution.php">Imagens instituição</a>
                                                    <a class="dropdown-item" href="../sair.php">Sair</a>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                    </li>
                                    <!---------------------------------Fechando Saudação--------------------------------------->
                                    <!----------------------------------------------------------------------------------------->
                                    <!--Modal login ou senha invalido-->
                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modalExemplo">
                            Abrir modal de demonstração
                        </button> -->

                                    <!-- Modal -->

                                </ul>
                            </div>
                        </div>
                    </nav>


                </div>
            </div>

    </header>
</body>
</html>

<?php 

//consultar no banco de dados
$result_usuario = "SELECT * ";
$result_usuario .= "FROM tb_usuario "; 
$result_usuario .= "where usuario_instituicaoID= '$id_usuario' ";
$resultado_usuario  = mysqli_query($conecta, $result_usuario);

// testar erro
if (!$resultado_usuario){
  die ("Falha no banco de dados");
} else {
  $dados_detalhes = mysqli_fetch_assoc($resultado_usuario);
  $usuario_instituicaoID        = $dados_detalhes["usuario_instituicaoID"];
  $email                        =$dados_detalhes["email"];
  $nomeUsuario_nomeFantasia     = $dados_detalhes["nomeUsuario_nomeFantasia"];
  $cpf_cnpj                     = $dados_detalhes["cpf_cnpj"];
  $dataNascimento               = $dados_detalhes["dataNascimento"];
  $sexo                         = $dados_detalhes["sexo"];
  $estadoCivil                  = $dados_detalhes["estadoCivil"];
  $telefoneFixo                 = $dados_detalhes["telefoneFixo"];
  $telefoneFixo2                = $dados_detalhes["telefoneFixo2"];
  $telefoneCelular              = $dados_detalhes["telefoneCelular"];
  $wpp                          = $dados_detalhes["wpp"];
  $cep                          = $dados_detalhes["cep"];
  $estado                       = $dados_detalhes["estado"];
  $cidade                       = $dados_detalhes["cidade"];
  $bairro                       = $dados_detalhes["bairro"];
  $rua_avenida                  = $dados_detalhes["rua_avenida"];
  $numero                       = $dados_detalhes["numero"];
  $motivoInternacao             = $dados_detalhes["motivoInternacao"];
  $motiv_Adicional              = $dados_detalhes["motiv_Adicional"];
  $remed                        = $dados_detalhes["remed"];
  $alergRemedio                 = $dados_detalhes["alergRemedio"];
  $sintom                       = $dados_detalhes["sintom"];
  $doenc_Cronic                 = $dados_detalhes["doenc_Cronic"];
  $levar_Inst                   = $dados_detalhes["levar_Inst"];
  $obs_Inst                     = $dados_detalhes["obs_Inst"];
  $obs_Intolerancia             = $dados_detalhes["obs_Intolerancia"];
  }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Visualizar usuário</title>

 <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link href="../_CSS/styles.css" rel="stylesheet">
</head>
<body>

<div id="main" class="container-fluid">
  <h3 class="page-header"><?php echo $nomeUsuario_nomeFantasia?></h3> 
  
  <div class="row">
    <div class="col-md-4">
      <p><strong>CPF</strong></p>
  	  <p><?php echo $cpf_cnpj ?></p>
    </div>
	
	<div class="col-md-4">
      <p><strong>E-mail</strong></p>
  	  <p><?php echo $email ?></p>
    </div>

    <div class="col-md-4">
      <p><strong>Data de Nascimento</strong></p>
  	  <p><?php echo $dataNascimento ?></p>
    </div>
	
	<div class="col-md-4">
      <p><strong>Sexo</strong></p>
  	  <p><?php echo $sexo ?></p>
    </div>
	
	<div class="col-md-4">
      <p><strong>Estado Civil</strong></p>
  	  <p><?php echo $estadoCivil ?></p>
    </div>
	
    <div class="col-md-4">
      <p><strong>Telefone Fixo</strong></p>
  	  <p><?php echo $telefoneFixo ?></p>
    </div>
	
	<div class="col-md-4">
      <p><strong>telefone Adicional</strong></p>
  	  <p><?php echo $telefoneFixo2 ?></p>
    </div>
	
	<div class="col-md-4">
      <p><strong>Telefone Celular</strong></p>
  	  <p><?php echo $telefoneCelular ?></p>
    </div>

    <div class="col-md-4">
      <p><strong>WhatsApp</strong></p>
  	  <p><?php echo $wpp ?></p>
    </div>

    <div class="col-md-4">
      <p><strong>CEP</strong></p>
  	  <p><?php echo $cep ?></p>
    </div>

    <div class="col-md-4">
      <p><strong>Estado</strong></p>
  	  <p><?php echo $estado ?></p>
    </div>

    <div class="col-md-4">
      <p><strong>Cidade</strong></p>
  	  <p><?php echo $cidade ?></p>
    </div>

    <div class="col-md-4">
      <p><strong>Bairo</strong></p>
  	  <p><?php echo $bairro ?></p>
    </div>

    <div class="col-md-4">
      <p><strong>Rua / Avenida</strong></p>
  	  <p><?php echo $rua_avenida ?></p>
    </div>

    <div class="col-md-4">
      <p><strong>Número</strong></p>
  	  <p><?php echo $numero ?></p>
    </div>

    <div class="col-md-4">
      <p><strong>Motivo da Internação</strong></p>
  	  <p><?php echo $motivoInternacao ?></p>
    </div>

    <div class="col-md-4">
      <p><strong>Motivo Adicional</strong></p>
  	  <p><?php echo $motiv_Adicional ?></p>
    </div>

    <div class="col-md-4">
      <p><strong>Remédios</strong></p>
  	  <p><?php echo $remed ?></p>
    </div>

    <div class="col-md-4">
      <p><strong>Medicamentos Alérgicos</strong></p>
  	  <p><?php echo $alergRemedio ?></p>
    </div>

    <div class="col-md-4">
      <p><strong>Sintomas</strong></p>
  	  <p><?php echo $sintom?></p>
    </div>

    <div class="col-md-4">
      <p><strong>Vai levar alguma coisa para a instituição?</strong></p>
  	  <p><?php echo $levar_Inst?></p>
    </div>

    <div class="col-md-4">
      <p><strong>Instituição de Preferência</strong></p>
  	  <p><?php echo $obs_Inst?></p>
    </div>

    <div class="col-md-4">
      <p><strong>Intolerância a alimentos</strong></p>
  	  <p><?php echo $obs_Intolerancia?></p>
    </div>

    
    <div class="col-md-8">
      <p><strong>TITULO AQUI</strong></p>
  	  <p> COLOCA ALGUMA OBSERVAÇÃO AQUI COLOCA ALGUMA OBSERVAÇÃO AQUI COLOCA ALGUMA OBSERVAÇÃO AQUI COLOCA ALGUMA OBSERVAÇÃO AQUI </p>
    </div>
 </div>
 
 <hr />
 <div id="actions" class="row">
   <div class="col-md-12">
     <a href=".php" class="btn btn-primary">Editar</a>
	 <a href="instituicao.php" class="btn btn-default">Fechar</a>
   </div>
 </div>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>