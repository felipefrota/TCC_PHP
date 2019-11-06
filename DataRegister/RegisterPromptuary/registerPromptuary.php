<html>

<head>
    <title>Cadastro</title>
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="estilos.css" rel="stylesheet">
</head>

<body>

    <span class="d-block p-3 bg-primary text-white">Prontuario</span>
    <br/>


    <div class="container-fluid">
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="motivoInternacao">Qual o motivo da internação?</label>
                    <select id="motivoInternacao" class="form-control">
                    <option selected>Escolher...</option>
                    <option value="drog">Drogas</option>
                    <option value="depre">Depressão</option>
                    <option value="reabili">Reabilitação Social</option>
                    <option value="other">Outros</option>
                </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="motiv_Adicional">Se clicou em outros nós conte qual foi o motivo?</label>
                    <input class="form-control" type="text" id="motiv_Adicional" placeholder="Opcional...">
                </div>
            </div>
            <!------------------------------------------------------------------------------------------------>
            <hr>
            <span class="d-block p-2 bg-dark text-white">Remédios</span>
            <br/>
            <!------------------------------------------------------------------------------------------------>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="remed">Toma algum remédio?</label>
                    <input class="form-control" type="text" id="remed" placeholder="Ex:Remédio, Remédio 2, Remédio 3">
                </div>

                <div class="form-group col-md-6">
                    <label for="alerg-Remedio">Alérgico a alguma medicação?</label>
                    <input class="form-control" type="text" id="alerg-Remedio" placeholder="Ex: Remédio, Remédio 02, Remédio 03">
                </div>
            </div>


            <div class="form-group">
                <label for="sintom">Tem sintomas? Quais?</label>
                <input class="form-control" type="text" id="sintom" placeholder="Descreva os sintomas">
            </div>


            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="doenc_Cronic">Alguma doença cronica?</label>
                    <input class="form-control" type="text" id="doenc_Cronic" placeholder="Digite aqui a doença">
                </div>

            </div>

            <!------------------------------------------------------------------------------------------------>
            <hr>
            <span class="d-block p-2 bg-dark text-white">Instituição</span>
            <br/>
            <!------------------------------------------------------------------------------------------------>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="instit">Qual instituição de preferencia?</label>
                    <select id="instit" class="form-control">
                        <option selected>Escolher...</option>
                        <option value="inst1">Instituição 1</option>
                        <option value="inst2">Instituição 2</option>
                        <option value="inst3">Instituição 3</option>
                        <option value="inst4">Instituição 4</option>
                        <option value="inst5">Instituição 5</option>
                        <option value="inst6">Instituição 6</option>
                        <option value="inst7">Instituição 7</option>

                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="levar_Inst">Vai levar alguma coisa para a instituição?</label>
                    <input class="form-control" type="text" id="levar_Inst" placeholder="Ex: cobertor, tavesseiro, etc...">
                </div>

            </div>


            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="obs_Inst">Alergia a algum produto?</label>
                    <input class="form-control" type="text" id="obs_Inst" placeholder="Ex: amaciante, sabão em pó, etc...">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="obs_Intolerancia">Intolerância a algum alimento?</label>
                    <input class="form-control" type="text" id="obs_Intolerancia" placeholder="Ex: lactose, glúten, etc...">
                </div>
            </div>



            <button type="button" class="btn btn-info">Enviar</button>


        </form>
    </div>
    <!-------------------------------------------------------------------------------------------------------------->
    <script src="https://unpkg.com/popper.js@1.15.0/dist/umd/popper.min.js"></script>
    <script src="Bootstrap/js/jquery-3.4.1.min.js "></script>
    <script src="Bootstrap/js/bootstrap.min.js "></script>
</body>

</html>