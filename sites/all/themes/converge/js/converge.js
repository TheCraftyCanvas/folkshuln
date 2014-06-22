$(document).ready(function(){

  // Add padding to either logo/header-site-info according to height of both for maintain vertical 
  navigation_bar = $('div#header-group div#header-site-info').height() ;
  logo_height = $('div#header-group div#navigation-bar').height();
  if(logo_height < navigation_bar) {
    padding =  (navigation_bar - logo_height)/2 ;
    $('div#header-group div#navigation-bar').css({'padding-bottom' : padding});
    $('div#header-group div#navigation-bar').css({'padding-top' : padding});
  }
  else if(logo_height > navigation_bar) {
    padding =  (logo_height - navigation_bar)/2 ;
    $('div#header-group div#header-site-info').css({'padding-bottom' : padding});
    $('div#header-group div#header-site-info').css({'padding-top' : padding});
  } 

  // Add node-last class to node listing
  $('#content-inner-inner .node:last').addClass("node-last");

  // Wrap views more into span tag
  $('.more-link').wrapInner("<span />");

  // Slider next previous button's
  $('.slider .prev2, .slider .next2, .ddblock-cycle-converge .custom-pager').css({opacity:0});

  $('.ddblock-cycle-converge').hover(function(){
    $(".prev2, .next2, .custom-pager", this).stop().animate({opacity:1},{duration:300});},
      function() {
        $(".prev2, .next2, .custom-pager", this).stop().animate({opacity:0},{duration:300});
    });

  // Add Overlable Class to contact block
  $('#webform-client-form-56 label').addClass("overlabel");

  $('#webform-client-form-56 .form-item').addClass("overlabel-wrapper");

  // Enable Overlabel
  $("label.overlabel").overlabel();

  // initialize contact block form validation
  $("#webform-client-form-56").validate();
  
});

Drupal.behaviors.fusionSuperfish = function (context) {
  jQuery("#header-top .block-menu ul.menu, #header-blocks .block-menu ul.menu, #header-bottom .block-menu ul.menu, #navigation-bar .block-menu ul.menu").superfish({
    hoverClass:  'sfHover',
    delay:       250,
    animation:   {opacity:'show',height:'show'},
    speed:       'fast',
    autoArrows:  false,
    dropShadows: false,
    disableHI:   true
  }).supposition();
};



if (Drupal.jsEnabled) {
    $(document).ready(function()
    {
        var lab1 = $('#webform-client-form-56 label');
        lab1.each(function() { $(this).html($(this).html().replace(":", "")); });
    });
}


