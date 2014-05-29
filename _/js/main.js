
/*
*	V A R I A B L E S 
*
*/
var $window = $(window)
 , winHeight;



/*
*	F U N C T I O N S 
*
*/

function initThings(){
	//first load the components
	loadComponents();
	// adjustParagraphHeight();


	if($('main').hasClass('hide-on-load')){
	// $('main').css("display", "none");
	 }
	$('#nav-servicios').height(winHeight);
	$('.landing-wrapper').height(winHeight);


}

function scrollTo(where){
	//fyi: 'where' needs to be a jquery object
	event.preventDefault();
	var yPosTarget = $('body').find(where.attr("href")).position().top,
		headerHeight = $('header').height();

	console.log(yPosTarget);
	var goToTarget = function(){
		$('body,html').animate({scrollTop: yPosTarget},1000);
		// - (substract) headerHeight.. sometime is necesary to use this. 
	}();
}

//does not work it is being dealt 
function adjustParagraphHeight(){
	$('.descripcion').each(function(){
		var thisH = $(this).contents();
		for (var i = thisH.length - 1; i >= 0; i--) {
			var h = thisH[i].height
			,	totalH = totalH + h;
		};
		console.log(thisH, totalH);
	});
	console.log($('.descripcion').height());
}

//loads the components that will be reused through out into the site.
// e.g. the header. 
function loadComponents(){
  $.ajax('_/components/header.html', {
    success: function(response){
      $("header").html(response);
    },
    error: function(request, errorType, errorMessage){
    },

    timeOut: 3000
  });

  //   $.ajax('_/components/landing.html', {
  //   success: function(response){
	 //    $(".landing").html(response);
	 //    //once the response is in. then  format it.
	 //  	$(".landing-wrapper").css("height" , winHeight+"px");
	 //  	// console.log($(".landing-wrapper"));
		// $(".landing-wrapper .background").animate({"opacity" : "1"}, "slow");
  //   },
  //   error: function(request, errorType, errorMessage){
  //   },
  //   timeOut: 3000
  // });
$.ajax('_/components/jumbotron.html', {
    success: function(response){
      $(".jumbotron-container").html(response);
    },
    error: function(request, errorType, errorMessage){
    },
    timeOut: 3000
  });
}


/*
*	H A N D L E R S
*
*/

$(document).ready(function(){
	winHeight = $window.height();
	initThings();
	console.log("this is before");


	
	//for now when click anywhere in the page. it just fades out.

	$(".landing").on("click", function(){
		console.log("landinf click");
		$(".landing-wrapper").fadeOut();
		$('main').css('display','block');
	});

	/////go to places.
	$('.list-group').on('click', 'a', function(event){
		scrollTo($(this));
	});

	$('#nav-servicios').on('click', 'a', function(){
			scrollTo($(this));
	});


	console.log("offset header");

	$window.scroll(function(){
		console.log($window.scrollTop());
	});

});










