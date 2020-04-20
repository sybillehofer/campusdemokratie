<section class="row section-content-wrapper">

	<div class="columns small-12">
		<?php include( locate_template( 'parts/posts-header.php' ) ); ?>
	</div>

	<div class="small-12 columns">
		<article class="post-article">
			<?php the_content(); ?>
		</article>

		<?php
			$terms = get_the_terms( $post->ID, 'category' );
			if($terms) {
				echo '<a href="' . get_term_link($terms[0]) . '" class="btn-primary">' . pll__( 'Alle ' ) . $terms[0]->name . '</a>';
			}
		?>
	</div>

</section>