


$(document).ready(function(){
	var _ = ALS
		, lastPos
		, scrollEnd = false
		, returnToPos = false
		;

	
	$('.collapse').collapse({
	  toggle: false
	});
	$('.panel-title').on('click', function(event){
		// event.preventDefault();
		// $(".collapse").collapse("hide");
		// // $(this).collapse("show");

		console.log("click", $(this));
	});
// 	$('#tab-menu a').click(function (event) {
//   event.preventDefault()
//   $(this).tab('show');
// 	console.log("clicked on tab",$(this));
// })

	_.handleScroller = function(topPos){

		var bottomOfLanding = ALS.elem.$main.height()
			, dir = topPos > lastPos? "UP" : "DOWN"
			, displayHeader = ((dir == "UP")? topPos > bottomOfLanding *.8: topPos > bottomOfLanding - bottomOfLanding*.35)? true : false
			;

		if(dir == "UP"){
			console.log(topPos," >", bottomOfLanding );
		}
		else{
			console.log(topPos," <", bottomOfLanding );
		}
		
		scrollEnd = false;
		lastPos = topPos;
	}


	ALS.elem.$window.scrollEnd(function(){
    if(returnToPos)	ALS.scrollTo(ALS.elem.$main);
    scrollEnd = true;
	}, 200);
	
	
	_.resizeContent = function(){
		ALS.getMetrics();
		console.log("resizing content from metodologia js ");
			ALS.elem.$main.css({"margin-top"   : ""+ALS.elem.$header.outerHeight(true)+"px"
												, "min-height" : ""+ALS.windowHeight-ALS.elem.$header.outerHeight(true)-100 + "px"
												, "width"      : ""+ALS.windowWidth+"px" });
		// ALS.elem.$landing.css({"height" : ""+ALS.windowHeight+"px"});
		// ALS.elem.$main.css({"min-height" : ""+ALS.windowHeight+"px", "width" :""+ALS.windowWidth+"px", "color": "red"});
		// console.log(ALS.elem.$main, ALS.windowHeight);
	}


	_.resizeContent();
	console.log("Servicios js loaded");
});
