<?php
/*
Template Name: Archivseite Beiträge
*/
?>

<?php get_header(); ?>
			
	<div id="content">
	
		<div id="inner-content" class="row">
	
			<main id="main" class="large-12 columns" role="main">

				<section class="row">
					<div class="small-12 columns">
						<?php include( locate_template( 'parts/posts-header.php' ) ); ?>
						<?php the_content(); ?>
					</div>

					<?php
						$categories = get_field('categories_to_show');
						$posts_by_cat = cd_get_posts_by_categories($categories);
						
						if( $posts_by_cat->have_posts() ) : ?>
						<section class="medium-12 columns">
							<div class="row">
								<div class="posts-grid">
									<?php
									if( $posts_by_cat->have_posts() ):
										while( $posts_by_cat->have_posts() ): $posts_by_cat->the_post();
										
										get_template_part( 'parts/card', 'post' );       
										
										endwhile;
									endif;
									wp_reset_postdata();
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