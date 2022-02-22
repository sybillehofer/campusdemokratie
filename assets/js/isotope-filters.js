(function ($) {
		
	$(document).ready(function() {
		
		var filters = {}, //list of filters and their values
		changedByJquery = false;
		
		//check if url contains parameter with given name
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
						
						//for checkboxes
						var $thisFilter = $('.hiddenCheckbox[value="' + value + '"]');
						$.setCheckboxActive($thisFilter);

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

		//set given checkbox element to active
		$.setCheckboxActive = function($this) {
			$this.prop("checked", true);
		}
		
		//update filters according to given select, button or checkbox
		$.updateFilters = function($this) {
			var filterGroup = $this.attr('data-filter-group'),
				value = '',
				attr = $this.attr('data-filter-value');
			
			if (typeof attr !== typeof undefined && attr !== false) {
				value = $this.attr('data-filter-value'); //for buttons
			} else if ( (typeof $this.attr('data-filter-checkbox') !== typeof undefined && $this.attr('data-filter-checkbox') !== false) ||
			(typeof $this.attr('data-filter-radio') !== typeof undefined && $this.attr('data-filter-radio') !== false)) {
				var $checkboxes = $('[data-filter-group="'+filterGroup+'"]'),
					values = [];
				$checkboxes.each( function(i,el) {
					if ( el.checked ) {
						values.push( el.value );
					}
				});
				value = values.join([separator = '.']); //for checkboxes or radiobuttons
			} else if (typeof $this.attr('data-slider') !== typeof undefined && $this.attr('data-slider') !== false) {
				var $inputs = $this.find('input'),
					value = [$inputs.first().val(), $inputs.last().val()]; //for range sliders
			} else {
				value = $this.val(); //for selects
			}
			filters[ filterGroup ] = value;
		}
		
		//combine all filters to one string
		$.concatValues = function( obj ) {
			var value = '';
			for ( var prop in obj ) {
				if( obj[prop] != '' && prop != 'age' && prop != 'duration' && prop != 'group') {
					value += '.'+obj[ prop ];
				}
			}
			return value;
		}
		
		//filter the list by attributes (for proposals)
		$.filterListbyAttributes = function( item, filterValue ) {
			var dataSets = ['age-from', 'age-to', 'duration-from', 'duration-to', 'group-from', 'group-to'],
				data = [],
				$item = $(item),
				show = true;

			dataSets.forEach(function(set, index){
				data[set] = $item.data(set);
			});
			
			$.each(filters, function(index, values){
				if( $item.hasClass('static-proposal-card') ) {
					show = true;
				} else if( $.isArray(values) ) { //if age, duration or group
	
					if( index === 'duration' ) {
						var maxDauer = values[0];
						if( maxDauer >= data[index+'-from'] ) {

						} else {
							show = false;
						}
					} else if( data[index+'-from'] <= values[0] && values[0] <= data[index+'-to'] ) {
					// (data[index+'-from'] <= values[1] && values[1] <= data[index+'-to']) || 
					// (data[index+'-from'] >= values[0] && values[1] >= data[index+'-to']) 
					} else {
						show = false;
					}

				} else if( values === '' ) { //if class-filter is empty or item has class
	
				} else {
					$.each(values.split("."), function(index, value) {
						if( !$item.hasClass( value ) ) {
							show = false;
						}
					});
				}
			});

			return show;
		};

		//filter the list and arrange items
		$.filterList = function(filterValue, $input) {

			if($('.proposal-grid').length) { //if on proposal filter page
				$grid.isotope({ filter: function() { return $.filterListbyAttributes( this, filterValue ); }}); //filter the list by classes and attributes (proposals only)
			} else {
				$grid.isotope({ filter: filterValue }); //filter the list by classes
			}
			
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
			$('[data-filter-checkbox]').prop("checked", false);
			$('[data-filter-radio]').prop("checked", false);
			changedByJquery = true;
			$('[data-slider]').find('input').val('0').trigger('change');
			filters = {};
			$.filterList();
			$.addFilterstoURL('');
			$('[data-reset-filter]').hide();
			setTimeout(function(){ 
				changedByJquery = false;
			}, 1100);
		}

		$.handleInputChange = function($input) {
			$('[data-no-results]').hide();

			$.updateFilters($input);

			var filterValue = $.concatValues( filters );

			$.filterList(filterValue, $input);
			$.addFilterstoURL(filterValue);
			
			$('[data-reset-filter]').show();
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
		} else {
			setTimeout(function () {
				$('[data-reset-filter]').hide();  
			}, 500);
		}

		//if a select element changes
		$('.selects-container').on('change', '.filters-select', function(){
			$.setSelectActive($(this));
			$.handleInputChange($(this));	
		});
		
		//if a button is clicked
		$('.filter-button').on('click', function(){
			$.setButtonActive($(this));
			$.handleInputChange($(this));		
		});

		//if a checkbox is clicked
		$('[data-filter-checkbox]').on('change', function(){
			$.handleInputChange($(this));	
		});	

		//if a radiobutton is clicked
		$('[data-filter-radio]').on('change', function(){
			$.handleInputChange($(this));	
		});	

		//if a slider is changed
		setTimeout(function(){ 
			$('[data-slider]').on('changed.zf.slider', function(){
				if( changedByJquery === false ) {
					$.handleInputChange($(this));
				}
			});
		}, 1000);
		
		//as soon as filtering is done
		$grid.on( 'arrangeComplete', function( event, filteredItems ) {

		    if ( $grid.data('isotope').filteredItems.length == 0) {
			    $('[data-no-results]').fadeIn(); 
			} else {
				$('[data-no-results]').hide();
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

		//show and hide filters on proposal archive page (mobile)
		$('[data-toggle-filters]').on( 'click', function() {
			$('.filter-group-container[data-mobile-hidden]').toggle();
			$('[data-filter-icon]').toggle();
		});
		 

	});
	

	
}(jQuery));