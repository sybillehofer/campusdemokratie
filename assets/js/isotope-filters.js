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
		$.setFilters = function(filterValue) {
			if(filterValue) {
				values = filterValue.split('.');
				$.each( values, function( index, value ){
				    if( value != '' ) {
						//for selects
						var $thisOption = $('.filters-select option[value="' + value + '"]'),
				    	$thisFilter = $thisOption.parents('select');
						$thisFilter.val(value);
						$.setSelectActive($thisFilter);

						//for buttons
						var $thisFilter = $('.filter-button[data-filter-value="' + value + '"]');
						$.setButtonActive($thisFilter);
						
						$.updateFilters($thisFilter);
					}
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

		//set given button element to active
		$.setButtonActive = function($this) {
			$this.siblings('button').removeClass('selected');
			$this.addClass('selected');
		}
		
		//update filters according to given select or button
		$.updateFilters = function($this) {
			var filterGroup = $this.attr('data-filter-group'),
				value = '',
				attr = $this.attr('data-filter-value');
			
			if (typeof attr !== typeof undefined && attr !== false) {
				value = $this.attr('data-filter-value'); //for buttons
			} else {
				value = $this.val(); //for selects
			}
			filters[ filterGroup ] = value;
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
		
		//filter the list and arrange items
		$.filterList = function(filterValue) {
			$grid.isotope({ filter: filterValue }); //filter the list
			$.asignLayoutId(); //needed for 'posts' only
		}	

		$.asignLayoutId = function() {
			var visibleElements = $grid.isotope('getFilteredItemElements'); //get elements that are visible
			$(visibleElements).attr('data-item-layout', '0'); //set data-item-layout to 0
			if( visibleElements.length == $grid.isotope('getItemElements').length) { //if all categories are visible
				$(visibleElements).addClass('not-filtered');
			} else { //if a single category is visible
				$(visibleElements).removeClass('not-filtered');

				//for each post asign layout-id (there are six different layouts --> widths, see posts.css)
				$(visibleElements).each(function(i,e){
					if( i > 6 ) { //beginning with element number seven
						i = i%6; //match to a number between 0 and 5 in order to get the following assignment correct
					}
					if((i+1)%6 == 0) {
						$(e).attr('data-item-layout', "6");
					} else if((i+1)%5 == 0) {
						$(e).attr('data-item-layout', "5");
					} else if((i+1)%4 == 0) {
						$(e).attr('data-item-layout', "4");
					} else if((i+1)%3 == 0) {
						$(e).attr('data-item-layout', "3");
					} else if((i+1)%2 == 0) {
						$(e).attr('data-item-layout', "2");
					} else if((i+1)%1 == 0) {
						$(e).attr('data-item-layout', "1");
					}				
				});
			}
			$grid.isotope( 'layout' ); //rearrange elements after layout assignment
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
		var $grid = $('.isotope-filter-container').isotope({
			itemSelector: '.filter-item',
			layoutMode: $('.isotope-filter-container').attr('data-isotope-layoutMode'),
			hiddenStyle: {
				opacity: 0
			},
			visibleStyle: {
				opacity: 1
			}
		});
		
		//if the url contains a parameter called "filter"
		if( $.urlParam('filter') ) {
			$.setFilters($.urlParam('filter'));
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
		
		//if a button is clicked
		$('.filter-button').on('click', function(){
			$('.no-results').hide();
					
			var $thisButton = $(this);
			
			$.setButtonActive($thisButton);
			$.updateFilters($thisButton);

			var filterValue = $.concatValues( filters );
			
			$.filterList(filterValue);
			
			$.addFilterstoURL(filterValue);	
			
			$('[data-reset-filter]').show();		
		});	
		
		//as soon as filtering is done
		$grid.on( 'arrangeComplete', function( event, filteredItems ) {

		    if ( $grid.data('isotope').filteredItems.length == 0) {
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
		
		//show and hide filters on blog archive pages
		$('[data-filter-trigger]').on( 'mouseenter', function() {
			$('.posts-filters').addClass('visible');
		});
		$('[data-filter-trigger]').on( 'mouseleave', function() {
			$('.posts-filters').removeClass('visible');
		});

	});
	

	
}(jQuery));