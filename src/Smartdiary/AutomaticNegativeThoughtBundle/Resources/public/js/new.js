$(document).on( 'submit','form', function(event){
    ants = (JSON.parse(localStorage.getItem('ants'))) ? JSON.parse(localStorage.getItem('ants')) : new Array();
    ant = $('#ant_ant').val();
    strenght = $('#ant_strenght').val();

    console.log(strenght);
    console.log(parseInt(strenght));
    console.log(ant.length);

    if((parseInt(strenght) % 1 ===0) && (ant.length>3 && ant.length<255)) {
        ants.push( { 'ant' : $('#ant_ant').val(), 'strenght': $('#ant_strenght').val(), 'apt' : '', 'apt_strenght' : '0' } );

        localStorage.setItem("ants", JSON.stringify(ants));

        console.log(JSON.parse(localStorage.getItem('ants')));
    }
});