$(document).ready(function() {
    $("#news-add").click(function(){
        if ($(".ui-dialog").length){
            $("#dialog-form").open();
        } else {
            $("#dialog-form").dialog({
                autoOpen: true,
//            height: 158,
//            width: 185,
//            modal: true,
                buttons: {
                    "Добавить": function() {
                        $( this ).dialog( "close" );
                    },
                    "Отмена": function() {
                        $( this ).dialog( "close" );
                    }
                },
                close: function() {
                    allFields.val( "" ).removeClass( "ui-state-error" );
                }
            });
        }
        return false;
    });
});