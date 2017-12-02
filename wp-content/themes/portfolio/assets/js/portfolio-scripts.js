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

--------------------------------------------------------------*/

/*--------------------------------------------------------------
1 Smooth Scrolling Init
--------------------------------------------------------------*/
jQuery( document ).ready(function($) {
	smoothScroll.init();
});

/*--------------------------------------------------------------
2 Footer Form Focus
--------------------------------------------------------------*/
jQuery( document ).ready(function($) {

	// Vars
	var ctaLinks		= $( 'a[href="#site-footer"]'),
		firstInput 		= $( '#footer-contact-form :input' ).first();
		
	// Set callback function
	function headerFormFocus() {

		// Give first input focus
		firstInput.focus();
	}

	// Set event handler on cta click
	ctaLinks.on( 'click', headerFormFocus );
});

/*--------------------------------------------------------------
3 Modal Close
--------------------------------------------------------------*/
jQuery( document ).ready(function($) {

	// Vars
	var modalCta = $( '.case-study-cta' );
		
	// Callback function
	function modalFade( e ) {

		// Hide modal
		$( '.modal' ).modal( 'hide' );
	}

	// Set event handler on cta click
	modalCta.on( 'click', modalFade );
});

/*--------------------------------------------------------------
4 Footer Form Submission
--------------------------------------------------------------*/
jQuery( document ).ready(function($) {
	$( '#footer-contact-form').submit(function(e) {

		//
		return;

		// Vars
		var url 			 = 'wp-content/themes/portfolio/footer-contact-form-handler.php';
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

			// Success messaging
			success: function(response) {
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
			},

			// Error messaging
			error: function() {
				$('.footer-contact-form-content').fadeOut('slow', function() {
					$(this).html(errorContent);
					$(this).fadeIn('slow');
				});
			}
		});

		// Prevent default submission
		e.preventDefault();
	})
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