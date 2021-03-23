

<?php if( have_rows('democracy_day_content') ): ?>

<h2><?php echo get_field('democracy_day_title'); ?></h2>

<?php
    while ( have_rows('democracy_day_content') ) : the_row();
		
		$text = get_sub_field( 'text' );
		$image = get_sub_field( 'image' );
		$link = get_sub_field( 'link' );
		$icon = get_sub_field( 'icon' );
		$i = get_row_index();
		?>
		
		<div class="row content-row">
			<a href="<?php echo $link['url']; ?>" class="content-link"></a>
			<div class="column show-for-small-only">
				<div class="icon-box">
					<?php echo wp_get_attachment_image( $icon['ID'], 'thumbnail', true ); ?>
				</div>
			</div>
			<div class="column box-wrapper">
				<?php if($i%2==0): ?>
					<div class="image-box image-box-left show-for-medium">
						<?php echo wp_get_attachment_image( $image['ID'], Array(640, 480) ); ?>
					</div>
				<?php endif; ?>
				<div class="text-box background-gray">
					<?php echo $text; ?>
				</div>
				<?php if($i%2!=0): ?>
					<div class="image-box image-box-right show-for-medium">
						<?php echo wp_get_attachment_image( $image['ID'], Array(640, 480) ); ?>
					</div>
				<?php endif; ?>
			</div>
			
		</div>

<?php
    endwhile;

else :

    // no rows found

endif;

?>