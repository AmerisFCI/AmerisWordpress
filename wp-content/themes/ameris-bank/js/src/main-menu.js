/**
 * All behavior specific to the main site menu.
 */
var mainMenu = {
	
	init: function() {

		// add our structural html right away
		mainMenu.addContainers();

		// enable hoverIntent for top-level items
		jQuery( '#primary-menu > li' ).hoverIntent( {
			over:     mainMenu.hoverOver,
			out:      mainMenu.hoverOut,
			timeout:  100
		} );

		// enable hoverIntent for Business tabs
		jQuery( '#primary-menu' ).hoverIntent( {
			over:     mainMenu.tabHoverOver,
			out:      mainMenu.tabHoverOut,
			timeout:  100,
			selector: '.toggle-sub__parent'
		} );

		// handle focus behavior
		jQuery( '.toggle-sub__parent > a' ).on( 'focus', mainMenu.removeVisibleClass );
		jQuery( '.toggle-sub__parent > a' ).on( 'focus', mainMenu.focusTabSize );

		// handle mouseenter
		jQuery( '.has-tabbed-sub > a' ).on( 'mouseenter', mainMenu.addVisibleClass );

		// handle click behavior
		jQuery( '#primary-menu a' ).on( 'click', mainMenu.handleClick );

	},

	addContainers: function() {
		jQuery( '.has-tabbed-sub > ul > li' ).each( mainMenu.tabContainers );
		jQuery( '#primary-menu > li > .sub-menu' ).each( mainMenu.sideContainers );
		jQuery( '#primary-menu > li > .sub-menu' ).each( mainMenu.stackContainers );
	},

	tabContainers: function() {
		jQuery( this ).children().not( 'a' ).wrapAll( '<div class="tab-container" />' );
	},

	sideContainers: function() {
		var isTabbed = jQuery( this ).parent( 'li' ).hasClass( 'has-tabbed-sub' );
		if ( !isTabbed ) {
			jQuery( this ).find( '.right-side' ).wrapAll( '<li class="right-container"><ul class="sub-menu"></ul></li>' );
		} else {		
			var rightItems;
			jQuery( this ).find( '.toggle-sub__parent > .tab-container > .sub-menu' ).each( function() {
				
				// get right-hand items
				rightItems = jQuery( this ).find( '.right-side' );
				
				// get their parent menu
				var origParent = rightItems.parent( '.sub-menu' );
			
				// remove from their parent menu
				rightItems.detach();

				// add after the parent menu, inside a new container
				rightItems.insertAfter( origParent ).wrapAll( '<div class="right-container"><ul class="sub-menu"></ul></div>' );

			} );
		}
	},

	stackContainers: function() {
		var stackedItems = jQuery( this ).find( '.stacked-sub' );
		stackedItems.wrapAll( '<li class="stacked-container"><ul class="sub-menu"></ul></li>' );
	},

	addVisibleClass: function() {
		jQuery( '.toggle-sub__parent:first-child' ).addClass( 'visible-tab' );
	},

	removeVisibleClass: function() {
		jQuery( '.toggle-sub__parent:first-child' ).removeClass( 'visible-tab' );
	},

	focusTabSize: function() {
		var li = jQuery( this ).parent( 'li' );
		mainMenu.fixTabSize( li );
	},

	fixTabSize: function( obj ) {
		var isMobile = jQuery( '#site-navigation .menu-toggle' ).is( ':visible' );
		if ( isMobile )
			return;

		// ensure tab is as high as it needs to be
		var tabContainer = jQuery( obj ).find( '.tab-container' );
		var containerHeight = tabContainer.height();
		var overallHeight = jQuery( obj ).closest( '.sub-menu' ).height();
		var biggestHeight = overallHeight;
		if ( containerHeight > overallHeight )
			biggestHeight = containerHeight;
		tabContainer.height( biggestHeight );
		jQuery( obj ).closest( '.sub-menu' ).css( 'min-height', biggestHeight+'px' );
	},

	hoverOver: function() {
		jQuery( this ).addClass( 'hover' );
		if ( jQuery( this ).hasClass( 'has-tabbed-sub' ) ) {
			var firstTab = jQuery( this ).find( '> .sub-menu > li:first-child' );
			mainMenu.fixTabSize( firstTab );
		}
	},

	hoverOut: function() {
		jQuery( this ).removeClass( 'hover' );
		mainMenu.addVisibleClass();
	},

	tabHoverOver: function() {
		jQuery( this ).addClass( 'hover' );
		mainMenu.removeVisibleClass();
		mainMenu.fixTabSize( this );
	},

	tabHoverOut: function() {
		jQuery( this ).removeClass( 'hover' );
	},

	handleClick: function() {

		// if already `active` class, follow link
		if ( jQuery( this ).parent( 'li' ).hasClass( 'active' ) )
			return true;

		var isMobile    = jQuery( '#site-navigation .menu-toggle' ).is( ':visible' );
		var hasChildren = jQuery( this ).parent( 'li' ).hasClass( 'menu-item-has-children' );

		// on full-width: always follow link
		if ( !isMobile )
			return true;

		// on mobile: if you don't have any children, always follow link
		if ( isMobile && !hasChildren )
			return true;

		// don't follow the link
		event.preventDefault();

		// remove `active` class from all other items unless they're ancestors
		jQuery( '#primary-menu li' ).not( jQuery( this ).parents( 'li' ) ).removeClass( 'active' );

		// add `active` class to this item
		jQuery( this ).parent( 'li' ).addClass( 'active' );

	}

}
jQuery( document ).ready( mainMenu.init );