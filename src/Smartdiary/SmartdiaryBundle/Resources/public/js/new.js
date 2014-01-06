$(document).ready(function(){
    if(localStorage.getItem("antecedent_when")
        && localStorage.getItem("antecedent_where_id")
        && localStorage.getItem("antecedent_where_detail")
        && localStorage.getItem("antecedent_who_id")
        && localStorage.getItem("antecedent_who_detail")
        && localStorage.getItem("antecedent_what")
        ) {
        $('#antecedent a').removeClass('ui-icon-carat-r');
        $('#antecedent a').addClass('ui-icon-check');
    }

    if(localStorage.getItem("ants") && localStorage.getItem('ants')!='[]') {
        $('#automatic_negative_thought a').removeClass('ui-icon-carat-r');
        $('#automatic_negative_thought a').addClass('ui-icon-check');
    }

    if(localStorage.getItem("behavior")
        && localStorage.getItem("emotions") != '[]'
        && localStorage.getItem("sensations") != '[]'
        ) {
        $('#consequence a').removeClass('ui-icon-carat-r');
        $('#consequence a').addClass('ui-icon-check');
    }

    $.each(JSON.parse(localStorage.getItem('ants')), function(index, value) {
        if(value['apt']) {
            $('#apt a').removeClass('ui-icon-carat-r');
            $('#apt a').addClass('ui-icon-check');
        }
    });

    $.each(JSON.parse(localStorage.getItem('emotions')), function(index, value) {
        if(value['strenght_revaluation']) {
            $('#emotion-revaluation a').removeClass('ui-icon-carat-r');
            $('#emotion-revaluation a').addClass('ui-icon-check');
        }
    });
});

function saveSmartdiary() {
    if($('#antecedent a').hasClass('ui-icon-check') &&
        $('#automatic_negative_thought a').hasClass('ui-icon-check') &&
        $('#apt a').hasClass('ui-icon-check') &&
        $('#consequence a').hasClass('ui-icon-check') &&
        $('#emotion-revaluation a').hasClass('ui-icon-check')
        ) {
            alert('miao');
    }
    else {
        $('ul').before('<div class="flash-error">Impossibile salvare il diario: per favore compilare tutti ' +
            'i campi e riprovare.</div>');
    }
}