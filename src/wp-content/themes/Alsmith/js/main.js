

//add event listener to jquery. 

$.fn.scrollEnd = function(callback, timeout) {          
  $(this).scroll(function(){
    var $this = $(this);
    if ($this.data('scrollTimeout')) {
      clearTimeout($this.data('scrollTimeout'));
    }
    $this.data('scrollTimeout', setTimeout(callback,timeout));
  });
};
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})



//Start and empty object to contain all the app. 
var ALS = {}; 

(function (root){
	var _ = root
		;
	_.init = function(){
		ALS.getElements();
		_.registerEventListeners();
		
		console.log("finished init",_.elem);
	}
	
	_.getElements = function(callback){
		ALS.elem = {
				$window : $(window)
			, $header : $('header')
			, $main : $('#main')
			, $footer : $('footer')
			, $body : $('body')
		}
		ALS.isHome = (ALS.elem.$body.hasClass("home"))? true : false;
		ALS.rootURL = window.location.href.split("/")[2];
		if(typeof(callback) == "function"){
			callback();
		}
	}


	_.getMetrics = function(){	
		ALS.windowHeight = ALS.elem.$window.height();
		ALS.windowWidth = ALS.elem.$window.width();

		console.log("getting metrics");
	}
	_.resizeContent = function (){
		console.log("resizing: main js ");
		ALS.getMetrics();
		if(!ALS.isHome) ALS.elem.$main.css('margin-top', ALS.elem.$header.outerHeight(true)+'px' );
		$('#nav-servicios').height(ALS.windowHeight);
		
		ALS.elem.$main.css({"min-height" : ""+ALS.windowHeight*.75+"px", "width" :""+ALS.windowWidth+"px"});
		
		// offsetHeaderHeight();
	}
	
	_.scrollTo = function(where){
		//fyi: 'where' needs to be a jquery object
		// event.preventDefault();
		// var scrollTarget = where.attr("href"),
		var scrollTarget = (typeof where.attr("href") !== typeof undefined && where.attr("href") !== false )? where.attr("href") : where,
		yPosTarget = $('body').find(scrollTarget).position().top,
		headerHeight = ALS.elem.$header.height();

		console.log(yPosTarget);
		var goToTarget = function(){
		$('body,html').animate({scrollTop: yPosTarget},1000);
		// -headerHeight.. sometime is necesary to use this. 
		}();
	}
	_.handleScroller = function(){

	}
	_.registerEventListeners = function(){
		ALS.elem.$window.resize( function (){
			ALS.resizeContent();
		});
		ALS.elem.$window.scroll(function(){
			ALS.handleScroller(ALS.elem.$window.scrollTop());
		});
		// - clicks
		
		$('.list-group').on('click', 'a', function(event){
			scrollTo($(this));
		});
		$('#nav-servicios').on('click', 'a', function(){
				scrollTo($(this));
		});
	}

})(ALS);




//this actually starts the app
$(document).ready(function(){
	console.log("doc readu");
	ALS.init();
});




