(function($) {
	//start scrollup

	"use strict";		
		
		// fixed-menu
		$(window).on('scroll', function () {
			if ($(window).scrollTop() > 50) {
				$('.top-nav').addClass('fixed-menu');
			} else {
				$('.top-nav').removeClass('fixed-menu');
			}
		});

		
		// blog-slider
		$("#blog-slider").owlCarousel({
			items:3,
			itemsDesktop:[1199,3],
			itemsDesktopSmall:[1000,2],
			itemsMobile : [650,1],
			navigationText:false,
			autoPlay:true
		});
		
		// customers-slider
		$("#customers-slider").owlCarousel({
			items:5,
			itemsDesktop:[1199,5],
			itemsDesktopSmall:[1000,3],
			itemsMobile : [650,2],
			navigationText:false,
			autoPlay:true
		});
		// members-slider
		$("#team-slider").owlCarousel({
			items:3,
			itemsDesktop:[1199,3],
			itemsDesktopSmall:[1000,2],
			itemsMobile : [650,1],
			navigationText:false,
			autoPlay:true
		});
		
		$(window).scroll(function() {
			if ($(this).scrollTop() > 500) {
				$('.scrollup').fadeIn();
			} else {
				$('.scrollup').fadeOut();
			}
		});
	
		//top
	
		$('.scrollup').click(function() {
			$("html, body").animate({
				scrollTop: 0
			}, 600);
			return false
		});
	
	//end scrollup
		
	
})(window.jQuery);	