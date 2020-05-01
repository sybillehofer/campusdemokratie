<div class="table-wrapper table-scroll">
	<table id="projectTable" class="unstriped">
		<thead>
			<tr>
			  <th><?php pll_e( 'Projekt' ); ?></th>
			  <th><?php pll_e( 'Akteur' ); ?></th>
			  <th><?php pll_e( 'Zielgruppe' ); ?></th>
			  <th><?php pll_e( 'Ort' ); ?></th>
			  <th><?php pll_e( 'Kategorie' ); ?></th>
			  <th style="display:none;"><?php pll_e( 'Stichworte' ); ?></th>
			</tr>
		</thead>
		
		<tbody class="isotope-filter-container" data-isotope-layoutMode="vertical">
		<?php foreach( $projects as $project ) :
			$project_link = '';
			switch (pll_current_language()) {
			    case 'it':
				    $project_title = $project->italian;
				    if( $project->link_it ) {
					    $project_link = $project->link_it;
				    }
			        break;
			    case 'fr':
			        $project_title = $project->french;
			        if( $project->link_fr ) {
					    $project_link = $project->link_fr;
				    }

			        break;
			    default:
			        $project_title = $project->post_title;
			        $project_link = $project->link;
			        break;
			}
			
			if( empty($project_link) ) {
				$project_link = $project->link;
			}
			
			if( empty($project_title) ) {
				$project_title = $project->post_title;
			}
			
		?>
		    <tr class="filter-item<?php echo cd_get_isotope_classes($project); ?>">
		      <td>
			    <?php 
				    $link = get_field('link', $project);
				
				    if ($project_link != '') { ?>
				    	<a href="<?php echo $project_link; ?>" target="_blank">
				<?php }
				
						echo $project_title;
				
					if ($project_link != '') { ?>
						</a>
				<?php } ?>
			  </td>
		      <td><?php echo join(', ', cd_get_tax_name($project->ID, 'akteur')); ?></td>
		      <td><?php echo join(', ', cd_get_tax_name($project->ID, 'zielgruppe')); ?></td>
		      <td><?php echo join(', ', cd_get_tax_name($project->ID, 'ort')); ?></td>
		      <td><?php echo join(', ', cd_get_tax_name($project->ID, 'project-category')); ?></td>
		      <td style="display:none;"><?php echo join(', ', cd_get_tax_name($project->ID, 'tag')); ?></td>
		    </tr>
	    <?php endforeach; ?>
	    </tbody>
	</table>
	    
	    <p class="no-results"><?php pll_e( 'Zur Zeit haben wir keine Projekte, welche die gewählten Kriterien erfüllen.' ); ?></p>
</div>