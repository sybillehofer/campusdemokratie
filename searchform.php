<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Suche nach:', 'label', 'jointswp' ) ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Suche...', 'jointswp' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Suche nach:', 'jointswp' ) ?>" />
	</label>
	<input type="submit" class="search-submit button" value="<?php echo esc_attr_x( 'Suchen', 'jointswp' ) ?>" />
</form>