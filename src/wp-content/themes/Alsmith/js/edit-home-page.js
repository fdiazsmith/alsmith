jQuery(document).ready(function() {

  console.log("Home page editor script enqueued");

  var $ = jQuery

    , $elems = {

      splashSelect : $('.link-sel')
      //add elems here

    };

  /* Register Event Listeners
     -------------------------------------------------- */

  $elems.splashSelect.change(_onSplashLinkChange);
 
  /* Event Handlers
     -------------------------------------------------- */

  function _onSplashLinkChange() {
    if($(this).val() === 'none') {
      $(this).addClass('unselected');
    } else {
      $(this).removeClass('unselected');
    }
  }

});