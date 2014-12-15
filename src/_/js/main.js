var $window = $(window)
 , winHeight;


$(window).load(function () {
	winHeight = $window.height();
	$(".landing-wrapper").css("min-height" , winHeight+"px");
	$(".landing-wrapper .background").animate({"opacity" : "1"}, "slow");
	//for now when click anywhere in the page. it just fades out.
	$(".landing-wrapper").on("click", function(){
		$(".landing-wrapper").fadeOut();
		$('main').css('display','block');
	});
	
	$('.list-group').on('click', 'a', function(event){
		scrollTo($(this));
		// var sec = $(this).attr("href");
		// var pos = $(this).data("pos");
		// $('.active').removeClass("active");
		// $(this).addClass("active");
		// console.log(sec,pos);
		// window.scrollTo(0,pos);
		// event.preventDefault();

	});
	$('#nav-servicios').on('click', 'a', function(){
			scrollTo($(this));
	});
	initThings();

console.log("offset header");
	$window.scroll(function(){
		console.log($window.scrollTop());
	});
});

function initThings(){
	if($('main').hasClass('hide-on-load')){
	$('main').css("display", "none");		
	}
	$('#nav-servicios').height(winHeight);
	$('.landing-wrapper').height(winHeight);
	offsetHeaderHeight();
}
function scrollTo(where){
	//fyi: 'where' needs to be a jquery object
	event.preventDefault();
	var scrollTarget = where.attr("href"),
		yPosTarget = $('body').find(scrollTarget).position().top,
		headerHeight = $('header').height();

console.log(yPosTarget);
	var goToTarget = function(){
		$('body,html').animate({scrollTop: yPosTarget},1000);
		// -headerHeight.. sometime is necesary to use this. 
	}();
}

function offsetHeaderHeight(){
	$('main').css('margin-top', $('header').height()+'px' );
}