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
		dots: true,
		fade: false,
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


	// Put code here


})(jQuery);



/**
 * Move the search bar to the mobile menu at mobile sizes. (Function below.)
 */
function amerisPositionSearchBar() {

	var isMobile = jQuery( '#site-navigation .menu-toggle' ).is( ':visible' );

	if ( isMobile ) {
		jQuery( '.nav-wrapper > .search-form' )
			.detach()
			.appendTo( '#primary-menu' )
			.wrap( '<li class="menu-item search-in-primary-menu"></li>' );

	} else {
		jQuery( '#primary-menu .search-form' )
			.unwrap()
			.detach()
			.insertAfter( '#masthead .utility-navigation' );

	}

}
jQuery( document ).ready( amerisPositionSearchBar );
jQuery( window ).resize( amerisPositionSearchBar );



