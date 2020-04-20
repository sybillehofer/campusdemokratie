<?php

$slideshow = cd_get_slideshow( $shortcode_post );

if ( $slideshow->have_posts() ) {
	while ( $slideshow->have_posts() ) {
		$slideshow->the_post();
			
			if( $title ) {
				echo '<h2>' . get_the_title() . '</h2>';
			}
			?>
			
			<div class="orbit" role="region" aria-label="Favorite Text Ever" data-orbit>
				<ul class="orbit-container">
					<button class="orbit-previous" aria-label="previous"><span class="show-for-sr">Previous Slide</span>&#9664;</button>
					<button class="orbit-next" aria-label="next"><span class="show-for-sr">Next Slide</span>&#9654;</button>
					
					<?php
					if( have_rows('slides') ):
					    while ( have_rows('slides') ) : the_row(); ?>
					    
							<li class="is-active orbit-slide">
								<div class="cd-orbit-slide">
								<h4><?php the_sub_field('title'); ?></h4>
								<?php the_sub_field('text'); ?>
								</div>
							</li>
					
					    <?php
					    endwhile;
					endif;	
					?>
			
				</ul>
				<nav class="orbit-bullets">
					<?php
					if( have_rows('slides') ):
						$i = 0;
					    while ( have_rows('slides') ) : the_row(); ?>
					    	<button class="<?php if($i === 0) { echo 'is-active'; } ?>" data-slide="<?php echo $i; ?>"></button>										<?php
						    $i++;
					    endwhile;
					endif;	
					?>
				</nav>
			</div>

<?php 		
			
		}
	}
	
wp_reset_postdata();
?>

