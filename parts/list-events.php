<?php
	$cd_events = cd_get_events( $number = 3, $term = false, $is_campus = false, $city_id = false, $eventtype_id = false, $is_front_page = true );
	
	if( !empty($cd_events) ) {
		foreach( $cd_events as $month_nr => $month ) { 
		
			if( !isset($month['events']) )
				continue;
				
			foreach( $month['events'] as $event ) {
			
				$event_title = cd_get_event_title_and_class($event)['title'];
				
				if( $event['start_date'] === $event['end_date'] ) {
					$day = $event['start_date'];
				} else {
					$day = $event['start_date'] . ' - ' . $event['end_date'];
				}
		?>
		
				<article id="post-<?php $event->ID; ?>" class="post_box" role="article">
										
					<header class="article-header">	
						<h3 class="entry-title single-title"><?php echo $event_title; ?></h3>
						<p class="post_metadata">
							<?php echo $event['start_date']; ?>
						</p>	
				    </header>
									
				    <section class="entry-content">
						<?php if( $event['is_campus'] ) { 
								echo wp_trim_words($event['description'], 35); 
							} else {
								echo $event['description']; 
							}
							?>
					</section>
										
					<?php 
						if( $event['is_campus'] ) {
					?>
					<footer class="article-footer">
						<a href="<?php echo $event['link']; ?>" class="btn"><?php pll_e( 'Mehr erfahren' ); ?></a>	
					</footer>
					<?php } ?>
																	
				</article>

<?php		
			}	
		}
	}
?>
