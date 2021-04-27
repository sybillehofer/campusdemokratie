<?php 

	$thumbnail = get_the_post_thumbnail_url($post, 'medium');
	$logo = get_field('logo', $post);
	$author = get_field('author', $post);
	$firstname = get_field('name', $post);
	$lastname = get_field('surname', $post);
	$organization = get_field('organization_required', $post);
	$activityType = get_field('activity-type', $post);
	if( $activityType === 'Aktivität buchen' ) { //1 --> selbst umsetzen, 2 --> buchen
		$activityType = 2;
	} else {
		$activityType = 1;
	}
	
	//get icons to display in iconGroups
	$icons = dd_get_democracy_day_icons();

	//get data to fill icon groups
	$groupSize = get_field('group-size', $post);
	$surroundings = get_field('surroundings', $post);
	$targetGroupsArray = get_the_terms($post, 'target-group');
	$targetGroups = '';
	if ( !empty($targetGroupsArray) ) {
		$targetGroups = join(', ', array_map(function($targetGroup) {
			return $targetGroup->name;
		}, $targetGroupsArray));
	}
	$advertisement = get_field('advertisement', $post);
	$contactAdress = get_field('email', $post);
	$guidelineFiles = get_field('guideline', $post);
	$booking = get_field('booking-link', $post);
	$priceType = get_field('price-type', $post);
	$price = get_field('price', $post);
	$documents = get_field('documents', $post);
	$materialFiles = get_field('files', $post);
	$filesArray = [];
	$files = '';
	if( $materialFiles ) {
		foreach($materialFiles as $file) { 
			$filesArray[] = '<a class="proposal-link" href="' . $file["url"] . '" download>' . $file["filename"] . '</a>';
		}
		$files = join('<br>', $filesArray);
	}

	$documentLink = get_field('document-link', $post);
	$documentLinkString =  $documentLink ? '<a class="proposal-link" href="' . $documentLink . '" target="_blank">' . pll__( 'Zu den Dokumenten' ) . '</a>' : '';
	$documentInfo = get_field('document-info', $post);
	$documentInfoString =  !empty($documentInfo) ? $documentInfo . '<br>' : '';
	$duration = get_field('duration', $post);
	$democracyDayOnly = get_field('democracy-day-only', $post);
	$age = get_field('age', $post);
	$proposalType = get_the_terms($post, 'proposal-type');
	$proposalTypeString = $proposalType ? $proposalType[0]->name : '';

	$targetgroupModal = '<a data-open="targetgroupModal">' . pll__('anzeigen') . '</a>' . '
						<div class="reveal" id="targetgroupModal" data-reveal>' . $targetGroups . 
						'<button class="close-button" data-close aria-label="Fenser schliessen" type="button">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>';

	$guideline = [];
	if( $guidelineFiles ) {
		foreach($guidelineFiles as $file) {
			$guideline[] = '<a class="proposal-link" href="' . $file["url"] . '" download>' . pll__( 'Anleitung zur Umsetzung' ) . '</a>';
		}
		$guideline = join('<br>', $guideline);
	}
	
	//prepare icon groups and decide if they should be shown for this proposal
	$iconGroups = [ ['slug' => 'gruppengroesse', 'title' => pll__( 'Gruppengrösse' ) . ':', 'show' => true, 'content' => $groupSize['from'] . '-' . $groupSize['to']],
					['slug' => 'zielgruppe', 'title' => pll__( 'Zielgruppe(n)' ) . ':', 'show' => true, 'content' => strlen($targetGroups) <= 45 ? $targetGroups : $targetgroupModal],
					['slug' => 'kontakt', 'title' => '<a class="proposal-link" href="mailto:' . $contactAdress . '">' . pll__( 'Kontakt' ) . '</a>', 'show' => $advertisement == 1 && $author != 3, 'content' => ''],
					['slug' => 'durchfuehrungsort', 'title' => pll__( 'Durchführungsort(e)' ) . ':', 'show' => true, 'content' => !empty($surroundings) ? $surroundings : pll__('keine Angabe')],
					['slug' => 'kosten', 'title' => $priceType == 1 ? pll__( 'Keine Kosten' ) : 'CHF ' . $price, 'show' => $activityType == 2, 'content' => ''],
					['slug' => 'buchen', 'title' => '<a class="proposal-link" href="' . $booking . '" target="_blank">' . pll__( 'Angebot buchen' ) . '</a>', 'show' => $activityType == 2 && !empty($booking), 'content' => ''],
					['slug' => 'material', 'title' => $documents != 0 ? pll__( 'Material' ) . ':' : pll__( 'Ohne Material' ), 'show' => $activityType == 1, 'content' => $documentInfoString . $files . $documentLinkString],
					['slug' => 'download', 'title' => $guideline, 'show' => $activityType == 1 && !empty($guideline), 'content' => ''],
				];

	//prepare bubbles
	$bubbles 	= [ ['slug' => 'dauer', 'title' => pll__( 'Zeitraum' ), 'content' => !empty($duration['from']) ? $duration['from'] . ' - ' . $duration['to'] . ' ' . pll__( 'Stunden' )  : pll__( 'keine Angabe' )],
					['slug' => 'alter', 'title' => pll__( 'Alter' ), 'content' => !empty($age['from']) ? $age['from'] . ' - ' . $age['to'] . ' ' . pll__( 'jährig' ) : pll__( 'keine Angabe' )],
					['slug' => !empty($proposalType[0]->slug) ? $proposalType[0]->slug : 'vorschlag', 'title' => pll__( 'Art' ), 'content' => !empty($proposalTypeString) ? $proposalTypeString : pll__( 'keine Angabe' )],
					['slug' => 'datum', 'title' => pll__( 'Umsetzung' ), 'content' => $democracyDayOnly ? pll__( 'am Tag der Demokratie' ) : pll__( 'immer' )]
				];

