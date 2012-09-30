jQuery(function(){

	jQuery('#wp-submit').click(function(){

		//Valide nonempty.
		//TODO

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
	});




	var name_label = jQuery('#contact-name-label');
	var email_label = jQuery('#contact-email-label');
	var program_label = jQuery('#contact-program-label');
	var info_label = jQuery('#contact-info-label');
	

	jQuery("#contact-send-btn").click(function(event){
		if(name_label.is(':visible')) name_label.hide();
		if(email_label.is(':visible')) email_label.hide();
		if(program_label.is(':visible')) program_label.hide();
		if(info_label.is(':visible')) info_label.hide();
		
		var name = jQuery('#contact-name').val();
		var cemail = jQuery('#contact-email').val();
		var url = jQuery('#contact-url').val();
		var program = jQuery('#contact-program').val();
		var info = jQuery('#contact-info').val();
		
		if(!name || !cemail || !program || !info){
			event.stopPropagation();
			if (!name) name_label.show("slide", { direction: "left" }, "fast");
			if (!cemail) email_label.show("slide", { direction: "left" }, "fast");
			if (!program) program_label.show("slide", { direction: "left" }, "fast");
			if (!info) info_label.show("slide", { direction: "left" }, "fast");
			
		} else {
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
						name_label.hide();
						email_label.hide();
						program_label.hide();
						info_label.hide();
					}
				}
			});
		}
		
	});
	
	jQuery("#contact-cancel-btn, #btn-close").click(function(){
		name_label.hide();
		email_label.hide();
		program_label.hide();
		info_label.hide();
	});
});
