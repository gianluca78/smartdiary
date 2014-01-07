$(document).ready(function(){
    emotions = JSON.parse(localStorage.getItem('emotions'));

    if(emotions) {
        var $emotionsRevaluationList = $('#emotions-revaluation');

        $.each(emotions, function(index, value) {
            $emotionsRevaluationList.append('<li class="ui-li-has-count">' +
                '<a href="/smartdiary/web/app_dev.php/rivalutazione-emozioni/nuovo/'+index+'"' +
                'id="emotion_revaluation-'+ index +'" class="ui-btn ui-btn-icon-right ui-icon-carat-r"' +
                'data-ajax="false">' +
                value['emotion_label'] +
                '<span class="ui-li-count"><span class="red">'+ value['strenght'] +'</span> - ' +
                '<span class="green">' + value['strenght_revaluation']
                + '</span></span></a></li>');
        });
    }
});