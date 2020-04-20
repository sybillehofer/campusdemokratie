<?php
	if( has_nav_menu('icon-nav' )  ) { ?>
		<section class="iconnav-section medium-12 columns">
		<h1 class="iconnav-title text-center"><?php pll_e( 'Wir verbinden' ); ?></h1>
		<?php echo cd_icon_nav(); ?>
		</section>
<?php }