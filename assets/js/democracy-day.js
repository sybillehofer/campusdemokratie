(function ($) {

	$("[data-slider]").on( 'moved.zf.slider', function() {
        var sliderType = $(this).data('filter-group')
        var $inputs = $(this).find('input');

        $inputs.each(function(index,input) {
            var $display = $(input).siblings('[data-slider-display]');
            var val = $(input).val(),
                $sliderHandle = $(input).parent();

            switch (sliderType) { 
                case 'age': 
                    val = val;
                    break;
                case 'duration': 
                    var tooltipText = '';
                    if( val < 24 ) {
                        val = val;
                        tooltipText = 'Stunden';
                    } else if( val < 168 ) {
                        val = Math.round(val/24);
                        tooltipText = 'Tage';
                    } else if( val < 730 ) {
                        val = Math.round(val/168);
                        tooltipText = 'Wochen';
                    } else if( val = 730 ) {
                        val = Math.round(val/730);
                        tooltipText = 'Monat';
                    }
                    $sliderHandle.attr('title', tooltipText);
                    var tooltipId = $sliderHandle.attr("data-toggle"); 
                    $("#"+tooltipId).html(tooltipText);
                    break;
                case 'group': 
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