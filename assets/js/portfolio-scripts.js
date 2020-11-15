/**
 * Portfolio-Scripts - the custom scripts for the Portfolio theme.
 *
 */


 /*--------------------------------------------------------------
>>> TABLE OF CONTENTS:
----------------------------------------------------------------

1 Smooth Scrolling Init
2 Footer Form Focus
3 Modal Close
4 Footer Form Submission
5 Link Blur
6 Slick Image Carousel (Flexible Content)
7 Magnific Image Pop-up
8 Header Scroll Tracking
9 Table of Contents Scroll Tracking
10 Sticky Table of Contents

--------------------------------------------------------------*/

/*--------------------------------------------------------------
1 Smooth Scrolling Init
--------------------------------------------------------------*/
jQuery( document ).ready(function($) {
	var scroll = new SmoothScroll(
		//'[data-scroll]',
		'a[href*="#"]',
		{
			header: '#masthead',
			updateURL: false
		}
	);
});

/*--------------------------------------------------------------
2 Footer Form Focus
--------------------------------------------------------------*/
jQuery( document ).ready(function($) {
	function headerFormFocus(e) {
		if (
			e.detail.toggle.id === 'header-cta'
			|| e.detail.toggle.id === 'header-inner-cta'
		) {
			$firstInput = $( '#footer-contact-form :input' ).first();
			$firstInput.focus();
		} 
	}

	// Custom event fired by scroll library
	document.addEventListener('scrollStop', headerFormFocus, false);
});

/*--------------------------------------------------------------
3 Modal Close
--------------------------------------------------------------*/
jQuery( document ).ready(function($) {

	// Vars
	var modalCtas  = $( '.case-study-cta, .contact-cta' ),
		firstInput = $( '#footer-contact-form :input' ).first();

	// Callback function
	function modalFade( e ) {

		// Check which CTA we've clicked on (case study or contact)
		if ( $.inArray( 'case-study-cta', $( e.target.classList ) ) >= 0 ) {
			
			// Hide modal
			$( '.modal' ).modal( 'hide' );

		} else {
			
			// Hide modal
			$( '.modal' ).modal( 'hide' );

			// Footer form focus
			firstInput.focus();
		}
		
	}

	// Set event handler on cta clicks
	modalCtas.on( 'click', modalFade );
});

/*--------------------------------------------------------------
4 Footer Form Submission
--------------------------------------------------------------*/
jQuery( document ).ready(function($) {

	$( '#footer-contact-form').submit(function(e) {

		// Prevent default submission
		e.preventDefault();

		// Vars
		var url              = ajaxUrl; // WordPress ajax url passed in via localize script
		var	thankYouContent  = '<h3>Success!</h3>';
			thankYouContent += '<p>Thank you for your interest.</p>';
			thankYouContent += '<p>I appreciate you reaching out and will be in touch shortly.</p>';
		var errorContent	 = '<h3>Error</h3>';
			errorContent	+= '<p>Oops! Sorry about that.</p>';
			errorContent 	+= '<p>Try sending me <a href="mailto:nathanmhouse@gmail.com?Subject=Form%20Error">a direct email</a> and we\'ll get this sorted out.';
		var suspectContent	 = '<h3>Error</h3>';
			suspectContent	+= '<p>Your message was unable to be sent.</p>';

		// Make AJAX call
		// On success replace form with TY content
		$.ajax({
			type: 'POST',
			url: url,
			data: $('#footer-contact-form').serialize(),
			contentType: 'application/x-www-form-urlencoded;'
		})
		.done( function(response) {
			var response = JSON.parse(response);

			// If no errors
			if (response.length <= 0) {
				$('.footer-contact-form-content').fadeOut('slow', function() {
					$(this).html(thankYouContent);
					$(this).fadeIn('slow');
				});

			// If an email error
			} else if (response.email == true) {
				$('.email > .error').removeClass('inactive');
				$('.email > .error').addClass('active');
				$('#email').addClass('errors');

			// If a suspect error
			} else if (response.suspect == true) {
				$('.footer-contact-form-content').fadeOut('slow', function() {
					$(this).html(suspectContent);
					$(this).fadeIn('slow');
				});
			}
		})
		.fail( function(response) {
			$('.footer-contact-form-content').fadeOut('slow', function() {
				$(this).html(errorContent);
				$(this).fadeIn('slow');
			});
		});
	});
});

