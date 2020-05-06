<?php

/**
 * Block: Logo-Link-Liste
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'logo-link-list-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'logo-link-list';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$fields = get_fields();
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <h3><?= $fields['title']; ?></h3>

    <ul class="list">
    <?php foreach($fields['links'] as $link) { ?>
    
        <li class="list-item">
            <div class="image-container">
                <?= wp_get_attachment_image( $link['logo']['id'], 'full' ); ?>
            </div>
            <span class="text"><?= $link['text']; ?></span> ><a class="link" href="<?= $link['link']['url']; ?>" target="<?= $link['link']['target']; ?>"><?= $link['link']['title']; ?></a>
        </li>
    
    <?php } ?>
    </ul>
</div>