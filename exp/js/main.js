$(function(){
	$("#noticias").click(function(){
		$(".hero-unit").hide("slide", { direction: "left" }, "medium", function(){
			$("[name='outer']").remove();
		});
		$.ajax({
			url : '/acmwebsite-wptheme/exp/template-news.php',
			type : 'GET',
			success : function(response) {
				if(response){
					$("ul.nav>li:nth-child(1)").removeClass('active');
					$("ul.nav>li:nth-child(3)").addClass('active');
					$(response).insertAfter(".navbar").show("slide", { direction: "right" }, "medium");
				}
			}
		});
	});
});