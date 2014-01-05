$(document).ready(function(){
    ants = JSON.parse(localStorage.getItem('ants'));

    if(ants) {
        var $aptsList = $('#apts');

        $.each(ants, function(index, value) {
            $aptsList.append('<li class="ui-li-has-count">' +
                '<a href="/smartdiary/web/app_dev.php/pensieri-alternativi-funzionali/nuovo/'+index+'"' +
                'data-rel="popup" data-position-to="window" data-transition="pop"' +
                'id="apt-'+ index +'" class="ui-btn ui-btn-icon-right ui-icon-carat-r"' +
                'data-ajax="false">' +
                '<h3>Pensiero negativo:</h3><p>'+ value['ant'] +'</p>' +
                '<h3>Pensiero alternativo:</h3><p>'+ value['apt'] +'</p>' +
                '</a></li>');
        });
    }
});