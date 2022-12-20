<?php get_header(); 

$upcoming_events = cd_get_events_new();

?>
			
	<div id="content">
	
		<div id="inner-content" class="row">
	
		    <main id="main" class="medium-12 columns" role="main">
			    
			    <header class="page-header row events-header">
				    <div class="medium-12 columns">
					    <h1><?php the_archive_title(); ?></h1>
				    </div>
				    
				    <div class="medium-12 columns">
					    
					    <div id="filter-wrapper" data-sticky-container>
						    <div class="selects-container filters sticky" data-sticky data-margin-top="0" data-top-anchor="filter-wrapper:top">
							    
							    <div class="filter-group">
									<?php pll_e( 'Filter' ); ?>
									<button class="reset-filter" data-reset-filter title="<?php pll_e( 'Filter zurücksetzen' ); ?>">
									<?php include("assets/images/reset.svg"); ?>
									</button>
								</div>
								
							    <div class="filter-group">
									<select class="filters-select filter-event" data-filter-group="event">
										<option value=""><?php pll_e( 'Alle Events' ); ?></option>
										<option value="is-campus"><?php pll_e( 'Unsere Events' ); ?></option>
									</select>
								</div>
								
								<div class="filter-group">
									<select class="filters-select filter-month" data-filter-group="month">
										<option value=""><?php pll_e( 'Alle Monate' ); ?></option>
											<?php setlocale(LC_TIME, get_locale() . ".UTF-8");
												for($i = 1 ; $i <= 12; $i++) { 
													$month = strftime('%B', mktime(0, 0, 0, $i, 1));
												?>
													<option value="<?php echo umlauteumwandeln(strtolower($month)); ?>"><?php echo $month; ?></option>
											<?php } ?>
									</select>
								</div>
								
								<div class="filter-group">
									<select class="filters-select filter-city" data-filter-group="city">
										<option value=""><?php pll_e( 'Alle Orte' ); ?></option>
										<?php foreach( cd_get_taxonomy_terms('city') as $city ) : ?>
											<option value="<?php echo $city->slug; ?>"><?php echo $city->name; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								
							    <div class="filter-group">
									<select class="filters-select filter-eventtype" data-filter-group="eventtype">
										<option value=""><?php pll_e( 'Alle Kategorien' ); ?></option>
										<?php foreach( cd_get_taxonomy_terms('eventtype') as $eventtype ) : ?>
											<option value="<?php echo $eventtype->slug; ?>"><?php echo $eventtype->name; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								
							</div>
					    </div>
					    
				    </div>
					
			    </header>				
							    
			    <div class="row events-content">
				    <section class="large-12 columns" id="events-content">
					    <?php						
						if( !empty($upcoming_events) ) {
							if ( locate_template( 'parts/content-events-archive.php' ) !== '' ) {
								include(locate_template( 'parts/content-events-archive.php' ));
							}
						} else {
							get_template_part( 'parts/content', 'missing' );
								
						} ?>
				    </section>		
			    </div>				
																								
		    </main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>