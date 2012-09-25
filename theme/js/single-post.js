jQuery(function(){

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
});
