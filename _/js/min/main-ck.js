function initThings(){loadComponents(),initSections(),$("main").hasClass("hide-on-load"),$("#nav-servicios").height(winHeight),$(".landing-wrapper").height(winHeight)}function initSections(){console.log("init sections"),$sec.each(function(o,e){var n=$(this).children(".explicacion").height();$(this).height(n+30),sec[o]={},sec[o].id=$(e).attr("id"),sec[o].slideHeight=$(e).height(),sec[o].slideTopPos=$(e).position().top,sec[o].offsetTop=void 0!==$(e).data("top-offset")?+$(e).data("top-offset"):0,sec[o].slideSpeed=void 0!==$(e).data("speed")?+$(e).data("speed"):0,sec[o].lockWheel=void 0!==$(e).data("lock-wheel")?!0:!1,sec[o].lockFlag=!1,sec[o].imagery=$(e).children(".imagery"),sec[o].delta=0})}function scrollTo(o){event.preventDefault();var e=$("body").find(o.attr("href")).position().top,n=$("header").height();console.log(e);var i=function(){$("body,html").animate({scrollTop:e},1e3)}()}function adjustParagraphHeight(){$(".descripcion").each(function(){for(var o=$(this).contents(),e=o.length-1;e>=0;e--)var n=o[e].height,i=i+n;console.log(o,i)}),console.log($(".descripcion").height())}function updateLoop(){$sec.each(function(o,e){var n=$window.scrollTop(),i=$window.height(),t=sec[o].id,s=sec[o].slideHeight,c=sec[o].slideTopPos,l=sec[o].offsetTop,a=n>c+s+300?!0:!1,d=c>n+i?!0:!1,r=a===!1&&d===!1?!0:!1,h=n>c+l?!0:!1,g=0>c+s+0-n?!0:!1,p=c+s+200-n;if(g&&r){var u=o+1;$(".quotes").each(function(o,e){o===u?$(this).addClass("active"):$(this).removeClass("active")})}console.log(n,c+s+300);var f=.03*n;$(".jumbotron").css("background-position-y",f+"%")})}var debug=!0,landingPage=!1,als=Object.create({init:function(){als.getElements(),als.loadComponents(),als.elements.$window.on("scroll",als.scrollLoop),debug&&console.log("all done with initialization")},getElements:function(){als.elements={$window:$(window),$contenido:$(".contenido"),$texto:$(".texto")}},loadComponents:function(o){void 0===o&&(console.log("success",o),$.ajax("_/components/header.html",{success:function(o){$("header").html(o)},error:function(o,e,n){},timeOut:3e3}),landingPage&&$.ajax("_/components/landing.html",{success:function(o){$(".landing").html(o),$(".landing-wrapper").css("height",winHeight+"px"),$(".landing-wrapper .background").animate({opacity:"1"},"slow")},error:function(o,e,n){},timeOut:3e3}),$.ajax("_/components/jumbotron.html",{success:function(o){$(".jumbotron-container").html(o)},error:function(o,e,n){},timeOut:3e3}))},scrollLoop:function(){console.log("scrollLoop")}}),$window=$(window),winHeight,$sec=$(".descripcion"),sec=[];$(document).ready(function(){winHeight=$window.height(),initThings(),console.log("this is before"),$(".landing").on("click",function(){console.log("landinf click"),$(".landing-wrapper").fadeOut(),$("main").css("display","block")}),$(".list-group").on("click","a",function(o){scrollTo($(this))}),$("#nav-servicios").on("click","a",function(){scrollTo($(this))}),console.log("offset header")});