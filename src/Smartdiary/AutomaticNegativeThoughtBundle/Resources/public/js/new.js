$(document).on( 'submit','form', function(event){
    ants = (JSON.parse(localStorage.getItem('ants'))) ? JSON.parse(localStorage.getItem('ants')) : new Array();
    ants.push( { 'ant' : $('#ant_ant').val(), 'strenght': $('#ant_strenght').val() } );

    localStorage.setItem("ants", JSON.stringify(ants));

    console.log(JSON.parse(localStorage.getItem('ants')));
});