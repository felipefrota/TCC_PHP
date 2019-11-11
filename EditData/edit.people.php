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

//--------------------------------------------------------------------------//
//Puxando as instituições do banco
$instituicoes = "SELECT nomeUsuario_nomeFantasia ";
$instituicoes .= "FROM tb_usuario ";
$instituicoes .= "WHERE tipo = 2 ";
$lista_instituicoes = mysqli_query($conecta, $instituicoes);
if(!$lista_instituicoes) {
    die("erro no banco ao procurar instituções");
}

//--------------------------------------------------------------------------//

//--------------------------------------------------------------------------//
//Pegando os dados enviados do formulario//
        if( isset($_POST["usuario"]) ) {
        $nomeUsuario_nomeFantasia =           $_POST["usuario"];
        $sobrenome                =           $_POST["sobrenome"];
        $senha =                              $_POST["senha"];
        $email =                              $_POST["email"];
        $cpf_cnpj =                           $_POST["cpf"];
        $dataNascimento =                     $_POST["dataNascimento"];
        $sexo =                               $_POST["sexo"];
        $estadoCivil =                        $_POST["estadoCivil"];
        $telefoneCelular =                    $_POST["telefoneCelular"];
        $telefoneFixo =                       $_POST["telefoneFixo"];

        $cep =                                $_POST["cep"];
        $estado =                             $_POST["estado"];
        $cidade =                             utf8_decode($_POST["cidade"]);
        $bairro =                             utf8_decode($_POST["bairro"]);
        $rua_avenida =                        utf8_decode($_POST["rua_avenida"]);
        $numero =                             $_POST["numero"];
        $adicional =                          utf8_decode($_POST["adicional"]);

        $motivoInternacao =                   $_POST["motivoInternacao"];
        $motiv_Adicional =                    utf8_decode($_POST["motiv_Adicional"]);
        $remed =                              utf8_decode($_POST["remed"]);
        $alergRemedio =                       utf8_decode($_POST["alergRemedio"]);
        $sintom =                             utf8_decode($_POST["sintom"]);
        $doenc_Cronic =                       utf8_decode($_POST["doenc_Cronic"]);

        $instit =                             utf8_decode($_POST["instit"]);
        $levar_Inst =                         utf8_decode($_POST["levar_Inst"]);
        $obs_Inst =                           utf8_decode($_POST["obs_Inst"]);
        $obs_Intolerancia =                   utf8_decode($_POST["obs_Intolerancia"]);

        $usuario_instituicaoID                = $_POST["usuario_instituicaoID"];
 

    
    //--------------------------------------------------------------------------//

    //--------------------------------------------------------------------------//
    //Alterar
    $alterar = "UPDATE tb_usuario ";
    $alterar .= "SET ";
    $alterar .= "nomeUsuario_nomeFantasia = '{$nomeUsuario_nomeFantasia}', ";
    $alterar .= "sobrenome = '{$sobrenome}', "; 
    $alterar .= "senha = '{$senha}', ";
    $alterar .= "email = '{$email}', ";
    $alterar .= "cpf_cnpj = '{$cpf_cnpj}', ";
    $alterar .= "dataNascimento = '{$dataNascimento}', ";
    $alterar .= "sexo = '{$sexo}', ";
    $alterar .= "estadoCivil = '{$estadoCivil}', ";
    $alterar .= "telefoneCelular = '{$telefoneCelular}', ";
    $alterar .= "telefoneFixo = '{$telefoneFixo}', ";

    $alterar .= "cep = '{$cep}', ";
    $alterar .= "estado = '{$estado}', ";
    $alterar .= "cidade = '{$cidade}', ";
    $alterar .= "bairro = '{$bairro}', ";
    $alterar .= "rua_avenida = '{$rua_avenida}', ";
    $alterar .= "numero = '{$numero}', ";
    $alterar .= "adicional = '{$adicional}', ";

    $alterar .= "motivoInternacao = '{$motivoInternacao}', ";
    $alterar .= "motiv_Adicional = '{$motiv_Adicional}', ";
    $alterar .= "remed = '{$remed}', ";
    $alterar .= "alergRemedio = '{$alergRemedio}', ";
    $alterar .= "sintom = '{$sintom}', ";
    $alterar .= "doenc_Cronic = '{$doenc_Cronic}', ";

    $alterar .= "instit = '{$instit}', ";
    $alterar .= "levar_Inst = '{$levar_Inst}', ";
    $alterar .= "obs_Inst = '{$obs_Inst}', ";
    $alterar .= "obs_Intolerancia = '{$obs_Intolerancia}' ";

    $alterar .= "WHERE usuario_instituicaoID = {$usuario_instituicaoID} ";

    $operacao_alterar = mysqli_query($conecta, $alterar);
    if(!$operacao_alterar) {
        die("Erro na alteracao");   
    } else {
        header("location:edit.people.php");   
    }

}

