<?php
    $subtitle = get_field('subtitle');
    $title = get_the_title();

    if ( is_home() ) {
        $title = single_post_title('', false);
        $subtitle = get_field('subtitle', get_option( 'page_for_posts' ));
        $image_url = get_the_post_thumbnail_url(get_option( 'page_for_posts' ), 'full-width');
    } else if ( is_archive() ) {
        $title = get_the_archive_title();
        $subtitle = wp_strip_all_tags(term_description());
    } else if( $post->post_type === 'post' ) {
        $image_url = get_field('post_icon')["sizes"]["full-width"];
    } else {
        $image_url = get_the_post_thumbnail_url($post, 'full-width');
    }
?>

<?php
    if( get_field('title_link') ) {
        $link = get_field('title_link');
    echo '<a href="' . $link["url"] . '" target="' . $link["target"] . '" title="' . $link["title"] . '">';
} ?>

<header class="posts-header row" style="background-image: url(<?php echo $image_url; ?>);">						
    <h1 class="posts-title"><?php echo $title; ?></h1>
    <?php if( $subtitle ) { ?>
        <h2 class="posts-subtitle"><?php echo $subtitle; ?></h2>
    <?php } ?>
</header>

<?php
    if( $link ) {
        echo '</a>';
    }
?>