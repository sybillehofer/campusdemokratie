<?php get_template_part( 'parts/page', 'fullwidth-header' ); ?>
	
<section class="row section-content-wrapper">
    
    <article class="medium-12 columns page-content">
	    <?php the_content(); ?>
        
	    <?php get_template_part( 'parts/content', 'table' ); ?>

        <?php get_template_part( 'parts/content', 'democracy-day' ); ?>
    </article>
	
</section>