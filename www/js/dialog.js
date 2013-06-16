$(document).ready(function() {
    $("#add-news").click(function(event){
		event.preventDefault();
        $("#dialog-form").dialog('open');
    });

	$("#dialog-form").dialog({
		autoOpen: false,
		modal : false,
		buttons: {
			"Добавить": function() {
				$(this).find("form .submit").click();
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