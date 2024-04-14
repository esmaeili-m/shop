(function($) { "use strict";


	//Preloader

	Royal_Preloader.config({
		mode           : 'progress',
		background     : '#111111',
		showProgress   : true,
		showPercentage : false
	});
	
	
	//Home text fade on scroll	
	
	$(window).scroll(function () { 
        var $Fade = $('.fade-elements');
        //Get scroll position of window 
        var windowScroll = $(this).scrollTop();
        //Slow scroll and fade it out 
        $Fade.css({
            'margin-top': -(windowScroll / 0) + "px",
            'opacity': 1 - (windowScroll / 300)
        });
    });		


	
	/* Icons Animation */

	var options = {
	  duration: 200, 
	  type: 'oneByOne',
	  animTimingFunction: Vivus.EASE
	};

	var vivus = new Vivus('svg-icon-1',	options, onComplete);
				new Vivus('svg-icon-2',	options, onComplete);
				new Vivus('svg-icon-3',	options, onComplete);

	function onComplete() {}	
	

	/* Scroll animations */
	
	window.scrollReveal = new scrollReveal();

	
	/* Scroll Too */
	
	$(window).load(function(){"use strict";
				
		/* Page Scroll to id fn call */
		$("ul.slimmenu li a,a[href='#top'],a[data-gal='m_PageScroll2id']").mPageScroll2id({
			highlightSelector:"ul.slimmenu li a",
			offset: 78,
			scrollSpeed:800,
			scrollEasing: "easeInOutCubic"
		});
				
		/* demo functions */
		$("a[rel='next']").click(function(e){
			e.preventDefault();
			var to=$(this).parent().parent("section").next().attr("id");
			$.mPageScroll2id("scrollTo",to);
		});
				
	});	
		
	
	
	
	$(document).ready(function() {
	
	
		/* fix on scroll */
		
		if ($(window).width() > 1200) {
			$(".portfolio-filter").stick_in_parent({offset_top: 100});
		}

	
		//TaurusMenu	

		"use strict";

		$('.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');
		//Checks if li has sub (ul) and adds class for toggle icon - just an UI
		
		$(".menu > ul").before("<a href=\"#\" class=\"menu-mobile\"></a>");

		//Adds menu-mobile class (for mobile toggle menu) before the normal menu
		//Mobile menu is hidden if width is more then 1199px, but normal menu is displayed
		//Normal menu is hidden if width is below 1199px, and jquery adds mobile menu
		//Done this way so it can be used with wordpress without any trouble

		$('.menu > ul > li').hover(function() {
			if ($(window).width() > 1183) {
				$(this).children("ul").stop(true, false).toggleClass('active');
				e.preventDefault();
			}	
		});
		
		$(".menu > ul > li").click(function(e){
			if ($(window).width() < 1183) {
				var $me = $(this),
					width = $me.outerWidth(),
					height = $me.outerHeight(),
					top = $me.position().top,
					left = $me.position().left;
								
				var len = Math.sqrt(Math.pow(width - e.offsetX, 2) + Math.pow(e.offsetY, 2));

				if (len < 50)
					$(this).children("ul").stop(true, false).toggleClass('active');
			}
		});	

		//2nd dropdown
		$(".menu > ul > li > ul.normal-sub > li").hover(function (e) {
			if ($(window).width() > 1183) {
				$(this).children("ul").stop(true, false).fadeToggle(300);
				e.preventDefault();
			}
		});
		//If width is more than 1183px 2nd dropdowns are displayed on hover
		
		$(".menu-mobile").on('click', function (e) {
			$(".menu > ul").toggleClass('show-on-mobile');
			e.preventDefault();
		});
		//when clicked on mobile-menu, normal menu is shown as a list, classic rwd menu story

				
		//Tooltip

		$(".tipped").tipper();
		

		/* Logos Carousel */		
		
		$("#owl-logos").owlCarousel({
			items : 5,
			itemsDesktop : [1000,4], 
			itemsDesktopSmall : [900,3],
			itemsTablet: [600,2], 
			itemsMobile : false, 
			navigation: false,
			pagination : false,
			autoPlay : 3000,
			slideSpeed : 300
		});

		
		/* Quote Carousels */
	 
		$("#owl-sep-1").owlCarousel({
			navigation: false,
			pagination : true,
			transitionStyle : "fade",
			slideSpeed : 500,
			paginationSpeed : 500,
			singleItem:true,
			autoPlay: 5000
		});

		
		//Facts Counter 
	
        $('.counter-numb').counterUp({
            delay: 100,
            time: 2000
        });

		
		//Parallax
		
		$('.parallax-1').parallax("50%", 0.2);
		
		
		//Video
						
		$(".container").fitVids();
						
		$('.vimeo a,.youtube a').click(function (e) {
			e.preventDefault();
			var videoLink = $(this).attr('href');
			var classeV = $(this).parent();
			var PlaceV = $(this).parent();
			if ($(this).parent().hasClass('youtube')) {
				$(this).parent().wrapAll('<div class="video-wrapper">');
				$(PlaceV).html('<iframe frameborder="0" height="333" src="' + videoLink + '?autoplay=1&showinfo=0" title="YouTube video player" width="547"></iframe>');
			} else {
				$(this).parent().wrapAll('<div class="video-wrapper">');
				$(PlaceV).html('<iframe src="' + videoLink + '?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1&amp;color=e87638" width="500" height="281" frameborder="0"></iframe>');
			}
		});	


	});	


	
	
})(jQuery); 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 





	