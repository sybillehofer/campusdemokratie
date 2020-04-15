<?php get_header(); ?>
			
<div id="content">

	<div id="inner-content" class="row">

	    <main id="main" class="small-12 columns" role="main">

			<section class="home-content row">
				<header class="home-header small-12 columns text-center" style="background-image: url(<?php echo the_post_thumbnail_url('full-width'); ?>);">
						<div class="overlay"></div>
						
						<div class="home-header-content row">
							<h1 class="home-title"><?php the_title(); ?></h1>
							<div class="home-description"><?php echo apply_filters('the_content', $post->post_content); ?></div>
							<?php if( has_nav_menu('icon-nav' ) ) { ?>
								<a href="#" class="home-arrow"></a>
							<?php } ?>
						</div>
				</header>
				
				<?php if( has_nav_menu('icon-nav' )  ) { ?>
				<section class="iconnav-section medium-12 columns">
					<?php get_template_part( 'parts/content', 'iconnav' ); ?>
				</section>
				<?php }
				
				$cd_news_query = cd_get_news();
				$cd_events = cd_get_events( 3, $term = false, $is_campus = false, $city_id = false, $eventtype_id = false, $is_front_page = true, $only_past = false );
				
				if( $cd_news_query->have_posts() || !empty($cd_events) ) { ?>
				<section id="news-section" class="news-section medium-12 columns">
					<?php include( locate_template( 'parts/content-front-page.php' ) ); ?>
				</section>
				<?php } 
					wp_reset_postdata();
				?>
				
			</section>

	    </main> <!-- end #main -->

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>