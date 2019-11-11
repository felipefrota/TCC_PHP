<?php require_once("../conexao/conexao.php")?>


<?php 
 $select = "SELECT usuario_instituicaoID, nomeUsuario_nomeFantasia, tipo ";
 $select .= "FROM TB_USUARIO ";
 $lista_TB_USUARIO = mysqli_query($conecta, $select);

 if(!$lista_TB_USUARIO){
     die("Erro no banco");
 }



 $instituicoes = "SELECT nomeUsuario_nomeFantasia ";
$instituicoes .= "FROM tb_usuario ";
$instituicoes .= "WHERE tipo = 2 ";
$lista_instituicoes = mysqli_query($conecta, $instituicoes);
if(!$lista_instituicoes) {
    die("erro no banco ao procurar instituções");
}

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

        <form class="was-validated" action="../cadastroUsuario.php" method="post">

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="usuario">Seu Nome</label>
                    <input class="form-control" type="text" name="usuario" id="usuario"  placeholder="Usuario">
                </div>

                <div class="form-group col-md-4">
                    <label for="senha">Sobrenome:</label>
                    <input class="form-control" type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome">
                </div>

                <div class="form-group col-md-4">
                    <label for="senha">Senha</label>
                    <input class="form-control" type="password" name="senha" id="senha" placeholder="Senha">
                </div>

            </div>


            <div class="form-group">
                <label for="email">Seu Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="seuemail@email.com">
            </div>


            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="cpf">CPF</label>
                    <input class="form-control" type="text" name="cpf" id="cpf" placeholder="000.000.000.00">
                </div>

                <div class="form-group col-md-3">
                    <label for="dataNascimento">Data de Nascimento</label>
                    <input class="form-control" name="dataNascimento" id="dataNascimento"  type="date">
                </div>

                <div class="form-group col-md-3">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" id="sexo" class="form-control">
                        <option selected>Escolher...</option>
                        <option value="masc">Masculino</option>
                        <option value="fem">Feminino</option>
                        <option value="other">Outro...</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="estadoCivil">Estado Civil</label>
                    <select class="form-control" name="estadoCivil" id="estadoCivil">
                        <option selected>Escolher...</option>
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
                    <input class="form-control" type="tel" name="telefoneCelular" id="telefoneCelular" placeholder="EX: (ddd)90000-0000">
                </div>

                <div class="form-group col-md-3">
                    <label for="telefoneFixo">Telefone Fixo</label>
                    <input class="form-control" type="tel" name="telefoneFixo" id="telefoneFixo" placeholder="EX: (ddd)0000-0000">
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
                    <input class="form-control" type="text" name="cep" id="cep" id="cep" placeholder="EX: 00000-000">
                </div>

                <div class="form-group col-md-4">
                    <label for="estado">Estado</label>
                    <input class="form-control" type="text" name="estado" id="estado" placeholder="EX: Distrito Federal">
                </div>

                <div class="form-group col-md-4">
                    <label for="cidade">Cidade</label>
                    <select class="form-control" name="cidade" id="cidade">
                        <option selected value="estado">Selecione o Estado...</option>
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
                    <input class="form-control" type="text" name="bairro" id="bairro" placeholder="EX: Asa Norte">
                </div>

                <div class="form-group col-md-4">
                    <label for="rua_avenida">Rua/Avenida</label>
                    <input class="form-control" type="text" name="rua_avenida" id="rua_avenida">
                </div>

                <div class="form-group col-md-4">
                    <label for="numero">Numero</label>
                    <input class="form-control" type="number" name="numero" id="numero" placeholder="Numero casa ou Apt">
                </div>
            </div>


            <div class="form-group">
                <label for="adicional">Adicional</label>
                <input class="form-control" type="text" name="adicional" id="adicional" placeholder="Dados adicionais(Opcional)">
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
                        <option selected>Escolher...</option>
                        <option value="drog">Drogas</option>
                        <option value="depre">Depressão</option>
                        <option value="reabili">Reabilitação Social</option>
                        <option value="other">Outros</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="motiv_Adicional">Se clicou em outros nós conte qual foi o motivo?</label>
                    <input class="form-control" type="text" name="motiv_Adicional" id="motiv_Adicional" placeholder="Opcional...">
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
                    <input class="form-control" type="text" name="remed" id="remed" placeholder="Ex:Remédio, Remédio 2, Remédio 3">
                </div>

                <div class="form-group col-md-6">
                    <label for="alergRemedio">Alérgico a alguma medicação?</label>
                    <input class="form-control" type="text" name="alergRemedio" id="alergRemedio" placeholder="Ex: Remédio, Remédio 02, Remédio 03">
                </div>
            </div>


            <div class="form-group">
                <label for="sintom">Tem sintomas? Quais?</label>
                <input class="form-control" type="text" name="sintom" id="sintom" placeholder="Descreva os sintomas">
            </div>


            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="doenc_Cronic">Alguma doença cronica?</label>
                    <input class="form-control" type="text" name="doenc_Cronic" id="doenc_Cronic" placeholder="Digite aqui a doença">
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
                          while($linha = mysqli_fetch_assoc($lista_instituicoes)) {
                        ?>
                            <option value="<?php echo $linha["nomeUsuario_nomeFantasia"];  ?>">
                                <?php echo utf8_encode($linha["nomeUsuario_nomeFantasia"]);  ?>
                            </option>
                        <?php
                            }
                        
                        ?>  

<!------->


                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="levar_Inst">Vai levar alguma coisa para a instituição?</label>
                    <input class="form-control" type="text" name="levar_Inst" id="levar_Inst" placeholder="Ex: cobertor, tavesseiro, etc...">
                </div>

            </div>


            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="obs_Inst">Alergia a algum produto?</label>
                    <input class="form-control" type="text" name="obs_Inst" id="obs_Inst" placeholder="Ex: amaciante, sabão em pó, etc...">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="obs_Intolerancia">Intolerância a algum alimento?</label>
                    <input class="form-control" type="text" name="obs_Intolerancia" id="obs_Intolerancia" placeholder="Ex: lactose, glúten, etc...">
                </div>
            </div>



            <button type="submit" class="btn btn-info">Enviar</button>






        </form>
    </div>

    <!-- <div class="container-fluid">
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Senha</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Senha">
            </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Endereço</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Rua dos Bobos, nº 0">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Endereço 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartamento, hotel, casa, etc.">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity">Cidade</label>
            <input type="text" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-4">
            <label for="inputEstado">Estado</label>
            <select id="inputEstado" class="form-control">
                  <option selected>Escolher...</option>
                  <option>...</option>
                </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputCEP">CEP</label>
            <input type="text" class="form-control" id="inputCEP">
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
                  Clique em mim
                </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
    </div> -->





    <!-------------------------------------------------------------------------------------------------------------->
    <script src="https://unpkg.com/popper.js@1.15.0/dist/umd/popper.min.js"></script>
    <script src="../Bootstrap/js/jquery-3.4.1.min.js "></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="fields.js" type="text/javascript"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
</body>

</html>