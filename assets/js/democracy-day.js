(function ($) {

    //toggle offline resp. online checkbox if the other one is clicked
    $('[data-filter-checkbox]').on('change', function(){
        if( $(this).data('toggle-checkbox') ) {
            var target = $(this).data('toggle-checkbox');
            $('[value="' + target + '"]').prop('checked', false);
        }
    });

	$("[data-slider]").on( 'moved.zf.slider', function() {
        var sliderType = $(this).data('filter-group')
        var $inputs = $(this).find('input');

        $inputs.each(function(index,input) {
            var $display = $(input).siblings('[data-slider-display]');
            var val = $(input).val(),
                $sliderHandle = $(input).parent();

            switch (sliderType) { 
                case 'age':
                    if (input.getAttribute('id') === 'ageInputTo') {
                        val = val + '-';
                        break;
                    }
                    val = val + '+';
                    break;
                case 'duration': 
                    var tooltipText = '';
                    if( val < 24 ) {
                        val = val;
                        tooltipText = $sliderHandle.data('hours');
                    } else if( val < 168 ) {
                        val = Math.round(val/24);
                        tooltipText = $sliderHandle.data('days');
                    } else if( val < 730 ) {
                        val = Math.round(val/168);
                        tooltipText = $sliderHandle.data('week');
                    }
                    //  else if( val = 730 ) {
                    //     val = Math.round(val/730);
                    //     tooltipText = $sliderHandle.data('month');
                    // }
                    $sliderHandle.attr('title', tooltipText);
                    var tooltipId = $sliderHandle.attr("data-toggle"); 
                    $("#"+tooltipId).html(tooltipText);
                    val = '< ' + val;
                    break;
                case 'group': 
                    val = val + '+';
                    break;	
                default:
                    val = val;
            }

            
            
            $display.html(val);
        });

     });
	
}(jQuery));