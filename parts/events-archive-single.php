<?php	
	
	if( $event->start_day === $event->end_day ) {
		$day = $event->start_day;
	} else {
		$day = $event->start_day . ' - ' . $event->end_day;
	}

	if( !empty($event->external_link) ) {
		$event_link = $event->external_link['url'];
		$event_target = $event->external_link['target'];
	} else {
		$event_link = get_permalink($event->ID);
		$event_target = '';
	}
?>

	<li class="events-event filter-item filter-item<?php echo cd_get_isotope_classes($event); echo ' ' . $event->month_slug . $counter_class; ?>" data-before="<?php echo $month; ?>">
	
		<span class="event-day"><?php echo $day; ?></span>

		<span><?php echo $event->time; ?></span>

		<div class="event-info">
			
			<h4 class="event-name">
				<a href="<?php echo $event_link ?>" target="<?php echo $event_target; ?>"><?php echo $event->post_title; ?></a>
			</h4>
			
			<?php if( $event->location && $event->location !== '' ) { ?>
				<p class="event-location"><?php echo $event->location; ?></p>
			<?php } ?>
			
			<?php if( $event->organizer && $event->organizer !== '' ) { ?>
				<span class="event-organizer"><?php echo pll__('Veranstalter') . ': ' . $event->organizer; ?></span></br>
			<?php } ?>
			
			<?php if( $event->costs && $event->costs !== '' ) { ?>
				<span class="event-costs"><?php echo pll__('Kosten') . ': ' . $event->costs; ?></span></br>
			<?php } ?>
			
			<?php if( $event->registration_link ) { ?>
				<a class="event-registration-link" href="<?php echo $event->registration_link['url']; ?>" target="<?php echo $event->registration_link['target']; ?>">
					<?php echo $event->registration_link['title']; ?>
				</a>
			<?php } ?>
			
			<?php if( $event->registration_form ) { ?>
				<a class="event-registration-link" href="<?php echo $event_link . '/#anmeldung'; ?>" target="">
					<?php echo $event->registration_button_text; ?>
				</a>
			<?php } ?>
		</div>
		<span class="event-city"><?php echo join(', ', cd_get_tax_name($event->ID, 'city')); ?></span>
	</li>
