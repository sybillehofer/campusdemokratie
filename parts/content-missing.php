<div id="post-not-found" class="hentry">
	
	<?php if ( is_search() ) : ?>
		
		<header class="article-header">
			<h1><?php pll_e( 'Leider wurden keine Resultate gefunden.' );?></h1>
		</header>
		
		<section class="entry-content">
			<p><?php pll_e( 'Bitte suchen Sie nach einem neuen Stichwort.' );?></p>
		</section>
		
	<?php else: ?>
		
		<section class="entry-content">
			<p><?php pll_e( 'Diese Seite befindet sich im Aufbau.' ); ?></p>
		</section>
			
	<?php endif; ?>
	
</div>
