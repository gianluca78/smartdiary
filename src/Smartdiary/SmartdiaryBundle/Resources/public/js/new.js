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
});