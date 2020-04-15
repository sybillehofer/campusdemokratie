<?php 
	
// this is the news archive

get_header(); 

?>
			
	<div id="content">
	
		<div id="inner-content" class="row">
	
		    <main id="main" class="medium-12 columns" role="main">
			    
			    <header class="row events-header">
				    <h2 class="small-12 columns"><?php pll_e( 'News' ); ?></h2>
			    </header>

				<div class="row">
					<section class="small-12 medium-10 columns" id="events-content">
					    <?php 
						if (have_posts()) :
							
							while (have_posts()) : the_post();
								if ( locate_template( 'parts/content-news-archive.php' ) !== '' ) {
									include(locate_template( 'parts/content-news-archive.php' ));
								}													
							endwhile;
							
						endif;
						?>
				    </section>
				</div>
																							
		    </main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>