<?php require_once("conexao/conexao.php")?>
<?php
    if(isset($_POST["usuario"])) {
        $usuario =           $_POST["usuario"];
        $senha =             $_POST["senha"];
        $email =             $_POST["email"];
        $cpf =               $_POST["cpf"];
        $dataNascimento =    $_POST["dataNascimento"];
        $sexo =              $_POST["sexo"];
        $estadoCivil =       $_POST["estadoCivil"];
        $telefoneCelular =   $_POST["telefoneCelular"];
        $telefoneFixo =      $_POST["telefoneFixo"];

        $cep =               $_POST["cep"];
        $estado =            $_POST["estado"];
        $cidade =            $_POST["cidade"];
        $bairro =            $_POST["bairro"];
        $rua_avenida =       $_POST["rua_avenida"];
        $numero =            $_POST["numero"];
        $adicional =         $_POST["adicional"];

        $motivoInternacao =  $_POST["motivoInternacao"];
        $motiv_Adicional =   $_POST["motiv_Adicional"];
        $remed =             $_POST["remed"];
        $alergRemedio =      $_POST["alergRemedio"];
        $sintom =            $_POST["sintom"];
        $doenc_Cronic =      $_POST["doenc_Cronic"];

        $instit =            $_POST["instit"];
        $levar_Inst =        $_POST["levar_Inst"];
        $obs_Inst =          $_POST["obs_Inst"];
        $obs_Intolerancia =  $_POST["obs_Intolerancia"];

        // $inserir = "INSERT INTO cadastro_usuario ";
        // $inserir .= "(usuario, senha, email, cpf, dataNascimento, sexo, estadoCivil, telefoneCelular, telefoneFixo, cep, estado, cidade, bairro, rua_avenida, numero, adicional, motivoInternacao, motiv_Adicional, remed, alergRemedio, sintom, doenc_Cronic, instit, levar_Inst, obs_Inst, obs_Intolerancia) "; 
        // $inserir .= "VALUES ";
        // $inserir .= "('$usuario', '$senha', '$email', '$cpf', '$dataNascimento', '$sexo', '$estadoCivil', '$telefoneCelular', '$telefoneFixo', '$cep', '$estado', '$cidade', '$bairro', '$rua_avenida', '$numero', '$adicional', '$motivoInternacao', '$motiv_Adicional', '$remed', '$alergRemedio', '$sintom', '$doenc_Cronic', '$instit', '$levar_Inst', '$obs_Inst', '$obs_Intolerancia') ";

        $inserir = "INSERT INTO cadastro_usuario ";
        $inserir .= "(usuario, senha, email, cpf, dataNascimento, sexo, estadoCivil, telefoneCelular, telefoneFixo, cep, estado, cidade, bairro, rua_avenida, numero, adicional, motivoInternacao, motiv_Adicional, remed, alergRemedio, sintom, doenc_Cronic, instit, levar_Inst, obs_Inst, obs_Intolerancia) "; 
        $inserir .= "VALUES ";
        $inserir .= "('$usuario', '$senha', '$email', '$cpf', '$dataNascimento', '$sexo', '$estadoCivil', '$telefoneCelular', '$telefoneFixo', '$cep', '$estado', '$cidade', '$bairro', '$rua_avenida', '$numero', '$adicional', '$motivoInternacao', '$motiv_Adicional', '$remed', '$alergRemedio', '$sintom', '$doenc_Cronic', '$instit', '$levar_Inst', '$obs_Inst', '$obs_Intolerancia') ";
        // var_dump($inserir);exit;
        $operacao_inserir = mysqli_query($conecta,$inserir);
        if(!$operacao_inserir) {
            die("ERRO NO BANCO");
        }
    }


    $select = "SELECT usuarioID, usuario ";
    $select .= "FROM cadastro_usuario ";
    $lista_cadastro_usuario = mysqli_query($conecta, $select);

    if(!$lista_cadastro_usuario){
        die("Erro no banco");
    }
?>