// Collapsible Expandable
$(document).ready(function(){
  //hide the all of the element with class msg_body
  $("body.header-top-collpaisble .collapsible-item").show();
  
  //toggle the componenet
  $("body.header-top-collpaisble .collapse-button").click(function(){
    $(this).prev(".collapsible-item").slideToggle(600);
    $(this).toggleClass("collapse-button-plus");
  });

  $('.header-top-outer .collapse-button').css({opacity:0});

  $('body.header-top-collpaisble .header-top-outer, body.header-top-collpaisble .header-group-wrapper').hover(function(){
    $("body.header-top-collpaisble .header-top-outer .collapse-button").stop().animate({opacity:1},{duration:300});},
    function() {
    $("body.header-top-collpaisble .header-top-outer .collapse-button").stop().animate({opacity:0},{duration:300});
  });


  // Project Image fade
  // Skinr Image fade
  $('.view-recent-projects .view-content img').wrap("<span class='magnify-img' />");
  $('.view-recent-projects .view-content a').hover(function(){  
    $(this).children("span.magnify-img").animate({opacity: .3}, 300);
  }
  , function(){  
    $(this).children("span.magnify-img").animate({opacity: 1}, 500);
    }
  );

  $('.view-recent-projects .view-content a').append("<span class='magnify' />");
  $('.view-recent-projects .view-content a span.magnify').css({opacity:0});
  $('.view-recent-projects .view-content a').hover(function(){
    $(this).children('span.magnify').animate({opacity: 1, marginTop: '-27px'}, 300);
  }
  , function(){  
    $(this).children('span.magnify').animate({opacity: 0, marginTop: '-8px'}, 500);
    }
  );

  // Skinr Image fade
  $('.image-fade img').hover(function(){  
    $(this).animate({opacity: .50}, 300);
  }
  , function(){  
    $(this).animate({opacity: 1}, 500);
    }  
  );



  // Sortable/Filterable Projects Gallery
  // Adding all link in portfolio categories
  $('.view-portfolio-categories .item-list ul').prepend('<li class="views-row views-row-all views-row-odd views-row-all selected"><div class="views-field-name"><span class="field-content"><a href="#" rel="all">All</a></span></div></li>');;

  $('.view-portfolio-categories .item-list ul li a').click(function () {return false;});

  $('.view-portfolio-categories .item-list li a').click(function() {

    $('.view-portfolio-categories .item-list li').removeClass('selected');
    $(this).parent('li').addClass('selected');

    thisItem   = $(this).attr('rel');

    if(thisItem != "all") {

      $('.view-recent-projects .item-list li[rel='+thisItem+']').stop()
        .animate({'width' : '220px',
               'opacity' : 1, 
               'marginRight' : '12px', 
               'marginLeft' : '11px'
              });

      $('.view-recent-projects .item-list li[rel!='+thisItem+']').stop()
        .animate({'width' : 0, 
               'opacity' : 0,
               'marginRight' : 0, 
               'marginLeft' : 0
              });
    } else {

      $('.view-recent-projects .item-list li').stop()
        .animate({'opacity' : 1, 
         'width' : '220px', 
         'marginRight' : '12px', 
         'marginLeft' : '11px'
        });
    }
  })
  // Making Recent Projects Block Equal height
  $(".view-recent-projects .item-list li").equalHeights();

  
  //Select all anchor tag with rel set to tooltip
  $('.view-partners-jcarousel img').mouseover(function(e) {
    
    //Grab the title attribute's value and assign it to a variable
    var tip = $(this).attr('title');  
    
    //Remove the title attribute's to avoid the native tooltip from the browser
    $(this).attr('title','');
    
    //Append the tooltip template and its value
    $("body.front, body.not-front").append('<div id="tool-tip"><div class="tipHeader"></div><div class="tipBody">' + tip + '</div><div class="tipFooter"></div></div>');    
        
    //Show the tooltip with faceIn effect
    $('#tool-tip').css({opacity:0}).animate({'opacity' : .9},300);
    
  }).mousemove(function(e) {
  
    //Keep changing the X and Y axis for the tooltip, thus, the tooltip move along with the mouse
    $('#tool-tip').css('top', e.pageY + 10 );
    $('#tool-tip').css('left', e.pageX + 20 );
    
  }).mouseout(function() {
  
    //Put back the title attribute's value
    $(this).attr('title',$('.tipBody').html());
  
    //Remove the appended tooltip template
    $('body.front, body.not-front').children('div#tool-tip').remove();
    
  });

});


// Kwicks Slider
$(document).ready(function(){

  kwicks_height = $('.view-front-featured-kwicks .item-list ul img').height();

  $('.view-front-featured-kwicks .item-list li, .view-front-featured-kwicks .item-list ul').css({'height':kwicks_height});

  $(".view-front-featured-kwicks .item-list ul").each(function(){
    $(this).children().css({ 'width' : Math.floor($(this).width() / $(this).children().size()) + 'px' });
    $(this).children().append("<span class='fade-bg' />");
  });

  $('div#header-group div#navigation-bar').css({'padding-bottom' : padding});

  $('.view-front-featured-kwicks .item-list ul li .slide-description').css({opacity:0});

  $('.view-front-featured-kwicks .item-list ul').hover(function(){
    $("h4").stop().animate({right: - 600},{queue:false,duration:1200});},
  function() {
    $("h4").stop().animate({right:0},{queue:false,duration:1000});
  });

  $('.view-front-featured-kwicks .item-list ul li').hover(function(){
    $(".slide-description", this).stop().animate({opacity:1},{queue:false,duration:700});},
  function() {
    $(".slide-description", this).stop().animate({opacity:0},{queue:false,duration:700});
  });
  
});


