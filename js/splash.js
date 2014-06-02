(function($) {

	$(document).ready(function() {

		var anchor = $.param.fragment();

		if (anchor == 'home') { 

			$('.splash').hide();

		} else {

			var contentheight = $(window).height();

			contentheight = contentheight - 5;

			var headertop = 0;

			if ($('#wpadminbar').length != 0) {
				headertop =+ $('#wpadminbar').outerHeight();
			} 

			contentheight = contentheight - headertop;

			tagline = $('.tagline').outerHeight();
			contentheight = contentheight - tagline;
	
			$(".coverimage").css({
		 		'height': contentheight +'px'
			});

			$('.splash').live('click', function() {
				$(this).slideToggle( "medium", function() {
				  });
			});

		}

	});

})(jQuery);
