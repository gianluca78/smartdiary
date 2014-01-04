$(document).on( 'submit','form', function(event){
    localStorage.setItem("behavior", $('#behavior_behavior').val());

    console.log(localStorage.getItem("behavior"));
});