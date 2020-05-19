<?php get_header(); ?>
			
	<div id="content">
	
		<div id="inner-content" class="row">
	
		    <main id="main" class="large-12 columns" role="main">

				<section class="row posts-row">
					<div class="small-12 columns posts-header-wrapper" data-filter-trigger>
						<?php include( locate_template( 'parts/posts-header.php' ) ); ?>
						<?php get_template_part( 'parts/posts', 'filter' ); ?>
					</div>

					<?php 
						if (have_posts()) : ?>

						<div class="medium-12 columns">
							<div class="row">
								<div class="posts-grid isotope-filter-container" data-isotope-layoutMode="fitRows">
									<?php
										while (have_posts()) : the_post();
										
											$post_type = $post->post_type;	
											get_template_part( 'parts/card', $post_type );

										endwhile;
									?>
								</div>
							</div>
						</div>
						
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