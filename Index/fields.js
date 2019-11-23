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


//-----------------------------------------------------------------------------------------------------//
//MASK CPF OU CNPJ
$("#cpf_cnpj").keydown(function(){
    try {
    	$("#cpf_cnpj").unmask();
    } catch (e) {}
    
    var tamanho = $("#cpf_cnpj").val().length;
	
    if(tamanho < 11){
        $("#cpf_cnpj").mask("999.999.999-99");
    } else if(tamanho >= 11){
        $("#cpf_cnpj").mask("99.999.999/9999-99");
    }
    
    // ajustando foco
    var elem = this;
    setTimeout(function(){
    	// mudo a posição do seletor
    	elem.selectionStart = elem.selectionEnd = 10000;
    }, 0);
    // reaplico o valor para mudar o foco
    var currentValue = $(this).val();
    $(this).val('');
    $(this).val(currentValue);
});


