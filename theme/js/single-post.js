jQuery(function(){
	
	//File uploading..
	jQuery('#upload-button').click(function(event){
	
		//Checks if a user is logged in.
		if(!jQuery('#user-login').length > 0)
		{
			event.stopPropagation();
			jQuery('#user-info').click();
		}

	});

	jQuery('#upload-send-btn').click(function(event){
		if(support.validate(['fake-file-id'],['div-upload-file'],"span6"))
		{
			var username = jQuery('#user-login').text();
			jQuery('#login').attr('value',username);
			var formData = new FormData(jQuery('#upload-file-form')[0]);
			jQuery.ajax({
			url: '/uploadfile.php',
			data : formData,
			xhr: function(){
				myXhr = jQuery.ajaxSettings.xhr();
				return myXhr;
			},
			type : 'POST',
			cache: false,
			contentType: false,
			processData: false,
			success : function(response){
					response = jQuery.parseJSON(response);
					support.custom_alert('Robocode',response.msg, response.type);
				}

			
			
			});
		}else
			event.stopPropagation();	
	});

	jQuery('#upload-close-btn, #upload-cancel-btn').click(function(){
		support.clearLabels(['fake-file-id']);
	});

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
