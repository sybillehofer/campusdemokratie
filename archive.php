<?php get_header(); ?>
			
	<div id="content">
	
		<div id="inner-content" class="row">
	
		    <main id="main" class="large-12 columns" role="main">

				<section class="row">
					<div class="small-12 columns posts-header-wrapper">
						<?php include( locate_template( 'parts/posts-header.php' ) ); ?>
					</div>

					<?php 
						if (have_posts()) : ?>
						<section class="medium-12 columns">
							<div class="row">
								<div class="posts-grid isotope-filter-container" data-isotope-layoutMode="fitRows">
									<?php
										while (have_posts()) : the_post();
										
											$post_type = $post->post_type;			
											get_template_part( 'parts/card', $post_type );
											
										endwhile;
									?>
								</div>
								<a href="<?php echo get_permalink( get_option( 'page_for_posts' )); ?>" class="btn-primary"><?php pll_e( 'Alle Beiträge' ); ?></a>	
							</div>
						</section>
						
						<?php
						else :
					
							get_template_part( 'parts/content', 'missing' );

						endif; 
					?>
				</section>
																								
		    </main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>