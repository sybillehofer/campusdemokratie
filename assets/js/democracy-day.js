(function ($) {

	$("[data-slider]").on( 'moved.zf.slider', function() {
        var sliderType = $(this).data('filter-group')
        var $inputs = $(this).find('input');

        $inputs.each(function(index,input) {
            var $display = $(input).siblings('[data-slider-display]');
            var val = $(input).val();

            switch (sliderType) { 
                case 'age': 
                    val = val;
                    break;
                case 'duration': 
                    if( val < 24 ) {
                        val = val;
                    } else if( val < 168 ) {
                        val = Math.round(val/24) + ' Tage';
                    } else if( val < 730 ) {
                        val = Math.round(val/168) + ' Wochen';
                    } else if( val = 730 ) {
                        val = Math.round(val/730) + ' Monat';
                    }
                    break;
                case 'group-size': 
                    if( val == 100 ) {
                        val = '100+';
                    }
                    break;	
                default:
                    val = val;
            }
            
            $display.html(val);
        });

     });
	
}(jQuery));