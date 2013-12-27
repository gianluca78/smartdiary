$(document).on( 'submit','form', function(event){
    localStorage.setItem("antecedent_where_detail", $('#antecedent_where_detail_antecedentWhereDetail').val());
    localStorage.setItem("antecedent_where_id", $('#antecedent_where_detail_antecedentWhereId').val());

    console.log(localStorage.getItem("antecedent_where_detail"));
    console.log(localStorage.getItem("antecedent_where_id"));
});