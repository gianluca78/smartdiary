$(document).on( 'submit','form', function(event){
    emotions = (JSON.parse(localStorage.getItem('emotions'))) ? JSON.parse(localStorage.getItem('emotions')) : new Array();
    emotionId = $('#emotion_detail_emotionId').val();
    strenght = $('#emotion_detail_strenght').val();

    if((parseInt(strenght) % 1 ===0)) {
        emotions.push( {
            'emotion_id' : $('#emotion_detail_emotionId').val(),
            'strenght': $('#emotion_detail_strenght').val(),
            'emotion_label' : $('#emotion_detail_emotionLabel').val() }
        );

        localStorage.setItem("emotions", JSON.stringify(emotions));

        console.log(JSON.parse(localStorage.getItem('emotions')));
    }
});