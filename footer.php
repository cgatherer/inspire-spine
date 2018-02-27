		<?php if ( 'on' == et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

			<span class="et_pb_scroll_top et-pb-icon"></span>

		<?php endif; ?>

		<footer id="main-footer">
			<div class="span12 nopad group">
				<div class="span4 footerSection"><?php dynamic_sidebar( 'footer-area-1' ); ?></div>
				<div class="span4 footerSection"><?php dynamic_sidebar( 'footer-area-2' ); ?></div>
				<div class="span4 footerSection"><?php dynamic_sidebar( 'footer-area-3' ); ?></div>
			</div>

			<div id="footer-bottom">
				<div class="row clearfix">
					<div class="span12 group margin-center">
						<div class="span4">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'footer-menu',
									'depth'          => '1',
									'menu_class'     => 'bottom-nav',
									'container'      => '',
									'fallback_cb'    => '',
								) );
							?>
						</div>
						<div class="span4">
							<?php
								if ( false !== et_get_option( 'show_footer_social_icons', true ) ) {
									get_template_part( 'assets/template-parts/social_icons', 'footer' );
								}
							?>
						</div>
						<div class="span4">
							<?php echo et_get_footer_credits(); ?>
						</div>
					</div>
				</div>	<!-- .container -->
			</div>
		</footer> <!-- #main-footer -->
	</div> <!-- #et-main-area -->
</div> <!-- #page-container -->

<?php wp_footer(); ?>
</body>
</html>