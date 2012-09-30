var support =  (function(jQuery){
	
	//Function to clean out labels on a form.
	//@param - fields Array of objects' ids that should be non empty.
	var clearLabels = function(fields){
		for( var i = 0; i < fields.length; i++)
		{
			if(jQuery('#label-'+ fields[i]).length != 0)
				jQuery('#label-'+ fields[i]).remove();
		}

	}

	//Assigns abstract validate function to our module.
	//@param - fields - Array of objects' ids that should be nonempty.
	//@param - afterWho(Optional) - Array of ids indicating after which element to insert the label. Defaults to fields.
	//@param - cssClass - Class to apply to each label.  
	var validate = function(fields, afterWho, cssClass)
	{
		fields = fields || {};
		afterWho = afterWho || {};
		if(afterWho.length != fields.length)
			afterWho = fields;

		var ret = true;

		clearLabels(fields);	
		for( var i = 0; i < fields.length; i++)
		{
		 	var filled = true;
			if(!jQuery('#' + fields[i]).val())
			{
				var filled = false;
				var style = cssClass ? 'class="' + cssClass + '"': "";
					
				var append = jQuery('<div id="label-' + fields[i] +'" ' + style + '><span id="span-' + fields[i] + '" class="label label-important hide">Please fill me!</span></div>');
				jQuery(append).insertAfter('#' + afterWho[i]);
				jQuery('#span-' + fields[i]).show("slide", { direction: "left" }, "fast");
			}

			ret = ret && filled;
		}

		return ret;
	}

	function readyHandler(jQuery){
		//Login form
		jQuery('#wp-submit').click(function(event){

			//Valide nonempty.
			if(support.validate(['user_login','user_pass']))
			{
				var username = jQuery('#user_login').val();
				var password = jQuery('#user_pass').val();

				jQuery.ajax({
					url: ajax_script.ajaxurl,
					data: { action: 'log_in_user','user' : username, 'pass' : password},
					type: 'POST',
					success : function(response)
					{
					
						if(response){
							jQuery('#user-info').remove();
							jQuery(response).insertAfter('#navbar');
						}
					}
				});
			}else
			{
				event.stopPropagation();
			}
		});

		jQuery('#login-cancel-btn, #login-close-btn').click(function(){
			support.clearLabels(['user_login','user_pass']);
		});

		//CONTACT
		
		jQuery('#contact-send-btn').click(function(event){

			if(support.validate(['contact-name','contact-email','contact-program','contact-info'],['div-contact-name','div-contact-email','div-contact-program','div-contact-info'], "span6")){

				var name = jQuery('#contact-name').val();
				var cemail = jQuery('#contact-email').val();
				var url = jQuery('#contact-url').val();
				var program = jQuery('#contact-program').val();
				var info = jQuery('#contact-info').val();

				jQuery.ajax({
				url : '/sendmail.php',
					data: {'nombre': name, 'email': cemail, 'programa': program, 'mensaje': info, 'website': url},
					type : 'POST',
					success : function(response) {
						if(response){
							jQuery('#contact-name').val('');
							jQuery('#contact-email').val('');
							jQuery('#contact-url').val('');
							jQuery('#contact-program').val('');
							jQuery('#contact-info').val('');
						}
					}
				});



			}else
			{
				event.stopPropagation();
			}

		});	

		jQuery("#contact-cancel-btn, #btn-close").click(function(){
			support.clearLabels(['contact-name','contact-email','contact-program','contact-info']);
		});
	}
	return {
		readyHandler : readyHandler,
	       	clearLabels: clearLabels,
		validate: validate
	}

})(jQuery);
jQuery(support.readyHandler);
