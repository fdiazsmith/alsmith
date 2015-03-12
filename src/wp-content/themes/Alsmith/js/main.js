var $window = $(window)
 , winHeight
 , $landing = $("#landing-wrapper")
 , $header = $('header')
 ;

console.log("main js loaded");

$(window).load(function () {

	initThings();

});

function initThings(){
 resizeContent();
 $("#landing-wrapper .background").animate({"opacity" : "1"}, "slow");
 registerEventListeners();
}
function resizeContent(){
	winHeight = $window.height();
	winWidth = $window.width();
	$('#nav-servicios').height(winHeight);
	$landing.css({"height" : winHeight+"px", "width" :winWidth+'px'});
	offsetHeaderHeight();
}

function scrollTo(where){
	//fyi: 'where' needs to be a jquery object
	event.preventDefault();
	var scrollTarget = where.attr("href"),
		yPosTarget = $('body').find(scrollTarget).position().top,
		headerHeight = $header.height();

console.log(yPosTarget);
	var goToTarget = function(){
		$('body,html').animate({scrollTop: yPosTarget},1000);
		// -headerHeight.. sometime is necesary to use this. 
	}();
}

function offsetHeaderHeight(){
	$('main').css('margin-top', $header.height()+'px' );
}


function registerEventListeners(){
	$window.resize( function (){
		resizeContent()
		console.log("resizing");
	});
	$window.scroll(function(){
		console.log($window.scrollTop());
		handleScroller($window.scrollTop());
	});
	// - clicks
	$landing.on("click", function(){
		console.log("make function to scrollTo");
	});
	$('.list-group').on('click', 'a', function(event){
		scrollTo($(this));
	});
	$('#nav-servicios').on('click', 'a', function(){
			scrollTo($(this));
	});
}

function handleScroller(topPos){
	var bottomOfLanding = $landing.height()
		, displayHeader = (topPos > bottomOfLanding *.8)? true : false
		;
	if(displayHeader)
		$header.addClass("show");
	else
		$header.removeClass("show");
}














