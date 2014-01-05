$(document).on( 'submit','form', function(event){
    sensations = (JSON.parse(localStorage.getItem('sensations'))) ? JSON.parse(localStorage.getItem('sensations')) : new Array();
    sensationId = $('#sensation_detail_sensationId').val();
    strenght = $('#sensation_detail_strenght').val();

    if((parseInt(strenght) % 1 ===0)) {
        sensations.push( {
            'sensation_id' : $('#sensation_detail_sensationId').val(),
            'strenght': $('#sensation_detail_strenght').val(),
            'sensation_label' : $('#sensation_detail_sensationLabel').val() }
        );

        localStorage.setItem("sensations", JSON.stringify(sensations));

        console.log(JSON.parse(localStorage.getItem('sensations')));
    }
});