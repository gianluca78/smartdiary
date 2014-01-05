$(document).ready(function(){
    sensations = JSON.parse(localStorage.getItem('sensations'));

    if(sensations) {
        var $sensationsList = $('#sensations');

        $.each(sensations, function(index, value) {
            $sensationsList.append('<li class="ui-li-has-count">' +
                '<a href="#popupDialog" data-rel="popup" data-position-to="window" data-transition="pop"' +
                'id="sensation-'+ index +'" class="ui-btn ui-btn-icon-right ui-icon-delete" onclick="setDialog('+index+')">'
                + value['sensation_label'] +' <span class="ui-li-count">' + value['strenght'] +
                '</span></a></li>');
        });
    }
});

function deleteSensation(index){
    listIndex = parseInt(index) + 1;

    sensations = JSON.parse(localStorage.getItem('sensations'));
    sensations.splice(index, 1);

    localStorage.setItem("sensations", JSON.stringify(sensations));

    $('#sensation-'+ index +'').parent().remove();

    $("#sensations").listview("refresh");

    console.log(JSON.parse(localStorage.getItem('sensations')));
}

function setDialog(index){
    $('#confirm-delete').attr('onclick', 'deleteSensation('+ index +')');
}