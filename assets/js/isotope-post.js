(function ($) {
		
	$(document).ready(function() {
        var $grid = $('.posts-grid').isotope({
            itemSelector: '.grid-item',
            layoutMode: 'fitRows'
        });
    });
    
}(jQuery));