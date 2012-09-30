jQuery(function(){

	/* Uploading function. Assumes existence of a button (#upload-button) */

	jQuery('#upload-button').click(function(){
		
		var submission = jQuery('#submission');
		var login = jQuery('#login-text');
		var file = jQuery('#file-uploader');

		
		//Validate non empty using function on support.js
		//TODO

		if(1==1)
		{
			jQuery.ajax({
			url: '/uploadfile.php',
			data : { 'login': login, 'submission': submission },
			type: "POST",
			success : function(response){
				if(response){
					//Clean all and notify of OKAY.

					var html = $('<div class="alert fade"><button class="close" data-dismiss="alert" type="button">x</button><strong> Thank you </strong> Thank you for your submission. You\'ll be hearing from us shortly</div>');
					alert(html);
				}else
				{	
					//Notify something went wrong ;(	
				}
			}


			});
		}

	}
});

