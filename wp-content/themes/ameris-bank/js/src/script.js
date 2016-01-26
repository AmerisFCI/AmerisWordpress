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
		//appendArrows:'.slide-arrows',
		arrows: true,
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
		infinite: true,
		mobileFirst: true,
		pauseOnDotsHover: true,
		accessibility: false,
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
	/*$(window).load(function() {

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
	});*/


	// Get the banner image at the top of landing and product pages
	// to have the margin + content width, and resize properly
	$(window).load(function() {

		var Window        		= $(window),
			content				= $('.content-area'),
			bannerimg       	= $('.banner-image img'),
			bannerblurbwrap		= $('.banner-blurb__wrap'),
			bannerParent		= $('.banner-image'),
			bannerAspectRatio   = bannerimg.width() / bannerimg.height(),

			navBar				= $('site-header'),
			pageTitle			= $('.page-title'),
			leftSidebar			= $('.has-banner-image ~ .inner-wrap .sidebar-left');

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

			var margin = ( pageTitle.innerHeight() + navBar.height() ) - bannerParent.height();

			leftSidebar.css('margin-top', margin);

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
			this.href.indexOf('ir.amerisbank.com') == -1 &&
			this.href.indexOf('ibanking-services.com') == -1 &&
			this.href.indexOf('snl.com') == -1 &&
			this.href.indexOf('ultiproworkplace.com') == -1 /* &&
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


	/**
	 * Simple ajax posts pagination.
	 */
	$('.blog-wrap').on('click', '.nav-links a', function(e){
		e.preventDefault();
		var link = $(this).attr('href');
		var blogWrap = $('.blog-wrap');

		// remove existing posts
		blogWrap.fadeOut(400);

		// at the same time, scroll to top
		$('body').animate({
			scrollTop:$('.blog-wrap').offset().top - 50
		}, 400, "swing", function() {

			// add loading notice
			blogWrap.closest( '.blog-wrap' ).after( '<div class="posts-loading">Loading posts&hellip;</div>' );

			// load new posts with ajax magic
			blogWrap.load(link + ' .blog-wrap', function() {

				// remove duplicate .blog-wrap and loading notice, and display new posts
				var contents = $(this).children().html();
				$( '.posts-loading' ).remove();
				$( this ).html( contents ).fadeIn( 400 );

			} );
		} );

	});


	/**
	 * Account Access form handling.
	 */
	$( '#lgnform select[name="switch_login_type"]' ).change( function() {
		var dropdown = $( this );
		var val      = dropdown.val();
		var form     = dropdown.closest( '#lgnform' );
		var submit   = form.find( '.account-access__submit-wrapper' );

		// on every switch, remove all input[type="text,password,hidden"]
		form.find( 'input[type="text"], input[type="password"], input[type="hidden"], label.removable' ).remove();

		switch( val ) {
			case 'Personal Online Banking':
				submit.before(
					'<label for="_textBoxUserId" class="element-invisible removable">User ID</label>',
					'<input id="_textBoxUserId" type="text" value="" name="_textBoxUserId" placeholder="User ID">',
					'<input id="_textBoxCompanyId" type="hidden" value="466_061201754" name="_textBoxCompanyId">'
				);
				form.attr( 'action', 'https://cibng.ibanking-services.com/EamWeb/Remote/RemoteLoginAPI.aspx?FIORG=466&orgId=466_061201754&FIFID=061201754&brand=466_061201754&appId=ceb' );
				break;
			case 'Business Online Banking':
				submit.before(
					'<label for="_textBoxCompanyId" class="element-invisible removable">Company ID</label>',
					'<input id="_textBoxCompanyId" type="text" value="" name="_textBoxCompanyId" placeholder="Company ID">',
					'<label for="_textBoxUserId" class="element-invisible removable">User ID</label>',
					'<input id="_textBoxUserId" type="text" value="" name="_textBoxUserId" placeholder="User ID">'
				);
				form.attr( 'action', 'https://ameris.ebanking-services.com/EamWeb/Remote/RemoteLoginApi.aspx?appID=beb&brand=ameris' );
				break;
			case 'Ameris Bank Credit Card Access':
				form.attr( 'action', 'https://www.myaccountaccess.com/onlineCard/login.do?theme=elan1&loc=12252' );
				break;
			case 'Merchant Service Access':
				form.attr( 'action', 'https://www.myclientline.net' );
				break;
			case 'Investor Access':
				form.attr( 'action', 'https://wallstreet.rjf.com' );
				break;
			case 'Columbia Partner':
				submit.before(
					'<label for="loginUserName" class="element-invisible removable">Email address</label>',
					'<input id="loginUserName" type="text" value="" name="loginUserName" placeholder="Email address">',
					'<label for="loginPassword" class="element-invisible removable">Password</label>',
					'<input id="loginPassword" type="password" value="" name="loginPassword" placeholder="Password">'
				);
				form.attr( 'action', 'https://5620781132.secure-onlineorigination.com/TPOLogin.aspx' );
				break;
			case 'Georgia Partner':
				submit.before(
					'<label for="loginUserName" class="element-invisible removable">Email address</label>',
					'<input id="loginUserName" type="text" value="" name="loginUserName" placeholder="Email address">',
					'<label for="loginPassword" class="element-invisible removable">Password</label>',
					'<input id="loginPassword" type="password" value="" name="loginPassword" placeholder="Password">'
				);

				form.attr( 'action', 'https://2317009814.secure-onlineorigination.com/TPOLogin.aspx' );
				break;
		}
		// FORMALIZE.init.placeholder();
		// form.find('input[type="text"], input[type="password"]').val( '' );
		form.find('input[type="text"], input[type="password"]').placeholder();
	} ).change();


	/**
	 * Account Access cookie handling. When the form is submitted, save a cookie for over a year
	 * so that the user is returned to this form if they come back before then.
	 */
	$( '#lgnform' ).submit( function() {
		var choice = $( this ).find( 'select[name="switch_login_type"]' ).val();
		amerisSetCookie( 'accounttype', choice, 400 );
		// then continue on with the form submission...
	} );


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


/**
 * Account Access cookie implementation -- check for a cookie on page load
 * and change the dropdown to match.
 */
var accountType = amerisGetCookie( 'accounttype' );
if ( accountType ) {
	if ( jQuery( '#lgnform option[value="' + accountType + '"]' ).length > 0 )
		jQuery( '#lgnform select[name="switch_login_type"]' ).val( accountType ).change();
}

function amerisSetCookie( cname, cvalue, exdays ) {
	var d = new Date();
	d.setTime( d.getTime() + ( exdays * 24 * 60 * 60 * 1000 ) );
	var expires = "expires=" + d.toUTCString();
	document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
}

function amerisGetCookie( cname ) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1);
		if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
	}
	return "";
}