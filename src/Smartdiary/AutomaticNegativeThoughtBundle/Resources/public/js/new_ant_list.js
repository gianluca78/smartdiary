$(document).ready(function(){
    ants = JSON.parse(localStorage.getItem('ants'));

    if(ants) {
        var $antsList = $('#ants');

        $.each(ants, function(index, value) {
            $antsList.append('<li class="ui-li-has-count">' +
                '<a href="#popupDialog" data-rel="popup" data-position-to="window" data-transition="pop"' +
                'id="ant-'+ index +'" class="ui-btn ui-btn-icon-right ui-icon-delete" onclick="setDialog('+index+')">'
                + value['ant'] +' <span class="ui-li-count">' + value['strenght'] +
                '</span></a></li>');
        });
    }
});

function deleteAnt(index){
    listIndex = parseInt(index) + 1;

    ants = JSON.parse(localStorage.getItem('ants'));
    ants.splice(index, 1);

    localStorage.setItem("ants", JSON.stringify(ants));

    $('#ant-'+ index +'').parent().remove();

    $("#ants").listview("refresh");

    console.log(JSON.parse(localStorage.getItem('ants')));
}

function setDialog(index){
    $('#confirm-delete').attr('onclick', 'deleteAnt('+ index +')');
}