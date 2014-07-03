var debug = true;
var landingPage = false;


var als = Object.create({

  /*
  * INITIALIZE EVERYTHING  
  *
  */
  init: function(){
    // console.log(this);
    als.getElements();
    als.loadComponents();
    als.elements.$window.on("scroll", als.scrollLoop);
    
    if (debug) console.log("all done with initialization");
  },
  /*
  *  GET THE JQUERY ELEMS
  *
  */
  getElements: function(){
    als.elements = {
      $window: $(window),
      $contenido:    $(".contenido"),
      $texto:      $('.texto')
    }
    // function crunchTheNumbers(){
    //  if (debug) console.log("hey you are calling me successfully");
    // }
  },
  /*
  * LOAD COMPONENTS
  *
  */
  loadComponents: function(e){
    if (e === undefined){
      console.log("success", e);
      $.ajax('_/components/header.html', {
        success: function(response){
          $("header").html(response);
        },
        error: function(request, errorType, errorMessage){
        },

        timeOut: 3000
      });
      if (landingPage)
      $.ajax('_/components/landing.html', {
        success: function(response){
          $(".landing").html(response);
          //once the response is in. then  format it.
          $(".landing-wrapper").css("height" , winHeight+"px");
          // console.log($(".landing-wrapper"));
          $(".landing-wrapper .background").animate({"opacity" : "1"}, "slow");
        },
        error: function(request, errorType, errorMessage){
        },
        timeOut: 3000
      });
    $.ajax('_/components/jumbotron.html', {
        success: function(response){
          $(".jumbotron-container").html(response);
        },
        error: function(request, errorType, errorMessage){
        },
        timeOut: 3000
      });
    }
  },
  /*
  *  scroll loop
  *
  */
  scrollLoop: function(){
    console.log("scrollLoop");
  },


});
/*
*	V A R I A B L E S 
*
*/
var $window = $(window)
 , winHeight
 , $sec = $('.descripcion')
 , sec = [];



/*
*	F U N C T I O N S 
*
*/

function initThings(){
	//first load the components
	loadComponents();
	// adjustParagraphHeight();

	initSections();

	if($('main').hasClass('hide-on-load')){
	// $('main').css("display", "none");
	 }
	$('#nav-servicios').height(winHeight);
	$('.landing-wrapper').height(winHeight);


}

/**
 *
 * SETS SLIDE COMPONENTS
 * grabs DOM data once on resize rather than every loop
 * 
 */

function initSections() {

  console.log("init sections");
  
  $sec.each(function(i,e) {
	//change the size of the section to match the inner content
	var thisHeight = $(this).children('.explicacion').height();
	$(this).height(thisHeight+30);

    sec[i] = {}; //clear


    sec[i].id          =  $(e).attr( 'id' );
    sec[i].slideHeight =  $(e).height();
    sec[i].slideTopPos =  $(e).position().top;
    sec[i].offsetTop   =  ($(e).data("top-offset") !== undefined )? +$(e).data("top-offset") : 0; 
    sec[i].slideSpeed  =  ($(e).data("speed") !== undefined )? +$(e).data("speed") : 0 ; //if there is no data-speed atribute then set it to 0
    sec[i].lockWheel   =  ($(e).data("lock-wheel") !== undefined )? true : false ;
    sec[i].lockFlag    =   false;
    sec[i].imagery     =   $(e).children('.imagery');
    sec[i].delta       =   0;
  });
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


function updateLoop(){
	

	$sec.each(function(i,e){
		var windowPos = $window.scrollTop()
		 ,	windowHeight = $window.height()
		 ,id              = sec[i].id //sec[i].id, //$(e).attr('id'),
      , thisSlideHeight = sec[i].slideHeight //$(this).height(),
      , slideTopPos     = sec[i].slideTopPos //$(this).position().top,
      , offsetTop       = sec[i].offsetTop;

      // booleans that check whether slide is in viewport and whether the bottom has arrived
        // also some stuff that doesn't get used
    var outOfViewTop            = ( windowPos > slideTopPos+thisSlideHeight +300) ? true : false
     ,  outOfViewBottom         = ( windowPos + windowHeight < slideTopPos ) ? true : false
     ,   isWithinRange           = ( outOfViewTop === false && outOfViewBottom === false ) ? true : false
     ,   slideTopHasHitWindowTop = ( windowPos > slideTopPos + offsetTop) ? true : false
     ,	isPassTheQuote 			= ((slideTopPos+thisSlideHeight + 00) - windowPos < 0) ? true : false ;
    	var magicnumber = (slideTopPos+thisSlideHeight + 200) - windowPos ;

    	if (isPassTheQuote && isWithinRange) {
    		// $('#frase-container').children('#'+i).addClass('activeParagraph').prev().removeClass('activeParagraph');
    		
    		var index = i+1;
    		// $('#f'+i).removeClass('active');//.next().addClass('active'); 
    		// $('#f'+i+1).addClass('active');
    		$('.quotes').each(function(i,e ){
    			 if (i === index){
    				$(this).addClass("active");
    			}
    			else {
    				$(this).removeClass("active");	
    			}
    			
    		});

    		
    		// console.log(id, i ;
    		// console.log(id, windowPos, thisSlideHeight, slideTopPos, "magic#= " + magicnumber );
    		
    	};
    	console.log(windowPos, slideTopPos +thisSlideHeight +300);
    	var moveImgBg = (windowPos*.03);
    	$('.jumbotron').css('background-position-y', moveImgBg+'%');

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

	// $window.scroll(function(){
	// 	updateLoop();
	// });

});