//  print_r($_POST["usuario"]);



?>

<html>

<head>
    <title>Cadastro Pessoa</title>
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=devide-width, initial-scale=1">

    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../_CSS/styles.css" rel="stylesheet">


</head>

<body>

    <span class="d-block p-2 bg-dark text-white">Cadastro</span>
    <hr /> <br />

    <!-------------------------------------------------------------------------------------------------------------->

    <div class="container-fluid">

        <form class="was-validated" action="../EditData/edit.people.php" method="post">

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="usuario">Seu Nome</label>
                    <input class="form-control" type="text" name="usuario" id="usuario" value="<?php echo $dataUser_login["nomeUsuario_nomeFantasia"] ?>">
                </div>

                <div class="form-group col-md-4">
                    <label for="senha">Sobrenome:</label>
                    <input class="form-control" type="text" name="sobrenome" id="sobrenome" value="<?php echo $dataUser_login["sobrenome"] ?>">
                </div>
                
                <div class="form-group col-md-4">
                    <label for="senha">Senha</label>
                    <input class="form-control" type="password" name="senha" id="senha" value="<?php echo $dataUser_login["senha"] ?>">
                </div>

            </div>


            <div class="form-group">
                <label for="email">Seu Email</label>
                <input class="form-control" type="email" name="email" id="email" value="<?php echo $dataUser_login["email"] ?>">
            </div>


            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="cpf">CPF</label>
                    <input class="form-control" type="text" name="cpf" id="cpf" value="<?php echo $dataUser_login["cpf_cnpj"] ?>">
                </div>

                <div class="form-group col-md-3">
                    <label for="dataNascimento">Data de Nascimento</label>
                    <input class="form-control" name="dataNascimento" id="dataNascimento"  type="date" value="<?php echo $dataUser_login["dataNascimento"] ?>">
                </div>

                <div class="form-group col-md-3">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" id="sexo" class="form-control">
                        <option selected><?php echo $dataUser_login["sexo"] ?></option>
                        <option value="masc">Masculino</option>
                        <option value="fem">Feminino</option>
                        <option value="other">Outro...</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="estadoCivil">Estado Civil</label>
                    <select class="form-control" name="estadoCivil" id="estadoCivil">
                        <option selected><?php echo $dataUser_login["estadoCivil"] ?></option>
                        <option value="solt">Solteiro(a)</option>
                        <option value="casad">Casado(a)</option>
                        <option value="divor">Divorciado(a)</option>
                        <option value="viu">Viuvo(a)</option>
                    </select>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="telefoneCelular">Telefone Celular</label>
                    <input class="form-control" type="tel" name="telefoneCelular" id="telefoneCelular" value="<?php echo $dataUser_login["telefoneCelular"] ?>">
                </div>

                <div class="form-group col-md-3">
                    <label for="telefoneFixo">Telefone Fixo</label>
                    <input class="form-control" type="tel" name="telefoneFixo" id="telefoneFixo" value="<?php echo $dataUser_login["telefoneFixo"] ?>">
                </div>
            </div>




            <!---------------------------------------------------------------------------------------------------------->
            <hr>
            <span class="d-block p-2 bg-dark text-white">Endereço</span>
            <br />
            <!---------------------------------------------------------------------------------------------------------->
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="cep">CEP</label>
                    <input class="form-control" type="text" name="cep" id="cep" id="cep" value="<?php echo $dataUser_login["cep"] ?>">
                </div>

                <div class="form-group col-md-4">
                    <label for="estado">Estado</label>
                    <input class="form-control" type="text" name="estado" id="estado" value="<?php echo $dataUser_login["estado"] ?>">
                </div>

                <div class="form-group col-md-4">
                    <label for="cidade">Cidade</label>
                    <select class="form-control" name="cidade" id="cidade">
                        <option selected value="estado"><?php echo $dataUser_login["cidade"] ?></option>
                        <option value="ac">Acre</option>
                        <option value="al">Alagoas</option>
                        <option value="am">Amazonas</option>
                        <option value="ap">Amapá</option>
                        <option value="ba">Bahia</option>
                        <option value="ce">Ceará</option>
                        <option value="df">Distrito Federal</option>
                        <option value="es">Espírito Santo</option>
                        <option value="go">Goiás</option>
                        <option value="ma">Maranhão</option>
                        <option value="mt">Mato Grosso</option>
                        <option value="ms">Mato Grosso do Sul</option>
                        <option value="mg">Minas Gerais</option>
                        <option value="pa">Pará</option>
                        <option value="pb">Paraíba</option>
                        <option value="pr">Paraná</option>
                        <option value="pe">Pernambuco</option>
                        <option value="pi">Piauí</option>
                        <option value="rj">Rio de Janeiro</option>
                        <option value="rn">Rio Grande do Norte</option>
                        <option value="ro">Rondônia</option>
                        <option value="rs">Rio Grande do Sul</option>
                        <option value="rr">Roraima</option>
                        <option value="sc">Santa Catarina</option>
                        <option value="se">Sergipe</option>
                        <option value="sp">São Paulo</option>
                        <option value="to">Tocantins</option>
                    </select>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="bairro">Bairro</label>
                    <input class="form-control" type="text" name="bairro" id="bairro" value="<?php echo $dataUser_login["bairro"] ?>">
                </div>

                <div class="form-group col-md-4">
                    <label for="rua_avenida">Rua/Avenida</label>
                    <input class="form-control" type="text" name="rua_avenida" id="rua_avenida" value="<?php echo $dataUser_login["rua_avenida"] ?>">
                </div>

                <div class="form-group col-md-4">
                    <label for="numero">Numero</label>
                    <input class="form-control" type="number" name="numero" id="numero" value="<?php echo $dataUser_login["numero"] ?>">
                </div>
            </div>


            <div class="form-group">
                <label for="adicional">Adicional</label>
                <input class="form-control" type="text" name="adicional" id="adicional" value="<?php echo $dataUser_login["adicional"] ?>">
            </div>



            <!---------------------------------------------------------------------------------------------------------->
            <hr>
            <span class="d-block p-2 bg-dark text-white">Prontuario</span>
            <br />
            <!---------------------------------------------------------------------------------------------------------->



            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="motivoInternacao">Qual o motivo da internação?</label>
                    <select name="motivoInternacao" id="motivoInternacao" class="form-control">
                        <option selected><?php echo $dataUser_login["motivoInternacao"] ?></option>
                        <option value="drog">Drogas</option>
                        <option value="depre">Depressão</option>
                        <option value="reabili">Reabilitação Social</option>
                        <option value="other">Outros</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="motiv_Adicional">Se clicou em outros nós conte qual foi o motivo?</label>
                    <input class="form-control" type="text" name="motiv_Adicional" id="motiv_Adicional" value="<?php echo $dataUser_login["motiv_Adicional"] ?>">
                </div>
            </div>
            <!------------------------------------------------------------------------------------------------>
            <hr>
            <span class="d-block p-2 bg-dark text-white">Remédios</span>
            <br />
            <!------------------------------------------------------------------------------------------------>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="remed">Toma algum remédio?</label>
                    <input class="form-control" type="text" name="remed" id="remed" value="<?php echo $dataUser_login["remed"] ?>">
                </div>

                <div class="form-group col-md-6">
                    <label for="alergRemedio">Alérgico a alguma medicação?</label>
                    <input class="form-control" type="text" name="alergRemedio" id="alergRemedio" value="<?php echo $dataUser_login["alergRemedio"] ?>">
                </div>
            </div>


            <div class="form-group">
                <label for="sintom">Tem sintomas? Quais?</label>
                <input class="form-control" type="text" name="sintom" id="sintom" value="<?php echo $dataUser_login["sintom"] ?>">
            </div>


            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="doenc_Cronic">Alguma doença cronica?</label>
                    <input class="form-control" type="text" name="doenc_Cronic" id="doenc_Cronic" value="<?php echo $dataUser_login["doenc_Cronic"] ?>">
                </div>

            </div>

            <!------------------------------------------------------------------------------------------------>
            <hr>
            <span class="d-block p-2 bg-dark text-white">Instituição</span>
            <br />
            <!------------------------------------------------------------------------------------------------>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="instit">Qual instituição de preferencia?</label>
                    <select  name="instit" id="instit" class="form-control">
                    <?php 
                        // $minhaInst = $dataUser_login["instit"];
                        // while($linha = mysqli_fetch_assoc($lista_instituicoes)) {

                            $minhaInst = $dataUser_login["instit"];
                            while($linha = mysqli_fetch_assoc($lista_instituicoes)) {
                                $inst_principal = $linha["nomeUsuario_nomeFantasia"];
                                if($minhaInst == $inst_principal) {
                    ?>
                      
                            <option value="<?php echo $linha["nomeUsuario_nomeFantasia"] ?>" selected>
                                <?php echo utf8_encode($linha["nomeUsuario_nomeFantasia"]) ?>
                            </option>
                            <?php
                                } else {
                        ?>
                            <option value="<?php echo $linha["nomeUsuario_nomeFantasia"] ?>" >
                                <?php echo utf8_encode($linha["nomeUsuario_nomeFantasia"]) ?>
                            </option>                        
                        <?php 
                                }
                            }
                        ?>

                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="levar_Inst">Vai levar alguma coisa para a instituição?</label>
                    <input class="form-control" type="text" name="levar_Inst" id="levar_Inst" value="<?php echo $dataUser_login["levar_Inst"] ?>">
                </div>

            </div>


            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="obs_Inst">Alergia a algum produto?</label>
                    <input class="form-control" type="text" name="obs_Inst" id="obs_Inst" value="<?php echo $dataUser_login["obs_Inst"] ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="obs_Intolerancia">Intolerância a algum alimento?</label>
                    <input class="form-control" type="text" name="obs_Intolerancia" id="obs_Intolerancia" value="<?php echo $dataUser_login["obs_Intolerancia"] ?>">
                </div>
            </div>


            <input type="hidden" name="usuario_instituicaoID" value="<?php echo $dataUser_login["usuario_instituicaoID"] ?>">
            <button type="submit" class="btn btn-info">Enviar</button>






        </form>




        

    <main>
        USuARIO
        <?php
        if (isset($_SESSION["usuario_instituicaoID"])) {
            echo $_SESSION["usuario_instituicaoID"];
        }
        ?>
        TIPO DE USUARIO
        <?php
        if (isset($_SESSION["tipo"])) {
            echo $_SESSION["tipo"];
        }

        ?>

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
                                                    <a class="dropdown-item" href="../EditData/edit.people.php">Perfil</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="../sair.php">Sair</a>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
    </main>
    </div>




    <!-------------------------------------------------------------------------------------------------------------->
    <script src="https://unpkg.com/popper.js@1.15.0/dist/umd/popper.min.js"></script>
    <script src="../Bootstrap/js/jquery-3.4.1.min.js "></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="fields.js" type="text/javascript"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
</body>

</html>