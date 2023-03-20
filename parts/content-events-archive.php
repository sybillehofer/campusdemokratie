<ul class="months no-bullet isotope-filter-container" data-isotope-layoutMode="vertical">
	
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

<p class="no-results" data-no-results><?php echo pll_e( 'Zur Zeit sind keine Events aufgeschaltet, welche die gewählten Kriterien erfüllen.' ); ?></p>

<?php 
	$button = get_field( 'link_events_list', 'sh_options' );
	if( isset($button['url']) && $button['url'] !== '') :
?>
<a href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" class="btn-primary"><?php echo $button['title']; ?></a>	
<?php endif; ?>