// Featured Background Picker
$(document).ready(function(){
  $("#edit-theme-featured-background-custom-wrapper").addClass('featured-bg');
  $("div#edit-theme-featured-background-custom-wrapper").attr('id',"CustomFeaturedBg");
  $('div#CustomFeaturedBg').css({display:'none'});
  $('#' + $("#edit-theme-featured-background").val()).slideDown("slow");
});
$(function() {
  $('#edit-theme-featured-background').change(function(){
    $('.featured-bg').slideUp("slow");
    $('#' + $(this).val()).slideDown("slow");
  });
});


// Featured Text Color Picker
$(document).ready(function(){
  $("#edit-theme-featured-color-custom-wrapper").addClass('featured-color');
  $("div#edit-theme-featured-color-custom-wrapper").attr('id',"CustomFeaturedColor");
  $('div#CustomFeaturedColor').css({display:'none'});
  $('#' + $("#edit-theme-featured-color").val()).slideDown("slow");
});
$(function() {
  $('#edit-theme-featured-color').change(function(){
    $('.featured-color').slideUp("slow");
    $('#' + $(this).val()).slideDown("slow");
  });
});


// Featured 2 Background Color Picker
$(document).ready(function(){
  $("#edit-theme-featured2-background-custom-wrapper").addClass('featured2-bg');
  $("div#edit-theme-featured2-background-custom-wrapper").attr('id',"CustomFeatured2Bg");
  $('div#CustomFeatured2Bg').css({display:'none'});
  $('#' + $("#edit-theme-featured2-background").val()).slideDown("slow");
});
$(function() {
  $('#edit-theme-featured2-background').change(function(){
    $('.featured2-bg').slideUp("slow");
    $('#' + $(this).val()).slideDown("slow");
  });
});


// Featured 2 Text Color Picker
$(document).ready(function(){
  $("#edit-theme-featured2-color-custom-wrapper").addClass('featured2-color');
  $("div#edit-theme-featured2-color-custom-wrapper").attr('id',"CustomFeatured2Color");
  $('div#CustomFeatured2Color').css({display:'none'});
  $('#' + $("#edit-theme-featured2-color").val()).slideDown("slow");
});
$(function() {
  $('#edit-theme-featured2-color').change(function(){
    $('.featured2-color').slideUp("slow");
    $('#' + $(this).val()).slideDown("slow");
  });
});


// Footer Color Picker
$(document).ready(function(){
  $("#edit-theme-footer-background-custom-wrapper").addClass('footer-bg');
  $("div#edit-theme-footer-background-custom-wrapper").attr('id',"CustomFooterBg");
  $('div#CustomFooterBg').css({display:'none'});
  $('#' + $("#edit-theme-footer-background").val()).slideDown("slow");
});


$(function() {
  $('#edit-theme-footer-background').change(function(){
    $('.footer-bg').slideUp("slow");
    $('#' + $(this).val()).slideDown("slow");
  });
});

// Footer Color Picker
$(document).ready(function(){
  $("#edit-theme-footer-background-custom-wrapper").addClass('footer-bg');
  $("div#edit-theme-footer-background-custom-wrapper").attr('id',"CustomFooterBg");
  $('div#CustomFooterBg').css({display:'none'});
  $('#' + $("#edit-theme-footer-background").val()).slideDown("slow");
});


$(function() {
  $('#edit-theme-footer-background').change(function(){
    $('.footer-bg').slideUp("slow");
    $('#' + $(this).val()).slideDown("slow");
  });
});


// Font Color Picker
$(document).ready(function(){
  $("#edit-theme-font-color-custom-wrapper").addClass('font-color');
  $("div#edit-theme-font-color-custom-wrapper").attr('id',"CustomFontColor");
  $('div#CustomFontColor').css({display:'none'});
  $('#' + $("#edit-theme-font-color").val()).slideDown("slow");
});


