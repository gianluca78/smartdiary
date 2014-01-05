$(document).ready(function(){
    emotions = JSON.parse(localStorage.getItem('emotions'));

    if(emotions) {
        var $emotionsList = $('#emotions');

        $.each(emotions, function(index, value) {
            $emotionsList.append('<li class="ui-li-has-count">' +
                '<a href="#popupDialog" data-rel="popup" data-position-to="window" data-transition="pop"' +
                'id="emotion-'+ index +'" class="ui-btn ui-btn-icon-right ui-icon-delete" onclick="setDialog('+index+')">'
                + value['emotion_label'] +' <span class="ui-li-count">' + value['strenght'] +
                '</span></a></li>');
        });
    }
});

function deleteEmotion(index){
    listIndex = parseInt(index) + 1;

    emotions = JSON.parse(localStorage.getItem('emotions'));
    emotions.splice(index, 1);

    localStorage.setItem("emotions", JSON.stringify(emotions));

    $('#emotion-'+ index +'').parent().remove();

    $("#emotions").listview("refresh");

    console.log(JSON.parse(localStorage.getItem('emotions')));
}

function setDialog(index){
    $('#confirm-delete').attr('onclick', 'deleteEmotion('+ index +')');
}