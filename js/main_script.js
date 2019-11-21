$(document).ready(function(){
	var margin_top = 0;
	var left_offset;
	var top_offset;
	var animate_time = 500;
	$(".card").on("click", function(){
		if($(this).hasClass("on-view"))
		{
			$(this).removeClass("on-view");
			$(".gray-div").css("display", "none");
			$(this).children(".card-body").children(".card-text").css("display", "none");
			//$(this).offset({top: Math.abs($(this).offset().top - top_offset), left: Math.abs($(this).offset().left - left_offset)});
			//$(this).css("margin", margin_top);
			console.log($(this).offset());
			$(this).css("top", "0px");
			$(this).css("left", "0px");
			console.log($(this).offset());
		}
		else
		{
			top_offset = $(this).offset().top;
			left_offset = $(this).offset().left;
			margin_top = $(this).css("margin-top");
			$(this).addClass("on-view");
			$(this).offset({top: top_offset, left: left_offset});
			$(".gray-div").css("display", "block");
			$(this).children(".card-body").children(".card-text").css("display", "block");
		}
	});

	$("#new_article_btn").click(function(){
		if($(".new-article").css("display") == "none")
		{
			$(".new-article").animate({height: 'show'}, animate_time);
			$(".alter-article").animate({height: 'hide'}, animate_time);
			$(".new-user").animate({height: 'hide'}, animate_time);
			$(".alter-user").animate({height: 'hide'}, animate_time);
		}
		else
		{
			$(".new-article").animate({height: 'hide'}, animate_time);
		}
	});

	$("#alter_article_btn").click(function(){
		if($(".alter-article").css("display") == "none")
		{
			$(".alter-article").animate({height: 'show'}, animate_time);
			$(".new-article").animate({height: 'hide'}, animate_time);
			$(".new-user").animate({height: 'hide'}, animate_time);
			$(".alter-user").animate({height: 'hide'}, animate_time);
		}
		else
		{
			$(".alter-article").animate({height: 'hide'}, animate_time);
		}
	});

	$("#new_user_btn").click(function(){
		if($(".new-user").css("display") == "none")
		{
			$(".new-user").animate({height: 'show'}, animate_time);
			$(".alter-article").animate({height: 'hide'}, animate_time);
			$(".new-article").animate({height: 'hide'}, animate_time);
			$(".alter-user").animate({height: 'hide'}, animate_time);
		}
		else
		{
			$(".new-user").animate({height: 'hide'}, animate_time);
		}
	});

	$("#alter_user_btn").click(function(){
		if($(".alter-user").css("display") == "none")
		{
			$(".alter-user").animate({height: 'show'}, animate_time);
			$(".new-user").animate({height: 'hide'}, animate_time);
			$(".alter-article").animate({height: 'hide'}, animate_time);
			$(".new-article").animate({height: 'hide'}, animate_time);
		}
		else
		{
			$(".alter-user").animate({height: 'hide'}, animate_time);
		}
	});

});