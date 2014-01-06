$(document).on( 'submit','form', function(event){
    emotions = (JSON.parse(localStorage.getItem('emotions'))) ? JSON.parse(localStorage.getItem('emotions')) : new Array();
    strenghtRevaluation = $('#emotion_revaluation_strenght').val();
    emotionIndex = $('#emotion_revaluation_index').val();

    emotions[emotionIndex]['strenght_revaluation'] = strenghtRevaluation;

    localStorage.setItem("emotions", JSON.stringify(emotions));

    console.log(JSON.parse(localStorage.getItem('emotions')));
});