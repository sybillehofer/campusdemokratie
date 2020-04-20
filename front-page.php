<?php get_header(); ?>
			
<div id="content">

	<div id="inner-content" class="row">

	    <main id="main" class="small-12 columns" role="main">

			<section class="home-content row">
				<div class="columns small-12">
					<?php include( locate_template( 'parts/posts-header.php' ) ); ?>
				</div>
				
				<?php				
					$cd_news_query = cd_get_news(6);

					if( $cd_news_query->have_posts() ) { ?>
					<section class="news-section medium-12 columns">
						<div class="row">
							<?php include( locate_template( 'parts/content-front-page.php' ) ); ?>
						</div>
					</section>
				<?php } 
					wp_reset_postdata();
				?>
				
			</section>

	    </main> <!-- end #main -->

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>