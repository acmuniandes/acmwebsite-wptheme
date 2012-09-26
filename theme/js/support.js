jQuery(function(){
	jQuery("#contact-send-btn").click(function(event){
		
		var name = jQuery('#contact-name').val();
		var cemail = jQuery('#contact-email').val();
		var url = jQuery('#contact-url').val();
		var program = jQuery('#contact-program').val();
		var info = jQuery('#contact-info').val();
		
		if(!name || !cemail || !program || !info){
			event.stopPropagation();
			jQuery('#contact-name').attr('placeholder','Dont forget to fill me! *');
			jQuery('#contact-email').attr('placeholder','Dont forget to fill me! *');
			jQuery('#contact-program').attr('placeholder','Dont forget to fill me! *');
			jQuery('#contact-info').attr('placeholder','Dont forget to fill me! *');
			
			setTimeout(function(){
				jQuery('#contact-name').attr('placeholder','Name *');
				jQuery('#contact-email').attr('placeholder','Email *');
				jQuery('#contact-program').attr('placeholder','Academic Program *');
				jQuery('#contact-info').attr('placeholder','');
			}, 2000);
			
		} else {
			jQuery.ajax({
				url : '/sendmail.php',
				data: {'nombre': name, 'email': cemail, 'programa': program, 'mensaje': info},
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
		}
		
	});
});