<?php get_header(); ?>
			
<div id="content">

	<div id="inner-content" class="row">

		<main id="main" class="columns" role="main">
		
		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		    
				<?php
					if( $post->post_type === 'event' && get_field('is_campus', $post->ID) === false ) {
						wp_redirect(get_post_type_archive_link($post->post_type));
					} else if( is_singular( 'project' ) ) {
						$args = [
						    'post_type' => 'page',
						    'nopaging' => true,
						    'meta_key' => '_wp_page_template',
						    'meta_value' => 'template-project-list.php'
						];
						$pages = get_posts( $args );
						wp_redirect(get_page_link($pages[0]));
					}
				?>
				
		    	<?php get_template_part( 'parts/content-single', $post->post_type ); ?>
		    	
		    <?php endwhile; else : ?>
		
		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

		</main> <!-- end #main -->

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>