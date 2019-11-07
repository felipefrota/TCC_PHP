<?php require_once("conexao/conexao.php")?>
<?php
    if(isset($_POST["razao_Social"])) {
        $razao_Social =      $_POST["razao_Social"];
        $nome_Fantasia =     $_POST["nome_Fantasia"];
        $cnpj =              $_POST["cnpj"];
        $email =             $_POST["email"];
        $senha =             $_POST["senha"];
        $telefoneFixo1 =     $_POST["telefoneFixo1"];
        $telefoneFixo2 =     $_POST["telefoneFixo2"];
        $telefoneCelular =   $_POST["telefoneCelular"];
        $wpp =               $_POST["wpp"];


        // $inserir = "INSERT INTO cadastro_usuario ";
        // $inserir .= "(usuario, senha, email, cpf, dataNascimento, sexo, estadoCivil, telefoneCelular, telefoneFixo, cep, estado, cidade, bairro, rua_avenida, numero, adicional, motivoInternacao, motiv_Adicional, remed, alergRemedio, sintom, doenc_Cronic, instit, levar_Inst, obs_Inst, obs_Intolerancia) "; 
        // $inserir .= "VALUES ";
        // $inserir .= "('$usuario', '$senha', '$email', '$cpf', '$dataNascimento', '$sexo', '$estadoCivil', '$telefoneCelular', '$telefoneFixo', '$cep', '$estado', '$cidade', '$bairro', '$rua_avenida', '$numero', '$adicional', '$motivoInternacao', '$motiv_Adicional', '$remed', '$alergRemedio', '$sintom', '$doenc_Cronic', '$instit', '$levar_Inst', '$obs_Inst', '$obs_Intolerancia') ";

        $inserir = "INSERT INTO cadastro_instituicao ";
        $inserir .= "(razao_Social, nome_Fantasia, cnpj, email, senha, telefoneFixo1, telefoneFixo2, telefoneCelular, wpp) "; 
        $inserir .= "VALUES ";
        $inserir .= "('$razao_Social', '$nome_Fantasia', '$cnpj', '$email', '$senha', '$telefoneFixo1', '$telefoneFixo2', '$telefoneCelular', '$wpp') ";
        // var_dump($inserir);exit;
        $operacao_inserir = mysqli_query($conecta,$inserir);
        if(!$operacao_inserir) {
            die("ERRO NO BANCO");
        }
    }


    $select = "SELECT instituicaoID, razao_Social ";
    $select .= "FROM cadastro_instituicao ";
    $lista_cadastro_usuario = mysqli_query($conecta, $select);

    if(!$lista_cadastro_usuario){
        die("Erro no banco");
    }
?>