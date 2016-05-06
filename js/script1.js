$(document).ready(function(){

	window.scrollTo(0,0);
	window.onbeforeunload = function(){
		window.scrollTo(0,0);
	};

	$("section#nav3 img:eq(0) , nav p").click(function(){
		$("#container").toggleClass("menu");
		$("section#nav3").toggleClass("menu");
		$("nav").toggleClass("menu");
	});
	
	$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "slide"
		});
	});

	$("#scroll").click(function(){
		$("html , body").animate({ "scrollTop" : $("#nav2").next().offset().top -84 },1000);
	});

	$("#toTop").click(function(){
		$("html , body").animate({ "scrollTop" : 0 });
	});

	new WOW().init();
});