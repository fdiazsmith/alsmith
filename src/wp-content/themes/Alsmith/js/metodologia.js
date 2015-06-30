


$(document).ready(function(){
	var _ = ALS
		, lastPos
		, scrollEnd = false
		, returnToPos = false
		;

	

	$('#accordion .collapse').collapse({
	  toggle: false
	});
	$('#accordion .panel-title').on('click', function(event){
		// event.preventDefault();
		$("#accordion .collapse.e").collapse("hide");
		// // $(this).collapse("show");
		console.log("click de afuers", $(this));
	});
	
		$('#accordion-addendums .collapse').collapse({
	  toggle: false
	});
	$('#accordion-addendums .panel-title').on('click', function(event){
		// event.preventDefault();
		$("#accordion-addendums .collapse").collapse("hide");
		// // $(this).collapse("show");
		console.log("click", $(this));
	});

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
		ALS.elem.$main.css({"margin-top" : ""+ALS.elem.$header.height()+"px" , "min-height": ALS.windowHeight -ALS.elem.$header.outerHeight(true) - ALS.elem.$footer.outerHeight(true)});
		// ALS.elem.$main.css({"min-height" : ""+ALS.windowHeight+"px", "width" :""+ALS.windowWidth+"px"});
		// console.log(ALS.elem.$main, ALS.windowHeight);
	}


	_.resizeContent();
	console.log("metodologia js loaded");
});
