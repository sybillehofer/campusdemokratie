<div id="proposal-filter-wrapper">
	<div class="selects-container filters">
    
        <div class="filter-group-container" data-mobile-hidden>
            <h3><?php pll_e( 'Alter' ); ?></h3>
            <div class="slider" data-slider data-start="0" data-initial-start="0" data-initial-end="99" data-end="99" data-filter-range data-filter-group="age">
                <div class="slider-handle" data-slider-handle role="slider" tabindex="1"><input type="number" disabled></div>
                <span class="slider-fill" data-slider-fill></span>
                <div class="slider-handle" data-slider-handle role="slider" tabindex="1"><input type="number" disabled></div>
            </div>
        </div>

        <div class="filter-group-container" data-mobile-hidden>
            <h3><?php pll_e( 'Dauer (h)' ); ?></h3>
            <div class="slider" data-slider data-start="0" data-initial-start="0" data-initial-end="730" data-end="730" data-filter-range data-filter-group="duration">
                <div class="slider-handle" data-slider-handle role="slider" tabindex="1"><input type="number" disabled></div>
                <span class="slider-fill" data-slider-fill></span>
                <div class="slider-handle" data-slider-handle role="slider" tabindex="1"><input type="number" disabled></div>
            </div>
        </div>

        <div class="filter-group-container" data-mobile-hidden>
            <h3><?php pll_e( 'Art' ); ?></h3>
            <div class="filter-group">
                <?php foreach( cd_get_taxonomy_terms('proposal-type') as $art ) : ?>
                    <label title="<?php echo $art->name; ?>">
                        <input class="hiddenCheckbox" type="checkbox" value="<?php echo $art->slug; ?>" data-filter-checkbox data-filter-group="proposal-type"/>
                        <div class="termIcon"><img src="<?php echo dd_get_icon_url($art, ''); ?>" alt="<?php echo $art->name; ?>"></div>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="filter-group-container">
            <h3><?php pll_e( 'Ich suche für...' ); ?></h3>
            <div class="filter-group">
                <?php foreach( cd_get_taxonomy_terms('target-group') as $art ) : ?>
                    <label title="<?php echo $art->name; ?>">
                        <input class="hiddenCheckbox" type="checkbox" value="<?php echo $art->slug; ?>" data-filter-checkbox data-filter-group="target-group"/>
                        <span class="label-title"><?php echo $art->name; ?></span>
                        <div class="termIcon"><img src="<?php echo dd_get_icon_url($art, ''); ?>" alt="<?php echo $art->name; ?>"></div>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="filter-group-container" data-mobile-hidden>
            <h3><?php pll_e( 'Gruppengrösse' ); ?></h3>
            <div class="slider" data-slider data-start="1" data-initial-start="1" data-initial-end="100" data-end="100" data-filter-range data-filter-group="group-size">
                <div class="slider-handle" data-slider-handle role="slider" tabindex="1"><input type="number" disabled></div>
                <span class="slider-fill" data-slider-fill></span>
                <div class="slider-handle" data-slider-handle role="slider" tabindex="1"><input type="number" disabled></div>
            </div>
        </div>

        <div class="filter-group-container" data-mobile-hidden>
            <h3><?php pll_e( 'Ort' ); ?></h3>
            <div class="filter-group">
            <?php foreach( cd_get_taxonomy_terms('location') as $art ) : ?>
                    <label title="<?php echo $art->name; ?>">
                        <input class="hiddenCheckbox" type="checkbox" value="<?php echo $art->slug; ?>" data-filter-checkbox data-filter-group="location"/>
                        <div class="termIcon"><img src="<?php echo dd_get_icon_url($art, ''); ?>" alt="<?php echo $art->name; ?>"></div>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="filter-group-container" data-mobile-hidden>
            <div class="filter-group no-flex">
                <label>
                    <input type="radio" name="cost" value="kostenlos" data-filter-group="cost"/> <?php pll_e( 'kostenlos' ); ?>
                </label>
                <label>
                    <input type="radio" name="cost" value=".kostenpflichtig" data-filter-group="cost" /> <?php pll_e( 'kostenpflichtig' ); ?>
                </label>
            </div>
            <div class="filter-group no-flex">
                <label>
                    <input type="radio" name="onoffline" value=".online" data-filter-group="onoffline" /> <?php pll_e( 'online' ); ?>
                </label>
                <label>
                    <input type="radio" name="onoffline" value=".offline" data-filter-group="onoffline" /> <?php pll_e( 'offline' ); ?>
                </label>
            </div>
            <div class="filter-group no-flex">
                <label>
                    <input type="radio" name="timeslot" value=":not(.transition)" data-filter-group="timeslot" /> <?php pll_e( 'ganzes Jahr' ); ?>
                </label>
                <label>
                    <input type="radio" name="timeslot" value="numberGreaterThan50" data-filter-group="timeslot" /> <?php pll_e( 'nur am 15. September' ); ?>
                </label>
            </div>
        </div>

        <div class="filter-group-container" data-mobile-hidden>
            <h3><?php pll_e( 'Stichwort' ); ?></h3>
            <form role="search" action="<?php echo site_url('/mitmachen'); ?>" method="get" id="searchform" class="proposal-form">
                <input type="text" name="s" placeholder="<?php pll_e( 'Nach Stichwort suchen' ); ?>" class="search-input" />
                <input type="submit" alt="Search" class="button submit-button" value="<?php pll_e( 'Suchen' ); ?>" />
                <input type="hidden" name="post_type" value="sh_proposal" />
            </form>
        </div>


        <button class="toggle-filters-button show-for-small-only" data-toggle-filters title="<?php pll_e( 'weitere Filter' ); ?>">
            <?php pll_e( 'weitere Filter' ); ?>
            <span data-filter-icon>&#x2228;</span>
            <span data-filter-icon style="display:none;">&#x2227;</span>
        </button>
    </div>
</div>