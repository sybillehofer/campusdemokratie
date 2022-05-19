<?php
    $subtitle = get_field('subtitle');
    $title = get_the_title();
    $link = get_field('title_link');

    if ( is_home() ) {
        $title = single_post_title('', false);
        $subtitle = get_field('subtitle', get_option( 'page_for_posts' ));
        $image_url = get_the_post_thumbnail_url(get_option( 'page_for_posts' ), 'full-width');
    } else if ( is_archive() ) {
        $title = get_the_archive_title();
        $subtitle = get_field('subtitle', get_queried_object());
        $link = get_field('title_link', get_queried_object());
        $image_url = get_field('post_icon', 'category_' . get_queried_object()->term_id)["sizes"]["full-width"];
    } else if( $post->post_type === 'post' ) {
        $image_url = isset(get_field('post_icon')["sizes"]["full-width"]) ? get_field('post_icon')["sizes"]["full-width"] : '';
    } else {
        $image_url = get_the_post_thumbnail_url($post, 'full-width');
    }
?>

<?php
    if( $link ) {
    echo '<a href="' . $link["url"] . '" target="' . $link["target"] . '" title="' . $link["title"] . '">';
} ?>

<header class="posts-header row">		
    <div class="posts-header-text columns small-12 medium-9">	
        <h1 class="posts-title"><?php echo $title; ?></h1>
        <?php $fontweight = get_field('fontweight', get_queried_object());
        if( $subtitle ) { ?>
            <h2 class="posts-subtitle<?php echo $fontweight ? ' text-bold' : ''; ?>"><?php echo $subtitle; ?></h2>
        <?php } ?>
    </div>
    <div class="columns small-12 medium-3">
        <img class="posts-header-icon" src="<?php echo $image_url; ?>"/>
    </div>
</header>

<?php
    if( $link ) {
        echo '</a>';
    }
?>