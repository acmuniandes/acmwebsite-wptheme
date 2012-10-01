jQuery(function(){

	//Styling of the input type file.

	jQuery('#div-upload-file').click(function(){
		//Triggers click event on hidden input type.
		jQuery('#file-input').click();
	});

	jQuery('#file-input').change(function(){
		var name = jQuery('#file-input')[0].files[0].name;
		jQuery('#fake-file-id').attr('value', 'your/secret/path/' + name);
		jQuery('#div-upload-file').attr('class','input-prepend span6 control-group success');
	});


	//Handling of the reply label.
	jQuery('.comment-reply-link').click(function(){
		var id = jQuery(this).attr('id');
		jQuery('#comment_parent').attr('value',id);
		var author = jQuery('#author-' + id).text();
		jQuery('#comment-form-header').text('Leave a reply to' + author);
	});
	jQuery('#comment-button').click(function(){
		jQuery('#comment_parent').attr('value',0 );
		jQuery('#comment-form-header').text('Leave a comment');
	});


	//Comment form validation.
	jQuery('#comment-form').submit(function(event){

		var array = jQuery('#user-logged-in').length > 0 ? ['comment'] : ['submit-author','submit-email', 'comment'];
		if(!support.validate(array, ["div-submit-author","div-submit-email","div-comment"], "span6")){
			event.preventDefault();
		}

	});

	jQuery('#comment-close-btn, #comment-cancel-btn').click(function(){
		support.clearLabels(['submit-author','submit-email','comment']);

	});
	

});
