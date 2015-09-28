jQuery(document).ready(function() {

  var url = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');

  function beginsWith(needle, haystack){
    return (haystack.substr(0, needle.length) == needle);
  };

  jQuery('a').each(function(){

    if(typeof jQuery(this).attr('href') != "undefined") {
      var test = beginsWith( url, jQuery(this).attr('href') );
      //if it's an external link then open in a new tab



      if( test == false && jQuery(this).attr('href').indexOf('#') == -1){
        jQuery(this).attr('target','_blank');
      }
    }
  });

  jQuery('.mobile-nav').click(function() {
    jQuery('.menu-icon').toggle();
    jQuery('.close-icon').toggle();

    jQuery('.small-mobile-nav').toggle();
  });


  jQuery(window).on('resize', function(){
      var win = jQuery(this); //this = window

      if (win.width() >= 768) {
        jQuery('.small-mobile-nav').hide();
      }
  });

  

});
