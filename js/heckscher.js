(function($) {

var toplinkVisible = false;

function showToplink() {
	if ( toplinkVisible == false ) {
		toplinkVisible = true;
		$(".toplink").stop().fadeIn("fast");
	}
}

function hideToplink() {
	if ( toplinkVisible == true ) {
		toplinkVisible = false;
		$(".toplink").stop().fadeOut("fast");
	}
}

$(document).ready(function() {

	$('body').addClass('js');

	if ($('#wpadminbar').length != 0) {
		$('body').addClass('wpadmin');
	}

	$(".toplink").hide();

	$('.toplink').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 200);
		return false;
	});

});

$(window).scroll(function() {
	var viewportHeight = $(window).height();
	var scrolltop = $(window).scrollTop();
	
	if ( scrolltop > viewportHeight * 0.66 ) {
		showToplink();
	} else {
		hideToplink();
	}
});

})(jQuery);
