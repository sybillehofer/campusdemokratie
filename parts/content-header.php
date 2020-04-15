<div class="top-bar">
	<div class="top-bar-left">
		<?php 
			$cur_lang = pll_current_language();
			$src = get_field( $cur_lang . '_main_logo', 'sh_options' );

			if( isset($src) ) { 
			
			echo '<a class="main_logo" href="' . home_url() . '">' . wp_get_attachment_image( $src, 'medium' ) . '</a>';

		} else { ?>
			<a class="main_logo" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
		<?php } ?>
		<div class="title-bar" data-responsive-toggle="meta-menu" data-hide-for="medium">
			<button class="menu-icon" type="button" data-toggle="meta-menu"></button>
		</div>
	</div>
	
	

	<div class="top-bar-right" id="meta-menu">
		<?php cd_meta_nav(); ?>
	</div>
</div>


<div class="bottom-bar" id="main-menu">
	<?php cd_main_nav(); ?>
</div>