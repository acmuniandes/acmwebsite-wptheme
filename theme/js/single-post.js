jQuery(function(){


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
