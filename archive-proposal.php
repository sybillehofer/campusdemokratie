<?php get_header(); ?>
			
	<div id="content">
	
		<div id="inner-content" class="row">
	
		    <main id="main" class="large-12 columns" role="main">

				<section class="row">

					<br>
					<br>
					<br>
					<section class="medium-3 columns">
						<h2>
							<?php pll_e( 'Filter' ); ?>
							<button class="reset-filter" data-reset-filter title="<?php pll_e( 'Filter zurücksetzen' ); ?>">
								<?php include("assets/images/reset.svg"); ?>
							</button>
						</h2>
						<?php get_template_part( 'parts/proposal', 'filter' ); ?>
					</section>

					<?php 
						if (have_posts()) : ?>
						<section class="medium-9 columns">
							<div class="row">
								<div class="proposal-grid isotope-filter-container" data-isotope-layoutMode="fitRows">
									<?php
										while (have_posts()) : the_post();
										
											$post_type = $post->post_type;			
											get_template_part( 'parts/card', $post_type );
											
										endwhile;
									?>
									<p class="no-results" data-no-results><?php pll_e( 'Zur Zeit haben wir keine Vorschläge, welche die gewählten Kriterien erfüllen.' ); ?></p>
								</div>
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