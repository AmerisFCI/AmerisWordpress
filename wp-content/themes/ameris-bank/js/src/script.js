(function ($) {

	// Enable the "looking for something else?" dropdowns on landing pages
	$( 'select[name="select_subpage"]' ).change( function() {
		if ( $( this ).val() ) {
			window.location.href = '/?p=' + $( this ).val();
		}
	} );



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
	

	// Put code here


})(jQuery);