<ul class="accordion" data-accordion data-allow-all-closed="true" data-multi-expand="true">

<?php
if( $glossary_items->have_posts() ):
	$i = 1;
	while( $glossary_items->have_posts() ): $glossary_items->the_post();
		$letter = mb_substr( get_the_title(), 0, 1 );
	?>
	
	<li id="<?php echo $post->post_name; ?>" class="accordion-item glossary-<?php echo $letter; ?>" data-accordion-item>
		<a href="#" class="accordion-title"><?php echo get_the_title(); ?></a>
		<div class="accordion-content" data-tab-content >
			<?php echo the_content(); ?>
			<p class="some-sharing">
				<a class="fa fa-envelope" href="mailto:?&subject=<?php echo get_the_title(); ?>&body=<?php echo cd_post_url_to_hash( get_the_permalink() ); ?>" target=""></a>
				<a class="fa fa-facebook-square" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo cd_post_url_to_hash( get_the_permalink() ); ?>" target="_blank"></a>
				<a class="fa fa-twitter-square" href="https://twitter.com/home?status=<?php echo cd_post_url_to_hash( get_the_permalink() ); ?>" target="_blank"></a>
			</p>
		</div>
	</li>

	<?php 
		$i++;
	
	endwhile;
endif;
wp_reset_query();
?>

</ul>