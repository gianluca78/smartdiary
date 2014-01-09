$(document).ready(function () {
    hideShowTeacherEmail();
});

$( "#user_role" ).change(function() {
    hideShowTeacherEmail();
});

function hideShowTeacherEmail()
{
    if($( "#user_role").val()==1) {
        $("#user_teacher_email").parent().parent().hide();
    }
    else {
        $("#user_teacher_email").parent().parent().show();
    }
}