





$(document).ready(function(){
	var _ = ALS
		, lastPos
		, scrollEnd = false
		, returnToPos = false
		, agreed = false
		;

	
	$('.collapse').collapse({
	  toggle: false
	});

	$('#close-modal').click(function (event) {
		agreed = false;
	});
	$('#accept-modal').click(function (event) {
		agreed = true;
		console.log("hey",$('#uploadform_1').parent()[0]);
		simulate(document.getElementById("upfile_1"), "click");
	});
	$('#uploadform_1').parent().on( "click",function(event){
		if (agreed) {
		console.log("agreed");
		// simulate(document.getElementById("uploadform_1"), "click");
		}
		else {
			$("#politicaDePrivacidad").modal('show');
			event.preventDefault();
			event.stopPropagation();
			console.log("canceled");
		}
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
		ALS.elem.$main.css({"margin-top" : ""+ALS.elem.$header.height()+"px" });
		ALS.elem.$main.css({"margin-top" : ""+ALS.elem.$header.height()+"px" , "min-height": ALS.windowHeight -ALS.elem.$header.outerHeight(true) - ALS.elem.$footer.outerHeight(true)});
		// ALS.elem.$landing.css({"height" : ""+ALS.windowHeight+"px"});
		// ALS.elem.$main.css({"min-height" : ""+ALS.windowHeight+"px", "width" :""+ALS.windowWidth+"px", "color": "red"});
		// console.log(ALS.elem.$main, ALS.windowHeight);
	}


	_.resizeContent();
	console.log("contacto js loaded");
});




function simulate(element, eventName)
{
    var options = extend(defaultOptions, arguments[2] || {});
    var oEvent, eventType = null;

    for (var name in eventMatchers)
    {
        if (eventMatchers[name].test(eventName)) { eventType = name; break; }
    }

    if (!eventType)
        throw new SyntaxError('Only HTMLEvents and MouseEvents interfaces are supported');

    if (document.createEvent)
    {
        oEvent = document.createEvent(eventType);
        if (eventType == 'HTMLEvents')
        {
            oEvent.initEvent(eventName, options.bubbles, options.cancelable);
        }
        else
        {
            oEvent.initMouseEvent(eventName, options.bubbles, options.cancelable, document.defaultView,
            options.button, options.pointerX, options.pointerY, options.pointerX, options.pointerY,
            options.ctrlKey, options.altKey, options.shiftKey, options.metaKey, options.button, element);
        }
        element.dispatchEvent(oEvent);
    }
    else
    {
        options.clientX = options.pointerX;
        options.clientY = options.pointerY;
        var evt = document.createEventObject();
        oEvent = extend(evt, options);
        element.fireEvent('on' + eventName, oEvent);
    }
    return element;
}

function extend(destination, source) {
    for (var property in source)
      destination[property] = source[property];
    return destination;
}

var eventMatchers = {
    'HTMLEvents': /^(?:load|unload|abort|error|select|change|submit|reset|focus|blur|resize|scroll)$/,
    'MouseEvents': /^(?:click|dblclick|mouse(?:down|up|over|move|out))$/
}
var defaultOptions = {
    pointerX: 0,
    pointerY: 0,
    button: 0,
    ctrlKey: false,
    altKey: false,
    shiftKey: false,
    metaKey: false,
    bubbles: true,
    cancelable: true
}