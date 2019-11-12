//Evento nav-bar
$(function(e) {
    $('li.navHistorias').click(function(e) {
        $('html, body').animate({ scrollTop: $('#historias').offset().top }, 1000);
    });
});




// $(function(e) {
//     alert("Pronto, seu DOM foi cerregado");
// });