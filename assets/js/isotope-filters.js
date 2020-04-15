(function ($) {
		
	$(document).ready(function() {
		
		var filters = {}; //list of filters and their values
		
		$.urlParam = function(name) {
		    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
		    if (results==null) {
		       return null;
		    }
		    return decodeURI(results[1]) || 0;
		}
		
		//set selects according to filterValue
		$.setSelects = function(filterValue) {
			if(filterValue) {
				values = filterValue.split('.');
				
				$.each( values, function( index, value ){
				    var $thisOption = $('.filters-select option[value="' + value + '"]'),
				    	$thisSelect = $thisOption.parents('select');
				    
				    $thisSelect.val(value);
				    $.setSelectActive($thisSelect);
				    $.updateFilters($thisSelect);
				});
			}
		}
		
		//set given select element to active
		$.setSelectActive = function($this) {
			if( $this.val() == '' ) {
				$this.removeClass('selected');
			} else {
				$this.addClass('selected');
			}
		}
		
		//update filters according to given select
		$.updateFilters = function($this) {
			var filterGroup = $this.attr('data-filter-group');
			filters[ filterGroup ] = $this.val();
		}
		
		//combine all filters to one string
		$.concatValues = function( obj ) {
			var value = '';
			for ( var prop in obj ) {
				if( obj[prop] != '' ) {
					value += '.'+obj[ prop ];
				}
			}
			return value;
		}
		
		//filter the list
		$.filterList = function(filterValue) {
			$events_grid.isotope({ filter: filterValue });
		}
		
		//add filterValue as parameter to url
		$.addFilterstoURL = function(filterValue) {
			var param = '';
			if( filterValue == '' ) { //if no filters set
				param = window.location.pathname;
			} else {
				param = '?filter=' + filterValue;
			}
			window.history.replaceState(null, null, param);
		}
		
		//reset all filters 
		$.resetFilters = function() {
			$('.filters-select').prop('selectedIndex',0).removeClass('selected');
			filters = {};
			$.filterList();
			$.addFilterstoURL('');
			$('[data-reset-filter]').hide();
		}
		
		//initialize isotope grid
		var $events_grid = $('.isotope-filter-container').isotope({
			itemSelector: '.filter-item',
			layoutMode: 'vertical',
			hiddenStyle: {
				opacity: 0
			},
			visibleStyle: {
				opacity: 1
			}
		});
		
		//if the url contains a parameter called "filter"
		if( $.urlParam('filter') ) {
			$.setSelects($.urlParam('filter'));
			$.filterList($.urlParam('filter'));
			$('[data-reset-filter]').show();
		}		
		
		//if a select element changes
		$('.selects-container').on('change', '.filters-select', function(){
			$('.no-results').hide(); 
											
			var $thisSelect = $(this);
			
			$.setSelectActive($thisSelect);
			$.updateFilters($thisSelect);

			var filterValue = $.concatValues( filters );
			
			$.filterList(filterValue);
			
			$.addFilterstoURL(filterValue);	
			
			$('[data-reset-filter]').show();		
		});		
		
		//as soon as filtering is done
		$events_grid.on( 'arrangeComplete', function( event, filteredItems ) {

		    if ( $events_grid.data('isotope').filteredItems.length == 0) {
			    $('.no-results').fadeIn(); 
			} else {
				$('.no-results').hide();
				$('.events-event').removeClass('is-first');
				
				var months = [];
				$('.events-event:visible').each(function(){
					var before = $(this).attr('data-before');
					
					if( $.inArray( before , months ) == -1 ) {
						months.push($(this).attr('data-before'));
						$(this).addClass('is-first');
					}
				});
			}
		});
		
		$('[data-reset-filter]').on( 'click', function() {
			$.resetFilters();
		});
		
	});
	

	
}(jQuery));