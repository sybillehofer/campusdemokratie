<h1 class="news-section-title text-center"><?php pll_e( 'News' ); ?></h1>

<div class="row">
	<section class="post-section medium-7 columns">
	<?php
		if( $cd_news_query->have_posts() ):
		    while( $cd_news_query->have_posts() ): $cd_news_query->the_post();
		       
		       get_template_part( 'parts/list-single', 'news' );       
		       
		    endwhile;
		endif;
		wp_reset_postdata();
	?>
		<a href="<?php echo get_permalink( get_option( 'page_for_posts' )); ?>" class="btn-primary"><?php pll_e( 'Alle News' ); ?></a>	
	</section>
	
	<section class="post-section medium-5 columns">
		<?php
			if( $cd_events ) {
			
				get_template_part( 'parts/list', 'events' ); ?>
		
				<a href="<?php echo get_post_type_archive_link( 'event' ); ?>" class="btn-primary"><?php pll_e( 'Alle Events' ); ?></a>	
				<?php $button_url = get_field( 'past_events_page', 'sh_options' );
					if( isset($button_url) && $button_url !== '') :
				?>
				<a href="<?php echo $button_url; ?>" class="btn-primary"><?php pll_e( 'vergangene Events' ); ?></a>	
				<?php endif; ?>
		<?php } ?>
	</section>
</div>