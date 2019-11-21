$(document).ready(function(){
	$(".card").on("click", function(){
		if($(this).attr("on_view") == "true")
		{
			$(this).attr("on_view", "false");
			$(this).children(".card-body").children(".card-text").css("display", "none");
		}
		else
		{
			$(this).attr("on_view", "true");
			$(this).children(".card-body").children(".card-text").css("display", "block");
		}
	});
});