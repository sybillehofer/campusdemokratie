<?php get_header(); ?>
			
	<div id="content">
	
		<div id="inner-content" class="row">
	
		    <main id="main" class="large-12 columns" role="main">

				<section class="row proposal-archive-row">

					<section class="medium-3 columns proposal-filter-container">
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

									<div class="proposal-card static-proposal-card filter-item not-filtered" data-item-layout="" data-age-from="0" data-age-to="99" data-duration-from="0" data-duration-to="730" data-group-from="1" data-group-to="100">
										<?php $formPage = pll_get_post(get_field('form_proposal', 'sh_options')); ?>
										<a href="<?php echo get_permalink($formPage); ?>" title="<?php pll_e('Vorschlag einsenden!'); ?>">
										<article class="proposal" role="article">
											<div class="proposal-image-container">
												<div class="proposal-icon show-for-small-only">
													<img src="<?php echo dd_get_democracy_day_icons('vorschlag')['url']; ?>" height="50px" width="50px" />
												</div>
											</div>
											<div class="proposal-image-text hide-for-small-only"><?php pll_e('Vorschlag einsenden!'); ?></div>
											<h2 class="article-title show-for-small-only"><?php pll_e('Vorschlag einsenden!'); ?></h2>
										</article>
										</a>	
									</div>

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
					<?php get_template_part( 'parts/help-batch' ); ?>
				</section>
								
		    </main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>