?>

<header class="proposal-header">

	<div class="proposal-thumbnail" style='background-image:url(<?php echo $thumbnail; ?>);'></div>

	<div class="proposal-bubbles hide-for-small-only">
		<?php					
			foreach( $bubbles as $bubble ) {
		?>
			<div class="proposal-bubble">
				<p class="p-no-margin"><span class="bubble-title"><?php echo $bubble['title']; ?></span><br><?php echo $bubble['content']; ?></p>
			</div>
		<?php } ?>
	</div>

	<h1 class="proposal-title">
		<?php the_title(); ?>
	</h1>

	<div class="proposal-headericongroups show-for-small-only">
		<?php					
			foreach( $bubbles as $bubble ) {
		?>
			<div class="proposal-headericongroup" data-<?php echo $bubble['slug']; ?>>
				<div class="proposal-icon">
					<img src="<?php echo $icons[$bubble['slug']]['url']; ?>" height="50px" width="50px" />
				</div>
				<p class="p-no-margin"><?php echo $bubble['content']; ?></p>
			</div>
		<?php } ?>
	</div>
</header>

<section class="row proposal-content-wrapper">

	<div class="small-12 columns">
		<article class="proposal-content">
			<?php the_content(); ?>

			<div class="proposal-details">
				<?php					
					foreach( $iconGroups as $group ) {
						if( $group['show'] ) {
				?>
				<div class="proposal-icongroup" data-<?php echo $group['slug']; ?>>
					<div class="proposal-icon">
						<img src="<?php echo $icons[$group['slug']]['url']; ?>" height="50px" width="50px" />
					</div>
					<p class="p-no-margin" ><?php echo $group['title']; ?><br><?php echo $group['content']; ?></p>
				</div>
				<?php } } ?>

			</div>
		</article>
		

		<div class="proposal-footer">
			<?php if( $logo || $organization || $firstname || $lastname ) { ?>
				<div class="proposal-author">
					<p><?php pll_e( 'Ein Vorschlag von' ); ?>:</p>
					<?php if( $author == 2 ) { 
						if( $logo ) { ?>
							<img class="proposal-logo" src="<?php echo $logo["url"]; ?>" alt="<?php echo $logo['alt'] ? $logo['alt'] : $logo['title'];?>"/>
						<?php } else { ?>
							<p><?php echo $organization; ?>
						<?php } ?>
					<?php } else if( $firstname || $lastname ) { ?>
						<p><?php echo $firstname . ' ' . $lastname; ?></p>
					<?php } ?>
				</div>	
			<?php } ?>
			
			<a href="<?php echo get_post_type_archive_link( get_post_type() ); ?>" class="btn-primary proposal-button"><?php pll_e( 'Alle Vorschläge' ); ?></a>	
			<?php $formPage = pll_get_post(get_field('form_activity', 'sh_options')); ?>
			<a href="<?php echo $formPage ? get_permalink($formPage) : get_permalink(pll_get_post(get_field('form_activity', 'sh_options'), 'de')); ?>" class="btn-primary proposal-button"><?php pll_e( 'Ich mache mit!' ); ?></a>	
		</div>
		<?php //if ($number = cd_count_proposal_in_activities(get_the_ID())) { <span>Der Vorschlag wurde <?php echo $number;   Mal umgesetzt.</span> } ?>


	</div>

	<?php get_template_part( 'parts/help-batch' ); ?>
</section>