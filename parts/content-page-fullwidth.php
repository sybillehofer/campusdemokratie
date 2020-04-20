<?php get_template_part( 'parts/page', 'header' ); ?>
	
<section class="row section-content-wrapper">
    
    <article class="medium-12 columns page-content">
	    <?php the_content(); ?>
	    
	    <?php get_template_part( 'parts/content', 'table' ); ?>
    </article>
	
</section>