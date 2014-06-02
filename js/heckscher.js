(function($) {

var toplinkVisible = false;

function closeSearch(first) {

	$( ".searchform" ).slideToggle( "fast", function() {
		$('.searchtoggle').removeClass('active');
	  });

}

function openSearch() {

	$( ".searchform" ).slideToggle( "fast", function() {
	    // Animation complete.
	  });

	$('.searchtoggle').addClass('active');

}

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

	$('.searchtoggle').live('click', function() {
		if ( $('.searchtoggle').hasClass('active') ) {
			closeSearch();
		} else {
			openSearch();
		}
	});

	$('.accordionitem').addClass('closed');
	$('.accordionitem .toggle').addClass('icon').addClass('icon-togglearrow-down');
	$('.accordioncontent').hide();


	$('.accordionitem:first-child').find('.accordioncontent').show();
	$('.accordionitem:first-child').removeClass('closed').addClass('open');
	$('.accordionitem:first-child').find('.toggle').removeClass('icon-togglearrow-down').addClass('icon-togglearrow-up');
	
	
	$('.accordionitem h3').live('click', function() {
		if ( $(this).parent().hasClass('closed') ) {
			$(this).parent().find('.accordioncontent').show();
			$(this).parent().removeClass('closed').addClass('open');
			$(this).parent().find('.toggle').removeClass('icon-togglearrow-down').addClass('icon-togglearrow-up');
		} else {
			$(this).parent().find('.accordioncontent').hide();
			$(this).parent().removeClass('open').addClass('closed');
			$(this).parent().find('.toggle').removeClass('icon-togglearrow-up').addClass('icon-togglearrow-down');
		}
	});

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


$(document).bind('gform_post_render', function(){

	$('#input_1_1_3').attr('placeholder','First Name*');
	$('#input_1_1_6').attr('placeholder','Last Name*');
	$('#input_1_2').attr('placeholder','Email*');
	$('#input_1_3').attr('placeholder','Your Message*');

	// $('#input_1_1_3').val('First Name*');
	// 
	// $( "#input_1_1_3").focus(function() {
	// 	if ( $(this).val() == 'First Name*' ) {
	// 		$(this).val('');
	// 	}
	// });
	// 
	// $( "#input_1_1_3").blur(function() {
	// 	if ( $(this).val() == '' ) {
	// 		$(this).val('First Name*');
	// 	}
	// });
	// 
	// $('#input_1_1_6').val('Last Name*');
	// 
	// $( "#input_1_1_6").focus(function() {
	// 	if ( $(this).val() == 'Last Name*' ) {
	// 		$(this).val('');
	// 	}
	// });
	// 
	// $( "#input_1_1_6").blur(function() {
	// 	if ( $(this).val() == '' ) {
	// 		$(this).val('Last Name*');
	// 	}
	// });
	// 
	// $('#input_1_2').val('Email*');
	// 
	// $( "#input_1_2").focus(function() {
	// 	if ( $(this).val() == 'Email*' ) {
	// 		$(this).val('');
	// 	}
	// });
	// 
	// $( "#input_1_2").blur(function() {
	// 	if ( $(this).val() == '' ) {
	// 		$(this).val('Email*');
	// 	}
	// });
	// 
	// $('#input_1_3').val('Your Message*');
	// 
	// $( "#input_1_3").focus(function() {
	// 	if ( $(this).val() == 'Your Message*' ) {
	// 		$(this).val('');
	// 	}
	// });
	// 
	// $( "#input_1_3").blur(function() {
	// 	if ( $(this).val() == '' ) {
	// 		$(this).val('Your Message*');
	// 	}
	// });

	$('.gform_footer').append('<p class="required">*Required</p>');

});


})(jQuery);
