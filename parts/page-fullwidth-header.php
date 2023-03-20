<?php $show_title = get_field('show_title');
	if ( !isset($show_title) || $show_title === true ) { ?>
	<header class="page-header row">
		<div class="columns small-12 medium-9">
			<h1 class="page-title"><?php the_title(); ?></h1>
			<?php $subtitle = get_field('subtitle');
				$fontweight = get_field('fontweight');
			if( $subtitle ) { ?>
				<h2 class="posts-subtitle<?php echo $fontweight ? ' text-bold' : ''; ?>"><?php echo $subtitle; ?></h2>
			<?php } ?>
		</div>
		<div class="columns small-12 medium-3">
			<?php $thumbnail_img = get_the_post_thumbnail_url($post, 'full-width');
			if ($thumbnail_img ) { ?>
			<img src="<?php echo $thumbnail_img ?>"/>
			<?php } ?>
		</div>
	</header>
<?php } ?>