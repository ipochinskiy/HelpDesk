$(document).ready(function() {
    $("#news-add").click(function(event){
		event.preventDefault();
        $("#dialog-form").dialog('open');
    });

	$("#dialog-form").dialog({
		autoOpen: false,
		modal : true,
		buttons: {
			"Добавить": function() {
				$("form", this).submit();
			},
			"Отмена": function() {
				$( this ).dialog( "close" );
			}
		},
		close: function() {
			//allFields.val( "" ).removeClass( "ui-state-error" );
		}
	});
});