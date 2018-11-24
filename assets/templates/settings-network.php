<!-- assets/templates/settings.php -->
<div class="wrap">

	<h1><?php _e( 'CiviCRM Admin Utilities', 'civicrm-admin-utilities' ); ?></h1>

	<?php if ( $show_tabs ) : ?>
		<h1 class="nav-tab-wrapper">
			<a href="<?php echo $urls['settings']; ?>" class="nav-tab nav-tab-active"><?php _e( 'Settings', 'civicrm-admin-utilities' ); ?></a>
			<?php

			/**
			 * Allow others to add tabs.
			 *
			 * @since 0.5.4
			 *
			 * @param array $urls The array of subpage URLs.
			 * @param str The key of the active tab in the subpage URLs array.
			 */
			do_action( 'civicrm_admin_utilities_network_nav_tabs', $urls, 'settings' );

			?>
		</h1>
	<?php else : ?>
		<hr />
	<?php endif; ?>

	<?php if ( isset( $_GET['updated'] ) AND $_GET['updated'] == 'true' ) : ?>
		<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
			<p><strong><?php _e( 'Settings saved.', 'civicrm-admin-utilities' ); ?></strong></p>
			<button type="button" class="notice-dismiss">
				<span class="screen-reader-text"><?php _e( 'Dismiss this notice.', 'civicrm-admin-utilities' ); ?></span>
			</button>
		</div>
	<?php endif; ?>

	<form method="post" id="civicrm_admin_utilities_network_settings_form" action="<?php echo $this->page_submit_url_get(); ?>">

		<?php wp_nonce_field( 'civicrm_admin_utilities_network_settings_action', 'civicrm_admin_utilities_network_settings_nonce' ); ?>

		<?php if ( $this->plugin->is_civicrm_network_activated() ) : ?>

			<h3><?php _e( 'Network-wide Settings', 'civicrm-admin-utilities' ); ?></h3>

			<p><?php _e( 'In multisite, when CiviCRM is network-activated, it will load on every sub-site. This may not be what you want - especially when multisite uses subdirectories - because CiviCRM makes assumptions about the path to WordPress admin and as a result the CiviCRM menu always bounces users to the main site. Furthermore, public-facing pages will not distinguish between sub-sites and the main site and will always appear on the main site. So check this option to restrict the appearance of the CiviCRM menu item and CiviCRM shortcode button to the main site only.', 'civicrm-admin-utilities' ); ?></p>

			<table class="form-table">

				<tr>
					<th scope="row"><?php _e( 'Restrict CiviCRM', 'civicrm-admin-utilities' ); ?></th>
					<td>
						<input type="checkbox" class="settings-checkbox" name="civicrm_admin_utilities_main_site" id="civicrm_admin_utilities_main_site" value="1"<?php echo $main_site_only; ?> />
						<label class="civicrm_admin_utilities_settings_label" for="civicrm_admin_utilities_main_site"><?php _e( 'Restrict CiviCRM to main site only.', 'civicrm-admin-utilities' ); ?></label>
					</td>
				</tr>

			</table>

			<hr />

		<?php endif; ?>

		<h2><?php _e( 'Default Settings for All Sites', 'civicrm-admin-utilities' ); ?></h2>

		<div class="cau-defaults-notice">
			<p style="font-weight: bold; color: green; font-size: larger;"><?php _e( 'NETWORK ADMINS PLEASE NOTE: The settings that you choose below will be used as the initial defaults on all sub-sites where CiviCRM is activated. Each sub-site where CiviCRM is active has its own CiviCRM Admin Utilities settings page where these settings can be overridden for that particular sub-site.', 'civicrm-admin-utilities' ); ?></p>
		</div>

		<hr />

		<h3><?php _e( 'CiviCRM Admin Appearance', 'civicrm-admin-utilities' ); ?></h3>

		<p><?php _e( 'Checking these options applies styles that make CiviCRM Admin pages look better. If you only want to fix the appearance of the CiviCRM Menu and keep the default CiviCRM Admin styles, then check the box for "CiviCRM Menu" and leave "CiviCRM Admin" unchecked.', 'civicrm-admin-utilities' ); ?></p>

		<table class="form-table">

			<tr>
				<th scope="row"><?php _e( 'CiviCRM Menu', 'civicrm-admin-utilities' ); ?></th>
				<td>
					<input type="checkbox" class="settings-checkbox" name="civicrm_admin_utilities_menu" id="civicrm_admin_utilities_menu" value="1"<?php echo $prettify_menu; ?> />
					<label class="civicrm_admin_utilities_settings_label" for="civicrm_admin_utilities_menu"><?php _e( 'Check this to apply to the CiviCRM menu.', 'civicrm-admin-utilities' ); ?></label>
				</td>
			</tr>

			<tr>
				<th scope="row"><?php _e( 'CiviCRM Admin', 'civicrm-admin-utilities' ); ?></th>
				<td>
					<input type="checkbox" class="settings-checkbox" name="civicrm_admin_utilities_styles_admin" id="civicrm_admin_utilities_styles_admin" value="1"<?php echo $admin_css; ?> />
					<label class="civicrm_admin_utilities_settings_label" for="civicrm_admin_utilities_styles_admin"><?php _e( 'Check this to apply to CiviCRM Admin.', 'civicrm-admin-utilities' ); ?></label>
				</td>
			</tr>

		</table>

		<hr />

		<h3><?php _e( 'CiviCRM Stylesheets', 'civicrm-admin-utilities' ); ?></h3>

		<p><?php _e( 'This section allows you to configure how various CiviCRM stylesheets are loaded on your website. This is useful if you have created custom styles for CiviCRM in your theme, for example. By default, this plugin prevents the CiviCRM menu stylesheet from loading on the front-end, since the CiviCRM menu itself is only ever present in WordPress admin.', 'civicrm-admin-utilities' ); ?></p>

		<table class="form-table">

			<tr>
				<th scope="row"><?php _e( 'Default CiviCRM stylesheet', 'civicrm-admin-utilities' ); ?></th>
				<td>
					<input type="checkbox" class="settings-checkbox" name="civicrm_admin_utilities_styles_default" id="civicrm_admin_utilities_styles_default" value="1"<?php echo $default_css; ?> />
					<label class="civicrm_admin_utilities_settings_label" for="civicrm_admin_utilities_styles_default"><?php _e( 'Check this to prevent the default CiviCRM stylesheet (civicrm.css) from loading on Public Pages.', 'civicrm-admin-utilities' ); ?></label>
				</td>
			</tr>

			<tr>
				<th scope="row"><?php _e( 'CiviCRM Menu stylesheet', 'civicrm-admin-utilities' ); ?></th>
				<td>
					<input type="checkbox" class="settings-checkbox" name="civicrm_admin_utilities_styles_nav" id="civicrm_admin_utilities_styles_nav" value="1"<?php echo $navigation_css; ?> />
					<label class="civicrm_admin_utilities_settings_label" for="civicrm_admin_utilities_styles_nav"><?php _e( 'Check this to prevent the CiviCRM menu stylesheet (civicrmNavigation.css) from loading on Public Pages.', 'civicrm-admin-utilities' ); ?></label>
				</td>
			</tr>

			<tr>
				<th scope="row"><?php _e( 'Custom Stylesheet on Public Pages', 'civicrm-admin-utilities' ); ?></th>
				<td>
					<input type="checkbox" class="settings-checkbox" name="civicrm_admin_utilities_styles_custom" id="civicrm_admin_utilities_styles_custom" value="1"<?php echo $custom_css; ?> />
					<label class="civicrm_admin_utilities_settings_label" for="civicrm_admin_utilities_styles_custom"><?php _e( 'Check this to prevent the user-defined CiviCRM custom stylesheet from loading on Public Pages.', 'civicrm-admin-utilities' ); ?></label>
				</td>
			</tr>

			<tr>
				<th scope="row"><?php _e( 'Custom Stylesheet in CiviCRM Admin', 'civicrm-admin-utilities' ); ?></th>
				<td>
					<input type="checkbox" class="settings-checkbox" name="civicrm_admin_utilities_styles_custom_public" id="civicrm_admin_utilities_styles_custom_public" value="1"<?php echo $custom_public_css; ?> />
					<label class="civicrm_admin_utilities_settings_label" for="civicrm_admin_utilities_styles_custom_public"><?php _e( 'Check this to prevent the user-defined CiviCRM custom stylesheet from loading in CiviCRM Admin.', 'civicrm-admin-utilities' ); ?></label>
				</td>
			</tr>

			<tr>
				<th scope="row"><?php _e( 'Shoreditch stylesheet', 'civicrm-admin-utilities' ); ?></th>
				<td>
					<input type="checkbox" class="settings-checkbox" name="civicrm_admin_utilities_styles_shoreditch" id="civicrm_admin_utilities_styles_shoreditch" value="1"<?php echo $shoreditch_css; ?> />
					<label class="civicrm_admin_utilities_settings_label" for="civicrm_admin_utilities_styles_shoreditch"><?php _e( 'Check this to prevent the Shoreditch extension stylesheet (civicrm-custom.css) from loading on Public Pages.', 'civicrm-admin-utilities' ); ?></label>
				</td>
			</tr>

			<tr>
				<th scope="row"><?php _e( 'Shoreditch Bootstrap stylesheet', 'civicrm-admin-utilities' ); ?></th>
				<td>
					<input type="checkbox" class="settings-checkbox" name="civicrm_admin_utilities_styles_bootstrap" id="civicrm_admin_utilities_styles_bootstrap" value="1"<?php echo $bootstrap_css; ?> />
					<label class="civicrm_admin_utilities_settings_label" for="civicrm_admin_utilities_styles_bootstrap"><?php _e( 'Check this to prevent the Shoreditch extension Bootstrap stylesheet (bootstrap.css) from loading on Public Pages.', 'civicrm-admin-utilities' ); ?></label>
				</td>
			</tr>

		</table>

		<hr />

		<h3><?php _e( 'Fix WordPress Access Control form', 'civicrm-admin-utilities' ); ?></h3>

		<p><?php _e( 'Checking this option fixes the appearance of the WordPress Access Control form.', 'civicrm-admin-utilities' ); ?></li>
		</ol>

		<table class="form-table">

			<tr>
				<th scope="row"><?php _e( 'Fix WordPress Access Control form', 'civicrm-admin-utilities' ); ?></th>
				<td>
					<input type="checkbox" class="settings-checkbox" name="civicrm_admin_utilities_access" id="civicrm_admin_utilities_access" value="1"<?php echo $prettify_access; ?> />
					<label class="civicrm_admin_utilities_settings_label" for="civicrm_admin_utilities_access"><?php _e( 'Check this to fix the appearance of the WordPress Access Control form.', 'civicrm-admin-utilities' ); ?></label>
				</td>
			</tr>

		</table>

		<hr />

		<h3><?php _e( 'Admin Bar Options', 'civicrm-admin-utilities' ); ?></h3>

		<p><?php _e( 'Some people find it helpful to have links directly to CiviCRM components available from the WordPress admin bar.', 'civicrm-admin-utilities' ); ?></p>

		<table class="form-table">

			<tr>
				<th scope="row"><?php _e( 'Shortcuts Menu', 'civicrm-admin-utilities' ); ?></th>
				<td>
					<input type="checkbox" class="settings-checkbox" name="civicrm_admin_utilities_admin_bar" id="civicrm_admin_utilities_admin_bar" value="1"<?php echo $admin_bar; ?> />
					<label class="civicrm_admin_utilities_settings_label" for="civicrm_admin_utilities_admin_bar"><?php _e( 'Check this to add a CiviCRM Shortcuts Menu to the WordPress admin bar.', 'civicrm-admin-utilities' ); ?></label>
				</td>
			</tr>

		</table>

		<hr />

		<?php if ( ! empty( $options ) ) : ?>

			<h3><?php _e( 'Post Type Options', 'civicrm-admin-utilities' ); ?></h3>

			<p><?php _e( 'Select which post types you want the CiviCRM shortcode button to appear on.', 'civicrm-admin-utilities' ); ?></p>

			<?php echo $options; ?>

			<hr />

		<?php endif; ?>

		<p class="submit">
			<input class="button-primary" type="submit" id="civicrm_admin_utilities_network_settings_submit" name="civicrm_admin_utilities_network_settings_submit" value="<?php _e( 'Save Changes', 'civicrm-admin-utilities' ); ?>" />
		</p>

	</form>

</div><!-- /.wrap -->



