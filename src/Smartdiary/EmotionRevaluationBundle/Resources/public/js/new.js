var emotions = (JSON.parse(localStorage.getItem('emotions'))) ? JSON.parse(localStorage.getItem('emotions')) : new Array();
var emotionIndex = $('#emotion_revaluation_index').val();

$(document).ready(function(){
    if(emotions[emotionIndex]['strenght_revaluation']) {
        $('#emotion_revaluation_strenghtRevaluation').val(emotions[emotionIndex]['strenght_revaluation']);
    }
});

$(document).on( 'submit','form', function(event){
    strenghtRevaluation = $('#emotion_revaluation_strenghtRevaluation').val();
    emotions[emotionIndex]['strenght_revaluation'] = strenghtRevaluation;

    localStorage.setItem("emotions", JSON.stringify(emotions));

    console.log(JSON.parse(localStorage.getItem('emotions')));
});