<?php
	$contact = cd_get_contact_info();
?>
				<footer class="footer" role="contentinfo">
					<div id="inner-footer" class="inner-footer row">
						<div class="large-6 medium-4 small-12 columns">
							<?php if( $contact['name'] ) { ?>
							<p class="contact-name"><?php echo $contact['name']; ?></p>
							<?php } if( $contact['address'] ) { ?>
							<p class="contact-address"><?php echo $contact['address']; ?></p>
							<?php } if( $contact['tel'] || $contact['mail'] ) { ?>
							<p class="contact-details">
								<?php if( $contact['tel'] ) { ?>
									<a href="<?php echo telephone_url( $contact['tel'] ); ?>"><?php echo $contact['tel']; ?></a><br/>
								<?php
									} 
									if( $contact['mail'] ) { ?>
									<a href="mailto:<?php echo $contact['mail']; ?>"><?php echo $contact['mail']; ?></a>
								<?php } ?>
							</p>
							<?php } ?>
	    				</div>
						<div class="large-6 medium-8 small-12 columns text-right">
							<p class="some-channels">
								<?php if( $contact['facebook'] ) { ?>
								<a class="fa fa-facebook-square" href="<?php echo $contact['facebook']; ?>" target="_blank"></a>
								<?php }
								if( $contact['twitter'] ) { ?>
								<a class="fa fa-twitter-square" href="<?php echo $contact['twitter']; ?>" target="_blank"></a>
								<?php } ?>
							</p>					
							<nav class="nav">
	    						<span class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></span>
								<?php joints_footer_links(); ?>
	    					</nav>
						</div>
					</div> <!-- end #inner-footer -->
					<div class="show-for-small-only back-to-top"></div>
				</footer> <!-- end .footer -->
			</div>  <!-- end .main-content -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->