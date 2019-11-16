<?php require_once("conexao/conexao.php")?>
<?php
    if(isset($_POST["razao_Social"])) {
        $razao_Social =                 $_POST["razao_Social"];
        $nomeUsuario_nomeFantasia =     $_POST["nome_Fantasia"];
        $cpf_cnpj =                     $_POST["cnpj"];
        $email =                        $_POST["email"];
        $senha =                        $_POST["senha"];
        $telefoneFixo =                 $_POST["telefoneFixo1"];
        $telefoneFixo2 =                $_POST["telefoneFixo2"];
        $telefoneCelular =              $_POST["telefoneCelular"];
        $wpp =                          $_POST["wpp"];

        $cep =                          $_POST["cep"];
        $estado =                       $_POST["estado"];
        $cidade =                       $_POST["cidade"];
        $bairro =                       $_POST["bairro"];
        $rua_avenida =                  $_POST["rua_avenida"];
        $numero =                       $_POST["numero"];
        $adicional =                    $_POST["adicional"];


        // $inserir = "INSERT INTO cadastro_usuario ";
        // $inserir .= "(usuario, senha, email, cpf, dataNascimento, sexo, estadoCivil, telefoneCelular, telefoneFixo, cep, estado, cidade, bairro, rua_avenida, numero, adicional, motivoInternacao, motiv_Adicional, remed, alergRemedio, sintom, doenc_Cronic, instit, levar_Inst, obs_Inst, obs_Intolerancia) "; 
        // $inserir .= "VALUES ";
        // $inserir .= "('$usuario', '$senha', '$email', '$cpf', '$dataNascimento', '$sexo', '$estadoCivil', '$telefoneCelular', '$telefoneFixo', '$cep', '$estado', '$cidade', '$bairro', '$rua_avenida', '$numero', '$adicional', '$motivoInternacao', '$motiv_Adicional', '$remed', '$alergRemedio', '$sintom', '$doenc_Cronic', '$instit', '$levar_Inst', '$obs_Inst', '$obs_Intolerancia') ";

        $inserir = "INSERT INTO tb_usuario ";
        $inserir .= "(razao_Social, nomeUsuario_nomeFantasia, cpf_cnpj, email, senha, telefoneFixo, telefoneFixo2, telefoneCelular, wpp, cep, estado, cidade, bairro, rua_avenida, numero, adicional, tipo) "; 
        $inserir .= "VALUES ";
        $inserir .= "('$razao_Social', '$nomeUsuario_nomeFantasia', '$cpf_cnpj', '$email', '$senha', '$telefoneFixo', '$telefoneFixo2', '$telefoneCelular', '$wpp', '$cep', '$estado', '$cidade', '$bairro', '$rua_avenida', '$numero', '$adicional', '2') ";
        // var_dump($inserir);exit;
        $operacao_inserir = mysqli_query($conecta,$inserir);
        if(!$operacao_inserir) {
            die("ERRO NO BANCO");
        } else {
           
            header("Location:afterLogin/instituicao.php"); exit;
    }
    }


    $select = "SELECT usuario_instituicaoID, razao_Social ";
    $select .= "FROM tb_usuario ";
    $lista_tb_usuario = mysqli_query($conecta, $select);

    if(!$lista_tb_usuario){
        die("Erro no banco");
    }
?>