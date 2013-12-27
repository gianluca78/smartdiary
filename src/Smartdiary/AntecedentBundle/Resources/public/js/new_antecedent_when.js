$(document).on( 'submit','form', function(event){
    localStorage.setItem("antecedent_when", $('#antecedent_when_antecedentWhen').val());

    console.log(localStorage.getItem("antecedent_when"));
});