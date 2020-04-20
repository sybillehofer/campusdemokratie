<?php
    /*
    Template Name: volle Breite (ohne Sidebar)
    */
?>

<?php get_header(); ?>
			
	<div id="content">
	
		<div id="inner-content" class="row">
	
		    <main id="main" class="large-12 columns" role="main">
		    	
			    <?php 
				    if (have_posts()) : 
					    while (have_posts()) : the_post();
					    
							get_template_part( 'parts/content-page', 'fullwidth' );
						    
						endwhile;
					else :
				
						get_template_part( 'parts/content', 'missing' );

					endif; 
				?>
																								
		    </main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>