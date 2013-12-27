$(document).on( 'submit','form', function(event){
    localStorage.setItem("antecedent_what", $('#antecedent_what_antecedentWhat').val());

    console.log(localStorage.getItem("antecedent_what"));
});