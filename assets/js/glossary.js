(function ($) {
	
	$( document ).ready(function() {
		var hash = window.location.hash;
		var item = hash + ' .accordion-title';

	    if ( hash != '') {
	        $target = $( item );
	        if (!$target.parents('li').hasClass('is-active')) {
	            $target.trigger('click');
	        }
	    }
	    
	});
	
}(jQuery));