/*--------------------------------------------------------------
5 Link Blur
--------------------------------------------------------------*/
jQuery( document ).ready(function($) {
	
	// Set event
	$( 'a' ).click(function() {
		
		// Blur clicked link
		$(this).blur();
	});
});

/*--------------------------------------------------------------
6 Slick Image Carousel (Flexible Content)
--------------------------------------------------------------*/
jQuery( document ).ready(function($) {

	// Create variables for navigation container and html output of prev/next arrows
	var carouselNavigationContainer = $( '.content-row-carousel-navigation' ),
		prevArrow                   = '<span class="prev-arrow fa fa-chevron-left"></span>',
		nextArrow                   = '<span class="next-arrow fa fa-chevron-right"></span>';

	// Initialize slick w/ cusotm settings
	$( '.content-row-carousel' ).slick({
		appendArrows: carouselNavigationContainer,
		autoplay: true,
		nextArrow: nextArrow,
		prevArrow: prevArrow,
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					autoplay: true,
					arrows: false,
					dots: true,
					dotsClass: 'content-row-carousel-dots',
					slidesToShow: 2,
				}
			},
			{
				breakpoint: 600,
				settings: {
					autoplay: true,
					arrows: false,
					dots: true,
					dotsClass: 'content-row-carousel-dots',
					slidesToShow: 1,
				}
			}
		]
	});
});

/*--------------------------------------------------------------
7 Magnific Image Pop-up
--------------------------------------------------------------*/
jQuery( document ).ready(function($) {

	// Enable Magnific image pop-up on associated class
	$('.popup-image').magnificPopup(
		{
			type:'image'
		}
	);

});

/*--------------------------------------------------------------
8 Header Scroll Tracking
--------------------------------------------------------------*/
jQuery( document ).ready(function($) {
	const siteHeader = document.querySelector('.site-header');
	$(document).on('scroll', function() {
		if (window.scrollY > 0) {
			$(siteHeader).addClass('is-scrolled');
		} else {
			$(siteHeader).removeClass('is-scrolled');
		}
	});
});

/*--------------------------------------------------------------
9 Table of Contents Scroll Tracking
--------------------------------------------------------------*/
jQuery( document ).ready(function($) {
	if ($('.table-of-contents').length <= 0) {
		return;
	}
	
	window.addEventListener('scroll', setActiveTableOfContentsItem);

	const headerHeight = document.getElementById('masthead').offsetHeight;

	function setActiveTableOfContentsItem() {
		if ($(window).width() <= 991) return;

		document.querySelectorAll('.content-section__content').forEach(el => {
			if (el.getBoundingClientRect().y <= (headerHeight + 50)) {
				$(`[data-id="#${el.id}"]`).addClass('active');
			} else {
				$(`[data-id="#${el.id}"]`).removeClass('active');
			}
		});
	}
});

/*--------------------------------------------------------------
10 Sticky Table of Contents
--------------------------------------------------------------*/
jQuery( document ).ready(function($) {
	if ($('.table-of-contents').length <= 0) {
		return;
	}

	const headerHeight            = document.getElementById('masthead').offsetHeight;
	const contentHeight           = $('.content-section')[0].offsetHeight;
	const $tableOfContents        = $('.table-of-contents');
	const tableOfContentsPosition =  $tableOfContents.offset();

	window.addEventListener('scroll', setStickyTableOfContent);

	function setStickyTableOfContent() {
		if ($(window).width() <= 991) return;

		if (
			window.scrollY >= (tableOfContentsPosition.top - headerHeight)
			&& window.scrollY >= (contentHeight - 66)
		) {
			$tableOfContents.addClass('sticky-fixed');
			$tableOfContents.removeClass('sticky');
			$tableOfContents.css({
				top: "initial"
			})
		} else if (
			window.scrollY >= (tableOfContentsPosition.top - headerHeight)
		) {
			$tableOfContents.addClass('sticky');
			$tableOfContents.removeClass('sticky-fixed');
			$tableOfContents.css({
				top: headerHeight + 10
			});
		} else if (window.scrollY < (tableOfContentsPosition.top - headerHeight)) {
			$tableOfContents.removeClass('sticky');
			$tableOfContents.removeClass('sticky-fixed');
			$tableOfContents.css({
				top: "initial"
			})
		}
	}
});