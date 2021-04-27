<div class="proposal-card filter-item<?php echo cd_get_isotope_classes($post); ?> not-filtered" data-item-layout="" <?php echo cd_get_isotope_data_attr($post); ?>>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	<article id="post-<?php the_ID(); ?>" <?php post_class('proposal'); ?> role="article">
		<div class="proposal-image-container">
			<div class="proposal-image-container-inner">
				<?php echo get_the_post_thumbnail( $post, 'thumbnail', array( 'class' => 'alignleft proposal-image' ) ); ?>
			</div>
		</div>
		<h2 class="article-title"><?php the_title(); ?></h2>
	</article>
	</a>	
</div>