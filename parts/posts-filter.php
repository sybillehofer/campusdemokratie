<?php
    if( is_page_template('template-posts-overview.php') ) {
        $terms = get_field('categories_to_show');
        $categories = get_terms( 'category', array(
            'hide_empty' => true,
            'include' => $terms
        ) );
    } else {
        $categories = cd_get_taxonomy_terms('category');
    }

    if( count($categories) <= 1 )
        return;
?>

<div id="filter-wrapper" class="posts-filters">
            
        <?php if( !is_page_template('template-posts-overview.php') ) { ?>
                <button class="filter-button selected" data-filter-group="category" data-filter-value=""><?php pll_e( 'Alle Kategorien' ); ?></button>
        <?php } ?>
        <?php foreach( $categories as $category ) : ?>
            <button class="filter-button" data-filter-group="category" data-filter-value="<?php echo $category->slug; ?>"><?php echo $category->name; ?></button>
        <?php endforeach; ?>
        
</div>