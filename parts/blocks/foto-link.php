<?php

/**
 * Block: Foto-Link
 * 
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'foto-link-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'foto-link';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$link = get_field('link');
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <a class="link" href="<?= $link['url']; ?>" target="<?= $link['target']; ?>"><span class="dashicons dashicons-camera-alt"></span><?= $link['title'] ? $link['title'] : 'Hier geht’s zu den Fotos des Events.'; ?></a>
</div>