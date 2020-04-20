<?php
/*
Template Name: Projekt-Liste
*/
?>

<?php get_header(); ?>
			
	<div id="content">
	
		<div id="inner-content" class="row">
	
		    <main id="main" class="medium-12 columns" role="main">
			    
			    <header class="page-header">
			    
				    <div class="row">    
					    <div class="medium-12 columns">
						    <h1><?php the_title(); ?></h1>
						    <?php the_content(); ?>
					    </div>
				    </div>
				    
				    <div id="filter-wrapper" data-sticky-container>
					    <div class="selects-container filters sticky" data-sticky data-margin-top="0" data-top-anchor="filter-wrapper:top">
							
							<div class="filter-group">
								<?php pll_e( 'Filter' ); ?>
								<button class="reset-filter" data-reset-filter title="<?php pll_e( 'Filter zurücksetzen' ); ?>">
								<?php include("assets/images/reset.svg"); ?>
								</button>
							</div>
							
							<div class="filter-group">
								<select class="filters-select filter-akteur" data-filter-group="akteur">
									<option value=""><?php pll_e( 'Alle Akteure' ); ?></option>
									<?php foreach( cd_get_taxonomy_terms('akteur') as $akteur ) : ?>
										<option value="<?php echo $akteur->slug; ?>"><?php echo $akteur->name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							
							<div class="filter-group">
								<select class="filters-select filter-akteur" data-filter-group="zielgruppe">
									<option value=""><?php pll_e( 'Alle Zielgruppen' ); ?></option>
									<?php foreach( cd_get_taxonomy_terms('zielgruppe') as $zielgruppe ) : ?>
										<option value="<?php echo $zielgruppe->slug; ?>"><?php echo $zielgruppe->name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							
							<div class="filter-group">
								<select class="filters-select filter-akteur" data-filter-group="ort">
									<option value=""><?php pll_e( 'Alle Orte' ); ?></option>
									<?php foreach( cd_get_taxonomy_terms('ort') as $ort ) : ?>
										<option value="<?php echo $ort->slug; ?>"><?php echo $ort->name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							
							<div class="filter-group">
								<select class="filters-select filter-akteur" data-filter-group="category">
									<option value=""><?php pll_e( 'Alle Kategorien' ); ?></option>
									<?php foreach( cd_get_taxonomy_terms('project-category') as $category ) : ?>
										<option value="<?php echo $category->slug; ?>"><?php echo $category->name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
				    </div>
					
			    </header>				
							    
			    <div class="row projects-content">
					
				    <section class="medium-12 columns">
					    <?php
						    $projects = cd_get_projects();
						    
						    if (!empty($projects)) {
								if ( locate_template( 'parts/content-projects-archive.php' ) !== '' ) {
									include(locate_template( 'parts/content-projects-archive.php' ));
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
