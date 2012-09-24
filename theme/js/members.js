jQuery(function(){
	jQuery('.photo').hover(
		function(){
			jQuery(this).children('.photoContent').css({
				height: jQuery(this).children('.photoPicture').css('height'),
				width: jQuery(this).children('.photoPicture').css('width')
			});
			jQuery(this).children('.photoPicture').fadeToggle(0,'',function(){
				jQuery(this).siblings('.photoContent').fadeToggle(0,'');
			});
	},
		function(){
			jQuery(this).children('.photoContent').fadeToggle(0,'',function(){
				jQuery(this).siblings('.photoPicture').fadeToggle(0,'');
			});
	});	
});