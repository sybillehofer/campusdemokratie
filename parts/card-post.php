<div class="grid-item">
	<a href="<?php the_permalink(); ?>">
	<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?> role="article" style="background-image: url(<?php echo the_post_thumbnail_url('full-width'); ?>);">
					
		<header class="article-header">	
			<h2 class="article-title"><?php the_title(); ?></h2>
			<?php
				$terms = get_the_terms( $post->ID, 'category' ); 
				$icon = get_field('icon', 'category_' . $terms[0]->term_id);
			?>
			<div class="article-icon" style="background-image: url(<?php echo $icon['sizes']['medium']; ?>);">	
			</div>
		</header>

	</article>
	</a>	
</div>