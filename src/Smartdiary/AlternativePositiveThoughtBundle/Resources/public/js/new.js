var ants = (JSON.parse(localStorage.getItem('ants'))) ? JSON.parse(localStorage.getItem('ants')) : new Array();
var antIndex = $('#apt_index').val();

$(document).ready(function() {
    $('div .description').html('Il tuo pensiero negativo era: "'+ants[antIndex]['ant']+'". ' +
        'Adesso riformula il pensiero negativo in uno utile che sia di aiuto per superare la situazione problematica.');

    if(ants[antIndex]['apt']) {
        $('#apt_apt').val(ants[antIndex]['apt']);
    }
});

$(document).on( 'submit','form', function(event){
    ants[antIndex]['apt'] = $('#apt_apt').val();

    localStorage.setItem("ants", JSON.stringify(ants));

    console.log(JSON.parse(localStorage.getItem('ants')));

});