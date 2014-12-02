$(document).ready(function() {
	var pageID = $('#page_content').attr('data-page');
	CKEDITOR.disableAutoInline = true;
	var editor = CKEDITOR.inline(document.getElementById('page_content'));

	var saveContent = function () {
		$.ajax({
			type: "POST",
			url: document.location.href,
			data: { page_id: pageID, content:  editor.getData()}
		})
		.done(function(msg) {
			alert( "Data Saved: " + msg );
		})
		.fail(function(){
			console.error('f');
		});
	};

	$('#page_content_sub').on('click', saveContent);

	$(window).keypress(function(event) {
	    if (!(event.which == 115 && event.ctrlKey) && !(event.which == 19)) {
	    	return;
	    }

	    saveContent();

	    event.preventDefault();
	    return false;
	});
});