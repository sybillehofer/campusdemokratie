<section class="row section-content-wrapper">

	<div class="small-12 columns posts-header-wrapper">
		<?php include( locate_template( 'parts/posts-header.php' ) ); ?>
	</div>

	<div class="small-12 columns">
		<article class="post-article">
			<?php the_content(); ?>
		</article>

		<?php
			$primary = get_primary_taxonomy_term(get_the_id(), 'category');
			$buttontext = get_field('buttontext', 'category_' . $primary['term_id']);
			if(!$buttontext) { $buttontext = pll__('Alle Beiträge'); }
			if($primary) {
				echo '<a href="' . $primary['url'] . '" class="btn-primary">' . $buttontext . '</a>';
			}
		?>
	</div>

</section>