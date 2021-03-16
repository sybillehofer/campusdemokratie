<div id="proposal-filter-wrapper">
	<div class="selects-container filters">
    
        <h3><?php pll_e( 'Alter' ); ?></h3>
        <div class="slider" data-slider data-start="0" data-initial-start="10" data-initial-end="90" data-end="99">
            <div class="slider-handle" data-slider-handle role="slider" tabindex="1"><input type="number" disabled></div>
            <span class="slider-fill" data-slider-fill></span>
            <div class="slider-handle" data-slider-handle role="slider" tabindex="1"><input type="number" disabled></div>
        </div>

        <h3><?php pll_e( 'Dauer (h)' ); ?></h3>
        <div class="slider" data-slider data-start="1" data-initial-start="2" data-initial-end="3" data-end="730">
            <div class="slider-handle" data-slider-handle role="slider" tabindex="1"><input type="number" disabled></div>
            <span class="slider-fill" data-slider-fill></span>
            <div class="slider-handle" data-slider-handle role="slider" tabindex="1"><input type="number" disabled></div>
        </div>

        <h3><?php pll_e( 'Art' ); ?></h3>
        <div class="filter-group">
            <select class="filters-select filter-proposal-type" data-filter-group="proposal-type">
                <option value=""><?php pll_e( 'Alle Arten' ); ?></option>
                <?php foreach( cd_get_taxonomy_terms('proposal-type') as $art ) : ?>
                    <option value="<?php echo $art->slug; ?>"><?php echo $art->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <h3><?php pll_e( 'Ich suche für...' ); ?></h3>
        <div class="filter-group">
            <select class="filters-select filter-target-group" data-filter-group="target-group">
                <option value=""><?php pll_e( 'Alle Zielgruppen' ); ?></option>
                <?php foreach( cd_get_taxonomy_terms('target-group') as $zielgruppe ) : ?>
                    <option value="<?php echo $zielgruppe->slug; ?>"><?php echo $zielgruppe->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <h3><?php pll_e( 'Gruppengrösse' ); ?></h3>
        <div class="slider" data-slider data-start="1" data-initial-start="5" data-initial-end="20" data-end="100">
            <div class="slider-handle" data-slider-handle role="slider" tabindex="1"><input type="number" disabled></div>
            <span class="slider-fill" data-slider-fill></span>
            <div class="slider-handle" data-slider-handle role="slider" tabindex="1"><input type="number" disabled></div>
        </div>

        <h3><?php pll_e( 'Ort' ); ?></h3>
        <div class="filter-group">
            <select class="filters-select filter-location" data-filter-group="location">
                <option value=""><?php pll_e( 'Alle Orte' ); ?></option>
                <?php foreach( cd_get_taxonomy_terms('location') as $ort ) : ?>
                    <option value="<?php echo $ort->slug; ?>"><?php echo $ort->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="filter-group">
            <label>
                <input type="radio" name="cost" value="kostenlos" data-filter-group="cost"/> <?php pll_e( 'kostenlos' ); ?>
            </label>
            <label>
                <input type="radio" name="cost" value=".kostenpflichtig" data-filter-group="cost" /> <?php pll_e( 'kostenpflichtig' ); ?>
            </label>
        </div>
        <div class="filter-group">
            <label>
                <input type="radio" name="onoffline" value=".online" data-filter-group="onoffline" /> <?php pll_e( 'online' ); ?>
            </label>
            <label>
                <input type="radio" name="onoffline" value=".offline" data-filter-group="onoffline" /> <?php pll_e( 'offline' ); ?>
            </label>
        </div>
        <div class="filter-group">
            <label>
                <input type="radio" name="timeslot" value=":not(.transition)" data-filter-group="timeslot" /> <?php pll_e( 'ganzes Jahr' ); ?>
            </label>
            <label>
                <input type="radio" name="timeslot" value="numberGreaterThan50" data-filter-group="timeslot" /> <?php pll_e( 'nur am 15. September' ); ?>
            </label>
        </div>


        <h3><?php pll_e( 'Stichwort' ); ?></h3>
        <form role="search" action="<?php echo site_url('/mitmachen'); ?>" method="get" id="searchform" class="proposal-form">
            <input type="text" name="s" placeholder="<?php pll_e( 'Nach Stichwort suchen' ); ?>" class="search-input" />
            <input type="submit" alt="Search" class="button submit-button" value="<?php pll_e( 'Suchen' ); ?>" />
            <input type="hidden" name="post_type" value="sh_proposal" />
        </form>

    </div>
</div>