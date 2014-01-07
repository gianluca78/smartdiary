$(document).ready(function(){
    if(localStorage.getItem('behavior')) {
        $('#behavior_behavior').val(localStorage.getItem('behavior'));
    }
});

$(document).on( 'submit','form', function(event){
    localStorage.setItem("behavior", $('#behavior_behavior').val());

    console.log(localStorage.getItem("behavior"));
});