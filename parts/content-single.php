<header class="page-header">
	<h1 class="page-title">
		<?php the_title();
			if( $post->post_type === 'post' ) {
		?>
			<a href="<?php echo get_permalink( get_option( 'page_for_posts' )); ?>" class="text-link"><?php pll_e( 'Alle News anzeigen' ); ?></a>
		<?php } ?>
	</h1>
</header>
	
<section class="row section-content-wrapper">
    
    <article class="large-8 medium-8 columns page-content">
	    <?php the_content(); ?>
    </article>
    
    <?php
		if( get_field('main_sidebar_enabled') ) {
			$title = get_field('main_sidebar_title');
			$text = get_field('main_sidebar_text');
			$links = get_field('main_sidebar_links');
	?>
	<aside class="large-3 medium-4 columns content-aside">
		
		<section>
			<h3><?php echo $title; ?></h3>
			<p><?php echo $text; ?></p>
			<?php foreach( $links as $link ) { ?>
				<a href="<?php echo $link['link']['url']; ?>" target="<?php echo $link['link']['target']; ?>"><?php echo $link['link']['title']; ?></a><br/>
			<?php } ?>
		</section>
	
	</aside>
	<?php } ?>
	
</section>


<?php
$blocks = get_field('content_blocks');

if( have_rows('content_blocks') && $blocks[0]['fliesstext'] !== '' ) {

    while ( have_rows('content_blocks') ) : the_row(); ?>

		<section class="row section-content-wrapper">

		    <article class="large-8 medium-8 columns page-content">
			    <?php the_sub_field('fliesstext'); ?>
		    </article>
		    
		    <?php 
				$sidebar = get_sub_field('sidebar');
				if( $sidebar['enabled'] ) {
					$title = $sidebar['title'];
					$text = $sidebar['text'];
			?>
			<aside class="large-3 medium-4 columns content-aside">
				
					<section>
						<h3><?php echo $title; ?></h3>
						<p><?php echo $text; ?></p>
						<?php
							foreach( $sidebar['links'] as $link ) { ?>
							
							    <a href="<?php echo $link['link']['url']; ?>" target="<?php echo $link['link']['target']; ?>"><?php echo $link['link']['title']; ?></a><br/>
							
							<?php } ?>
					</section>
					
			</aside>
			<?php } ?>
			
		</section>

    <?php
	endwhile;

}


if( $post->post_type === 'event' ) {
	
	if ( get_field( 'has_registration', $post->ID ) ) {
		
		$form_object = get_field( 'registration_form', $post->ID );

		if( $form_object ) {
			echo '<section class="row"><div id="anmeldung" class="small-12 large-6 columns registrationform">' . do_shortcode('[gravityform id="' . $form_object['id'] . '" title="true" description="false" ajax="false"]')  . '</div></section>';
		}
	}
	
	if ( get_field( 'has_gallery', $post->ID ) ) {
		
		$gallery = get_field( 'gallery', $post->ID );
		
		echo '<div class="small-12 columns">';
		
		echo '<h2 class="gallery-title">' . get_field( 'title', $post->ID ) . '</h2>';
		
		foreach( $gallery as $image ) { ?>
			<a class="image-link thumbnail" href="#" data-toggle="image_<?php echo $image['id']; ?>">
			  <img src="<?php echo $image['sizes']['thumbnail']; ?>" />
			</a>
			
			<div class="large reveal" id="image_<?php echo $image['id']; ?>" data-reveal>
			  <img class="reveal-image" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['title']; ?>">
			  <button class="close-button" data-close aria-label="<?php pll_e( 'Schliessen' ); ?>" type="button">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		
		<?php 
		}
		
		echo '</div>';
		
	}

}