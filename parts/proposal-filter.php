<div id="proposal-filter-wrapper">
	<div class="selects-container filters">
    
        <!-- <div class="filter-group-container" data-mobile-hidden>
            <h3><?php pll_e( 'Alter' ); ?></h3>
            <div class="slider" data-slider data-start="0" data-initial-start="0" data-end="99" data-filter-group="age">
                <div class="slider-handle" data-slider-handle role="slider" tabindex="1" aria-controls="ageInput">
                    <input type="hidden" disabled id="ageInput">
                    <div data-slider-display>0</div>
                </div>
                <div class="slider-handle" data-slider-handle role="slider" tabindex="1" aria-controls="ageInput">
                <input type="hidden" disabled id="ageInputTo">
                    <div data-slider-display>99</div>
                </div>
                
                <span class="slider-fill" data-slider-fill></span>
            </div>
        </div> -->

        <!-- <div class="filter-group-container" data-mobile-hidden>
            <h3><?php pll_e( 'Dauer' ); ?></h3>
            <div class="slider" data-slider data-start="1" data-initial-start="1" data-end="168" data-filter-group="duration">
                <div class="slider-handle" data-slider-handle role="slider" tabindex="1" data-tooltip title="<?php pll_e('Stunden'); ?>" data-hours="<?php pll_e('Stunden'); ?>" data-days="<?php pll_e('Tage'); ?>" data-week="<?php pll_e('Woche'); ?>" data-click-open="false">
                    <input type="hidden" disabled>
                    <div data-slider-display>1</div>
                </div>
                <span class="slider-fill" data-slider-fill></span>
            </div>
        </div> -->

        <div class="filter-group-container" data-mobile-hidden>
            <h3><?php pll_e( 'Art' ); ?></h3>
            <div class="filter-group">
                <?php
                    $content = ['items' => cd_get_taxonomy_terms('proposal-type'), 'slug' => 'proposal-type'];
                    get_template_part( 'parts/proposal-filter', 'orbit', ['items' => cd_get_taxonomy_terms('proposal-type'), 'slug' => 'proposal-type'] );
                ?>              
            </div>
        </div>

        <div class="filter-group-container">
            <h3><?php pll_e( 'Ich suche für...' ); ?></h3>
            <div class="filter-group">
                <?php
                    $content = ['items' => cd_get_taxonomy_terms('target-group'), 'slug' => 'target-group'];
                    get_template_part( 'parts/proposal-filter', 'orbit', ['items' => cd_get_taxonomy_terms('target-group'), 'slug' => 'target-group'] );
                ?>
            </div>
        </div>

        <div class="filter-group-container" data-mobile-hidden>
            <h3><?php pll_e( 'Gruppengrösse' ); ?></h3>
            <div class="slider" data-slider data-start="1" data-initial-start="1" data-end="100" data-filter-group="group">
                <div class="slider-handle" data-slider-handle role="slider" tabindex="1">
                    <input type="hidden" disabled>
                    <div data-slider-display>1</div>
                </div>
                <span class="slider-fill" data-slider-fill></span>
            </div>
        </div>

        <div class="filter-group-container" data-mobile-hidden>
            <h3><?php pll_e( 'Ort' ); ?></h3>
            <div class="filter-group">
                <?php
                    get_template_part( 'parts/proposal-filter', 'orbit', ['items' => cd_get_taxonomy_terms('location'), 'slug' => 'location'] );
                ?>
            </div>
        </div>

        <div class="filter-group-container" data-mobile-hidden>
            <div class="filter-group no-flex">
                <label>
                    <input type="checkbox" name="cost" value="free" data-filter-checkbox data-filter-group="cost"/> <?php pll_e( 'kostenlos' ); ?>
                </label>
                <label>
                    <input type="checkbox" name="onoffline" value="online" data-toggle-checkbox="offline" data-filter-checkbox data-filter-group="onoffline" /> <?php pll_e( 'online' ); ?>
                </label>
                <label>
                    <input type="checkbox" name="onoffline" value="offline" data-toggle-checkbox="online" data-filter-checkbox data-filter-group="onoffline" /> <?php pll_e( 'offline' ); ?>
                </label>
                <label>
                    <input type="checkbox" name="timeslot" value="democracy-day" data-filter-checkbox data-filter-group="timeslot" /> <?php pll_e( 'nur am 15. September' ); ?>
                </label>
            </div>
        </div>

        <div class="filter-group-container" data-mobile-hidden>
            <h3><?php pll_e( 'Stichwort' ); ?></h3>
            <p><input type="text" id="proposalsearch" class="search-input" placeholder="<?php pll_e( 'Nach Stichwort suchen' ); ?>" /></p>

            <!-- <form role="search" action="<?php echo site_url('/vorschlaege'); ?>" method="get" id="proposalsearchform" class="proposal-form">
                <input type="text" name="s" placeholder="<?php pll_e( 'Nach Stichwort suchen' ); ?>" class="search-input" />
                <input type="submit" alt="Search" class="button submit-button" value="<?php pll_e( 'Suchen' ); ?>" />
                <input type="hidden" name="post_type" value="sh_proposal" />
            </form> -->
        </div>


        <button class="toggle-filters-button show-for-small-only" data-toggle-filters title="<?php pll_e( 'weitere Filter' ); ?>">
            <?php pll_e( 'weitere Filter' ); ?>
            <span data-filter-icon>&#x2228;</span>
            <span data-filter-icon style="display:none;">&#x2227;</span>
        </button>
    </div>
</div>