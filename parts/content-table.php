<?php

if( have_rows('rows') ):

    while ( have_rows('rows') ) : the_row();
		
		$fields_1 = get_sub_field( 'column_1' );
		$fields_2 = get_sub_field( 'column_2' );
		$fields_array = array( $fields_1, $fields_2 );
		
		?>
		
		<div class="row table-row">
			
			<?php 
			foreach( $fields_array as $fields ) {
				
				if( $fields['type'] === 'image' && !empty($fields['image']) ): ?>
	    	
		    	<div class="image-column columns small-8 small-offset-2 medium-3 medium-offset-0">
					<img src="<?php echo $fields['image']['url']; ?>" class="table-img" alt="<?php echo $fields['image']['alt']; ?>" />
		    	</div>
	
				<?php endif; ?>
		    	
		    	
		    	<?php
			    if( $fields['type'] === 'text' && !empty($fields['text']) ) { ?>			    
				    <div class="columns small-12 medium-9 table-text">
				    <?php echo $fields['text']; ?>
				    </div>
				<?php }

			} ?>
			
		</div>

<?php
    endwhile;

else :

    // no rows found

endif;

?>