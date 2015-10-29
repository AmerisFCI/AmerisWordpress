(function ($) {


	// Handle `active` class behavior and when to follow links
	$( '#primary-menu > li > a,	#primary-menu li.has-tabbed-sub > .sub-menu > li > a' ).click( function( event ) {

		// if already `active`, follow link
		if ( $( this ).parent().hasClass( 'active' ) ) {
			return true;
		}

		// if top-level item and we're seeing the full-width menu, follow link
		if ( $( this ).closest( 'ul' ).is( '#primary-menu' ) &&
		    !$( '#site-navigation .menu-toggle' ).is( ':visible' ) ) {
			return true;
		}

		// normally: don't follow link
		event.preventDefault();

		// remove `active` class from all other links
		$( '#primary-menu li' ).removeClass( 'active' );
		
		// add `active` class
		$( this ).parent( 'li' ).addClass( 'active' );

	});
		


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


	// Put code here


})(jQuery);