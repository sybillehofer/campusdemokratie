<ul class="months no-bullet isotope-filter-container">
	
	<?php 
	foreach ( cd_get_events_new() as $month => $events ) :

		$counter = 1;
		foreach ( $events as $event ) :
		
			$counter_class = '';
			if ( $counter === 1 ) {
				$counter_class = ' is-first';
			}
			
			if ( $counter === count($events) ) {
				$counter_class .= ' is-last';
			}
			
			if ( locate_template( 'parts/events-archive-single.php' ) !== '' ) {
				include(locate_template( 'parts/events-archive-single.php' ));
			}
			
			$counter++;
	
		endforeach;

	endforeach; ?>
	
</ul>

<p class="no-results"><?php echo pll_e( 'Zur Zeit sind keine Events aufgeschaltet, welche die gewählten Kriterien erfüllen.' ); ?></p>