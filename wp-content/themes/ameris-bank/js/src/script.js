(function ($) {

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


	/**
	 * Enable Columnizer for submenu layout.
	 */
	//$('.left-52 .sub-menu').columnize( { columns: 3 } );


	/**
	 * Create containers for stacked items.
	 */
	$( '#primary-menu > li > .sub-menu' ).each( function() {

		// get all right-side items
		var stackedItems = $( this ).find( '.stacked-sub' );

		stackedItems.wrapAll( '<li class="stacked-container"><ul class="sub-menu"></ul></li>' );

	} );


	/**
	 * Handle main menu links' click behavior.
	 */
	$( '#primary-menu a' ).click( function( event ) {

		// if already `active` class, follow link
		if ( $( this ).parent( 'li' ).hasClass( 'active' ) )
			return true;

		var isMobile    = $( '#site-navigation .menu-toggle' ).is( ':visible' );
		var hasChildren = $( this ).parent( 'li' ).hasClass( 'menu-item-has-children' );

		// on full-width: always follow link
		if ( !isMobile )
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
	 * Make sure the Business sub-menu is always big enough for the .tab-containers.
	 */
	$( '.has-tabbed-sub' ).on( 'hover', '.toggle-sub__parent', function() {
		
		var isMobile = $( '#site-navigation .menu-toggle' ).is( ':visible' );
		if ( isMobile )
			return;

		var tabContainer = $( this ).find( '.tab-container' );
		var containerHeight = tabContainer.height();
		
		var overallHeight = $( this ).closest( '.sub-menu' ).height();

		var biggestHeight = overallHeight;
		if ( containerHeight > overallHeight )
			biggestHeight = containerHeight;

		tabContainer.height( biggestHeight );
		$( this ).closest( '.sub-menu' ).animate( { height: biggestHeight+'px' }, 600 );

	} );

	//visible tab class by default to the first child of the business nav list
	$('.toggle-sub__parent:first-child').addClass('visible-tab');

	//Add a class to the first-child of business when a sibling is hovered
	$('.toggle-sub__parent').on('hover', function(){
		if( $('.toggle-sub__parent:first-child').hasClass('visible-tab') ) {
			$('.toggle-sub__parent:first-child').removeClass('visible-tab');
		}
		else {
			$('.toggle-sub__parent:first-child').addClass('visible-tab');
		}

	});

	//accessible part so that if you tab to the link it does the same thing
	$('.toggle-sub__parent > a').on('focus', function(){
			$('.toggle-sub__parent:first-child').removeClass('visible-tab');
	});

	$(document).ready(function() {

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


