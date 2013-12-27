$(document).ready(function(){
    if(localStorage.getItem("antecedent_when"))
    {
        $('#when a').removeClass('ui-icon-carat-r');
        $('#when a').addClass('ui-icon-check');
    }

    if(localStorage.getItem("antecedent_where_id") && localStorage.getItem("antecedent_where_detail"))
    {
        $('#where a').removeClass('ui-icon-carat-r');
        $('#where a').addClass('ui-icon-check');
    }

    if(localStorage.getItem("antecedent_who_id") && localStorage.getItem("antecedent_who_detail"))
    {
        $('#who a').removeClass('ui-icon-carat-r');
        $('#who a').addClass('ui-icon-check');
    }

    if(localStorage.getItem("antecedent_what"))
    {
        $('#what a').removeClass('ui-icon-carat-r');
        $('#what a').addClass('ui-icon-check');
    }
});