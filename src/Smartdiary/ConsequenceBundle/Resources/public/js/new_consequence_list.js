if(localStorage.getItem("behavior")) {
    $('#behavior a').removeClass('ui-icon-carat-r');
    $('#behavior a').addClass('ui-icon-check');
}

if(localStorage.getItem("emotions") != '[]') {
    $('#emotion a').removeClass('ui-icon-carat-r');
    $('#emotion a').addClass('ui-icon-check');
}

if(localStorage.getItem("sensations") != '[]') {
    $('#sensation a').removeClass('ui-icon-carat-r');
    $('#sensation a').addClass('ui-icon-check');
}