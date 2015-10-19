(function ($) {

	// Enable the "looking for something else?" dropdowns on landing pages
	$( 'select[name="select_subpage"]' ).change( function() {
		if ( $( this ).val() ) {
			window.location.href = '/?p=' + $( this ).val();
		}
	} );


	$("select").selectOrDie();


	$('.slides').slick({
		//setting-name: setting-value
		autoplay: true,
		autoplaySpeed: 5000,
		arrows: false,
		dots: true,
		fade: true,
		mobileFirst: true,
		pauseOnDotsHover: true,
		swipeToSlide: true
	});
	// Put code here


})(jQuery);