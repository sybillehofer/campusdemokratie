<?php
    $items = $args['items'];
    if( count($items) > 4 ) { ?>
        <div class="orbit" role="region" aria-label="" data-orbit data-auto-play="false" data-infinite-wrap="true">
            <div class="orbit-wrapper">
                <div class="orbit-controls">
                    <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>	&lt;</button>
                    <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&gt;</button>
                </div>
                <ul class="orbit-container">
                    <li class="orbit-slide">
                    <?php }
                        $index = 1;
                        $length = count($items);
                        foreach( $items as $item ) : ?>
                            <span data-tooltip class="top filter-tooltip" title="<?php echo $item->name; ?>">
                                <label title="<?php echo $item->name; ?>">
                                    <input class="hiddenCheckbox" type="checkbox" value="<?php echo $item->slug; ?>" data-filter-checkbox data-filter-group="<?php echo $args['slug']; ?>"/>
                                    <div class="termIcon">
                                        <img src="<?php echo dd_get_icon_url($item, ''); ?>" alt="<?php echo $item->name; ?>">
                                    </div>
                                </label>
                            </span>
                        <?php if( count($items) > 4 && $index % 4 == 0 && $index <= $length - 1) { ?>
                            </li><li class="orbit-slide">
                    <?php } 
                        $index++; endforeach;
                        if( count($items) > 4 ) { ?>
                    </li>
                </ul>
            </div>
        </div>
<?php } ?>