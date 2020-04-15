(function ($) {
	
	var ajaxurl = CDAjax.ajaxurl;
	
	$('[data-glossary]').click(function() {
	
		var letter = $(this).data('glossary');
		var $content = jQuery('#glossary-content');
		
		$.ajax({
	        type : 'post',
	        url : ajaxurl,
	        data : {
	            action : 'get_glossary_items',
	            letter : letter
	        },
	        beforeSend: function() {
	            $content.addClass('loading');
	        },
	        success : function( output ) {
	            $content.removeClass('loading');
	            $content.html( output );
	            $('.accordion').foundation();
	        }
    	});
    	
    });
    
    $(document).on( 'submit', '#searchform', function() {
	    var $form = jQuery(this);
	    var $input = $form.find('input[name="s"]');
	    var query = $input.val();
	    var $content = jQuery('#glossary-content');
	    
	    $.ajax({
	        type : 'post',
	        url : ajaxurl,
	        data : {
	            action : 'get_glossary_items',
	            query : query
	        },
	        beforeSend: function() {
	            $input.prop('disabled', true);
	            $content.addClass('loading');
	        },
	        success : function( output ) {
	            $input.prop('disabled', false);
	            $content.removeClass('loading');
	            $content.html( output );
	            $('.accordion').foundation();
	        }
    	});
    
		return false;
	});

	
}(jQuery));