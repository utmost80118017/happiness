$(document).ready(function(){

	window.scrollTo(0,0);
	window.onbeforeunload = function(){
		window.scrollTo(0,0);
	};

	$("section#nav2 img:eq(0) , nav img:eq(0) , p.menu2 img").click(function(){
		$("#container").toggleClass("menu");
		$("section#nav2").toggleClass("menu");
		$(".menu2").toggleClass("menu");
		$("nav").toggleClass("menu");
	});
	
	$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "slide",
			after: function(){
				var t = $("#fur .flex-active-slide img").attr("src");

				$("#fur .square span:eq(0)").text( "A" + t.substring(13,14) );
			}
		});
	});

	$("#toTop").click(function(){
		$("html , body").animate({ "scrollTop" : 0 });
	});

	new WOW({ offset: 30 }).init();
});