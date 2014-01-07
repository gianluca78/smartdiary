$(document).ready(function(){
    if(localStorage.getItem('antecedent_when')) {
        $('#antecedent_when_antecedentWhen').val(localStorage.getItem('antecedent_when'));
    }
});

$(document).on( 'submit','form', function(event){
    localStorage.setItem("antecedent_when", $('#antecedent_when_antecedentWhen').val());

    console.log(localStorage.getItem("antecedent_when"));
});