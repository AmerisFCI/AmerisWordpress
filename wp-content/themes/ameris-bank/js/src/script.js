(function ($) {

	/**
	 * Handle main menu links' click behavior.
	 */
	$( '#primary-menu a' ).click( function( event ) {

		// if already `active` class, follow link
		if ( $( this ).parent( 'li' ).hasClass( 'active' ) )
			return true;

		var isMobile    = $( '#site-navigation .menu-toggle' ).is( ':visible' );
		var topLevel    = $( this ).closest( 'ul' ).is( '#primary-menu' );
		var tab         = $( this ).closest( '.sub-menu' ).closest( 'li' ).hasClass( 'has-tabbed-sub' );
		var hasChildren = $( this ).parent( 'li' ).hasClass( 'menu-item-has-children' );

		// on full-width: as long as you're not a tab under Business, always follow link
		if ( !isMobile && !tab )
			return true;

		// on mobile: if you don't have any children, always follow link
		if ( isMobile && !hasChildren )
			return true;

		// don't follow the link
		event.preventDefault();

		// remove `active` class from all other items unless they're ancestors
		$( '#primary-menu li' ).not( $( this ).parents( 'li' ) ).removeClass( 'active' );

		// add `active` class to this item
		$( this ).parent( 'li' ).addClass( 'active' );

	} );



	/**
	 * Create containers for tabbed submenus.
	 */
	$( '.has-tabbed-sub > ul > li' ).each( function() {
		$( this ).children().not( 'a' ).wrapAll( '<div class="tab-container" />' );
	} );
	


	/**
	 * Create containers for right-hand menu sections.
	 */
	$( '#primary-menu > li > .sub-menu' ).each( function() {

		var isTabbed = $( this ).parent( 'li' ).hasClass( 'has-tabbed-sub' );
		
		// get all right-side items
		var rightItems = $( this ).find( '.right-side' ); 

		if ( isTabbed ) {

			// get their parent menu
			var origParent = rightItems.parent( '.sub-menu' );
		
			// remove from their parent menu
			rightItems.detach();

			// add after the parent menu, inside a new container
			rightItems.insertAfter( origParent ).wrapAll( '<div class="right-container"><ul class="sub-menu"></ul></div>' );

		} else {

			rightItems.wrapAll( '<li class="right-container"><ul class="sub-menu"></ul></li>' );

		}
	
	} );
		


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