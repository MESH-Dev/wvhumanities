jQuery(document).ready(function($) {

var initialPosJumbotron =  jQuery('.jumbotron').offset().top;
var initialPosTitlebar =  jQuery('.titlebar').offset().top - '400';

$(window).scroll(function()
{

	$(".content-container").css({
       marginTop:'525px'
    });

    var scrolled = $(window).scrollTop();

    
    if( scrolled - '250' > initialPosJumbotron){
        $('.jumbotron').css({
           position:"fixed",
           top:'-250px'
        });
        
    }else{

        $('.jumbotron').css({
            position:"absolute",
            top:initialPosJumbotron+"px"
        });
        
    }
    if( scrolled - '250'> initialPosTitlebar){

    	$('.titlebar').css({
           position:"fixed",
           top:'150px',

        });

    }else{

    	$('.titlebar').css({
            position:"absolute",
            top:initialPosTitlebar + '400' +"px",

        });

    }
    
});

});

