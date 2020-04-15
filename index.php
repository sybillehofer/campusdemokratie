<?php get_header(); ?>
			
	<div id="content">
	
		<div id="inner-content" class="row">
	
		    <main id="main" class="large-12 columns" role="main">
		    	
			    <?php 
				    if (have_posts()) : 
					    while (have_posts()) : the_post();
					    
							$post_type = $post->post_type;			
							get_template_part( 'parts/content', $post_type );
						    
						endwhile;
					else :
				
						get_template_part( 'parts/content', 'missing' );

					endif; 
				?>
																								
		    </main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>