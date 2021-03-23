<?php
	$deadline = get_field('countdown', 'sh_options');
	$link_url = get_field('democracy-day-overview', 'sh_options');
?>

<div class="filter-item not-filtered" data-item-layout="">
	<a href="<?php echo $link_url; ?>">
		<article class="democracy-day-countdown article" role="article">	
			<div class="countdown-content">
				<span class="countdown-number"><?php echo dd_get_countdown_days($deadline); ?></span>
				<span class="countdown-text"><?php pll_e('Tage bis zum Democracy Day'); ?></span>
			</div>
		</article>
	</a>
</div>