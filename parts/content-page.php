<?php get_template_part( 'parts/page', 'header' ); ?>
	
<section class="row section-content-wrapper">
    
    <article class="large-8 medium-8 columns page-content">
	    <?php the_content(); ?>
	    
	    <?php get_template_part( 'parts/content', 'table' ); ?>
    </article>
    
	<?php
		if( get_field('main_sidebar_enabled') ) {
			$title = get_field('main_sidebar_title');
			$text = get_field('main_sidebar_text');
			$links = get_field('main_sidebar_links');
	?>
	<aside class="large-3 medium-4 columns content-aside">
		
		<section>
			<h3><?php echo $title; ?></h3>
			<p><?php echo $text; ?></p>
			<?php foreach( $links as $link ) { ?>
				<a href="<?php echo $link['link']['url']; ?>" target="<?php echo $link['link']['target']; ?>"><?php echo $link['link']['title']; ?></a><br/>
			<?php } ?>
		</section>
	
	</aside>
	<?php } ?>
	
</section>


<?php
$blocks = get_field('content_blocks');

if( have_rows('content_blocks') && $blocks[0]['fliesstext'] !== '' ) {

    while ( have_rows('content_blocks') ) : the_row(); ?>

		<section class="row section-content-wrapper">

		    <article class="large-8 medium-8 columns page-content">
			    <?php the_sub_field('fliesstext'); ?>
		    </article>
		    
			<?php 
			$sidebar = get_sub_field('sidebar');
			if( $sidebar['enabled'] ) {
				$title = $sidebar['title'];
				$text = $sidebar['text'];
			?>
			<aside class="large-3 medium-4 columns content-aside">
				
					<section>
						<h3><?php echo $title; ?></h3>
						<p><?php echo $text; ?></p>
						<?php
							foreach( $sidebar['links'] as $link ) { ?>
							
							    <a href="<?php echo $link['link']['url']; ?>" target="<?php echo $link['link']['target']; ?>"><?php echo $link['link']['title']; ?></a><br/>
							
							<?php } ?>
					</section>
					
			</aside>
			<?php } ?>
			
		</section>

    <?php
	endwhile;

}














