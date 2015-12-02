(function ($) {


	// Enable the "looking for something else?" dropdowns on landing pages
	$( 'select[name="select_subpage"]' ).change( function() {
		if ( $( this ).val() ) {
			window.location.href = '/?p=' + $( this ).val();
		}
	});



	// Initialize the select or die library
	// to add custom styling to select dropdowns
	$("select").selectOrDie();



	// Add slideshow functionality
	// to the homepage slides
	$('.slides').slick({
		autoplay: true,
		autoplaySpeed: 5000,
		arrows: false,
		dots: true,
		fade: true,
		mobileFirst: true,
		pauseOnDotsHover: true,
		swipeToSlide: true
	});


	// Add slideshow functionality
	// to the related resources
	$('.resources-rotator').slick({
		autoplay: false,
		arrows: true,
		dots: false,
		fade: false,
		infinite: false,
		mobileFirst: true,
		pauseOnDotsHover: true,
		swipeToSlide: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 450,
				settings: {
					slidesToShow: 2
				}
			},
			{
				breakpoint: 620,
				settings: {
					slidesToShow: 3
				}
			},
			{
				breakpoint: 740,
				settings: {
					slidesToShow: 2
				}
			},
			{
				breakpoint: 1000,
				settings: {
					slidesToShow: 3
				}
			},
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2
				}
			},
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 3
				}
			},
			{
				breakpoint: 1400,
				settings: {
					slidesToShow: 4,
					//dots: true
				}
			}

			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		]
	});

	// Add slideshow functionality
	// to the About Us newsroom slides
	$('.about-newsroom').slick({
		autoplay: false,
		arrows: true,
		appendArrows:'.about-newsroom-arrows',
		dots: true,
		fade: false,
		infinite: true,
		mobileFirst: true,
		pauseOnDotsHover: true,
		swipeToSlide: true
	});


	// Get the homepage slideshow images to
	// fill the parent container no matter what!
	$(window).load(function() {

		var theWindow        = $(window),
			$slideimg        = $('.slide img'),
			theParent		 = $slideimg.parent(),
			aspectRatio      = $slideimg.width() / $slideimg.height();

		function resizeBg() {
			if ( (theParent.width() / theParent.height()) < aspectRatio ) {
				$slideimg
					.removeClass()
					.addClass('slideheight');
			} else {
				$slideimg
					.removeClass()
					.addClass('slidewidth');
			}
		}
		theWindow.resize(resizeBg).trigger("resize");
	});

	// Set wide banner images to
	// fill the parent container no matter what!
	$(window).load(function() {

		var theWindow        = $(window),
			$wideimg        = $('.wide-banner-image img'),
			theParent		 = $wideimg.parent(),
			aspectRatio      = $wideimg.width() / $wideimg.height();

		function resizeWideBanner() {
			if ( (theParent.width() / theParent.height()) < aspectRatio ) {
				$wideimg
					.removeClass()
					.addClass('slideheight');
			} else {
				$wideimg
					.removeClass()
					.addClass('slidewidth');
			}
		}
		theWindow.resize(resizeWideBanner).trigger("resize");
	});


	// Get the banner image at the top of landing and product pages
	// to have the margin + content width, and resize properly
	$(window).load(function() {

		var Window        		= $(window),
			content				= $('.content-area'),
			bannerimg       	= $('.banner-image img'),
			bannerblurbwrap		= $('.banner-blurb__wrap'),
			bannerParent		= $('.banner-image'),
			bannerAspectRatio   = bannerimg.width() / bannerimg.height();

		function resizeBanner() {

			// set the blurb wrapper to be the same width as the content
			bannerblurbwrap.width(content.width());

			// set "n" to be:
			// window width - the grid width = both margins
			// both margins / 2 = one margin outside the grid
			// then add the content area width
			var n = ((Window.width() - $('.content-inner-wrap').width()) / 2) + content.width();

			// set the banner div width to be the
			// content width plus the margin width
			bannerParent.width(n);

			// set the banner div height to be
			// the image height (and not cut off
			// the bottom of the image)
			bannerParent.height(bannerimg.height());

			// set the aspect ratio of the image
			// to be correct all the time
			if ( (bannerParent.width() / bannerParent.height()) < bannerAspectRatio ) {
				bannerimg
					.removeClass()
					.addClass('slideheight');
			} else {
				bannerimg
					.removeClass()
					.addClass('slidewidth');
			}



		}
		// trigger the above calculations on window resize
		$(window).resize(resizeBanner).trigger("resize");

	});

	// Tiny jQuery Plugin
	// by Chris Goodchild
	$.fn.exists = function(callback) {
		var args = [].slice.call(arguments, 1);

		if (this.length) {
			callback.call(this, args);
		}

		return this;
	};

	// Usage
	$('.sidebar-left').exists(function() {
		$('.content-area').addClass('has-sidebar-left');
	});

	$('.sidebar-right').exists(function() {
		$('.content-area').addClass('has-sidebar-right');
	});


	/**
	 * External link prompt.
	 */
	$('a').each(function() {

		// if link exists, uses http, and is not one of the named sites
		if( this.href != '' &&
			this.href.indexOf('http') != -1 &&
			this.href.indexOf('ir.amerisbank.com') == -1 /* &&
			this.href.indexOf('ibanking-services.com') == -1 &&
			this.href.indexOf('amerisbankmortgage.com') == -1 */ ) {
			
			var a = new RegExp('/' + window.location.host + '/');
			
			// if external link
			if( !a.test( this.href ) ) {
				$( this ).click( function( event ) {
					event.preventDefault();
					event.stopPropagation();
					if ( window.confirm( "You are now leaving Ameris Bank's website. Ameris Bank has no control over the content or quality of the site you are visiting, and the site may not have the same privacy and/or security practices as Ameris Bank. We encourage you to read the privacy/security policy for the site you are visiting." ) ) {
						window.open( this.href, '_blank' );
					}
				} );
			}

		// open in a new tab if ir or ibanking-services
		} else if ( this.href != '' &&
					this.href.indexOf('http') != -1 /* &&
					this.href.indexOf('amerisbankmortgage.com') != -1 */ ) {

			var a = new RegExp('/' + window.location.host + '/');
			if( !a.test( this.href ) ) {
				$( this ).click( function( event ) {
					event.preventDefault();
					event.stopPropagation();
					window.open( this.href, '_blank' );
				} ); 
			}
		
		}

	} );


	/**
	 * Set tables inside content as responsive.
	 */
	$( '.entry-content table' ).addClass( 'responsive' );
	


	// Put code here


})(jQuery);


