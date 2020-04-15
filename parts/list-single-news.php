<article id="post-<?php the_ID(); ?>" <?php post_class('post_box'); ?> role="article">
						
	<header class="article-header">	
		<h3 class="entry-title single-title"><?php the_title(); ?></h3>
		<?php get_template_part( 'parts/post', 'metadata' ); ?>
    </header>
					
    <section class="entry-content">
		<?php the_content(); ?>
	</section>
					
	<?php if( get_field('has_readmore') ) { ?>	
		<footer class="article-footer">
			<a href="<?php the_permalink(); ?>" class="btn"><?php pll_e( 'Mehr erfahren' ); ?></a>	
		</footer>
	<?php } ?>		
</article>
