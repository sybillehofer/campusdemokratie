<?php 
    $icon = dd_get_democracy_day_icons('kontakt');
    $form = get_field( 'form_help', 'sh_options' );
?>

<div class="helpBatch">
    <div class="helpIcon termIcon" data-open="helpModal">
        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['title']; ?>">
    </div>
    <p data-open="helpModal"><?php pll_e( 'Brauchen Sie Hilfe?' ); ?></p>
    
    <div class="reveal" id="helpModal" data-reveal>
        <?php echo gravity_form( $form["title"], false, true, false, null, true ); ?>
        <button class="close-button" data-close aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>