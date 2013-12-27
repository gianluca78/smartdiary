$(document).on( 'submit','form', function(event){
    localStorage.setItem("antecedent_who_detail", $('#antecedent_who_detail_antecedentWhoDetail').val());
    localStorage.setItem("antecedent_who_id", $('#antecedent_who_detail_antecedentWhoId').val());

    console.log(localStorage.getItem("antecedent_who_detail"));
    console.log(localStorage.getItem("antecedent_who_id"));
});