jQuery(document).ready(function($) {
	$('.hero-slider').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1
	});

	$('.butonul').on('click', function() { 
		$('#menu-meniu-principal').toggleClass('menu-visible');
	});
});