$(function() {
  $('#edit-theme-font-color').change(function(){
    $('.font-color').slideUp("slow");
    $('#' + $(this).val()).slideDown("slow");
  });
});


// Heading Font Color Picker
$(document).ready(function(){
  $("#edit-theme-heading-font-color-custom-wrapper").addClass('heading-font-color');
  $("div#edit-theme-heading-font-color-custom-wrapper").attr('id',"CustomHeadingFontColor");
  $('div#CustomHeadingFontColor').css({display:'none'});
  $('#' + $("#edit-theme-heading-font-color").val()).slideDown("slow");
});


$(function() {
  $('#edit-theme-heading-font-color').change(function(){
    $('.heading-font-color').slideUp("slow");
    $('#' + $(this).val()).slideDown("slow");
  });
});


// Selection Background Color Picker
$(document).ready(function(){
  $("#edit-theme-selection-bg-color-custom-wrapper").addClass('selection-bg-color');
  $("div#edit-theme-selection-bg-color-custom-wrapper").attr('id',"CustomSelectionBgColor");
  $('div#CustomSelectionBgColor').css({display:'none'});
  $('#' + $("#edit-theme-selection-bg-color").val()).slideDown("slow");
});


$(function() {
  $('#edit-theme-selection-bg-color').change(function(){
    $('.selection-bg-color').slideUp("slow");
    $('#' + $(this).val()).slideDown("slow");
  });
});


// Selection Text Color Picker
$(document).ready(function(){
  $("#edit-theme-selection-color-custom-wrapper").addClass('selection-color');
  $("div#edit-theme-selection-color-custom-wrapper").attr('id',"CustomSelectionColor");
  $('div#CustomSelectionColor').css({display:'none'});
  $('#' + $("#edit-theme-selection-color").val()).slideDown("slow");
});


$(function() {
  $('#edit-theme-selection-color').change(function(){
    $('.selection-color').slideUp("slow");
    $('#' + $(this).val()).slideDown("slow");
  });
});


// Link Color Picker
$(document).ready(function(){
  $("#edit-theme-link-color-custom-wrapper").addClass('link-color');
  $("div#edit-theme-link-color-custom-wrapper").attr('id',"CustomLinkColor");
  $('div#CustomLinkColor').css({display:'none'});
  $('#' + $("#edit-theme-link-color").val()).slideDown("slow");
});


$(function() {
  $('#edit-theme-link-color').change(function(){
    $('.link-color').slideUp("slow");
    $('#' + $(this).val()).slideDown("slow");
  });
});


// Link Hover Color Picker
$(document).ready(function(){
  $("#edit-theme-link-hover-color-custom-wrapper").addClass('link-hover-color');
  $("div#edit-theme-link-hover-color-custom-wrapper").attr('id',"CustomLinkHoverColor");
  $('div#CustomLinkHoverColor').css({display:'none'});
  $('#' + $("#edit-theme-link-hover-color").val()).slideDown("slow");
});


$(function() {
  $('#edit-theme-link-hover-color').change(function(){
    $('.link-hover-color').slideUp("slow");
    $('#' + $(this).val()).slideDown("slow");
  });
});


// Footer Font Color Picker
$(document).ready(function(){
  $("#edit-theme-footer-font-color-custom-wrapper").addClass('footer-font-color');
  $("div#edit-theme-footer-font-color-custom-wrapper").attr('id',"CustomFooterFontColor");
  $('div#CustomFooterFontColor').css({display:'none'});
  $('#' + $("#edit-theme-footer-font-color").val()).slideDown("slow");
});


$(function() {
  $('#edit-theme-footer-font-color').change(function(){
    $('.footer-font-color').slideUp("slow");
    $('#' + $(this).val()).slideDown("slow");
  });
});


