var $window = $(window);


$(window).load(function () {
	var $winHeight = $window.height();
	$(".landing-wrapper").css("min-height" , $winHeight+"px");
	$(".landing-wrapper .background").animate({"opacity" : "1"}, "slow");
	//for now when click anywhere in the page. it just fades out.
	$(".landing-wrapper").on("click", function(){
		$(".landing-wrapper").fadeOut();
	});
	console.log("hola");

});