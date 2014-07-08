var debug = true;
var landingPage = false;

var sectionName = "";
var als = Object.create({

  /*
  * INITIALIZE EVERYTHING  
  *
  */
  init: function(){
    // console.log(this);
    als.getElements();
    als.loadComponents();
    als.crunchNumbers();
    $("#side-nav .collapse").collapse('hide');
    $('.tooltip_btn').tooltip();
    //event listeners
    als.elements.$window.on("scroll", als.scrollLoop);
    als.elements.$window.on("resize", als.crunchNumbers);
    als.elements.$sideNav.on("click", 'a', als.scrollTo);
    //global vars
    als.currentPage = $("body").attr('id');
    
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
      $texto:      $('.texto'),
      $header:    $('header'),
      $jumbotron: $('.jumbotron-container'),
      $quotes:  $('.quotes'),
      $sideNav: $('#side-nav'),
      $adendums: $('#adendums'),
      $bgImg :  $('.bg-img'),
      wrapper: $('.descropcion-wrapper')
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
    if(debug) console.log("loaded all the ajax");
    }
  },
  /*
  *  scroll loop
  *
  */
  scrollLoop: function(){
    var windowPos = als.elements.$window.scrollTop()
      , topWin = self.windowHeight - self.headerHeight
      , adendumsTop = (als.elements.$adendums === undefined)? als.elements.$adendums.offset().top : "empty"
      , scrollRatio = (als.elements.$bgImg.data("ratio") !== undefined)? +als.elements.$bgImg.data("ratio") : 1
      , index = 0
      , lastIndex = 0 
      , contId 
      , contTopPos
      , contHeight
      , contOffset
      , txtId 
      , txtTopPos
      , txtHeight
      , txtOffset= 0
      , lastSection ;
      var adendumFlag = false;
      console.log("scrollRatio",scrollRatio);
    
    als.elements.$contenido.each(function(i,e){
      contId  = als.contenidos[i].name;
      contTopPos = $(e).position().top + parseInt($(e).css('margin-top'), 10) ;
      contHeight = $(e).height() ;
      contOffset = als.contenidos[i].offsetTop;
      var jumbotronBottom = 200 + self.headerHeight;
      var hasHitBottomJumbotron = (jumbotronBottom > contTopPos -windowPos )? true : false
      ,    hasHitBottomHeader = (self.headerHeight > contTopPos -windowPos )? true : false
      ,    outOfView = (windowPos > contTopPos+contHeight -self.headerHeight)? true : false
      ,    adendumsHitTp = (self.headerHeight  > contTopPos + 200 -windowPos )? true : false;

      //sticky adendums. it fixs the positions and frees it when necessary
      if ( adendumsHitTp && contId === "que-hacemos") {
        als.elements.$adendums.css({'position': 'fixed', 'top': self.headerHeight+'px'});
      }else if(   contId === "que-hacemos"){
        als.elements.$adendums.css({'position': 'absolute', 'top': '200px'});
      }
      //organizes the swap of frases and other opening and closing of the acordion. 
      if(hasHitBottomJumbotron && !outOfView){
        lastSection = contId;
        index = i;
        $(".quotes").removeClass('activeQ');
        $($(".quotes")[index]).addClass('activeQ');

        if ( als.currentPage === 'servicios' && sectionName !== contId   ) {
           $("#side-nav .collapse").collapse('hide');
          if( !$("#"+contId).hasClass('in') ) $("#"+contId).collapse('show'); 
         }
        sectionName = contId;  
        als.elements.$bgImg.css({'background-position': '50%'+ windowPos*scrollRatio+'px' })
      }
      lastIndex = index;
    });
    ///this calculates the position of the subsections (textos). so that it knows where to scrollTo
    var names = [];//empty the array
    var lastName ;
    for (var i = als.textos.length - 1; i >= 0; i--) {
      if(als.textos[i].topPos < windowPos){
        names[i] = als.textos[i].name;
        lastName = names[names.length-1];
        als.textos[names.length-1] 
      }
    };
    lastSection = contId;

  },
  /*
  * calculate and cache all the numbers that will be needed
  * for the event loop
  *
  */
  crunchNumbers: function(){
    self.windowHeight = als.elements.$window.height();
    self.windowWidth = als.elements.$window.width();
    self.headerHeight = als.elements.$header.height();
    self.jumbotronHeight = als.elements.$jumbotron.height();

    als.contenidos = [];
    als.textos = [];

    als.elements.$contenido.each(function(i,e){
      console.log("HOLAAAA "+ i , $(e).attr('id'));
      als.contenidos[i] = {};//clear the array.
      als.contenidos[i].name       = $(e).attr('id');
      als.contenidos[i].topPos     = $(e).offset().top;
      als.contenidos[i].height     = $(e).height();
      als.contenidos[i].offsetTop  = ($(e).data("top-offset") !== undefined )? +$(e).data("top-offset") : 0; 
    });
    als.elements.$texto.each(function(i,e){
      console.log("HOLAAAA "+ i , $(e).attr('id'));
      als.textos[i] = {};//clear the array.
      als.textos[i].name       = $(e).attr('id');
      als.textos[i].topPos     = $(e).offset().top;
      als.textos[i].height     = $(e).height();
      als.textos[i].offsetTop  = ($(e).data("top-offset") !== undefined )? +$(e).data("top-offset") : 0; 
    });

    // if(self.windowWidth < 768 ){
    //   als.elements.$adendums.detach();
    // }
    // else{
    //   $('#que-hacemos').append(als.elements.$adendums.attach()) 
    // }
    if (debug) console.log("winHeigh: "+self.windowHeight +"winWidth: "+self.windowWidth,
                          "\nheaderHeight: "+self.headerHeight,
                          "\ntextos  ",als.textos );
  if(debug) console.log("just crunched the numbers");
  },
  /*
  *
  *
  *
  */
  scrollTo: function(event){
    event.preventDefault();
    // event.stopPropagation();
    console.log("just clicked on  ");
    var targetElement = $(event.currentTarget)[0];
    
    var scrollTarget = $(targetElement).attr("href");//,
      yPosTarget = $('body').find(scrollTarget).offset().top + parseInt($(scrollTarget).css('margin-top'), 10);
      if(als.currentPage === "inicio") yPosTarget -= 250;
      if(als.currentPage === 'servicios') yPosTarget -= self.headerHeight;
      if(scrollTarget === '#busqueda-collapse' || scrollTarget === '#processo-collapse' || scrollTarget === '#desarollo-collapse'){
      
      }
      else{
        $('body,html').animate({scrollTop: yPosTarget},1000);  
      }
      
    console.log(targetElement, scrollTarget, yPosTarget, $(scrollTarget).css('margin-top'));
    
      
      // -headerHeight.. sometime is necesary to use this. 
      

  }

});





