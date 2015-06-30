

$(document).ready(function(){
	var _ = ALS
		, lastPos
		, scrollEnd = false
		, returnToPos = false
		;

	_.elem.$landing = $("#landing-wrapper");
	_.elem.$chevron = $("#chevron-down");


	$('.collapse').collapse({
	  toggle: false
	});
	$('.panel-title').on('click', function(event){
		// event.preventDefault();
		$(".collapse").collapse("hide");
		// // $(this).collapse("show");
		console.log("click", $(this));
	});

	$('div.intro').on('click', function(){
		window.location.href = "http://"+ _.rootURL+'/metodologia/';
	});
	$('#enviar-cv').on('click', function(){
		window.location.href = "http://"+ _.rootURL+'/contacto/';
	});
	// .collapse({
	//   toggle: false
	// })
// $("#collapse-1").collapse("show");



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
	
	_.elem.$chevron.on("click", function(){
			console.log("make function to scrollTo");
		ALS.scrollTo(ALS.elem.$main);
	});

	_.resizeContent = function(){
		ALS.getMetrics();
		console.log("resizing content from home js ");

		ALS.elem.$main.css({"margin-top" : ""+ALS.elem.$header.height()+"px" });
		console.log("dfas",ALS.elem.$landing.find('.info').height());

		ALS.elem.$landing.css({"min-height" : ""+ALS.windowHeight+"px"});
		ALS.elem.$main.css({"min-height" : ""+ALS.windowHeight*.75+"px", "width" :""+ALS.windowWidth+"px"});
		console.log(ALS.elem.$main, ALS.windowHeight);
	}


	_.resizeContent();
});
	