<?php 

get_header();
	
?>
			
	<div id="content">
	
		<div id="inner-content" class="row">
	
		    <main id="main" class="medium-12 columns" role="main">
			    
			    <header class="page-header row">
				    <h1 class="medium-12 columns"><?php pll_e( 'Das ABC der politischen Bildung und Partizipation' ); ?></h1>
				    
				    <?php if ( !is_search() ) { ?>
					<p class="filter-label medium-2 columns"><?php pll_e( 'Filtern nach' ); ?>:</span>
				    
				    <ul class="medium-10 columns no-bullet filter-ul">
					    <li class="glossary-letter" data-glossary="all"><?php pll_e( 'Alle' ); ?></li>
					    <?php
							$glossary_items = cd_get_glossary_items();
							$titles = array();
							foreach( $glossary_items->posts as $item ) {
								$titles[] = $item->post_title;
							}
							
							$letters = array();
							for($i=0; $i < count($titles); $i++){
								$letters[] = mb_substr($titles[$i], 0, 1);
							}
							$letters = array_unique($letters);

						    foreach( $letters as $letter ) {
								echo '<li class="glossary-letter" data-glossary="' . $letter . '">' . $letter . '</li>';   
							}
							 
							wp_reset_postdata();
						?>
				    </ul>
				    <?php } ?>
			    </header>
			    
			    <div class="row">
				    <section class="medium-6 columns glossary-form-wrapper">
						<form role="search" action="<?php echo site_url('/abc'); ?>" method="get" id="searchform" class="glossary-form">
					        <input type="text" name="s" placeholder="<?php pll_e( 'Nach Stichwort suchen' ); ?>" class="search-input" />
					        <input type="submit" alt="Search" class="button submit-button" value="<?php pll_e( 'Suchen' ); ?>" />
					        <input type="hidden" name="post_type" value="sh_glossary" />
					     </form>
				    </section>
			    </div>
			    
			    <?php if (have_posts()) : ?>
			    <div class="row">
					<section class="medium-12 columns">
						<div id="glossary-content" class="glossary-content">
							<?php	
							$glossary_items = cd_get_glossary_items();
							if( !empty($glossary_items) ) {
								if ( locate_template( 'parts/content-glossary-archive.php' ) !== '' ) {
									include(locate_template( 'parts/content-glossary-archive.php' ));
								}
							}
							?>
						</div>
				    </section>		
				</div>  
				<?php else : ?>
													
					<?php get_template_part( 'parts/content', 'missing' ); ?>
				
			    <?php endif; ?>				
																								
		    </main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>