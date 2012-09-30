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
	jQuery('#comment-btn-submit').click(function(event){

		var array = jQuery('#user-logged-in').length > 0 ? ['comment'] : ['author','id', 'url'];

		if(support.validate(array)){



		}else{
			event.stopPropagation();
		}

	});
	

});
