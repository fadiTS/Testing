
(function($) {
	$(document).ready(function() {
		setTimeout(function() {
			equalizer();
		}, 100);
		setTimeout(function() {
			equalizer();
		}, 250);
	});

	$( window ).resize(function() {
		if( $(window).width() > 800 ){
			equalizer();
		}else{
			$('.fa-equalize').height('auto');
		}
	});
	function equalizer(){
		$('.fa-equalize').height('auto');
		var elementHeights = $('.fa-equalize').map(function() {
			return $(this).height();
		}).get();
		var maxHeight = Math.max.apply(null, elementHeights);
		$('.fa-equalize').height(maxHeight);
	}
})( jQuery );