/**
 * Initialize ios7 viewport unit fix.
 */
window.viewportUnitsBuggyfill.init();


/**
 * Move the secondary links and search bar into the mobile menu.
 */
/*
div.nav-wrapper
	nav.utility-navigation
	form.search-form
	nav.main-navigation
 */
function amerisOrganizeMobileMenu() {
	var isMobile = jQuery( '#site-navigation .menu-toggle' ).is( ':visible' );
	if ( isMobile ) {

		// move utility nav into nav menu
		jQuery( '#masthead .nav-wrapper > .utility-navigation' )
			.detach()
			.appendTo( '#primary-menu' )
			.wrap( '<li class="menu-item utility-in-primary-menu"></li>' );

		// move search form into nav menu
		jQuery( '#masthead .nav-wrapper > .search-form' )
			.detach()
			.appendTo( '#primary-menu' )
			.wrap( '<li class="menu-item search-in-primary-menu"></li>' );

	} else {

		// move utility nav back out of nav menu
		jQuery( '#primary-menu .utility-navigation' )
			.unwrap()
			.detach()
			.prependTo( '#masthead .nav-wrapper' );

		// move search form back to after utility nav
		jQuery( '#primary-menu .search-form' )
			.unwrap()
			.detach()
			.insertAfter( '#masthead .utility-navigation' );

	}
}
jQuery( document ).ready( amerisOrganizeMobileMenu );
jQuery( window ).resize( amerisOrganizeMobileMenu );