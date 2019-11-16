//MASK CEP
$(document).ready(function() {
    var $campo = $("#cep");
    $campo.mask('00000-000');
});

//-----------------------------------------------------------------------------------------------------//
//MASK CPF
$(document).ready(function() {
    var $campo = $("#cpf");
    $campo.mask('000.000.000-00');
});

//-----------------------------------------------------------------------------------------------------//
//MASK TELEFONE
$(document).ready(function() {
    var $campo = $("#telefoneCelular");
    $campo.mask("(00) 00000-0000");
});

$(document).ready(function() {
    var $campo = $("#telefoneFixo");
    $campo.mask("(00) 0000-0000");
});

$(document).ready(function() {
    var $campo = $("#telefoneFixo1");
    $campo.mask("(00) 0000-0000");
});

$(document).ready(function() {
    var $campo = $("#telefoneFixo2");
    $campo.mask("(00) 0000-0000");
});

$(document).ready(function() {
    var $campo = $("#wpp");
    $campo.mask("(00) 00000-0000");
});


//-----------------------------------------------------------------------------------------------------//
//
$(document).ready(function() {
    var $campo = $("#cnpj");
    $campo.mask('00.000.000/0000-00');
});

//-----------------------------------------------------------------------------------------------------//
//MASK RENDA
$(document).ready(function() {
    var $campo = $("#Renda");
    $campo.mask('0000.00');
});