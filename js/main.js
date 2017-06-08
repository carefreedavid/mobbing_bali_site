// Hello.
//
// This is The Scripts used for ___________ Theme
//
//

/* Change the color of the menu icon for light/dark backgrounds */
var menuIcon = document.getElementById('menu-icon');
var socialWrapper = document.getElementById('socials');
var fbIcon = socialWrapper.getElementsByTagName('a')[0];
var instaIcon = socialWrapper.getElementsByTagName('a')[1];
var ytIcon = socialWrapper.getElementsByTagName('a')[2];
var twIcon = socialWrapper.getElementsByTagName('a')[3];
window.onscroll = function () {
    function setDark(){
        menuIcon.classList.add("nav-dark");
        menuIcon.classList.remove("nav-light");
        fbIcon.classList.add("nav-dark");
        fbIcon.classList.remove("nav-light");
        instaIcon.classList.add("nav-dark");
        instaIcon.classList.remove("nav-light");
        ytIcon.classList.add("nav-dark");
        ytIcon.classList.remove("nav-light");
        twIcon.classList.add("nav-dark");
        twIcon.classList.remove("nav-light");
    }
    function setLight(){
        menuIcon.classList.add("nav-light");
        menuIcon.classList.remove("nav-dark");
        fbIcon.classList.add("nav-light");
        fbIcon.classList.remove("nav-dark");
        instaIcon.classList.add("nav-light");
        instaIcon.classList.remove("nav-dark");
        ytIcon.classList.add("nav-light");
        ytIcon.classList.remove("nav-dark");
        twIcon.classList.add("nav-light");
        twIcon.classList.remove("nav-dark");
    }
    "use strict";
    if (document.body.scrollTop >= 3476){
        setLight();
    }
    else if (document.body.scrollTop >= 2465){
        setDark();
    }
    else if (document.body.scrollTop >= 2220){
        setLight();
    }
    else if (document.body.scrollTop >= 1470){
        setDark();
    }
    else if (document.body.scrollTop >= 1000 ) {
        setLight();
    }
    else {
        setDark();
    }
};

function main() {

(function () {
   'use strict';

   /*====================================
    Page a Link Smooth Scrolling
    ======================================*/
    $('a.page-scroll').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 900);
            return false;
          }
        }
      });

    /*====================================
    Menu Active Calling Scroll Spy
    ======================================*/
    $('body').scrollspy({
      target: '.navmenu',
      offset: 80,
    });


    /* ==============================================
	Testimonial Slider
	=============================================== */

	$(document).ready(function() {

	  $("#testimonial").owlCarousel({

	      navigation : false, // Show next and prev buttons
	      slideSpeed : 300,
	      paginationSpeed : 400,
	      singleItem:true,
	      autoHeight : true,
          autoPlay : 5000,
          stopOnHover : true

	      // "singleItem:true" is a shortcut for:
	      // items : 1,
	      // itemsDesktop : false,
	      // itemsDesktopSmall : false,
	      // itemsTablet: false,
	      // itemsMobile : false

	  });

	});





}());


}
main();
