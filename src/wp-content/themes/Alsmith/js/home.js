

$(document).ready(function(){
	var _ = ALS
		, lastPos
		, scrollEnd = false
		, returnToPos = false
		;

	_.elem.$landing = $("#landing-wrapper");
	// $('.collapse').collapse({
	//   toggle: false
	// })
	$('.panel-title').on('click', function(){
		$(".collapse").collapse("hide");

		console.log("click", $(this));
	});
	// .collapse({
	//   toggle: false
	// })




	_.handleScroller = function(topPos){

		var bottomOfLanding = ALS.elem.$landing.height()
			, dir = topPos > lastPos? "UP" : "DOWN"
			, displayHeader = ((dir == "UP")? topPos > bottomOfLanding *.8: topPos > bottomOfLanding - bottomOfLanding*.35)? true : false
			;

		if(displayHeader){
			ALS.elem.$header.addClass("show");
			if(topPos > bottomOfLanding -200 && topPos < bottomOfLanding) {
				returnToPos = true;
				console.log("should go back ");
			}
			else{
			returnToPos= false;
			}
			// ALS.elem.$landing.hide();
		}
		else{
			ALS.elem.$header.removeClass("show");
			returnToPos= false;
			// ALS.elem.$landing.show();
		}


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
	
	_.elem.$landing.on("click", function(){
			console.log("make function to scrollTo");
		ALS.scrollTo(ALS.elem.$main);
	});

	_.resizeContent = function(){
		ALS.getMetrics();
		console.log("resizing content from home js ");

		ALS.elem.$main.css({"margin-top" : ""+ALS.elem.$header.height()+"px" });
		ALS.elem.$landing.css({"min-height" : ""+ALS.windowHeight+"px", "width" :""+ALS.windowWidth+"px"});
		ALS.elem.$main.css({"min-height" : ""+ALS.windowHeight+"px", "width" :""+ALS.windowWidth+"px", "color": "red"});
		console.log(ALS.elem.$main, ALS.windowHeight);
	}


	_.resizeContent();
});
	