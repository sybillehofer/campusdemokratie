<div class="proposal-card filter-item<?php echo cd_get_isotope_classes($post); ?> not-filtered" data-item-layout="">
	<a href="<?php the_permalink(); ?>">
	<article id="post-<?php the_ID(); ?>" <?php post_class('proposal'); ?> role="article">
		<div class="proposal-image-container">
			<?php echo get_the_post_thumbnail( $post, 'thumbnail', array( 'class' => 'alignleft proposal-image' ) ); ?>
		</div>
		<h2 class="article-title"><?php the_title(); ?></h2>
	</article>
	</a>	
</div>