// Footer Heading Font Color Picker
$(document).ready(function(){
  $("#edit-theme-footer-heading-font-color-custom-wrapper").addClass('footer-heading-font-color');
  $("div#edit-theme-footer-heading-font-color-custom-wrapper").attr('id',"CustomFooterHeadingFontColor");
  $('div#CustomFooterHeadingFontColor').css({display:'none'});
  $('#' + $("#edit-theme-footer-heading-font-color").val()).slideDown("slow");
});


$(function() {
  $('#edit-theme-footer-heading-font-color').change(function(){
    $('.footer-heading-font-color').slideUp("slow");
    $('#' + $(this).val()).slideDown("slow");
  });
});


// Footer Selection Background Color Picker
$(document).ready(function(){
  $("#edit-theme-footer-selection-bg-color-custom-wrapper").addClass('footer-selection-bg-color');
  $("div#edit-theme-footer-selection-bg-color-custom-wrapper").attr('id',"CustomFooterSelectionBgColor");
  $('div#CustomFooterSelectionBgColor').css({display:'none'});
  $('#' + $("#edit-theme-footer-selection-bg-color").val()).slideDown("slow");
});


$(function() {
  $('#edit-theme-footer-selection-bg-color').change(function(){
    $('.footer-selection-bg-color').slideUp("slow");
    $('#' + $(this).val()).slideDown("slow");
  });
});


// Footer Selection Text Color Picker
$(document).ready(function(){
  $("#edit-theme-footer-selection-color-custom-wrapper").addClass('footer-selection-color');
  $("div#edit-theme-footer-selection-color-custom-wrapper").attr('id',"CustomFooterSelectionColor");
  $('div#CustomFooterSelectionColor').css({display:'none'});
  $('#' + $("#edit-theme-footer-selection-color").val()).slideDown("slow");
});


$(function() {
  $('#edit-theme-footer-selection-color').change(function(){
    $('.footer-selection-color').slideUp("slow");
    $('#' + $(this).val()).slideDown("slow");
  });
});


// Footer Link Color Picker
$(document).ready(function(){
  $("#edit-theme-footer-link-color-custom-wrapper").addClass('footer-link-color');
  $("div#edit-theme-footer-link-color-custom-wrapper").attr('id',"CustomFooterLinkColor");
  $('div#CustomFooterLinkColor').css({display:'none'});
  $('#' + $("#edit-theme-footer-link-color").val()).slideDown("slow");
});


$(function() {
  $('#edit-theme-footer-link-color').change(function(){
    $('.footer-link-color').slideUp("slow");
    $('#' + $(this).val()).slideDown("slow");
  });
});


// Footer Link Hover Color Picker
$(document).ready(function(){
  $("#edit-theme-footer-link-hover-color-custom-wrapper").addClass('footer-link-hover-color');
  $("div#edit-theme-footer-link-hover-color-custom-wrapper").attr('id',"CustomFooterLinkHoverColor");
  $('div#CustomFooterLinkHoverColor').css({display:'none'});
  $('#' + $("#edit-theme-footer-link-hover-color").val()).slideDown("slow");
});


$(function() {
  $('#edit-theme-footer-link-hover-color').change(function(){
    $('.footer-link-hover-color').slideUp("slow");
    $('#' + $(this).val()).slideDown("slow");
  });
});


// Image Preloader
$(document).ready(function(){

  // Adding preloading to kwicks slider and to portfolio page
  $('.view-front-featured-kwicks img, .view-recent-projects img').each(function(){
    $(this).wrap("<div class='img-preload' />");
  });
  
});

jQuery(function () {
	jQuery('.img-preload').hide();//hide all the images on the page
});
var i = 0;//initialize
var int=0;//Internet Explorer Fix
jQuery(window).bind("load", function() {//The load event will only fire if the entire page or document is fully loaded
	var int = setInterval("doThis(i)",400);//500 is the fade in speed in milliseconds
});

function doThis() {
	var images = jQuery('.img-preload').length;//count the number of images on the page
	if (i >= images) {// Loop the images
		clearInterval(int);//When it reaches the last image the loop ends
	}
	jQuery('.img-preload:hidden').eq(0).fadeIn(500);//fades in the hidden images one by one
	i++;//add 1 to the count
}