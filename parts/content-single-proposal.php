<section class="row section-content-wrapper">

	<div class="small-12 columns posts-header-wrapper">
		<?php include( locate_template( 'parts/posts-header.php' ) ); ?>
	</div>

	<div class="small-12 columns">
		<article class="post-article">
			<?php the_content(); ?>
		</article>
		
		<a href="<?php echo get_post_type_archive_link( get_post_type() ); ?>" class="btn-primary"><?php pll_e( 'Alle Vorschläge' ); ?></a>	
			
		<?php if ($number = cd_count_proposal_in_activities(get_the_ID())) { ?>
		<span>Der Vorschlag wurde <?php echo $number; ?> Mal umgesetzt.</span>
		<?php } ?>

	</div>

</section>