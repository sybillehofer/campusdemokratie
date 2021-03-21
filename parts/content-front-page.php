<div class="row">
	<div class="column small-12">
		<div class="posts-grid isotope-filter-container" data-isotope-layoutMode="fitRows">
			<?php
				if( $cd_news_query->have_posts() ):
					while( $cd_news_query->have_posts() ): $cd_news_query->the_post();
						$index = $cd_news_query->current_post + 1;

						if( $index === 2 && get_field('show_countdown', 'sh_options') ) {
							get_template_part( 'parts/card', 'countdown' ); 
						}

						get_template_part( 'parts/card', 'post' );       
						
					endwhile;
				endif;
				wp_reset_postdata();
			?>
		</div>

		<a href="<?php echo get_permalink( get_option( 'page_for_posts' )); ?>" class="btn-primary"><?php pll_e( 'Alle Beiträge' ); ?></a>	
	</div>
</div>