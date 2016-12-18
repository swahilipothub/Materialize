<?php
/*
Plugin Name: Materialize
Plugin URI: http://mtaandao.co.ke/plugins/materialize
Description: A mobile menu for WordPress. Customize under Settings > Materialize. Customize colors under Appearance > Customize > Materialize Colors.
Version: 2.6
Author: Swahilipot Hub Devs
License: GPL2
*/


	//
	// CREATE THE SETTINGS PAGE (for WordPress backend, Settings > Materialize)
	//
	
	/* create "Settings" link on plugins page */
	function drawer_materialize_settings_link($links) { 
		$settings_link = '<a href="options-general.php?page=materialize-drawer/materialize.php">Settings</a>'; 
		array_unshift($links, $settings_link); 
		return $links; 
	}
	$plugin = plugin_basename(__FILE__); 
	add_filter("plugin_action_links_$plugin", 'drawer_materialize_settings_link' );

	/* create the "Settings > Materialize" menu item */
	function drawer_materialize_admin_menu() {
		add_submenu_page('options-general.php', 'Materialize Settings', 'Materialize', 'administrator', __FILE__, 'drawer_materialize_page');
	}
	
	/* create the actual settings page */
	function drawer_materialize_page() {
		if ( isset ($_POST['update_drawer_materialize']) == 'true' ) { drawer_materialize_update(); }
	?>

		<div class="wrap">
			<br>
			<h2>Materialize</h2>
			<strong>Psst!</strong> Materialize's color options can be changed under <strong>Appearance > Customize > Materialize Colors</strong>

			<br>
			<br>
			<strong>Jump to:</strong>
			<a href="#alignment">Alignment</a> | 
			<a href="#animations">Animations</a> | 
			<a href="#menu-button-logo-search">Menu button, logo, search</a> | 
			<a href="#heading">Heading</a> | 
			<a href="#subheading">Subheading</a> | 
			<a href="#image">Image</a> | 
			<a href="#menu-submenu">Menu & submenu</a> | 
			<a href="#menu-description">Menu description</a> | 
			<a href="#menu-icons">Menu icons</a> |
			<a href="#widgets">Widgets</a> | 
			<a href="#background">Background</a> | 
			<a href="#hide-at-certain-width-resolution">Hide at certain width/resolution</a>

			<form method="POST" action="">
				<input type="hidden" name="update_drawer_materialize" value="true" />

				<br><hr><br>

				<!-- BEGIN ALIGNMENT -->
				<div id="alignment"></div>
				<br>
				<br>
				<h2>Alignment</h2>
				<table class="form-table">
					<!-- BEGIN HORIZONTAL ALIGNMENT -->
					<tr valign="top">
					<th scope="row">Horizontal alignment:</th>
					<td>
					<?php $materialize_horizontal_alignment = get_option('drawer_materialize_horizontal_alignment'); ?>
					<label><input value="materializealignleft" type="radio" name="materialize_horizontal_alignment" <?php if ($materialize_horizontal_alignment=='materializealignleft') { echo 'checked'; } ?>> Left</label><br>
					<label><input value="materializealigncenter" type="radio" name="materialize_horizontal_alignment" <?php if ($materialize_horizontal_alignment=='materializealigncenter') { echo 'checked'; } ?>> Center</label><br>
					<label><input value="materializealignright" type="radio" name="materialize_horizontal_alignment" <?php if ($materialize_horizontal_alignment=='materializealignright') { echo 'checked'; } ?>> Right</label><br>
					</td>
					</tr>
					<!-- END HORIZONTAL ALIGNMENT -->
					
					<!-- BEGIN VERTICAL ALIGNMENT -->
					<tr valign="top">
					<th scope="row">Vertical alignment:</th>
					<td>
					<?php $materialize_vertical_alignment = get_option('drawer_materialize_vertical_alignment'); ?>
					<label><input value="materializealigntop" type="radio" name="materialize_vertical_alignment" <?php if ($materialize_vertical_alignment=='materializealigntop') { echo 'checked'; } ?>> Top</label><br>
					<label><input value="materializealignmiddle" type="radio" name="materialize_vertical_alignment" <?php if ($materialize_vertical_alignment=='materializealignmiddle') { echo 'checked'; } ?>> Middle</label><br>
					<label><input value="materializealignbottom" type="radio" name="materialize_vertical_alignment" <?php if ($materialize_vertical_alignment=='materializealignbottom') { echo 'checked'; } ?>> Bottom</label><br>
					</td>
					</tr>
					<!-- END VERTICAL ALIGNMENT -->
				</table>
				<!-- END ALIGNMENT -->
				
				<br><hr><br>

				<!-- BEGIN ANIMATIONS -->
				<div id="animations"></div>
				<br>
				<br>
				<h2>Animations</h2>
				<table class="form-table">
					<!-- BEGIN BUTTON ANIMATION -->
					<tr valign="top">

					<th scope="row">Menu button animation:</th>
					<td>
					<?php $materialize_button_animation = get_option('drawer_materialize_button_animation'); ?>
					<label><input value="materializenoanimation" type="radio" name="materialize_button_animation" <?php if ($materialize_button_animation=='materializenoanimation') { echo 'checked'; } ?>> No animation</label><br>
					<label><input value="materializeminusanimation" type="radio" name="materialize_button_animation" <?php if ($materialize_button_animation=='materializeminusanimation') { echo 'checked'; } ?>> Minus sign</label><br>
					<label><input value="materializexanimation" type="radio" name="materialize_button_animation" <?php if ($materialize_button_animation=='materializexanimation') { echo 'checked'; } ?>> X sign</label><br>
					</td>
					</tr>
					<!-- END BUTTON ANIMATION -->
					
					<!-- BEGIN MENU BUTTON SPEED -->
					<tr valign="top">
					<th scope="row">Menu button animation speed:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_menu_button_speed" id="materialize_menu_button_speed" value="<?php echo get_option('drawer_materialize_menu_button_speed'); ?>"/> seconds
					<br> Enter custom menu button animation speed (in seconds). Example: 0.5. If left empty, defaults to 0.25
					</td>
					</tr>
					<!-- END MENU BUTTON SPEED -->
					
					<!-- BEGIN BACKGOUND ANIMATION -->
					<tr valign="top">
					<th scope="row">Fade/slide-in direction:</th>
					<td>
					<?php $materialize_menu_animation = get_option('drawer_materialize_menu_animation'); ?>
					<label><input value="materializetop" type="radio" name="materialize_menu_animation" <?php if ($materialize_menu_animation=='materializetop') { echo 'checked'; } ?>> Top</label><br>
					<label><input value="materializeleft" type="radio" name="materialize_menu_animation" <?php if ($materialize_menu_animation=='materializeleft') { echo 'checked'; } ?>> Left</label><br>
					<label><input value="materializeright" type="radio" name="materialize_menu_animation" <?php if ($materialize_menu_animation=='materializeright') { echo 'checked'; } ?>> Right</label><br>
					<label><input value="materializebottom" type="radio" name="materialize_menu_animation" <?php if ($materialize_menu_animation=='materializebottom') { echo 'checked'; } ?>> Bottom</label><br>
					<label><input value="materializefade" type="radio" name="materialize_menu_animation" <?php if ($materialize_menu_animation=='materializefade') { echo 'checked'; } ?>> Fade</label><br>
					</td>
					</tr>
					<!-- END BACKGOUND ANIMATION -->
				</table>
				<!-- END ANIMATIONS -->

				<br><hr><br>

				<!-- BEGIN POSITIONING OPTIONS -->
				<div id="menu-button-logo-search"></div>
				<br>
				<br>
				<h2>Menu button, logo, search</h2>
				<table class="form-table">
					<!-- BEGIN MENU BUTTON STYLE -->
					<tr valign="top">
					<th scope="row">Menu button style:</th>
					<td>
					<?php $materialize_menu_button_style = get_option('drawer_materialize_menu_button_style'); ?>
					<label><input value="materializefourlines" type="radio" name="materialize_menu_button_style" <?php if ($materialize_menu_button_style=='materializefourlines') { echo 'checked'; } ?>> 4 lines (default)</label><br>
					<label><input value="materializefourlinesalt" type="radio" name="materialize_menu_button_style" <?php if ($materialize_menu_button_style=='materializefourlinesalt') { echo 'checked'; } ?>> 4 lines (alternate)</label><br>
					<label><input value="materializethreelines" type="radio" name="materialize_menu_button_style" <?php if ($materialize_menu_button_style=='materializethreelines') { echo 'checked'; } ?>> 3 lines (traditional hamburger menu)</label><br>
					<label><input value="materializethreelinesalt" type="radio" name="materialize_menu_button_style" <?php if ($materialize_menu_button_style=='materializethreelinesalt') { echo 'checked'; } ?>> 3 lines (alternate hamburger menu)</label><br>
					<label><input value="materializestatic" type="radio" name="materialize_menu_button_style" <?php if ($materialize_menu_button_style=='materializestatic') { echo 'checked'; } ?>> Static, 3 lines (may be beneficial if your site has a lot of visitors from old devices)</label><br>
					</td>
					</tr>
					<!-- END MENU BUTTON STYLE -->
					
					<!-- BEGIN ABSOLUTE POSITIONING -->
					<tr valign="top">
					<th scope="row">Absolute/fixed positioning:</th>
					<td>
					<label><input type="checkbox" name="materialize_absolute_position" id="materialize_absolute_position" <?php echo get_option('drawer_materialize_absolute_position'); ?> /> Absolute positioning (menu, search buttons and logo leave the screen when scrolled).
					<br>If unticked, they'll have fixed positioning and will remain at the top at all times.</label><br>
					</td>
					</tr>
					<!-- END ABSOLUTE POSITIONING -->
					
					<!-- BEGIN POSITIONING -->
					<tr valign="top">
					<th scope="row">Positioning:</th>
					<td>
                    <?php $materialize_heading_positioning = get_option('drawer_materialize_heading_positioning'); ?>
                    <label><input value="materializeheadingone" type="radio" name="materialize_heading_positioning" <?php if ($materialize_heading_positioning=='materializeheadingone') { echo 'checked'; } ?>> Menu | Search -------------- Logo</label><br>
                    <label><input value="materializeheadingtwo" type="radio" name="materialize_heading_positioning" <?php if ($materialize_heading_positioning=='materializeheadingtwo') { echo 'checked'; } ?>> Logo -------------- Search | Menu</label><br>
                    <label><input value="materializeheadingthree" type="radio" name="materialize_heading_positioning" <?php if ($materialize_heading_positioning=='materializeheadingthree') { echo 'checked'; } ?>> Menu ------- Logo ------- Search</label><br>
                    <label><input value="materializeheadingfour" type="radio" name="materialize_heading_positioning" <?php if ($materialize_heading_positioning=='materializeheadingfour') { echo 'checked'; } ?>> Search ------- Logo ------- Menu</label><br>
					</td>
					</tr>
					<!-- END POSITIONING -->
					
					<!-- BEGIN MENU BUTTON OPACITY -->
					<tr valign="top">
					<th scope="row">Menu button opacity:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_menu_button_opacity" id="materialize_menu_button_opacity" value="<?php echo get_option('drawer_materialize_menu_button_opacity'); ?>"/>
					<br> Enter custom menu button opacity. From 0-1 (example: 0.5) If left empty, defaults to 1
					</td>
					</tr>
					<!-- END MENU BUTTON OPACITY -->
					
					<!-- BEGIN HIDE LOGO -->
					<tr valign="top">
					<th scope="row">Hide logo?:</th>
					<td>
					<label><input type="checkbox" name="materialize_hide_logo" id="materialize_hide_logo" <?php echo get_option('drawer_materialize_hide_logo'); ?> /> Don't show logo.
					<br>If unchecked, logo will be shown (To use an image logo, head to Appearance > Customize > Materialize Logo).</label><br>
					</td>
					</tr>
					<!-- END HIDE LOGO -->
					
					<!-- BEGIN HIDE SEARCH + SEARCH DIVIDER -->
					<tr valign="top">
					<th scope="row">Hide search?:</th>
					<td>
					<label><input type="checkbox" name="materialize_hide_search" id="materialize_hide_search" <?php echo get_option('drawer_materialize_hide_search'); ?> /> Don't show search.</label><br>
					</td>
					</tr>
					<!-- END HIDE SEARCH + SEARCH DIVIDER -->
					
					<!-- BEGIN HIDE SEARCH DIVIDER ONLY -->
					<tr valign="top">
					<th scope="row">Hide search button divider?:</th>
					<td>
					<label><input type="checkbox" name="materialize_hide_search_divider" id="materialize_hide_search_divider" <?php echo get_option('drawer_materialize_hide_search_divider'); ?> /> Don't show the search button divider.</label><br>
					</td>
					</tr>
					<!-- END HIDE SEARCH DIVIDER ONLY -->
					
					<!-- BEGIN CHANGE SEARCH TEXT -->
					<tr valign="top">
					<th scope="row">Search text:</th>
					<td>
					<input style="width:100%;height:35px;" type="text" name="materialize_search_text" id="materialize_search_text" value="<?php echo stripslashes(get_option('drawer_materialize_search_text')); ?>"/>
					<br> Enter custom search form default text. If left empty, defaults to "type search term..."
					</td>
					</tr>
					<!-- END CHANGE SEARCH TEXT -->
					
					<!-- BEGIN SHOW HEADER -->
					<tr valign="top">
					<th scope="row">Show header background?:</th>
					<td>
					<label><input type="checkbox" name="materialize_show_header" id="materialize_show_header" <?php echo get_option('drawer_materialize_show_header'); ?> /> Show header background behind menu/search buttons and the logo.</label><br>
					</td>
					</tr>
					<!-- END SHOW HEADER -->
                    
                    <!-- BEGIN SHOW HEADER SHADOW -->
					<tr valign="top">
					<th scope="row">Show shadow on header background?:</th>
					<td>
					<label><input type="checkbox" name="materialize_show_header_shadow" id="materialize_show_header_shadow" <?php echo get_option('drawer_materialize_show_header_shadow'); ?> /> Show shadow behind header background.</label><br>
					</td>
					</tr>
					<!-- END SHOW HEADER SHADOW -->
					
                    <!-- BEGIN HEADER BACKGROUND SHADOW OPACITY -->
					<tr valign="top">
					<th scope="row">Header background shadow opacity:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_header_background_shadow_opacity" id="materialize_header_background_shadow_opacity" value="<?php echo get_option('drawer_materialize_header_background_shadow_opacity'); ?>"/>
					<br> Enter custom header background shadow opacity (if header background and shadow enabled). From 0-1 (example: 0.75) If left empty, defaults to 0.4
					</td>
					</tr>
					<!-- END HEADER BACKGROUND SHADOW OPACITY -->
                    
					<!-- BEGIN SHOW HEADER + SEARCH ABOVE FULL-SCREEN MENU -->
					<tr valign="top">
					<th scope="row">Show header and search when menu opened?:</th>
					<td>
					<label><input type="checkbox" name="materialize_show_header_search_above" id="materialize_show_header_search_above" <?php echo get_option('drawer_materialize_show_header_search_above'); ?> /> Show header (if activated above), logo and search button when menu is open. If left unchecked, these elements will appear behind full-screen menu.</label><br>
					</td>
					</tr>
					<!-- END SHOW HEADER + SEARCH ABOVE FULL-SCREEN MENU -->
					
					<!-- BEGIN HEADER BACKGROUND OPACITY -->
					<tr valign="top">
					<th scope="row">Header background opacity:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_header_background_opacity" id="materialize_header_background_opacity" value="<?php echo get_option('drawer_materialize_header_background_opacity'); ?>"/>
					<br> Enter custom header background opacity (if header background enabled). From 0-1 (example: 0.5) If left empty, defaults to 1
					</td>
					</tr>
					<!-- END HEADER BACKGROUND OPACITY -->
					
					<!-- BEGIN PUSH DOWN SITE -->
					<tr valign="top">
					<th scope="row">Push down site?:</th>
					<td>
					<label><input type="checkbox" name="materialize_site_top" id="materialize_site_top" <?php echo get_option('drawer_materialize_site_top'); ?> /> Push down your site by height of Materialize menu.
					<br>If unchecked, the Materialize menu button, logo and header background will overlap your theme.</label><br>
					</td>
					</tr>
					<!-- END PUSH DOWN SITE -->
				</table>
				<!-- END POSITIONING OPTIONS -->
				
				<br><hr><br>
				
				<!-- BEGIN HEADING -->
				<div id="heading"></div>
				<br>
				<br>
				<h2>Heading</h2>
				<table class="form-table">
					<!-- BEGIN TOP DISTANCE -->
					<tr valign="top">
					<th scope="row">Top distance:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_content_top_distance" id="materialize_content_top_distance" value="<?php echo get_option('drawer_materialize_content_top_distance'); ?>"/> px. Enter menu contents' custom top distance. If left empty, defaults to 90px
					</td>
					</tr>
					<!-- END TOP DISTANCE -->
					
					<!-- BEGIN HEADING -->
					<tr valign="top">
					<th scope="row">Heading text:</th>
					<td>
					<input style="width:100%;height:35px;" type="text" name="materialize_heading" id="materialize_heading" value="<?php echo stripslashes(get_option('drawer_materialize_heading')); ?>"/>
					</td>
					</tr>
					<!-- END HEADING -->
					
					<!-- BEGIN HEADING LINK -->
					<tr valign="top">
					<th scope="row">Heading link:</th>
					<td>
					<input style="width:100%;height:35px;" type="text" name="materialize_heading_link" id="materialize_heading_link" value="<?php echo stripslashes(get_option('drawer_materialize_heading_link')); ?>"/>
					</td>
					</tr>
					<!-- END HEADING LINK -->

					<!-- BEGIN HEADING FONT SIZE -->
					<tr valign="top">
					<th scope="row">Heading font size:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_heading_font_size" id="materialize_heading_font_size" value="<?php echo get_option('drawer_materialize_heading_font_size'); ?>"/> px. Enter custom font size for heading. If left empty, defaults to 14px
					</td>
					</tr>
					<!-- END HEADING FONT SIZE -->
					
					<!-- BEGIN HEADING LETTER SPACING -->
					<tr valign="top">
					<th scope="row">Heading letter spacing:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_heading_letter_spacing" id="materialize_heading_letter_spacing" value="<?php echo get_option('drawer_materialize_heading_letter_spacing'); ?>"/> px. Enter custom letter spacing for heading. If left empty, defaults to 0px
					</td>
					</tr>
					<!-- END HEADING LETTER SPACING -->
					
					<!-- BEGIN HEADING LINE HEIGHT -->
					<tr valign="top">
					<th scope="row">Heading line height:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_heading_line_height" id="materialize_heading_line_height" value="<?php echo get_option('drawer_materialize_heading_line_height'); ?>"/> px. Enter custom line height for heading. Useful if your heading text spans multiple lines.
					</td>
					</tr>
					<!-- END HEADING LINE HEIGHT -->
					
					<!-- BEGIN HEADING FONT -->
					<tr valign="top">
					<th scope="row">Heading font:</th>
					<td>
					<?php $materialize_heading_font = get_option('drawer_materialize_heading_font'); ?>
					<label><input value="materializeheadingmontserrat" type="radio" name="materialize_heading_font" <?php if ($materialize_heading_font=='materializeheadingmontserrat') { echo 'checked'; } ?>> Montserrat (regular)</label><br>
					<label><input value="materializeheadingmontserratbold" type="radio" name="materialize_heading_font" <?php if ($materialize_heading_font=='materializeheadingmontserratbold') { echo 'checked'; } ?>> Montserrat (bold)</label><br>
					<label><input value="materializeheadingroboto" type="radio" name="materialize_heading_font" <?php if ($materialize_heading_font=='materializeheadingroboto') { echo 'checked'; } ?>> Roboto</label><br>
					<label><input value="materializeheadingrobotocondensedregular" type="radio" name="materialize_heading_font" <?php if ($materialize_heading_font=='materializeheadingrobotocondensedregular') { echo 'checked'; } ?>> Roboto Condensed (regular)</label><br>
					<label><input value="materializeheadingrobotocondensedbold" type="radio" name="materialize_heading_font" <?php if ($materialize_heading_font=='materializeheadingrobotocondensedbold') { echo 'checked'; } ?>> Roboto Condensed (bold)</label><br>
					<label><input value="materializeheadingbreeserif" type="radio" name="materialize_heading_font" <?php if ($materialize_heading_font=='materializeheadingbreeserif') { echo 'checked'; } ?>> Bree Serif</label><br>
					<label><input value="materializeheadingdroidserif" type="radio" name="materialize_heading_font" <?php if ($materialize_heading_font=='materializeheadingdroidserif') { echo 'checked'; } ?>> Droid Serif</label><br>
					<br><strong>Advanced font feature:</strong><br>
					<input style="width:100%;height:35px;" type="text" name="materialize_heading_theme_font" id="materialize_heading_theme_font" value="<?php echo stripslashes(get_option('drawer_materialize_heading_theme_font')); ?>"/> If you know the name of and would like to use one of your theme's fonts, enter it in the textfield above as it appears in the theme's stylesheet (font selection will be automatically overriden)
					</td>
					</tr>
					<!-- END HEADING FONT -->
				</table>
				<!-- END HEADING -->
				
				<br><hr><br>
				
				<table class="form-table">
					<!-- BEGIN DISTANCE BETWEEN HEADING/SUBHEADING -->
					<tr valign="top">
					<th scope="row">Distance between heading and subheading:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_heading_subheading_distance" id="materialize_heading_subheading_distance" value="<?php echo get_option('drawer_materialize_heading_subheading_distance'); ?>"/> px. Enter custom spacing for heading/subheading.
					</td>
					</tr>
					<!-- END DISTANCE BETWEEN HEADING/SUBHEADING -->
				</table>
				
				<br><hr><br>
				
				<!-- BEGIN SUBHEADING -->
				<div id="subheading"></div>
				<br>
				<br>
				<h2>Subheading</h2>
				<table class="form-table">
					<!-- BEGIN SUBHEADING -->
					<tr valign="top">
					<th scope="row">Subheading text:</th>
					<td>
					<input style="width:100%;" type="text" name="materialize_subheading" id="materialize_subheading" value="<?php echo stripslashes(get_option('drawer_materialize_subheading')); ?>"/>
					</td>
					</tr>
					<!-- END SUBHEADING -->
					
					<!-- BEGIN SUBHEADING LINK -->
					<tr valign="top">
					<th scope="row">Subheading link:</th>
					<td>
					<input style="width:100%;" type="text" name="materialize_subheading_link" id="materialize_subheading_link" value="<?php echo stripslashes(get_option('drawer_materialize_subheading_link')); ?>"/>
					</td>
					</tr>
					<!-- END SUBHEADING LINK -->

					<!-- BEGIN SUBHEADING FONT SIZE -->
					<tr valign="top">
					<th scope="row">Subheading font size:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_subheading_font_size" id="materialize_subheading_font_size" value="<?php echo get_option('drawer_materialize_subheading_font_size'); ?>"/> px. Enter custom font size for subheading. If left empty, defaults to 10px
					</td>
					</tr>
					<!-- END SUBHEADING FONT SIZE -->
					
					<!-- BEGIN SUBHEADING LETTER SPACING -->
					<tr valign="top">
					<th scope="row">Subheading letter spacing:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_subheading_letter_spacing" id="materialize_subheading_letter_spacing" value="<?php echo get_option('drawer_materialize_subheading_letter_spacing'); ?>"/> px. Enter custom distance between heading and subheading. If left empty, defaults to 0px
					</td>
					</tr>
					<!-- END SUBHEADING LETTER SPACING -->
					
					<!-- BEGIN SUBHEADING LINE HEIGHT -->
					<tr valign="top">
					<th scope="row">Subheading line height:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_subheading_line_height" id="materialize_subheading_line_height" value="<?php echo get_option('drawer_materialize_subheading_line_height'); ?>"/> px. Enter custom line height for heading. Useful if your subheading text spans multiple lines.
					</td>
					</tr>
					<!-- END SUBHEADING LINE HEIGHT -->
					
					<!-- BEGIN HEADING FONT -->
					<tr valign="top">
					<th scope="row">Subheading font:</th>
					<td>
					<?php $materialize_subheading_font = get_option('drawer_materialize_subheading_font'); ?>
					<label><input value="materializesubheadingmontserrat" type="radio" name="materialize_subheading_font" <?php if ($materialize_subheading_font=='materializesubheadingmontserrat') { echo 'checked'; } ?>> Montserrat (regular)</label><br>
					<label><input value="materializesubheadingmontserratbold" type="radio" name="materialize_subheading_font" <?php if ($materialize_subheading_font=='materializesubheadingmontserratbold') { echo 'checked'; } ?>> Montserrat (bold)</label><br>
					<label><input value="materializesubheadingroboto" type="radio" name="materialize_subheading_font" <?php if ($materialize_subheading_font=='materializesubheadingroboto') { echo 'checked'; } ?>> Roboto</label><br>
					<label><input value="materializesubheadingrobotocondensedregular" type="radio" name="materialize_subheading_font" <?php if ($materialize_subheading_font=='materializesubheadingrobotocondensedregular') { echo 'checked'; } ?>> Roboto Condensed (regular)</label><br>
					<label><input value="materializesubheadingrobotocondensedbold" type="radio" name="materialize_subheading_font" <?php if ($materialize_subheading_font=='materializesubheadingrobotocondensedbold') { echo 'checked'; } ?>> Roboto Condensed (bold)</label><br>
					<label><input value="materializesubheadingbreeserif" type="radio" name="materialize_subheading_font" <?php if ($materialize_subheading_font=='materializesubheadingbreeserif') { echo 'checked'; } ?>> Bree Serif</label><br>
					<label><input value="materializesubheadingdroidserif" type="radio" name="materialize_subheading_font" <?php if ($materialize_subheading_font=='materializesubheadingdroidserif') { echo 'checked'; } ?>> Droid Serif</label><br>
					<br><strong>Advanced font feature:</strong><br>
					<input style="width:100%;height:35px;" type="text" name="materialize_subheading_theme_font" id="materialize_subheading_theme_font" value="<?php echo stripslashes(get_option('drawer_materialize_subheading_theme_font')); ?>"/> If you know the name of and would like to use one of your theme's fonts, enter it in the textfield above as it appears in the theme's stylesheet (font selection will be automatically overriden)
					</td>
					</tr>
					<!-- END HEADING FONT -->
				</table>
				<!-- END SUBHEADING -->
				
				<br><hr><br>

				<!-- BEGIN IMAGE -->
				<div id="image"></div>
				<br>
				<br>
				<h2>Image</h2>
				<table class="form-table">
					<!-- BEGIN IMAGE -->
					<tr valign="top">
					<th scope="row">Image URL:</th>
					<td>
					<input style="width:100%;" type="text" name="materialize_image" id="materialize_image" value="<?php echo get_option('drawer_materialize_image'); ?>"/>
					<br> To display an image between the headings and the menu, enter its URL in the field above.
					</td>
					</tr>
					<!-- END IMAGE -->
					
					<!-- BEGIN IMAGE LINK -->
					<tr valign="top">
					<th scope="row">Image link:</th>
					<td>
					<input style="width:100%;height:35px;" type="text" name="materialize_image_link" id="materialize_image_link" value="<?php echo stripslashes(get_option('drawer_materialize_image_link')); ?>"/>
					<label><input type="checkbox" name="materialize_image_link_blank" id="materialize_image_link_blank" <?php echo get_option('drawer_materialize_image_link_blank'); ?> /> Open in new window/tab</label>
					</td>
					</tr>
					<!-- END IMAGE LINK -->
				</table>
				<!-- END IMAGE -->
				
				<br><hr><br>
				
				<!-- BEGIN MENU -->
				<div id="menu-submenu"></div>
				<br>
				<br>
				<h2>Menu & submenu</h2>
				<table class="form-table">
					<!-- BEGIN MAIN MENU OPEN ON FRONT PAGE -->
					<tr valign="top">
					<th scope="row">Open on front page?:</th>
					<td><label><input type="checkbox" name="materialize_main_menu_open" id="materialize_main_menu_open" <?php echo get_option('drawer_materialize_main_menu_open'); ?> /> Make menu open on front page.</label></td>
					</tr>
					<!-- END MAIN MENU OPEN ON FRONT PAGE -->
					
					<!-- BEGIN ALTERNATE SUB-MENU ACTIVATION -->
					<tr valign="top">
					<th scope="row">Alternate sub-menu activation:</th>
					<td><label><input type="checkbox" name="materialize_sub_menu_activation" id="materialize_sub_menu_activation" <?php echo get_option('drawer_materialize_sub_menu_activation'); ?> /> Make entire top-level menu item open the sub-menu. If left unchecked, only the arrow icon opens sub-menu.</label></td>
					</tr>
					<!-- BEGIN ALTERNATE SUB-MENU ACTIVATION -->
					
					<!-- BEGIN CLOSE ON CLICK -->
					<tr valign="top">
					<th scope="row">Close menu after click?:</th>
					<td>
					<label><input type="checkbox" name="materialize_close_on_click" id="materialize_close_on_click" <?php echo get_option('drawer_materialize_close_on_click'); ?> /> Close menu when menu item is clicked/tapped (useful on one-page websites where menu links lead to anchors, not new pages).</label>
					</td>
					</tr>
					<!-- END CLOSE ON CLICK -->

					<!-- BEGIN MENU FONT SIZE -->
					<tr valign="top">
					<th scope="row">Menu font size:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_menu_font_size" id="materialize_menu_font_size" value="<?php echo get_option('drawer_materialize_menu_font_size'); ?>"/> px. Enter custom font size for menu items. If left empty, defaults to 11px
					</td>
					</tr>
					<!-- END MENU FONT SIZE -->
					
					<!-- BEGIN SUBMENU FONT SIZE -->
					<tr valign="top">
					<th scope="row">Sub-menu font size:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_submenu_font_size" id="materialize_submenu_font_size" value="<?php echo get_option('drawer_materialize_submenu_font_size'); ?>"/> px. Enter custom font size for sub-menu items. If left empty, defaults to 11px
					</td>
					</tr>
					<!-- END SUBMENU FONT SIZE -->
					
					<!-- BEGIN MENU LINE HEIGHT -->
					<tr valign="top">
					<th scope="row">Menu items vertical spacing:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_menu_spacing" id="materialize_menu_spacing" value="<?php echo get_option('drawer_materialize_menu_spacing'); ?>"/> px. Enter custom value to increase spacing between between menu items. Example: 5
					</td>
					</tr>
					<!-- END MENU LINE HEIGHT -->
					
					<!-- BEGIN SUBMENU LINE HEIGHT -->
					<tr valign="top">
					<th scope="row">Sub-menu items vertical spacing:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_submenu_spacing" id="materialize_submenu_spacing" value="<?php echo get_option('drawer_materialize_submenu_spacing'); ?>"/> px. Enter custom value to increase spacing between between sub-menu items. Example: 5
					</td>
					</tr>
					<!-- END SUBMENU LINE HEIGHT -->
					
					<!-- BEGIN MENU LETTER SPACING -->
					<tr valign="top">
					<th scope="row">Letter spacing:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_menu_letter_spacing" id="materialize_menu_letter_spacing" value="<?php echo get_option('drawer_materialize_menu_letter_spacing'); ?>"/> px. Enter custom letter spacing for menus. If left empty, defaults to 0px
					</td>
					</tr>
					<!-- END MENU LETTER SPACING -->
					
					<!-- BEGIN MENU FONT -->
					<tr valign="top">
					<th scope="row">Menu font:</th>
					<td>
					<?php $materialize_menu_font = get_option('drawer_materialize_menu_font'); ?>
					<label><input value="materializemenumontserrat" type="radio" name="materialize_menu_font" <?php if ($materialize_menu_font=='materializemenumontserrat') { echo 'checked'; } ?>> Montserrat (regular)</label><br>
					<label><input value="materializemenumontserratbold" type="radio" name="materialize_menu_font" <?php if ($materialize_menu_font=='materializemenumontserratbold') { echo 'checked'; } ?>> Montserrat (bold)</label><br>
					<label><input value="materializemenuroboto" type="radio" name="materialize_menu_font" <?php if ($materialize_menu_font=='materializemenuroboto') { echo 'checked'; } ?>> Roboto</label><br>
					<label><input value="materializemenurobotocondensedregular" type="radio" name="materialize_menu_font" <?php if ($materialize_menu_font=='materializemenurobotocondensedregular') { echo 'checked'; } ?>> Roboto Condensed (regular)</label><br>
					<label><input value="materializemenurobotocondensedbold" type="radio" name="materialize_menu_font" <?php if ($materialize_menu_font=='materializemenurobotocondensedbold') { echo 'checked'; } ?>> Roboto Condensed (bold)</label><br>
					<label><input value="materializemenubreeserif" type="radio" name="materialize_menu_font" <?php if ($materialize_menu_font=='materializemenubreeserif') { echo 'checked'; } ?>> Bree Serif</label><br>
					<label><input value="materializemenudroidserif" type="radio" name="materialize_menu_font" <?php if ($materialize_menu_font=='materializemenudroidserif') { echo 'checked'; } ?>> Droid Serif</label><br>
					<br><strong>Advanced font feature:</strong><br>
					<input style="width:100%;height:35px;" type="text" name="materialize_menu_theme_font" id="materialize_menu_theme_font" value="<?php echo stripslashes(get_option('drawer_materialize_menu_theme_font')); ?>"/> If you know the name of and would like to use one of your theme's fonts, enter it in the textfield above as it appears in the theme's stylesheet (font selection will be automatically overriden)
					</td>
					</tr>
					<!-- END MENU FONT -->
					
					<!-- BEGIN HIDE SUBMENU ARROW DIVIDER -->
					<tr valign="top">
					<th scope="row">Hide divider?:</th>
					<td>
					<label><input type="checkbox" name="materialize_hide_submenu_divider" id="materialize_hide_submenu_divider" <?php echo get_option('drawer_materialize_hide_submenu_divider'); ?> /> Hide the sub-menu indication arrow divider.</label>
					</td>
					</tr>
					<!-- END HIDE SUBMENU ARROW DIVIDER -->
					
					<!-- BEGIN MENU ARROW ALIGNMENT -->
					<tr valign="top">
					<th scope="row">Sub-menu indication arrow position (for main-level items):</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_menu_arrow_alignment" id="materialize_menu_arrow_alignment" value="<?php echo get_option('drawer_materialize_menu_arrow_alignment'); ?>"/> px. At certain settings, the arrow next to a top-level menu item may need to be vertically re-positioned. If you find the arrow to be misaligned, enter a number here to nudge it into position. Example: 5
					</td>
					</tr>
					<!-- END MENU ARROW ALIGNMENT -->
					
					<!-- BEGIN SUBMENU ARROW ALIGNMENT -->
					<tr valign="top">
					<th scope="row">Sub-menu indication arrow position (for sub-menu items):</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_submenu_arrow_alignment" id="materialize_submenu_arrow_alignment" value="<?php echo get_option('drawer_materialize_submenu_arrow_alignment'); ?>"/> px. At certain settings, the arrow next to a sub-level menu item may need to be vertically re-positioned. If you find the arrow to be misaligned, enter a number here to nudge it into position. Example: 5
					</td>
					</tr>
					<!-- END SUBMENU ARROW ALIGNMENT -->
				</table>
				<!-- END MENU -->

				<br><hr><br>
				
				<!-- BEGIN MENU DESCRIPTION -->
				<div id="menu-description"></div>
				<br>
				<br>
				<h2>Menu description</h2>
				<table class="form-table">
					<!-- BEGIN MENU DESCRIPTION FONT SIZE -->
					<tr valign="top">
					<th scope="row">Font size:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_menu_description_font_size" id="materialize_menu_description_font_size" value="<?php echo get_option('drawer_materialize_menu_description_font_size'); ?>"/> px. Enter custom font size for menu descriptions. If left empty, defaults to 11px
					</td>
					</tr>
					<!-- END MENU DESCRIPTION FONT SIZE -->
					
					<!-- BEGIN MENU ITEM DESCRIPTION PADDING -->
					<tr valign="top">
					<th scope="row">Menu item description padding:</th>
					<td>
					Top: <input style="width:45px;height:35px;" type="text" name="materialize_menu_description_top_padding" id="materialize_menu_description_top_padding" value="<?php echo get_option('drawer_materialize_menu_description_top_padding'); ?>"/> px.
					Bottom: <input style="width:45px;height:35px;" type="text" name="materialize_menu_description_bottom_padding" id="materialize_menu_description_bottom_padding" value="<?php echo get_option('drawer_materialize_menu_description_bottom_padding'); ?>"/> px.
					<br>Enter custom values to increase spacing around menu item description.
					</td>
					</tr>
					<!-- END MENU ITEM DESCRIPTION PADDING -->
					
					<!-- BEGIN MENU ITEM DESCRIPTION LINE HEIGHT -->
					<tr valign="top">
					<th scope="row">Menu item description line height:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_menu_description_line_height" id="materialize_menu_description_line_height" value="<?php echo get_option('drawer_materialize_menu_description_line_height'); ?>"/> px. Enter custom value to increase description distance from menu item. If left empty, defaults to 11px
					</td>
					</tr>
					<!-- END MENU ITEM DESCRIPTION LINE HEIGHT -->
					
					<!-- BEGIN MENU ITEM DESCRIPTION FONT -->
					<tr valign="top">
					<th scope="row">Menu item description font:</th>
					<td>
					<?php $materialize_menu_description_font = get_option('drawer_materialize_menu_description_font'); ?>
					<label><input value="materializemenudescriptionmontserrat" type="radio" name="materialize_menu_description_font" <?php if ($materialize_menu_description_font=='materializemenudescriptionmontserrat') { echo 'checked'; } ?>> Montserrat (regular)</label><br>
					<label><input value="materializemenudescriptionmontserratbold" type="radio" name="materialize_menu_description_font" <?php if ($materialize_menu_description_font=='materializemenudescriptionmontserratbold') { echo 'checked'; } ?>> Montserrat (bold)</label><br>
					<label><input value="materializemenudescriptionroboto" type="radio" name="materialize_menu_description_font" <?php if ($materialize_menu_description_font=='materializemenudescriptionroboto') { echo 'checked'; } ?>> Roboto</label><br>
					<label><input value="materializemenudescriptionrobotocondensedregular" type="radio" name="materialize_menu_description_font" <?php if ($materialize_menu_description_font=='materializemenudescriptionrobotocondensedregular') { echo 'checked'; } ?>> Roboto Condensed (regular)</label><br>
					<label><input value="materializemenudescriptionrobotocondensedbold" type="radio" name="materialize_menu_description_font" <?php if ($materialize_menu_description_font=='materializemenudescriptionrobotocondensedbold') { echo 'checked'; } ?>> Roboto Condensed (bold)</label><br>
					<label><input value="materializemenudescriptionbreeserif" type="radio" name="materialize_menu_description_font" <?php if ($materialize_menu_description_font=='materializemenudescriptionbreeserif') { echo 'checked'; } ?>> Bree Serif</label><br>
					<label><input value="materializemenudescriptiondroidserif" type="radio" name="materialize_menu_description_font" <?php if ($materialize_menu_description_font=='materializemenudescriptiondroidserif') { echo 'checked'; } ?>> Droid Serif</label><br>
					</td>
					</tr>
					<!-- END MENU ITEM DESCRIPTION FONT -->
				</table>
				<!-- END MENU DESCRIPTION -->
				
				<br><hr><br>
				
				<!-- BEGIN MENU ICONS -->
				<div id="menu-icons"></div>
				<br>
				<br>
				<h2>Menu icons</h2>
				<table class="form-table">
					<!-- BEGIN ICON SIZE -->
					<tr valign="top">
					<th scope="row">Icon size (for main-level items):</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_menu_icon_size" id="materialize_menu_icon_size" value="<?php echo get_option('drawer_materialize_menu_icon_size'); ?>"/> px. Enter custom icon size for menu items. If left empty, defaults to menu item size (11px if no custom size set)
					</td>
					</tr>
					<!-- END ICON SIZE -->
					
					<!-- BEGIN ICON SIZE (SUBMENU) -->
					<tr valign="top">
					<th scope="row">Icon size (for sub-menu items):</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_submenu_icon_size" id="materialize_submenu_icon_size" value="<?php echo get_option('drawer_materialize_submenu_icon_size'); ?>"/> px. Enter custom icon size for sub-menu items. If left empty, defaults to menu item size (11px if no custom size set)
					</td>
					</tr>
					<!-- END ICON SIZE (SUBMENU) -->
					
					<!-- BEGIN ICON ALIGNMENT -->
					<tr valign="top">
					<th scope="row">Icon position (for main-level items):</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_menu_icon_alignment" id="materialize_menu_icon_alignment" value="<?php echo get_option('drawer_materialize_menu_icon_alignment'); ?>"/> px. If you have set custom icon and text sizes that are radically different from one another, the icon next to a top-level menu item may need to be vertically re-positioned. If you find the icon to be misaligned, enter a number here to nudge it into position. Example: 5
					</td>
					</tr>
					<!-- END ICON ALIGNMENT -->
					
					<!-- BEGIN ICON ALIGNMENT (SUBMENU) -->
					<tr valign="top">
					<th scope="row">Sub-menu icon position (for sub-menu items):</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_submenu_icon_alignment" id="materialize_submenu_icon_alignment" value="<?php echo get_option('drawer_materialize_submenu_icon_alignment'); ?>"/> px. If you have set custom icon and text sizes that are radically different from one another, the icon next to a sub-level menu item may need to be vertically re-positioned. If you find the icon to be misaligned, enter a number here to nudge it into position. Example: 5
					</td>
					</tr>
					<!-- END ICON ALIGNMENT (SUBMENU) -->
					
					<!-- BEGIN DON'T LOAD FONTAWESOME -->
					<tr valign="top">
					<th scope="row">Don't load FontAwesome:</th>
					<td>
					<label><input type="checkbox" name="materialize_fa_no_load" id="materialize_fa_no_load" <?php echo get_option('drawer_materialize_fa_no_load'); ?> /> Don't load the FontAwesome icon set.</label><br>
					(useful if you don't use any icons with your menu items, or if your theme already loads FontAwesome).
					</td>
					</tr>
					<!-- END DON'T LOAD FONTAWESOME -->
				</table>
				<!-- END MENU ICONS -->
				
				<br><hr><br>

				<!-- BEGIN WIDGETS -->
				<div id="widgets"></div>
				<br>
				<br>
				<h2>Widgets</h2>
				<table class="form-table">
					<!-- BEGIN WIDGET TOP DISTANCE -->
					<tr valign="top">
					<th scope="row">Top distance:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_widget_top_distance" id="materialize_widget_top_distance" value="<?php echo get_option('drawer_materialize_widget_top_distance'); ?>"/> px. Enter custom distance from top. Useful if you'd like to have more space between the menu and widgets. If left empty, defaults to 30px.
					</td>
					</tr>
					<!-- END WIDGET TOP DISTANCE -->
					
					<!-- BEGIN WIDGET TITLE FONT SIZE -->
					<tr valign="top">
					<th scope="row">Widget title font size:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_widget_title_font_size" id="materialize_widget_title_font_size" value="<?php echo get_option('drawer_materialize_widget_title_font_size'); ?>"/> px. Enter custom font size for widget titles. If left empty, defaults to 14px
					</td>
					</tr>
					<!-- END WIDGET TITLE FONT SIZE -->
					
					<!-- BEGIN WIDGET TITLE LETTER SPACING -->
					<tr valign="top">
					<th scope="row">Widget title letter spacing:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_widget_title_letter_spacing" id="materialize_widget_title_letter_spacing" value="<?php echo get_option('drawer_materialize_widget_title_letter_spacing'); ?>"/> px. Enter custom letter spacing for widget titles. If left empty, defaults to 0px
					</td>
					</tr>
					<!-- END WIDGET TITLE LETTER SPACING -->
					
					<!-- BEGIN WIDGET TITLE LINE HEIGHT -->
					<tr valign="top">
					<th scope="row">Widget title line height:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_widget_title_line_height" id="materialize_widget_title_line_height" value="<?php echo get_option('drawer_materialize_widget_title_line_height'); ?>"/> px. Enter custom line height for widget titles. Useful if your text in for example the text widget spans multiple lines.
					</td>
					</tr>
					<!-- END WIDGET TITLE LINE HEIGHT -->
					
					<!-- BEGIN WIDGET TITLE FONT -->
					<tr valign="top">
					<th scope="row">Widget title font:</th>
					<td>
					<?php $materialize_widget_font = get_option('drawer_materialize_widget_title_font'); ?>
					<label><input value="materializewidgettitlemontserrat" type="radio" name="materialize_widget_title_font" <?php if ($materialize_widget_font=='materializewidgettitlemontserrat') { echo 'checked'; } ?>> Montserrat (regular)</label><br>
					<label><input value="materializewidgettitlemontserratbold" type="radio" name="materialize_widget_title_font" <?php if ($materialize_widget_font=='materializewidgettitlemontserratbold') { echo 'checked'; } ?>> Montserrat (bold)</label><br>
					<label><input value="materializewidgettitleroboto" type="radio" name="materialize_widget_title_font" <?php if ($materialize_widget_font=='materializewidgettitleroboto') { echo 'checked'; } ?>> Roboto</label><br>
					<label><input value="materializewidgettitlerobotocondensedregular" type="radio" name="materialize_widget_title_font" <?php if ($materialize_widget_font=='materializewidgettitlerobotocondensedregular') { echo 'checked'; } ?>> Roboto Condensed (regular)</label><br>
					<label><input value="materializewidgettitlerobotocondensedbold" type="radio" name="materialize_widget_title_font" <?php if ($materialize_widget_font=='materializewidgettitlerobotocondensedbold') { echo 'checked'; } ?>> Roboto Condensed (bold)</label><br>
					<label><input value="materializewidgettitlebreeserif" type="radio" name="materialize_widget_title_font" <?php if ($materialize_widget_font=='materializewidgettitlebreeserif') { echo 'checked'; } ?>> Bree Serif</label><br>
					<label><input value="materializewidgettitledroidserif" type="radio" name="materialize_widget_title_font" <?php if ($materialize_widget_font=='materializewidgettitledroidserif') { echo 'checked'; } ?>> Droid Serif</label><br>
					<br><strong>Advanced font feature:</strong><br>
					<input style="width:100%;height:35px;" type="text" name="materialize_widget_title_theme_font" id="materialize_widget_title_theme_font" value="<?php echo stripslashes(get_option('drawer_materialize_widget_title_theme_font')); ?>"/> If you know the name of and would like to use one of your theme's fonts, enter it in the textfield above as it appears in the theme's stylesheet (font selection will be automatically overriden)
					</td>
					</tr>
					<!-- END WIDGET TITLE FONT -->
					
					<!-- BEGIN WIDGET FONT SIZE -->
					<tr valign="top">
					<th scope="row">Widget font size:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_widget_font_size" id="materialize_widget_font_size" value="<?php echo get_option('drawer_materialize_widget_font_size'); ?>"/> px. Enter custom font size for widgets. If left empty, defaults to 14px
					</td>
					</tr>
					<!-- END WIDGET FONT SIZE -->
					
					<!-- BEGIN WIDGET LETTER SPACING -->
					<tr valign="top">
					<th scope="row">Widget letter spacing:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_widget_letter_spacing" id="materialize_widget_letter_spacing" value="<?php echo get_option('drawer_materialize_widget_letter_spacing'); ?>"/> px. Enter custom letter spacing for widgets. If left empty, defaults to 0px
					</td>
					</tr>
					<!-- END WIDGET LETTER SPACING -->
					
					<!-- BEGIN WIDGET LINE HEIGHT -->
					<tr valign="top">
					<th scope="row">Widget line height:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_widget_line_height" id="materialize_widget_line_height" value="<?php echo get_option('drawer_materialize_widget_line_height'); ?>"/> px. Enter custom line height for widgets. Useful if your text in for example the text widget spans multiple lines.
					</td>
					</tr>
					<!-- END WIDGET LINE HEIGHT -->
					
					<!-- BEGIN WIDGET FONT -->
					<tr valign="top">
					<th scope="row">Widget font:</th>
					<td>
					<?php $materialize_widget_font = get_option('drawer_materialize_widget_font'); ?>
					<label><input value="materializewidgetmontserrat" type="radio" name="materialize_widget_font" <?php if ($materialize_widget_font=='materializewidgetmontserrat') { echo 'checked'; } ?>> Montserrat (regular)</label><br>
					<label><input value="materializewidgetmontserratbold" type="radio" name="materialize_widget_font" <?php if ($materialize_widget_font=='materializewidgetmontserratbold') { echo 'checked'; } ?>> Montserrat (bold)</label><br>
					<label><input value="materializewidgetroboto" type="radio" name="materialize_widget_font" <?php if ($materialize_widget_font=='materializewidgetroboto') { echo 'checked'; } ?>> Roboto</label><br>
					<label><input value="materializewidgetrobotocondensedregular" type="radio" name="materialize_widget_font" <?php if ($materialize_widget_font=='materializewidgetrobotocondensedregular') { echo 'checked'; } ?>> Roboto Condensed (regular)</label><br>
					<label><input value="materializewidgetrobotocondensedbold" type="radio" name="materialize_widget_font" <?php if ($materialize_widget_font=='materializewidgetrobotocondensedbold') { echo 'checked'; } ?>> Roboto Condensed (bold)</label><br>
					<label><input value="materializewidgetbreeserif" type="radio" name="materialize_widget_font" <?php if ($materialize_widget_font=='materializewidgetbreeserif') { echo 'checked'; } ?>> Bree Serif</label><br>
					<label><input value="materializewidgetdroidserif" type="radio" name="materialize_widget_font" <?php if ($materialize_widget_font=='materializewidgetdroidserif') { echo 'checked'; } ?>> Droid Serif</label><br>
					<br><strong>Advanced font feature:</strong><br>
					<input style="width:100%;height:35px;" type="text" name="materialize_widget_theme_font" id="materialize_widget_theme_font" value="<?php echo stripslashes(get_option('drawer_materialize_widget_theme_font')); ?>"/> If you know the name of and would like to use one of your theme's fonts, enter it in the textfield above as it appears in the theme's stylesheet (font selection will be automatically overriden)
					</td>
					</tr>
					<!-- END WIDGET FONT -->
				</table>
				<!-- END WIDGETS -->
				
				<br><hr><br>
				
				<!-- BEGIN BACKGROUND DETAILS -->
				<div id="background"></div>
				<br>
				<br>
				<h2>Background</h2>
				<table class="form-table">
					<!-- BEGIN BACKGROUND IMAGE -->
					<tr valign="top">
					<th scope="row">Image URL:</th>
					<td>
					<input style="width:100%;" type="text" name="materialize_background_image" id="materialize_background_image" value="<?php echo get_option('drawer_materialize_background_image'); ?>"/>
					<br> To use a background image, enter its URL in the field above.
					</td>
					</tr>
					<!-- END BACKGROUND IMAGE -->

					<!-- BEGIN BACKGROUND IMAGE HORIZONTAL POSITION -->
					<tr valign="top">
					<th scope="row">Background image horizontal position:</th>
					<td>
					<?php $materialize_background_horizontal_alignment = get_option('drawer_materialize_background_horizontal_alignment'); ?>
					<label><input value="materializebackgroundleft" type="radio" name="materialize_background_horizontal_alignment" <?php if ($materialize_background_horizontal_alignment=='materializebackgroundleft') { echo 'checked'; } ?>> Left</label><br>
					<label><input value="materializebackgroundcenter" type="radio" name="materialize_background_horizontal_alignment" <?php if ($materialize_background_horizontal_alignment=='materializebackgroundcenter') { echo 'checked'; } ?>> Center</label><br>
					<label><input value="materializebackgroundright" type="radio" name="materialize_background_horizontal_alignment" <?php if ($materialize_background_horizontal_alignment=='materializebackgroundright') { echo 'checked'; } ?>> Right</label><br>
					</td>
					</tr>
					<!-- END BACKGROUND IMAGE HORIZONTAL POSITION -->
					
					<!-- BEGIN BACKGROUND IMAGE VERTICAL POSITION -->
					<tr valign="top">
					<th scope="row">Background image vertical position::</th>
					<td>
					<?php $materialize_background_vertical_alignment = get_option('drawer_materialize_background_vertical_alignment'); ?>
					<label><input value="materializebackgroundtop" type="radio" name="materialize_background_vertical_alignment" <?php if ($materialize_background_vertical_alignment=='materializebackgroundtop') { echo 'checked'; } ?>> Top</label><br>
					<label><input value="materializebackgroundmiddle" type="radio" name="materialize_background_vertical_alignment" <?php if ($materialize_background_vertical_alignment=='materializebackgroundmiddle') { echo 'checked'; } ?>> Middle</label><br>
					<label><input value="materializebackgroundbottom" type="radio" name="materialize_background_vertical_alignment" <?php if ($materialize_background_vertical_alignment=='materializebackgroundbottom') { echo 'checked'; } ?>> Bottom</label><br>
					</td>
					</tr>
					<!-- END BACKGROUND IMAGE VERTICAL POSITION -->
					
					<!-- BEGIN BACKGOUND PATTERN -->
					<tr valign="top">
					<th scope="row">Pattern image:</th>
					<td>
					<label><input type="checkbox" name="materialize_image_pattern" id="materialize_image_pattern" <?php echo get_option('drawer_materialize_image_pattern'); ?> /> Tick this is if you wish the above image to be shown as a pattern.
					<br>If unchecked, image will be shown in full-size 'cover' style.</label><br>
					</td>
					</tr>
					<!-- END BACKGOUND PATTERN -->
					
					<!-- BEGIN BACKGROUND IMAGE OPACITY -->
					<tr valign="top">
					<th scope="row">Background image opacity:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_background_image_opacity" id="materialize_background_image_opacity" value="<?php echo get_option('drawer_materialize_background_image_opacity'); ?>"/>
					<br> Enter custom background image opacity. From 0-1 (example: 0.5) If left empty, defaults to 0.1
					</td>
					</tr>
					<!-- END BACKGROUND IMAGE OPACITY -->
					
					<!-- BEGIN BACKGROUND OPACITY -->
					<tr valign="top">
					<th scope="row">Background color opacity:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="materialize_background_color_opacity" id="materialize_background_color_opacity" value="<?php echo get_option('drawer_materialize_background_color_opacity'); ?>"/>
					<br> Enter custom background color opacity. From 0-1 (example: 0.95) If left empty, defaults to 1
					</td>
					</tr>
					<!-- END BACKGROUND OPACITY -->
				</table>
				<!-- END BACKGROUND DETAILS -->
				
				<br><hr><br>

				<!-- BEGIN HIDE BETWEEN RESOLUTIONS -->
				<div id="hide-at-certain-width-resolution"></div>
				<br>
				<br>
				<h2>Hide at certain width/resolution</h2>
				<table class="form-table">
					<tr valign="top">
					<th scope="row">Hide at certain width/resolution:</th>
					<td>
					Hide Materialize menu if browser width or screen resolution is between <input style="width:50px;" type="text" name="materialize_smaller_than" id="materialize_smaller_than" value="<?php echo get_option('drawer_materialize_smaller_than'); ?>"/> and <input style="width:50px;" type="text" name="materialize_larger_than" id="materialize_larger_than" value="<?php echo get_option('drawer_materialize_larger_than'); ?>"/> pixels (fill both fields).
					<br><strong>Example:</strong> if you'd like to show Materialize on desktop only, then enter the values as 0 and 500. If fields are empty, Materialize will be visible at all browser widths and resolutions.
					<br><br><strong>Advanced feature - hide theme menu:</strong><br>
					<input style="width:100%;height:35px;" type="text" name="materialize_hide_theme_menu" id="materialize_hide_theme_menu" value="<?php echo stripslashes(get_option('drawer_materialize_hide_theme_menu')); ?>"/> If you've set Materialize to show only at a certain resolution and know the class/ID of your theme menu and would like to hide it when Materialize is visible, enter the class/ID in this field (example: "#my-theme-menu"). Multiple classes/IDs can be entered (separate with comma as you would in a stylesheet). 
					</td>
					</tr>
				</table>
				<!-- END HIDE BETWEEN RESOLUTIONS -->

				<br><hr><br>

				<!-- BEGIN 'SAVE OPTIONS' BUTTON -->	
				<p><input type="submit" name="search" value="Save Options" class="button button-primary" /></p>
				<!-- BEGIN 'SAVE OPTIONS' BUTTON -->	

			</form>

		</div>
	<?php }
	function drawer_materialize_update() {

		/* horizontal alignment */
		if ( isset ($_POST['materialize_horizontal_alignment']) == 'true' ) {
		update_option('drawer_materialize_horizontal_alignment', $_POST['materialize_horizontal_alignment']); }
		/* vertical alignment */
		if ( isset ($_POST['materialize_vertical_alignment']) == 'true' ) {
		update_option('drawer_materialize_vertical_alignment', $_POST['materialize_vertical_alignment']); }
		
		/* menu button animation */
		if ( isset ($_POST['materialize_button_animation']) == 'true' ) {
		update_option('drawer_materialize_button_animation', $_POST['materialize_button_animation']); }
		/* menu button animation speed */
		update_option('drawer_materialize_menu_button_speed', $_POST['materialize_menu_button_speed']);
		/* menu animation */
		if ( isset ($_POST['materialize_menu_animation']) == 'true' ) {
		update_option('drawer_materialize_menu_animation', $_POST['materialize_menu_animation']); }
		
		/* menu button style */
		if ( isset ($_POST['materialize_menu_button_style']) == 'true' ) {
		update_option('drawer_materialize_menu_button_style', $_POST['materialize_menu_button_style']); }
		/* absolute/fixed positioning */
		if ( isset ($_POST['materialize_absolute_position'])=='on') { $display = 'checked'; } else { $display = ''; }
	    update_option('drawer_materialize_absolute_position', $display);
        /* logo/menu button/search button positioning */
		if ( isset ($_POST['materialize_heading_positioning']) == 'true' ) {
		update_option('drawer_materialize_heading_positioning', $_POST['materialize_heading_positioning']); }
		/* menu button opacity */
		update_option('drawer_materialize_menu_button_opacity', $_POST['materialize_menu_button_opacity']);
		/* hide logo */
		if ( isset ($_POST['materialize_hide_logo'])=='on') { $display = 'checked'; } else { $display = ''; }
	    update_option('drawer_materialize_hide_logo', $display);
		/* hide search */
		if ( isset ($_POST['materialize_hide_search'])=='on') { $display = 'checked'; } else { $display = ''; }
	    update_option('drawer_materialize_hide_search', $display);
		/* hide search button divider */
		if ( isset ($_POST['materialize_hide_search_divider'])=='on') { $display = 'checked'; } else { $display = ''; }
	    update_option('drawer_materialize_hide_search_divider', $display);
		/* search text */
		update_option('drawer_materialize_search_text', $_POST['materialize_search_text']);
		/* show header background */
		if ( isset ($_POST['materialize_show_header'])=='on') { $display = 'checked'; } else { $display = ''; }
	    update_option('drawer_materialize_show_header', $display);
        /* show header background shadow */
		if ( isset ($_POST['materialize_show_header_shadow'])=='on') { $display = 'checked'; } else { $display = ''; }
	    update_option('drawer_materialize_show_header_shadow', $display);
        /* header background shadow opacity */
		update_option('drawer_materialize_header_background_shadow_opacity', $_POST['materialize_header_background_shadow_opacity']);
		/* show header + search when menu open */
		if ( isset ($_POST['materialize_show_header_search_above'])=='on') { $display = 'checked'; } else { $display = ''; }
	    update_option('drawer_materialize_show_header_search_above', $display);
		/* header background opacity */
		update_option('drawer_materialize_header_background_opacity', $_POST['materialize_header_background_opacity']);
		/* push down site */
		if ( isset ($_POST['materialize_site_top'])=='on') { $display = 'checked'; } else { $display = ''; }
	    update_option('drawer_materialize_site_top', $display);
		
		/* menu content top distance */
		update_option('drawer_materialize_content_top_distance', $_POST['materialize_content_top_distance']);
		/* heading text */
		update_option('drawer_materialize_heading', $_POST['materialize_heading']);
		/* heading link */
		update_option('drawer_materialize_heading_link', $_POST['materialize_heading_link']);
		/* heading font size */
		update_option('drawer_materialize_heading_font_size', $_POST['materialize_heading_font_size']);
		/* heading letter spacing */
		update_option('drawer_materialize_heading_letter_spacing', $_POST['materialize_heading_letter_spacing']);
		/* heading line height */
		update_option('drawer_materialize_heading_line_height', $_POST['materialize_heading_line_height']);
		/* heading font */
		if ( isset ($_POST['materialize_heading_font']) == 'true' ) {
		update_option('drawer_materialize_heading_font', $_POST['materialize_heading_font']); }
		/* heading theme font */
		update_option('drawer_materialize_heading_theme_font', $_POST['materialize_heading_theme_font']);
		
		/* distance between heading/subheading */
		update_option('drawer_materialize_heading_subheading_distance', $_POST['materialize_heading_subheading_distance']);
		
		/* subheading text */
		update_option('drawer_materialize_subheading', $_POST['materialize_subheading']);
		/* subheading link */
		update_option('drawer_materialize_subheading_link', $_POST['materialize_subheading_link']);
		/* subheading font size */
		update_option('drawer_materialize_subheading_font_size', $_POST['materialize_subheading_font_size']);
		/* subheading letter spacing */
		update_option('drawer_materialize_subheading_letter_spacing', $_POST['materialize_subheading_letter_spacing']);
		/* subheading line height */
		update_option('drawer_materialize_subheading_line_height', $_POST['materialize_subheading_line_height']);
		/* subheading font */
		if ( isset ($_POST['materialize_subheading_font']) == 'true' ) {
		update_option('drawer_materialize_subheading_font', $_POST['materialize_subheading_font']); }
		/* subheading theme font */
		update_option('drawer_materialize_subheading_theme_font', $_POST['materialize_subheading_theme_font']);

		/* image */
		update_option('drawer_materialize_image', $_POST['materialize_image']);
		/* image link */
		update_option('drawer_materialize_image_link', $_POST['materialize_image_link']);
		/* open on front page */
		if ( isset ($_POST['materialize_image_link_blank'])=='on') { $display = 'checked'; } else { $display = ''; }
	    update_option('drawer_materialize_image_link_blank', $display);
		
		/* open on front page */
		if ( isset ($_POST['materialize_main_menu_open'])=='on') { $display = 'checked'; } else { $display = ''; }
	    update_option('drawer_materialize_main_menu_open', $display);
		/* alternate sub-menu activation */
		if ( isset ($_POST['materialize_sub_menu_activation'])=='on') { $display = 'checked'; } else { $display = ''; }
	    update_option('drawer_materialize_sub_menu_activation', $display);
		/* close on click */
		if ( isset ($_POST['materialize_close_on_click'])=='on') { $display = 'checked'; } else { $display = ''; }
	    update_option('drawer_materialize_close_on_click', $display);
		/* menu font size */
		update_option('drawer_materialize_menu_font_size', $_POST['materialize_menu_font_size']);
		/* sub-menu font size */
		update_option('drawer_materialize_submenu_font_size', $_POST['materialize_submenu_font_size']);
		/* menu vertical spacing */
		update_option('drawer_materialize_menu_spacing', $_POST['materialize_menu_spacing']);
		/* sub-menu vertical spacing */
		update_option('drawer_materialize_submenu_spacing', $_POST['materialize_submenu_spacing']);
		/* menu letter spacing */
		update_option('drawer_materialize_menu_letter_spacing', $_POST['materialize_menu_letter_spacing']);
		/* menu font */
		if ( isset ($_POST['materialize_menu_font']) == 'true' ) {
		update_option('drawer_materialize_menu_font', $_POST['materialize_menu_font']); }
		/* menu theme font */
		update_option('drawer_materialize_menu_theme_font', $_POST['materialize_menu_theme_font']);
		/* hide submenu divider */
		if ( isset ($_POST['materialize_hide_submenu_divider'])=='on') { $display = 'checked'; } else { $display = ''; }
	    update_option('drawer_materialize_hide_submenu_divider', $display);
		/* menu arrow alignment (top-level) */
		update_option('drawer_materialize_menu_arrow_alignment', $_POST['materialize_menu_arrow_alignment']);
		/* menu arrow alignment (sub-level) */
		update_option('drawer_materialize_submenu_arrow_alignment', $_POST['materialize_submenu_arrow_alignment']);

		/* menu description font size */
		update_option('drawer_materialize_menu_description_font_size', $_POST['materialize_menu_description_font_size']);
		/* menu description top padding */
		update_option('drawer_materialize_menu_description_top_padding', $_POST['materialize_menu_description_top_padding']);
		/* menu description bottom padding */
		update_option('drawer_materialize_menu_description_bottom_padding', $_POST['materialize_menu_description_bottom_padding']);
		/* menu description line height */
		update_option('drawer_materialize_menu_description_line_height', $_POST['materialize_menu_description_line_height']);
		/* menu description font */
		if ( isset ($_POST['materialize_menu_description_font']) == 'true' ) {
		update_option('drawer_materialize_menu_description_font', $_POST['materialize_menu_description_font']); }

		/* menu icon size */
		update_option('drawer_materialize_menu_icon_size', $_POST['materialize_menu_icon_size']);
		/* sub-menu icon size */
		update_option('drawer_materialize_submenu_icon_size', $_POST['materialize_submenu_icon_size']);
		/* menu icon alignment */
		update_option('drawer_materialize_menu_icon_alignment', $_POST['materialize_menu_icon_alignment']);
		/* sub-menu icon alignment */
		update_option('drawer_materialize_submenu_icon_alignment', $_POST['materialize_submenu_icon_alignment']);
		/* don't load FontAwesome */
		if ( isset ($_POST['materialize_fa_no_load'])=='on') { $display = 'checked'; } else { $display = ''; }
	    update_option('drawer_materialize_fa_no_load', $display);

		/* widget top distance */
		update_option('drawer_materialize_widget_top_distance', $_POST['materialize_widget_top_distance']);
		/* widget title font size */
		update_option('drawer_materialize_widget_title_font_size', $_POST['materialize_widget_title_font_size']);
		/* widget title letter spacing */
		update_option('drawer_materialize_widget_title_letter_spacing', $_POST['materialize_widget_title_letter_spacing']);
		/* widget title line height */
		update_option('drawer_materialize_widget_title_line_height', $_POST['materialize_widget_title_line_height']);
		/* widget title font */
		if ( isset ($_POST['materialize_widget_title_font']) == 'true' ) {
		update_option('drawer_materialize_widget_title_font', $_POST['materialize_widget_title_font']); }
		/* widget title theme font */
		update_option('drawer_materialize_widget_title_theme_font', $_POST['materialize_widget_title_theme_font']);
		/* widget font size */
		update_option('drawer_materialize_widget_font_size', $_POST['materialize_widget_font_size']);
		/* widget letter spacing */
		update_option('drawer_materialize_widget_letter_spacing', $_POST['materialize_widget_letter_spacing']);
		/* widget line height */
		update_option('drawer_materialize_widget_line_height', $_POST['materialize_widget_line_height']);
		/* widget font */
		if ( isset ($_POST['materialize_widget_font']) == 'true' ) {
		update_option('drawer_materialize_widget_font', $_POST['materialize_widget_font']); }
		/* widget theme font */
		update_option('drawer_materialize_widget_theme_font', $_POST['materialize_widget_theme_font']);

		/* background image */
		update_option('drawer_materialize_background_image', $_POST['materialize_background_image']);
		/* background image horizontal alignment */
		if ( isset ($_POST['materialize_background_horizontal_alignment']) == 'true' ) {
		update_option('drawer_materialize_background_horizontal_alignment', $_POST['materialize_background_horizontal_alignment']); }
		/* background image vertical alignment */
		if ( isset ($_POST['materialize_background_vertical_alignment']) == 'true' ) {
		update_option('drawer_materialize_background_vertical_alignment', $_POST['materialize_background_vertical_alignment']); }
		/* background pattern */
		if ( isset ($_POST['materialize_image_pattern'])=='on') { $display = 'checked'; } else { $display = ''; }
	    update_option('drawer_materialize_image_pattern', $display);
		/* background image opacity */
		update_option('drawer_materialize_background_image_opacity', $_POST['materialize_background_image_opacity']);
		/* background color opacity */
		update_option('drawer_materialize_background_color_opacity', $_POST['materialize_background_color_opacity']);
		
		/* larger than, lower than */
		update_option('drawer_materialize_larger_than', $_POST['materialize_larger_than']);
		update_option('drawer_materialize_smaller_than', $_POST['materialize_smaller_than']);
		/* hide theme menu */
		update_option('drawer_materialize_hide_theme_menu', $_POST['materialize_hide_theme_menu']);

	}
	add_action('admin_menu', 'drawer_materialize_admin_menu');
	?>
<?php


	//
	// Add menu to theme
	//
	
	function drawer_materialize_footer() {
	?>

		<!-- BEGIN MENU BUTTON -->
		<div class="materialize-menu-button-wrapper<?php if ( is_admin_bar_showing() ) { ?> wp-toolbar-active<?php } ?><?php if( get_option('drawer_materialize_absolute_position') ) { ?> materialize-absolute<?php } ?><?php if(get_option('drawer_materialize_heading_positioning') == "materializeheadingtwo") { ?> materialize-right<?php } else if(get_option('drawer_materialize_heading_positioning') == "materializeheadingfour") { ?> materialize-right<?php } ?><?php if( get_option('drawer_materialize_main_menu_open') && is_front_page() ) { ?> materialize-menu-active<?php } ?>">
			<?php if(get_option('drawer_materialize_menu_button_style') == "materializefourlinesalt") { ?>
				<div class="materialize-menu-button-alt">
					<div class="materialize-menu-button-alt-middle"></div>
				</div>
			<?php } else if(get_option('drawer_materialize_menu_button_style') == "materializethreelines") { ?>
				<div class="materialize-menu-button-three">
					<div class="materialize-menu-button-three-middle"></div>
				</div>
			<?php } else if(get_option('drawer_materialize_menu_button_style') == "materializethreelinesalt") { ?>
				<div class="materialize-menu-button-three-alt">
					<div class="materialize-menu-button-three-alt-middle"></div>
				</div>
			<?php } else if(get_option('drawer_materialize_menu_button_style') == "materializestatic") { ?>
				<div class="materialize-menu-button-static">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
					<path id="menu-icon" d="M462,163.5H50v-65h412V163.5z M462,223.5H50v65h412V223.5z M462,348.5H50v65h412V348.5z"/>
					</svg>
				</div>
			<?php } else { ?>
				<div class="materialize-menu-button">
					<div class="materialize-menu-button-middle"></div>
				</div>
			<?php } ?>
		</div>
		<!-- END MENU BUTTON -->

		<!-- BEGIN SEARCH BUTTON -->
		<?php if( get_option('drawer_materialize_hide_search') ) { ?>
		<?php } else { ?>
		<div class="materialize-search-button<?php if(get_option('drawer_materialize_heading_positioning') == "materializeheadingtwo") { ?>-right<?php } else if(get_option('drawer_materialize_heading_positioning') == "materializeheadingthree") { ?>-right materialize-search-button-right-two<?php } else if(get_option('drawer_materialize_heading_positioning') == "materializeheadingfour") { ?> materialize-search-button-left<?php } ?><?php if ( is_admin_bar_showing() ) { ?> wp-toolbar-active<?php } ?><?php if( get_option('drawer_materialize_absolute_position') ) { ?> materialize-absolute<?php } ?>">
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
			<path id="magnifier-3-icon" d="M208.464,363.98c-86.564,0-156.989-70.426-156.989-156.99C51.475,120.426,121.899,50,208.464,50
				c86.565,0,156.991,70.426,156.991,156.991C365.455,293.555,295.029,363.98,208.464,363.98z M208.464,103.601
				c-57.01,0-103.389,46.381-103.389,103.39s46.379,103.389,103.389,103.389c57.009,0,103.391-46.38,103.391-103.389
				S265.473,103.601,208.464,103.601z M367.482,317.227c-14.031,20.178-31.797,37.567-52.291,51.166L408.798,462l51.728-51.729
				L367.482,317.227z"/>
			</svg>
		</div>
		<?php } ?>
		<!-- END SEARCH BUTTON -->
		
		<!-- BEGIN SEARCH FORM -->
		<div class="materialize-search-wrapper<?php if( get_option('drawer_materialize_absolute_position') ) { ?> materialize-absolute<?php } ?><?php if ( is_admin_bar_showing() ) { ?> wp-toolbar-active<?php } ?>">
				<!-- BEGIN SEARCH FORM CLOSE ICON -->
				<div class="materialize-search-close-icon">
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
					<path d="M9.016,40.837c0.195,0.195,0.451,0.292,0.707,0.292c0.256,0,0.512-0.098,0.708-0.293l14.292-14.309
						l14.292,14.309c0.195,0.196,0.451,0.293,0.708,0.293c0.256,0,0.512-0.098,0.707-0.292c0.391-0.39,0.391-1.023,0.001-1.414
						L26.153,25.129L40.43,10.836c0.39-0.391,0.39-1.024-0.001-1.414c-0.392-0.391-1.024-0.391-1.414,0.001L24.722,23.732L10.43,9.423
						c-0.391-0.391-1.024-0.391-1.414-0.001c-0.391,0.39-0.391,1.023-0.001,1.414l14.276,14.293L9.015,39.423
						C8.625,39.813,8.625,40.447,9.016,40.837z"/>
					</svg>
				</div>
				<!-- END SEARCH FORM CLOSE ICON -->
			
				<form method="get" id="searchform" action="<?php echo esc_url( home_url('') ); ?>/">
					<input type="text" name="s" id="s" placeholder="<?php if(get_option('drawer_materialize_search_text')) { ?><?php echo stripslashes(get_option('drawer_materialize_search_text')); ?><?php } else { ?><?php _e( 'type search term...' , 'drawer' ) ?><?php } ?>">
				</form>
		</div>
		<!-- END SEARCH FORM -->

		<!-- BEGIN LOGO -->
		<?php if( get_option('drawer_materialize_hide_logo') ) { ?>
		<?php } else {?>
			<div class="materialize-logo-wrapper<?php if ( is_admin_bar_showing() ) { ?> wp-toolbar-active<?php } ?><?php if( get_option('drawer_materialize_absolute_position') ) { ?> materialize-absolute<?php } ?><?php if(get_option('drawer_materialize_heading_positioning') == "materializeheadingtwo") { ?> materialize-left<?php } else if(get_option('drawer_materialize_heading_positioning') == "materializeheadingthree") { ?> materialize-center<?php } else if(get_option('drawer_materialize_heading_positioning') == "materializeheadingfour") { ?> materialize-center<?php } ?>">
				<?php if ( get_theme_mod( 'materialize_logo' ) ) : ?>
			
					<!-- BEGIN LOGO IMAGE -->
					<div class="materialize-logo-image">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'materialize_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
					</div>
					<!-- END LOGO IMAGE -->
			
				<?php else : ?>
			
					<!-- BEGIN LOGO -->
					<div class="materialize-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php bloginfo('name'); ?>
						</a>
					</div>
					<!-- END LOGO -->
			
				<?php endif; ?>
			</div>
		<?php } ?>
		<!-- END LOGO -->
		
		<!-- BEGIN HEADER BACKGROUND -->
		<?php if( get_option('drawer_materialize_show_header') ) { ?>
			<div class="tap-tap-header<?php if ( is_admin_bar_showing() ) { ?> wp-toolbar-active<?php } ?> 	<?php if( get_option('drawer_materialize_absolute_position') ) { ?> materialize-absolute<?php } ?>">
			</div>
		<?php } ?>
		<!-- END HEADER BACKGROUND -->
		
		<!-- BEGIN MENU BACKGROUND COLOR -->
		<div class="materialize-background-color<?php if( get_option('drawer_materialize_main_menu_open') && is_front_page() ) { ?> materialize-background-color-active<?php } ?>">
		</div>
		<!-- END MENU BACKGROUND COLOR -->
		
		<!-- BEGIN MENU BACKGROUND IMAGE -->
		<?php if(get_option('drawer_materialize_background_image')) { ?>
		<div class="materialize-background-image<?php if( get_option('drawer_materialize_main_menu_open') && is_front_page() ) { ?> materialize-background-image-active<?php } ?>" style="background-image: url(<?php echo get_option('drawer_materialize_background_image'); ?>);">
		</div>
		<?php } ?>
		<!-- END MENU BACKGROUND IMAGE -->

		<!-- BEGIN MAIN WRAPPER -->
		<div class="materialize-main-wrapper<?php if( get_option('drawer_materialize_main_menu_open') && is_front_page() ) { ?> materialize-main-wrapper-active<?php } ?>">
			<div class="materialize-main-inner">
				<div class="materialize-main">
					<div class="materialize-main-inner-inner<?php if ( is_admin_bar_showing() ) { ?> materialize-main-inner-inner-toolbar<?php } ?>">
						<!-- BEGIN HEADING -->
						<div class="materialize-heading">
							<?php if(get_option('drawer_materialize_heading_link')) { ?>
							<a href="<?php echo stripslashes(get_option('drawer_materialize_heading_link')); ?>">
							<?php } ?>
								<?php echo stripslashes(get_option('drawer_materialize_heading')); ?>
							<?php if(get_option('drawer_materialize_heading_link')) { ?>
							</a>
							<?php } ?>
						</div>
						<!-- END HEADING -->
						
						<!-- BEGIN SUBHEADING -->
						<div class="materialize-subheading">
							<?php if(get_option('drawer_materialize_subheading_link')) { ?>
							<a href="<?php echo stripslashes(get_option('drawer_materialize_subheading_link')); ?>">
							<?php } ?>
								<?php echo stripslashes(get_option('drawer_materialize_subheading')); ?>
							<?php if(get_option('drawer_materialize_subheading_link')) { ?>
							</a>
							<?php } ?>
						</div>
						<!-- END SUBHEADING -->

						<!-- BEGIN IMAGE -->
						<?php if(get_option('drawer_materialize_image')) { ?>
						<div class="materialize-image">
							<?php if(get_option('drawer_materialize_image_link')) { ?>
							<a href="<?php echo stripslashes(get_option('drawer_materialize_image_link')); ?>" <?php if(get_option('drawer_materialize_image_link_blank')) { ?>target="_blank"<?php } ?>>
							<?php } ?>
								<img src="<?php echo get_option('drawer_materialize_image'); ?>">
							<?php if(get_option('drawer_materialize_image_link')) { ?>
							</a>
							<?php } ?>
						</div>
						<?php } ?>
						<!-- END IMAGE -->
						
						<!-- BEGIN MENU -->
						<?php $walker = new Materialize_Menu_Description; ?>
						<?php wp_nav_menu( array( 'container_class' => 'materialize-drawer', 'theme_location' => 'materialize-drawer', 'walker' => $walker, 'fallback_cb' => '' ) ); ?>
						<!-- END MENU -->
						
						<!-- BEGIN WIDGETS -->
						<?php if ( is_active_sidebar( 'materialize-widgets' ) ) { ?>
							<div class="materialize-widgets-wrapper">
								<?php dynamic_sidebar( 'materialize-widgets' ); ?>
							</div>
						<?php } ?>	
						<!-- END WIDGETS -->
					</div>
				</div>
			</div>
		</div>
		<!-- END MAIN WRAPPER -->

	<?php
	}
	add_action('wp_footer','drawer_materialize_footer');

	//
	// ADD the walker class (for menu descriptions)
	//
	
	class Materialize_Menu_Description extends Walker_Nav_Menu {
		function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0) {
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			
			$class_names = $value = '';
	
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
	
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="' . esc_attr( $class_names ) . '"';
	
			$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
	
			$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
	
			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '<div class="materialize-menu-item-description">' . $item->description . '</div>';
			$item_output .= '</a>';
			$item_output .= $args->after;
	
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
		}
	}

	//
	// WordPress customizer: Custom logo upload
	//
	function materialize_theme_customizer( $wp_customize ) {
	
	$wp_customize->add_section( 'materialize_logo_section' , array(
		'title'       => __( 'Materialize Logo', 'materialize' ),
		'priority'    => 31,
		'description' => 'Upload a logo to replace the default site name and description in the header',
	));
	
	$wp_customize->add_setting( 'materialize_logo',
    array ( 'default' => '',
    'sanitize_callback' => 'esc_url_raw'
    ));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'materialize_logo', array(
		'label'    => __( 'Logo', 'materialize' ),
		'section'  => 'materialize_logo_section',
		'settings' => 'materialize_logo',
        'description' => '<h4>How-to add retina logo:</h4> If you would like to add a retina logo, upload both the regular and retina logo files and make sure they are named correctly. If retina logo is uploaded, it will be shown on retina screens with no further setup necessary. <br><br> Example:<br> my-logo.png and my-logo@2x.png (note that the retina logo must have "@2x" at the end).<br><br>',
	)));
	
	}
	add_action('customize_register', 'materialize_theme_customizer');

	//
	// ENQUEUE materialize.css
	//
	function drawer_materialize_css() {
		wp_register_style( 'drawer-materialize-css', plugins_url( '/materialize.css', __FILE__ ) . '', array(), '1', 'all' );
		wp_enqueue_style( 'drawer-materialize-css' );
	}
	add_action( 'wp_enqueue_scripts', 'drawer_materialize_css' );

	//
	// ENQUEUE materialize-accordion.js
	//
	function drawer_materialize_accordion() {
		if( get_option('drawer_materialize_sub_menu_activation') ) {
			wp_register_script( 'drawer-materialize-accordion-full-link', plugins_url( '/materialize-accordion-full-link.js', __FILE__ ) . '', array( 'jquery' ), '1' );  
			wp_enqueue_script( 'drawer-materialize-accordion-full-link' );
		} else {
			wp_register_script( 'drawer-materialize-accordion', plugins_url( '/materialize-accordion.js', __FILE__ ) . '', array( 'jquery' ), '1' );  
			wp_enqueue_script( 'drawer-materialize-accordion' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'drawer_materialize_accordion' );
	
	//
	// ENQUEUE materialize.js
	//
	function drawer_materialize_js() {
		wp_register_script( 'drawer-materialize-js', plugins_url( '/materialize.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
		wp_enqueue_script( 'drawer-materialize-js' );
	}
	add_action( 'wp_enqueue_scripts', 'drawer_materialize_js' );
	
	//
	// ENQUEUE materialize-close-on-click.js
	//
	if(get_option('drawer_materialize_close_on_click')) {
		function drawer_materialize_close_on_click_js() {
			if( get_option('drawer_materialize_sub_menu_activation') ) {
				wp_register_script( 'drawer-materialize-close-on-click-js-full-link', plugins_url( '/materialize-close-on-click-full-link.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
				wp_enqueue_script( 'drawer-materialize-close-on-click-js-full-link' );
			} else {
				wp_register_script( 'drawer-materialize-close-on-click-js', plugins_url( '/materialize-close-on-click.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
				wp_enqueue_script( 'drawer-materialize-close-on-click-js' );
			}
		}
		add_action( 'wp_enqueue_scripts', 'drawer_materialize_close_on_click_js' );
	}
    
    //
	// ENQUEUE retina.js
	//
	function drawer_materialize_retina_js() {
		wp_register_script( 'drawer-materialize-retina-js', plugins_url( '/retina.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
		wp_enqueue_script( 'drawer-materialize-retina-js' );
	}
	add_action( 'wp_enqueue_scripts', 'drawer_materialize_retina_js' );

	//
	// Enqueue Google WebFonts
	//
	function drawer_materialize_font() {
	$protocol = is_ssl() ? 'https' : 'http';
		wp_enqueue_style( 'drawer-materialize-font', "$protocol://fonts.googleapis.com/css?family=Montserrat:400,700|Roboto:300|Roboto+Condensed:400,700|Bree+Serif|Droid+Serif:400' rel='stylesheet' type='text/css" );
	}
	add_action( 'wp_enqueue_scripts', 'drawer_materialize_font' );

	//
	// Enqueue font-awesome.min.css (icons for menu, if option to hide not enabled)
	//
	if( get_option('drawer_materialize_fa_no_load') ) {
	} else {
		function drawer_materialize_fontawesome() {  
			wp_register_style( 'materialize-fontawesome', plugins_url( '/fonts/font-awesome/css/font-awesome.min.css', __FILE__ ) . '', array(), '1', 'all' );  
			wp_enqueue_style( 'materialize-fontawesome' );
		}
		add_action( 'wp_enqueue_scripts', 'drawer_materialize_fontawesome' );
	}

	//
	// Register Custom Menu Function
	//
	if (function_exists('register_nav_menus')) {
		register_nav_menus( array(
			'materialize-drawer' => ( 'Materialize, ' ),
		) );
	}
	
	//
	// Allow Shortcodes in Text Widget
	//
	add_filter('widget_text', 'do_shortcode');
	
	//
	// Register Widgets
	//
	function drawer_materialize_widgets_init() {

		register_sidebar( array(
		'name' => __( 'Materialize Widgets', 'drawer' ),
		'id' => 'materialize-widgets',
		'description' => __( 'Drag widgets here', 'drawer' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
		));

	}
	add_action( 'widgets_init', 'drawer_materialize_widgets_init' );

	//
	// Add color options to Appearance > Customize
	//
	add_action( 'customize_register', 'drawer_materialize_customize_register' );
	function drawer_materialize_customize_register($wp_customize)
	{
		$colors = array();
		/* menu button + search + logo + header */
		$colors[] = array( 'slug'=>'drawer_materialize_menu_button_color', 'default' => '', 'label' => __( 'Menu button', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_menu_button_active_color', 'default' => '', 'label' => __( 'Menu button (when menu opened)', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_menu_button_hover_color', 'default' => '', 'label' => __( 'Menu button hover', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_menu_button_active_hover_color', 'default' => '', 'label' => __( 'Menu button hover (when menu opened)', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_search_button_color', 'default' => '', 'label' => __( 'Search button', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_search_button_hover_color', 'default' => '', 'label' => __( 'Search button hover', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_search_button_divider_color', 'default' => '', 'label' => __( 'Search button divider', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_search_field_background_color', 'default' => '', 'label' => __( 'Search field background', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_search_field_placeholder_color', 'default' => '', 'label' => __( 'Search field placeholder', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_search_field_text_color', 'default' => '', 'label' => __( 'Search field text', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_search_close_button_color', 'default' => '', 'label' => __( 'Search field close button', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_search_close_button_hover_color', 'default' => '', 'label' => __( 'Search field close button hover', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_logo_color', 'default' => '', 'label' => __( 'Logo', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_logo_hover_color', 'default' => '', 'label' => __( 'Logo hover', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_header_background_color', 'default' => '', 'label' => __( 'Header background', 'drawer' ) );
		/* headings */
		$colors[] = array( 'slug'=>'drawer_materialize_heading_color', 'default' => '', 'label' => __( 'Heading', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_subheading_color', 'default' => '', 'label' => __( 'Subheading', 'drawer' ) );
		/* menu + submenu */
		$colors[] = array( 'slug'=>'drawer_materialize_menu_color', 'default' => '', 'label' => __( 'Menu item', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_menu_color_current', 'default' => '', 'label' => __( 'Menu item (current menu item)', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_menu_hover_color', 'default' => '', 'label' => __( 'Menu item hover', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_menu_hover_color_current', 'default' => '', 'label' => __( 'Menu item hover (current menu item)', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_submenu_color', 'default' => '', 'label' => __( 'Submenu item', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_submenu_color_current', 'default' => '', 'label' => __( 'Submenu item (current menu item)', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_submenu_hover_color', 'default' => '', 'label' => __( 'Submenu item hover', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_submenu_hover_color_current', 'default' => '', 'label' => __( 'Submenu item hover (current menu item)', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_submenu_arrow_color', 'default' => '', 'label' => __( 'Submenu arrow', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_submenu_arrow_hover_color', 'default' => '', 'label' => __( 'Submenu arrow hover', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_submenu_arrow_divider_color', 'default' => '', 'label' => __( 'Submenu arrow divider', 'drawer' ) );
		/* menu icons */
		$colors[] = array( 'slug'=>'drawer_materialize_menu_icon_color', 'default' => '', 'label' => __( 'Menu icon', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_menu_icon_hover_color', 'default' => '', 'label' => __( 'Menu icon hover', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_submenu_icon_color', 'default' => '', 'label' => __( 'Submenu icon', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_submenu_icon_hover_color', 'default' => '', 'label' => __( 'Submenu icon hover', 'drawer' ) );
		/* widgets */
		$colors[] = array( 'slug'=>'drawer_materialize_widget_title_color', 'default' => '', 'label' => __( 'Widget title', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_widget_text_color', 'default' => '', 'label' => __( 'Widget text', 'drawer' ) );
		$colors[] = array( 'slug'=>'drawer_materialize_widget_link_color', 'default' => '', 'label' => __( 'Widget link', 'drawer' ) );
		/* menu description */
		$colors[] = array( 'slug'=>'drawer_materialize_menu_description_color', 'default' => '', 'label' => __( 'Menu item description', 'drawer' ) );
		/* background */
		$colors[] = array( 'slug'=>'drawer_materialize_background_color', 'default' => '', 'label' => __( 'Background', 'drawer' ) );

	foreach($colors as $color)
	{

	/* create custom color customization section */
	$wp_customize->add_section( 'materialize_plugin_colors' , array( 'title' => __('Materialize Colors', 'drawer'), 'priority' => 30 ));
	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options' ));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'materialize_plugin_colors', 'settings' => $color['slug'] )));
	}
	}

	//
	// Insert theme customizer options into the footer
	//
	function drawer_materialize_header_customize() {
	?>

		<!-- BEGIN CUSTOM COLORS (WP THEME CUSTOMIZER) -->
		<!-- menu button + logo + header -->
		<?php $drawer_materialize_menu_button_color = get_option('drawer_materialize_menu_button_color'); ?>
		<?php $drawer_materialize_menu_button_active_color = get_option('drawer_materialize_menu_button_active_color'); ?>
		<?php $drawer_materialize_menu_button_hover_color = get_option('drawer_materialize_menu_button_hover_color'); ?>
		<?php $drawer_materialize_menu_button_active_hover_color = get_option('drawer_materialize_menu_button_active_hover_color'); ?>
		<?php $drawer_materialize_search_button_color = get_option('drawer_materialize_search_button_color'); ?>
		<?php $drawer_materialize_search_button_hover_color = get_option('drawer_materialize_search_button_hover_color'); ?>
		<?php $drawer_materialize_search_button_divider_color = get_option('drawer_materialize_search_button_divider_color'); ?>
		<?php $drawer_materialize_search_field_background_color = get_option('drawer_materialize_search_field_background_color'); ?>
		<?php $drawer_materialize_search_field_placeholder_color = get_option('drawer_materialize_search_field_placeholder_color'); ?>
		<?php $drawer_materialize_search_field_text_color = get_option('drawer_materialize_search_field_text_color'); ?>
		<?php $drawer_materialize_search_close_button_color = get_option('drawer_materialize_search_close_button_color'); ?>
		<?php $drawer_materialize_search_close_button_hover_color = get_option('drawer_materialize_search_close_button_hover_color'); ?>
		<?php $drawer_materialize_logo_color = get_option('drawer_materialize_logo_color'); ?>
		<?php $drawer_materialize_logo_hover_color = get_option('drawer_materialize_logo_hover_color'); ?>
		<?php $drawer_materialize_header_background_color = get_option('drawer_materialize_header_background_color'); ?>
		<!-- headings -->
		<?php $drawer_materialize_heading_color = get_option('drawer_materialize_heading_color'); ?>
		<?php $drawer_materialize_subheading_color = get_option('drawer_materialize_subheading_color'); ?>
		<!-- menu + submenu -->
		<?php $drawer_materialize_menu_color = get_option('drawer_materialize_menu_color'); ?>
		<?php $drawer_materialize_menu_color_current = get_option('drawer_materialize_menu_color_current'); ?>
		<?php $drawer_materialize_menu_hover_color = get_option('drawer_materialize_menu_hover_color'); ?>
		<?php $drawer_materialize_menu_hover_color_current = get_option('drawer_materialize_menu_hover_color_current'); ?>
		<?php $drawer_materialize_submenu_color = get_option('drawer_materialize_submenu_color'); ?>
		<?php $drawer_materialize_submenu_color_current = get_option('drawer_materialize_submenu_color_current'); ?>
		<?php $drawer_materialize_submenu_hover_color = get_option('drawer_materialize_submenu_hover_color'); ?>
		<?php $drawer_materialize_submenu_hover_color_current = get_option('drawer_materialize_submenu_hover_color_current'); ?>
		<?php $drawer_materialize_submenu_arrow_color = get_option('drawer_materialize_submenu_arrow_color'); ?>
		<?php $drawer_materialize_submenu_arrow_hover_color = get_option('drawer_materialize_submenu_arrow_hover_color'); ?>
		<?php $drawer_materialize_submenu_arrow_divider_color = get_option('drawer_materialize_submenu_arrow_divider_color'); ?>
		<!-- menu icons -->
		<?php $drawer_materialize_menu_icon_color = get_option('drawer_materialize_menu_icon_color'); ?>
		<?php $drawer_materialize_menu_icon_hover_color = get_option('drawer_materialize_menu_icon_hover_color'); ?>
		<?php $drawer_materialize_submenu_icon_color = get_option('drawer_materialize_submenu_icon_color'); ?>
		<?php $drawer_materialize_submenu_icon_hover_color = get_option('drawer_materialize_submenu_icon_hover_color'); ?>
		<!-- widgets -->
		<?php $drawer_materialize_widget_title_color = get_option('drawer_materialize_widget_title_color'); ?>
		<?php $drawer_materialize_widget_text_color = get_option('drawer_materialize_widget_text_color'); ?>
		<?php $drawer_materialize_widget_link_color = get_option('drawer_materialize_widget_link_color'); ?>
		<!-- menu description -->
		<?php $drawer_materialize_menu_description_color = get_option('drawer_materialize_menu_description_color'); ?>
		<!-- background -->
		<?php $drawer_materialize_background_color = get_option('drawer_materialize_background_color'); ?>

		<style>
		/**************************************************************
		*** CUSTOM COLORS + SETTINGS
		**************************************************************/		
		/* menu button opacity */
		.materialize-menu-button-wrapper { opacity:<?php echo get_option('drawer_materialize_menu_button_opacity'); ?>; }
		/* menu button */
		.materialize-menu-button:after,
		.materialize-menu-button:before,
		.materialize-menu-button div.materialize-menu-button-middle:before,
		.materialize-menu-button div.materialize-menu-button-middle:after,
		.materialize-menu-button-alt:after,
		.materialize-menu-button-alt:before,
		.materialize-menu-button-alt div.materialize-menu-button-alt-middle:before,
		.materialize-menu-button-alt div.materialize-menu-button-alt-middle:after,
		.materialize-menu-button-three:after,
		.materialize-menu-button-three:before,
		.materialize-menu-button-three div.materialize-menu-button-three-middle:before,
		.materialize-menu-button-three-alt:after,
		.materialize-menu-button-three-alt:before,
		.materialize-menu-button-three-alt div.materialize-menu-button-three-alt-middle:before { background-color:<?php echo $drawer_materialize_menu_button_color; ?>; }
		.materialize-menu-button-static { fill:<?php echo $drawer_materialize_menu_button_color; ?>; }
		/* menu button (if menu opened) */
		.materialize-menu-active .materialize-menu-button:after,
		.materialize-menu-active .materialize-menu-button:before,
		.materialize-menu-active .materialize-menu-button div.materialize-menu-button-middle:before,
		.materialize-menu-active .materialize-menu-button div.materialize-menu-button-middle:after,
		.materialize-menu-active .materialize-menu-button-alt:after,
		.materialize-menu-active .materialize-menu-button-alt:before,
		.materialize-menu-active .materialize-menu-button-alt div.materialize-menu-button-alt-middle:before,
		.materialize-menu-active .materialize-menu-button-alt div.materialize-menu-button-alt-middle:after,
		.materialize-menu-active .materialize-menu-button-three:after,
		.materialize-menu-active .materialize-menu-button-three:before,
		.materialize-menu-active .materialize-menu-button-three div.materialize-menu-button-three-middle:before,
		.materialize-menu-active .materialize-menu-button-three-alt:after,
		.materialize-menu-active .materialize-menu-button-three-alt:before,
		.materialize-menu-active .materialize-menu-button-three-alt div.materialize-menu-button-three-alt-middle:before { background-color:<?php echo $drawer_materialize_menu_button_active_color; ?>; }
		.materialize-menu-active .materialize-menu-button-static { fill:<?php echo $drawer_materialize_menu_button_active_color; ?>; }
	
		<?php if ( wp_is_mobile() ) { ?>
		<?php } else { ?>
		/* menu bars hover */
		.materialize-menu-button:hover:before,
		.materialize-menu-button:hover:after,
		.materialize-menu-button:hover div.materialize-menu-button-middle:before,
		.materialize-menu-button:hover div.materialize-menu-button-middle:after,
		
		.materialize-menu-button-alt:hover:before,
		.materialize-menu-button-alt:hover:after,
		.materialize-menu-button-alt:hover div.materialize-menu-button-alt-middle:before,
		.materialize-menu-button-alt:hover div.materialize-menu-button-alt-middle:after,
		
		.materialize-menu-button-three:hover:after,
		.materialize-menu-button-three:hover:before,
		.materialize-menu-button-three:hover div.materialize-menu-button-three-middle:before,
		.materialize-menu-button-three-alt:hover:after,
		.materialize-menu-button-three-alt:hover:before,
		.materialize-menu-button-three-alt:hover div.materialize-menu-button-three-alt-middle:before {
			background-color:#A3A6A9 !important;
			background-color:<?php echo $drawer_materialize_menu_button_hover_color; ?> !important;
		}
		.materialize-menu-button-wrapper:hover .materialize-menu-button-static { fill:<?php echo $drawer_materialize_menu_button_hover_color; ?> !important; }
		/* menu bars hover (if menu opened) */
		.materialize-menu-active .materialize-menu-button:hover:before,
		.materialize-menu-active .materialize-menu-button:hover:after,
		.materialize-menu-active .materialize-menu-button:hover div.materialize-menu-button-middle:before,
		.materialize-menu-active .materialize-menu-button:hover div.materialize-menu-button-middle:after,
		
		.materialize-menu-active .materialize-menu-button-alt:hover:before,
		.materialize-menu-active .materialize-menu-button-alt:hover:after,
		.materialize-menu-active .materialize-menu-button-alt:hover div.materialize-menu-button-alt-middle:before,
		.materialize-menu-active .materialize-menu-button-alt:hover div.materialize-menu-button-alt-middle:after,
		
		.materialize-menu-active .materialize-menu-button-three:hover:after,
		.materialize-menu-active .materialize-menu-button-three:hover:before,
		.materialize-menu-active .materialize-menu-button-three:hover div.materialize-menu-button-three-middle:before,
		.materialize-menu-active .materialize-menu-button-three-alt:hover:after,
		.materialize-menu-active .materialize-menu-button-three-alt:hover:before,
		.materialize-menu-active .materialize-menu-button-three-alt:hover div.materialize-menu-button-three-alt-middle:before {
			background-color:#A3A6A9 !important;
			background-color:<?php echo $drawer_materialize_menu_button_active_hover_color; ?> !important;
		}
		.materialize-menu-active:hover .materialize-menu-button-static { fill:<?php echo $drawer_materialize_menu_button_active_hover_color; ?> !important; }
		<?php } ?>
		
		/* custom menu button speed */
		.materialize-menu-button:after,
		.materialize-menu-button:before,
		.materialize-menu-button div.materialize-menu-button-middle:before,
		.materialize-menu-button div.materialize-menu-button-middle:after,
		.materialize-menu-button-alt:after,
		.materialize-menu-button-alt:before,
		.materialize-menu-button-alt div.materialize-menu-button-alt-middle:before,
		.materialize-menu-button-alt div.materialize-menu-button-alt-middle:after,
		.materialize-menu-button-three:after,
		.materialize-menu-button-three:before,
		.materialize-menu-button-three div.materialize-menu-button-three-middle:before,
		.materialize-menu-button-three-alt:after,
		.materialize-menu-button-three-alt:before,
		.materialize-menu-button-three-alt div.materialize-menu-button-three-alt-middle:before {
			-webkit-transition:all <?php echo get_option('drawer_materialize_menu_button_speed'); ?>s ease !important;
			-moz-transition:all <?php echo get_option('drawer_materialize_menu_button_speed'); ?>s ease !important;
			transition:all <?php echo get_option('drawer_materialize_menu_button_speed'); ?>s ease !important;
		}
		
		/* search button */
		.materialize-search-button,
		.materialize-search-button-right { border-color:<?php echo $drawer_materialize_search_button_divider_color; ?>; }
		.materialize-search-button svg,
		.materialize-search-button-right svg { fill:<?php echo $drawer_materialize_search_button_color; ?>; }
		.materialize-search-button:hover svg,
		.materialize-search-button-right:hover svg { fill:<?php echo $drawer_materialize_search_button_hover_color; ?>; }
		/* search button divider */
		<?php if( get_option('drawer_materialize_hide_search_divider') ) { ?>
		.materialize-search-button {
			border-left:none;
			left:61px;
		}
		.materialize-search-button-right {
			border-right:none;
			right:61px;
		}
		<?php } else { ?>
		<?php } ?>
		
		/* search form background */
		.materialize-search-wrapper { background-color:<?php echo $drawer_materialize_search_field_background_color; ?>; }
		/* search form placeholder */
		#searchform input::-webkit-input-placeholder { color:<?php echo $drawer_materialize_search_field_placeholder_color; ?> !important; }
		#searchform input:-moz-placeholder { color:<?php echo $drawer_materialize_search_field_placeholder_color; ?> !important; }
		#searchform input::-moz-placeholder { color:<?php echo $drawer_materialize_search_field_placeholder_color; ?> !important; }
		#searchform input:-ms-input-placeholder { color:<?php echo $drawer_materialize_search_field_placeholder_color; ?> !important; }
		/* search form text */
		.materialize-search-wrapper #searchform input { color:<?php echo $drawer_materialize_search_field_text_color; ?>; }
		/* search form close icon */
		.materialize-search-close-icon svg { fill:<?php echo $drawer_materialize_search_close_button_color; ?>; }
		/* search form close icon hover */
		.materialize-search-close-icon:hover svg { fill:<?php echo $drawer_materialize_search_close_button_hover_color; ?>; }
		/* logo */
		.materialize-logo a { color:<?php echo $drawer_materialize_logo_color; ?>; }
		.materialize-logo a:hover { color:<?php echo $drawer_materialize_logo_hover_color; ?>; }
		/* header background */
		.tap-tap-header { background-color:<?php echo $drawer_materialize_header_background_color; ?>; }
		/* show header + search when menu open */
		<?php if( get_option('drawer_materialize_show_header_search_above') ) { ?>
		.materialize-search-button,
		.materialize-search-button-right { z-index:999999; }
		.materialize-search-wrapper { z-index:9999999; }
		.tap-tap-header { z-index:999997; }
        .materialize-logo-wrapper { z-index:999998; }
		<?php } ?>
		/* headings */
		.materialize-heading,
		.materialize-heading a,
		.materialize-heading a:hover { color:<?php echo $drawer_materialize_heading_color; ?>; }
		.materialize-subheading,
		.materialize-subheading a,
		.materialize-subheading a:hover { color:<?php echo $drawer_materialize_subheading_color; ?>; }
		/* menu + submenu */
		.materialize-drawer ul li a { color:<?php echo $drawer_materialize_menu_color; ?>; }
		.materialize-drawer ul li.current-menu-item a { color:<?php echo $drawer_materialize_menu_color_current; ?>; }
		.materialize-drawer ul li.full-item-svg-hover > a,
		.materialize-drawer ul li a:hover { color:<?php echo $drawer_materialize_menu_hover_color; ?>; }
		.materialize-drawer ul li.current-menu-item a:hover { color:<?php echo $drawer_materialize_menu_hover_color_current; ?>; }		
		.materialize-drawer .sub-menu a { color:<?php echo $drawer_materialize_submenu_color; ?>; }
		.materialize-drawer .sub-menu .current-menu-item a { color:<?php echo $drawer_materialize_submenu_color_current; ?>; }
		.materialize-drawer .sub-menu a:hover { color:<?php echo $drawer_materialize_submenu_hover_color; ?>; }
		.materialize-drawer .sub-menu .current-menu-item a:hover { color:<?php echo $drawer_materialize_submenu_hover_color_current; ?>; }
		.materialize-drawer .menu li span svg { fill:<?php echo $drawer_materialize_submenu_arrow_color; ?>; }
		.full-item-svg-hover > span svg,
		.materialize-drawer .menu li span:hover svg { fill:<?php echo $drawer_materialize_submenu_arrow_hover_color; ?> !important; }
		.materialize-drawer .menu li span { border-color:<?php echo $drawer_materialize_submenu_arrow_divider_color; ?>; }
		/* background */
		.materialize-background-color { background-color:<?php echo $drawer_materialize_background_color; ?>; }
		
		/* push down site by height of menu */
		<?php if(get_option('drawer_materialize_site_top')) { ?>
			body { margin-top:67px !important; }
		<?php } ?>
		
        /* show header shadow */
        <?php if( get_option('drawer_materialize_show_header_shadow') ) { ?>
			.tap-tap-header {
                -webkit-box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.4);
                -moz-box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.4);
                box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.4);
            }
		<?php } ?>
        /* header shadow strength */
        .tap-tap-header {
            -webkit-box-shadow: 0px 0px 2px 1px rgba(0,0,0,<?php echo get_option('drawer_materialize_header_background_shadow_opacity'); ?>);
            -moz-box-shadow: 0px 0px 2px 1px rgba(0,0,0,<?php echo get_option('drawer_materialize_header_background_shadow_opacity'); ?>);
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,<?php echo get_option('drawer_materialize_header_background_shadow_opacity'); ?>);
        }
        
		/* background image opacity */
		.materialize-background-image { opacity:<?php echo get_option('drawer_materialize_background_image_opacity'); ?>; }
		/* background color opacity */
		.materialize-background-color { opacity:<?php echo get_option('drawer_materialize_background_color_opacity'); ?>; }
		/* header background opacity */
		.tap-tap-header { opacity:<?php echo get_option('drawer_materialize_header_background_opacity'); ?>; }

		/* menu content top distance */
		.materialize-main-inner-inner { padding-top:<?php echo get_option('drawer_materialize_content_top_distance'); ?>px; }
		/* heading */
		.materialize-heading,
		.materialize-heading a {
			font-size:<?php echo get_option('drawer_materialize_heading_font_size'); ?>px;
			letter-spacing:<?php echo get_option('drawer_materialize_heading_letter_spacing'); ?>px;
			line-height:<?php echo get_option('drawer_materialize_heading_line_height'); ?>px;
		}
		/* subheading */
		.materialize-subheading,
		.materialize-subheading a {
			font-size:<?php echo get_option('drawer_materialize_subheading_font_size'); ?>px;
			letter-spacing:<?php echo get_option('drawer_materialize_subheading_letter_spacing'); ?>px;
			line-height:<?php echo get_option('drawer_materialize_subheading_line_height'); ?>px;
			margin-top:<?php echo get_option('drawer_materialize_heading_subheading_distance'); ?>px;
		}
		/* heading font */
		<?php if(get_option('drawer_materialize_heading_theme_font')) { ?>
			.materialize-heading,
			.materialize-heading a {
				font-family:<?php echo stripslashes(get_option('drawer_materialize_heading_theme_font')); ?>;
			}
		<?php } else { ?>
			<?php if(get_option('drawer_materialize_heading_font') == "materializeheadingmontserratbold") { ?>
				.materialize-heading,
				.materialize-heading a {
					font-family:'Montserrat';
					font-weight:700;
				}
			<?php } else if(get_option('drawer_materialize_heading_font') == "materializeheadingroboto") { ?>
				.materialize-heading,
				.materialize-heading a {
					font-family:'Roboto';
				}
			<?php } else if(get_option('drawer_materialize_heading_font') == "materializeheadingrobotocondensedregular") { ?>
				.materialize-heading,
				.materialize-heading a {
					font-family:'Roboto Condensed';
					font-weight:400;
				}
			<?php } else if(get_option('drawer_materialize_heading_font') == "materializeheadingrobotocondensedbold") { ?>
				.materialize-heading,
				.materialize-heading a {
					font-family:'Roboto Condensed';
					font-weight:700;
				}
			<?php } else if(get_option('drawer_materialize_heading_font') == "materializeheadingbreeserif") { ?>
				.materialize-heading,
				.materialize-heading a {
					font-family:'Bree Serif';
				}
			<?php } else if(get_option('drawer_materialize_heading_font') == "materializeheadingdroidserif") { ?>
				.materialize-heading,
				.materialize-heading a {
					font-family:'Droid Serif';
				}
			<?php } else { ?>
				.materialize-heading,
				.materialize-heading a {
					font-family:'Montserrat';
					font-weight:400;
				}
			<?php } ?>
		<?php } ?>
		
		
		/* subheading font */
		<?php if(get_option('drawer_materialize_subheading_theme_font')) { ?>
			.materialize-subheading,
			.materialize-subheading a {
				font-family:<?php echo stripslashes(get_option('drawer_materialize_subheading_theme_font')); ?>;
			}
		<?php } else { ?>
			<?php if(get_option('drawer_materialize_subheading_font') == "materializesubheadingmontserratbold") { ?>
				.materialize-subheading,
				.materialize-subheading a {
					font-family:'Montserrat';
					font-weight:700;
				}
			<?php } else if(get_option('drawer_materialize_subheading_font') == "materializesubheadingroboto") { ?>
				.materialize-subheading,
				.materialize-subheading a {
					font-family:'Roboto';
				}
			<?php } else if(get_option('drawer_materialize_subheading_font') == "materializesubheadingrobotocondensedregular") { ?>
				.materialize-subheading,
				.materialize-subheading a {
					font-family:'Roboto Condensed';
					font-weight:400;
				}
			<?php } else if(get_option('drawer_materialize_subheading_font') == "materializesubheadingrobotocondensedbold") { ?>
				.materialize-subheading,
				.materialize-subheading a {
					font-family:'Roboto Condensed';
					font-weight:700;
				}
			<?php } else if(get_option('drawer_materialize_subheading_font') == "materializesubheadingbreeserif") { ?>
				.materialize-subheading,
				.materialize-subheading a {
					font-family:'Bree Serif';
				}
			<?php } else if(get_option('drawer_materialize_subheading_font') == "materializesubheadingdroidserif") { ?>
				.materialize-subheading,
				.materialize-subheading a {
					font-family:'Droid Serif';
				}
			<?php } else { ?>
				.materialize-subheading,
				.materialize-subheading a {
					font-family:'Montserrat';
					font-weight:400;
				}
			<?php } ?>
		<?php } ?>
		
		
		/* menu font */
		<?php if(get_option('drawer_materialize_menu_theme_font')) { ?>
			.materialize-drawer ul li a {
				font-family:<?php echo stripslashes(get_option('drawer_materialize_menu_theme_font')); ?>;
			}
		<?php } else { ?>
			<?php if(get_option('drawer_materialize_menu_font') == "materializemenumontserratbold") { ?>
				.materialize-drawer ul li a {
					font-family:'Montserrat';
					font-weight:700;
				}
			<?php } else if(get_option('drawer_materialize_menu_font') == "materializemenuroboto") { ?>
				.materialize-drawer ul li a {
					font-family:'Roboto';
				}
			<?php } else if(get_option('drawer_materialize_menu_font') == "materializemenurobotocondensedregular") { ?>
				.materialize-drawer ul li a {
					font-family:'Roboto Condensed';
					font-weight:400;
				}
			<?php } else if(get_option('drawer_materialize_menu_font') == "materializemenurobotocondensedbold") { ?>
				.materialize-drawer ul li a {
					font-family:'Roboto Condensed';
					font-weight:700;
				}
			<?php } else if(get_option('drawer_materialize_menu_font') == "materializemenubreeserif") { ?>
				.materialize-drawer ul li a {
					font-family:'Bree Serif';
				}
			<?php } else if(get_option('drawer_materialize_menu_font') == "materializemenudroidserif") { ?>
				.materialize-drawer ul li a {
					font-family:'Droid Serif';
				}
			<?php } else { ?>
				.materialize-drawer ul li a {
					font-family:'Montserrat';
					font-weight:400;
				}
			<?php } ?>
		<?php } ?>
		

		/* menu */
		.materialize-drawer ul li a {
			font-size:<?php echo get_option('drawer_materialize_menu_font_size'); ?>px;
			letter-spacing:<?php echo get_option('drawer_materialize_menu_letter_spacing'); ?>px;
		}
		/* submenu */
		.materialize-drawer .sub-menu a {
			font-size:<?php echo get_option('drawer_materialize_submenu_font_size'); ?>px;
			letter-spacing:<?php echo get_option('drawer_materialize_menu_letter_spacing'); ?>px;
		}
		/* menu vertical spacing */
		.materialize-drawer ul li a {
			margin-bottom:<?php echo get_option('drawer_materialize_menu_spacing'); ?>px;
		}
		/* sub-menu vertical spacing */
		.materialize-drawer .sub-menu a {
			margin-bottom:<?php echo get_option('drawer_materialize_submenu_spacing'); ?>px;
		}
		/* drop-down arrow position */
		.materialize-drawer .menu li.menu-item-has-children span {
			top:<?php echo get_option('drawer_materialize_menu_arrow_alignment'); ?>px;
		}
		/* drop-down arrow position (top-level) */
		.materialize-drawer .menu li.menu-item-has-children span {
			top:<?php echo get_option('drawer_materialize_menu_arrow_alignment'); ?>px;
		}
		/* drop-down arrow position (sub-level) */
		.materialize-drawer .sub-menu li.menu-item-has-children span {
			top:<?php echo get_option('drawer_materialize_submenu_arrow_alignment'); ?>px;
		}
		
		/* menu description */
		.materialize-menu-item-description {
			font-size:<?php echo get_option('drawer_materialize_menu_description_font_size'); ?>px;
			padding-top:<?php echo get_option('drawer_materialize_menu_description_top_padding'); ?>px;
			padding-bottom:<?php echo get_option('drawer_materialize_menu_description_bottom_padding'); ?>px;
			line-height:<?php echo get_option('drawer_materialize_menu_description_line_height'); ?>px;
			color:<?php echo $drawer_materialize_menu_description_color; ?>;
		}
		/* menu description font */
		<?php if(get_option('drawer_materialize_menu_description_font') == "materializemenudescriptionmontserratbold") { ?>
			.materialize-menu-item-description {
				font-family:'Montserrat';
				font-weight:700;
			}
		<?php } else if(get_option('drawer_materialize_menu_description_font') == "materializemenudescriptionroboto") { ?>
			.materialize-menu-item-description {
				font-family:'Roboto';
			}
		<?php } else if(get_option('drawer_materialize_menu_description_font') == "materializemenudescriptionrobotocondensedregular") { ?>
			.materialize-menu-item-description {
				font-family:'Roboto Condensed';
				font-weight:400;
			}
		<?php } else if(get_option('drawer_materialize_menu_description_font') == "materializemenudescriptionrobotocondensedbold") { ?>
			.materialize-menu-item-description {
				font-family:'Roboto Condensed';
				font-weight:700;
			}
		<?php } else if(get_option('drawer_materialize_menu_description_font') == "materializemenudescriptionbreeserif") { ?>
			.materialize-menu-item-description {
				font-family:'Bree Serif';
			}
		<?php } else if(get_option('drawer_materialize_menu_description_font') == "materializemenudescriptiondroidserif") { ?>
			.materialize-menu-item-description {
				font-family:'Droid Serif';
			}
		<?php } else { ?>
			.materialize-menu-item-description {
				font-family:'Montserrat';
				font-weight:400;
			}
		<?php } ?>

		/* menu icons */
		.materialize-drawer ul li a i {
			color:<?php echo $drawer_materialize_menu_icon_color; ?>;
			font-size:<?php echo get_option('drawer_materialize_menu_icon_size'); ?>px;
			margin-top:<?php echo get_option('drawer_materialize_menu_icon_alignment'); ?>px;
		}
		.materialize-drawer ul li a:hover i {
			color:<?php echo $drawer_materialize_menu_icon_hover_color; ?>;
		}
		.materialize-drawer .sub-menu a i {
			color:<?php echo $drawer_materialize_submenu_icon_color; ?>;
			font-size:<?php echo get_option('drawer_materialize_submenu_icon_size'); ?>px;
			margin-top:<?php echo get_option('drawer_materialize_submenu_icon_alignment'); ?>px;
		}
		.materialize-drawer .sub-menu a:hover i {
			color:<?php echo $drawer_materialize_submenu_icon_hover_color; ?>;
		}

		/* widget top distance */
		.materialize-widgets-wrapper { margin-top:<?php echo get_option('drawer_materialize_widget_top_distance'); ?>px; }
		/* widget titles */
		.materialize-widgets-wrapper .widget .widgettitle {
			color:<?php echo get_option('drawer_materialize_widget_title_color'); ?>;
			font-size:<?php echo get_option('drawer_materialize_widget_title_font_size'); ?>px !important;
			letter-spacing:<?php echo get_option('drawer_materialize_widget_title_letter_spacing'); ?>px !important;
			line-height:<?php echo get_option('drawer_materialize_widget_title_line_height'); ?>px !important;
		}
		/* widget title font */
		<?php if(get_option('drawer_materialize_widget_title_theme_font')) { ?>
			.materialize-widgets-wrapper .widget .widgettitle {
				font-family:<?php echo stripslashes(get_option('drawer_materialize_widget_title_theme_font')); ?>;
			}
		<?php } else { ?>
			<?php if(get_option('drawer_materialize_widget_title_font') == "materializewidgettitlemontserratbold") { ?>
				.materialize-widgets-wrapper .widget .widgettitle {
					font-family:'Montserrat';
					font-weight:700;
				}
			<?php } else if(get_option('drawer_materialize_widget_title_font') == "materializewidgettitleroboto") { ?>
				.materialize-widgets-wrapper .widget .widgettitle {
					font-family:'Roboto';
				}
			<?php } else if(get_option('drawer_materialize_widget_title_font') == "materializewidgettitlerobotocondensedregular") { ?>
				.materialize-widgets-wrapper .widget .widgettitle {
					font-family:'Roboto Condensed';
					font-weight:400;
				}
			<?php } else if(get_option('drawer_materialize_widget_title_font') == "materializewidgettitlerobotocondensedbold") { ?>
				.materialize-widgets-wrapper .widget .widgettitle {
					font-family:'Roboto Condensed';
					font-weight:700;
				}
			<?php } else if(get_option('drawer_materialize_widget_title_font') == "materializewidgettitlebreeserif") { ?>
				.materialize-widgets-wrapper .widget .widgettitle {
					font-family:'Bree Serif';
				}
			<?php } else if(get_option('drawer_materialize_widget_title_font') == "materializewidgettitledroidserif") { ?>
				.materialize-widgets-wrapper .widget .widgettitle {
					font-family:'Droid Serif';
				}
			<?php } else { ?>
				.materialize-widgets-wrapper .widget .widgettitle {
					font-family:'Montserrat';
					font-weight:400;
				}
			<?php } ?>
		<?php } ?>
		
		/* widgets */
		.materialize-widgets-wrapper .widget,
		.materialize-widgets-wrapper .widget a {
			color:<?php echo get_option('drawer_materialize_widget_text_color'); ?>;
			font-size:<?php echo get_option('drawer_materialize_widget_font_size'); ?>px !important;
			letter-spacing:<?php echo get_option('drawer_materialize_widget_letter_spacing'); ?>px !important;
			line-height:<?php echo get_option('drawer_materialize_widget_line_height'); ?>px !important;
		}
		.materialize-widgets-wrapper .widget a {
			color:<?php echo get_option('drawer_materialize_widget_link_color'); ?>;
		}
		/* widget font */
		<?php if(get_option('drawer_materialize_widget_theme_font')) { ?>
			.materialize-widgets-wrapper .widget,
			.materialize-widgets-wrapper .widget a {
				font-family:<?php echo stripslashes(get_option('drawer_materialize_widget_theme_font')); ?>;
			}
		<?php } else { ?>
			<?php if(get_option('drawer_materialize_widget_font') == "materializewidgetmontserratbold") { ?>
				.materialize-widgets-wrapper .widget,
				.materialize-widgets-wrapper .widget a {
					font-family:'Montserrat';
					font-weight:700;
				}
			<?php } else if(get_option('drawer_materialize_widget_font') == "materializewidgetroboto") { ?>
				.materialize-widgets-wrapper .widget,
				.materialize-widgets-wrapper .widget a {
					font-family:'Roboto';
				}
			<?php } else if(get_option('drawer_materialize_widget_font') == "materializewidgetrobotocondensedregular") { ?>
				.materialize-widgets-wrapper .widget,
				.materialize-widgets-wrapper .widget a {
					font-family:'Roboto Condensed';
					font-weight:400;
				}
			<?php } else if(get_option('drawer_materialize_widget_font') == "materializewidgetrobotocondensedbold") { ?>
				.materialize-widgets-wrapper .widget,
				.materialize-widgets-wrapper .widget a {
					font-family:'Roboto Condensed';
					font-weight:700;
				}
			<?php } else if(get_option('drawer_materialize_widget_font') == "materializewidgetbreeserif") { ?>
				.materialize-widgets-wrapper .widget,
				.materialize-widgets-wrapper .widget a {
					font-family:'Bree Serif';
				}
			<?php } else if(get_option('drawer_materialize_widget_font') == "materializewidgetdroidserif") { ?>
				.materialize-widgets-wrapper .widget,
				.materialize-widgets-wrapper .widget a {
					font-family:'Droid Serif';
				}
			<?php } else { ?>
				.materialize-widgets-wrapper .widget,
				.materialize-widgets-wrapper .widget a {
					font-family:'Montserrat';
					font-weight:400;
				}
			<?php } ?>
		<?php } ?>

		/* background pattern */
		<?php if(get_option('drawer_materialize_image_pattern')) { ?>
			.materialize-background-image {
				background-size:auto;
				background-repeat:repeat;
			}
		<?php } ?>

		/* horizontal alignment */
		<?php if(get_option('drawer_materialize_horizontal_alignment') == "materializealignleft") { ?>
			.materialize-heading,
			.materialize-subheading,
			.materialize-image,
			.materialize-drawer ul li,
			.materialize-widgets-wrapper .widget { text-align:left; }
			.materialize-widgets-wrapper .widget div,
			.materialize-widgets-wrapper .widget span,
			.materialize-widgets-wrapper .widget iframe,
			.materialize-widgets-wrapper .widget object,
			.materialize-widgets-wrapper .widget embed {
				margin-left:0;
				margin-right:auto;
			}
		<?php } else if(get_option('drawer_materialize_horizontal_alignment') == "materializealignright") { ?>
			.materialize-heading,
			.materialize-subheading,
			.materialize-image,
			.materialize-drawer ul li,
			.materialize-widgets-wrapper .widget { text-align:right; clear:both; }
			.materialize-widgets-wrapper .widget div,
			.materialize-widgets-wrapper .widget span,
			.materialize-widgets-wrapper .widget iframe,
			.materialize-widgets-wrapper .widget object,
			.materialize-widgets-wrapper .widget embed {
				margin-left:auto;
				margin-right:0;
			}
			.materialize-drawer ul li a { float:right; }
			.materialize-drawer .menu li span {
				position:relative;
				top:-1px;
				right:1px;
				border-left:none;
				border-right:1px solid #464D52;
			}
			.materialize-drawer .sub-menu a {
				padding-top:5px;
			}
		<?php } ?>
		
		/* vertical alignment */
		<?php if(get_option('drawer_materialize_vertical_alignment') == "materializealignmiddle") { ?>
			.materialize-main-inner-inner { vertical-align:middle; }
		<?php } else if(get_option('drawer_materialize_vertical_alignment') == "materializealignbottom") { ?>
			.materialize-main-inner-inner { vertical-align:bottom; }
		<?php } ?>

		/* menu animations (top/left/right/bottom/fade) */
		<?php if(get_option('drawer_materialize_menu_animation') == "materializetop") { ?>
		<?php } else if(get_option('drawer_materialize_menu_animation') == "materializeleft") { ?>
			.materialize-main-wrapper,
			.materialize-background-color,
			.materialize-background-image {
				-webkit-transform:translateY(0) translateX(-100%);
				-moz-transform:translateY(0) translateX(-100%);
				transform:translateY(0) translateX(-100%);
			}
			.materialize-main-wrapper-active,
			.materialize-background-color-active,
			.materialize-background-image-active {
				-webkit-transform:translateY(0) translateX(0);
				-moz-transform:translateY(0) translateX(0);
				transform:translateY(0) translateX(0);
			}
		<?php } else if(get_option('drawer_materialize_menu_animation') == "materializeright") { ?>
			.materialize-main-wrapper,
			.materialize-background-color,
			.materialize-background-image {
				-webkit-transform:translateY(0) translateX(100%);
				-moz-transform:translateY(0) translateX(100%);
				transform:translateY(0) translateX(100%);
			}
			.materialize-main-wrapper-active,
			.materialize-background-color-active,
			.materialize-background-image-active {
				-webkit-transform:translateY(0) translateX(0);
				-moz-transform:translateY(0) translateX(0);
				transform:translateY(0) translateX(0);
			}
		<?php } else if(get_option('drawer_materialize_menu_animation') == "materializebottom") { ?>
			.materialize-main-wrapper,
			.materialize-background-color,
			.materialize-background-image {
				-webkit-transform:translateY(100%);
				-moz-transform:translateY(100%);
				transform:translateY(100%);
			}
			.materialize-main-wrapper-active,
			.materialize-background-color-active,
			.materialize-background-image-active {
				-webkit-transform:translateY(0);
				-moz-transform:translateY(0);
				transform:translateY(0);
			}
		<?php } else { ?>
			.materialize-background-color {
				opacity:0;
				
				-webkit-transition:opacity .4s ease, top 0s ease .4s;
				-moz-transition:opacity .4s ease, top 0s ease .4s;
				transition:opacity .4s ease, top 0s ease .4s;
			}
			.materialize-background-color-active {
				opacity:<?php if(get_option('drawer_materialize_background_color_opacity')) { ?><?php echo get_option('drawer_materialize_background_color_opacity'); ?><?php } else { ?>1<?php } ?>;
				
				-webkit-transition:opacity .4s ease, top 0s ease 0s;
				-moz-transition:opacity .4s ease, top 0s ease 0s;
				transition:opacity .4s ease, top 0s ease 0s;
			}
			.materialize-main-wrapper,
			.materialize-background-color,
			.materialize-background-image {
				-webkit-transform:translateY(0) translateX(0);
				-moz-transform:translateY(0) translateX(0);
				transform:translateY(0) translateX(0);
			}
			.materialize-main-wrapper-active,
			.materialize-background-color-active,
			.materialize-background-image-active {
				-webkit-transform:translateY(0) translateX(0);
				-moz-transform:translateY(0) translateX(0);
				transform:translateY(0) translateX(0);
			}
			.materialize-background-image { opacity:0; }
			.materialize-background-image-active { opacity:<?php if(get_option('drawer_materialize_background_image_opacity')) { ?><?php echo get_option('drawer_materialize_background_image_opacity'); ?><?php } else { ?>0.1<?php } ?>; }
		<?php } ?>
		
		/* background image horizontal + vertical alignment */
		.materialize-background-image {
			background-position:<?php if(get_option('drawer_materialize_background_vertical_alignment') == "materializebackgroundmiddle") { ?>center<?php } else if(get_option('drawer_materialize_background_vertical_alignment') == "materializebackgroundbottom") { ?>bottom<?php } else { ?>top<?php } ?> <?php if(get_option('drawer_materialize_background_horizontal_alignment') == "materializebackgroundleft") { ?>left<?php } else if(get_option('drawer_materialize_background_horizontal_alignment') == "materializebackgroundright") { ?>right<?php } else { ?>center<?php } ?>;
		}	
		
		/* menu button animations (-/X) */
		<?php if(get_option('drawer_materialize_button_animation') == "materializeminusanimation") { ?>
			/* middle bar #1 animation (4 lines) */
			.materialize-menu-active .materialize-menu-button div.materialize-menu-button-middle:before {
				margin:0 0 -1px 0;
				width:28px;
			}
			/* middle bar #2 animation (4 lines) */
			.materialize-menu-active .materialize-menu-button div.materialize-menu-button-middle:after {
				margin:-1px 0 0 0;
			}
			/* top+bottom bar fade out (4 lines) */
			.materialize-menu-active .materialize-menu-button:before,
			.materialize-menu-active .materialize-menu-button:after {
				opacity:0;
				width:28px;
				
				-webkit-transition:all .25s ease;
				-moz-transition:all .25s ease;
				transition:all .25s ease;
			}
			/* top bar animation (alternate 4 lines) */
			.materialize-menu-active .materialize-menu-button-alt:before {
				-webkit-transform:translateY(9px);
				-moz-transform:translateY(9px);
				transform:translateY(9px);
			}
			/* middle bar #1 animation (alternate 4 lines) */
			.materialize-menu-active .materialize-menu-button-alt div.materialize-menu-button-alt-middle:before {
				-webkit-transform:translateY(3px);
				-moz-transform:translateY(3px);
				transform:translateY(3px);
			}
			/* middle bar #2 animation (alternate 4 lines) */
			.materialize-menu-active .materialize-menu-button-alt div.materialize-menu-button-alt-middle:after {
				-webkit-transform:translateY(-3px);
				-moz-transform:translateY(-3px);
				transform:translateY(-3px);
			}
			/* bottom bar animation (alternate 4 lines) */
			.materialize-menu-active .materialize-menu-button-alt:after {
				-webkit-transform:translateY(-9px);
				-moz-transform:translateY(-9px);
				transform:translateY(-9px);
			}
			/* middle bar animation (3 lines) */
			.materialize-menu-active .materialize-menu-button-three div.materialize-menu-button-three-middle:before {
				margin:0 0 -1px 0;
			}
			/* top bar fade out (3 lines) */
			.materialize-menu-active .materialize-menu-button-three:before {
				opacity:0;
				
				-webkit-transform:translateY(8px);
				-moz-transform:translateY(8px);
				transform:translateY(8px);
				
				-webkit-transition:-webkit-transform .25s ease, opacity 0s ease .25s;
				-moz-transition:-moz-transform .25s ease, opacity 0s ease .25s;
				transition:transform .25s ease, opacity 0s ease .25s;
			}
			/* bottom bar fade out (3 lines) */
			.materialize-menu-active .materialize-menu-button-three:after {
				opacity:0;
				
				-webkit-transform:translateY(-7px);
				-moz-transform:translateY(-7px);
				transform:translateY(-7px);
				
				-webkit-transition:-webkit-transform .25s ease, opacity 0s ease .25s;
				-moz-transition:-moz-transform .25s ease, opacity 0s ease .25s;
				transition:transform .25s ease, opacity 0s ease .25s;
			}
			/* middle bar animation (alternate 3 lines) */
			.materialize-menu-active .materialize-menu-button-three-alt div.materialize-menu-button-three-alt-middle:before {
				margin:0 0 -1px 0;
			}
			/* top bar fade out (alternate 3 lines) */
			.materialize-menu-active .materialize-menu-button-three-alt:before {
				width:0;
				
				-webkit-transition:all .25s ease;
				-moz-transition:all .25s ease;
				transition:all .25s ease;
			}
			/* bottom bar fade out (alternate 3 lines) */
			.materialize-menu-active .materialize-menu-button-three-alt:after {
				width:0;
				
				-webkit-transition:all .25s ease;
				-moz-transition:all .25s ease;
				transition:all .25s ease;
			}
		<?php } else if(get_option('drawer_materialize_button_animation') == "materializexanimation") { ?>
			/* top bar animation (4 lines) */
			.materialize-menu-active .materialize-menu-button:before {
				margin:5px 0 0 -2px;
				
				transform:translateY(9px) rotate(45deg);
				-moz-transform:translateY(9px) rotate(45deg);
				-webkit-transform:translateY(9px) rotate(45deg);
			}
			/* bottom bar animation (4 lines) */
			.materialize-menu-active .materialize-menu-button:after {
				margin:5px 0 0 -2px;
				width:28px;
				
				transform:translateY(-9px) rotate(-45deg);
				-moz-transform:translateY(-9px) rotate(-45deg);
				-webkit-transform:translateY(-9px) rotate(-45deg);
			}
			/* middle bars fade out (4 lines) */
			.materialize-menu-active div.materialize-menu-button-middle:before,
			.materialize-menu-active div.materialize-menu-button-middle:after {
				opacity:0;
				width:28px;
				
				-webkit-transition:all .2s ease;
				-moz-transition:all .2s ease;
				transition:all .2s ease;
			}
			/* top bar animation (alternate 4 lines) */
			.materialize-menu-active .materialize-menu-button-alt:before {
				width:11px;
				
				transform:translateY(3px) translateX(-1px) rotate(45deg);
				-moz-transform:translateY(3px) translateX(-1px) rotate(45deg);
				-webkit-transform:translateY(3px) translateX(-1px) rotate(45deg);
			}
			/* middle bar #1 animation (alternate 4 lines) */
			.materialize-menu-active .materialize-menu-button-alt div.materialize-menu-button-alt-middle:before {
				width:11px;
				
				transform:translateY(-3px) translateX(11px) rotate(-45deg);
				-moz-transform:translateY(-3px) translateX(11px) rotate(-45deg);
				-webkit-transform:translateY(-3px) translateX(11px) rotate(-45deg);
			}
			/* middle bar #2 animation (alternate 4 lines) */
			.materialize-menu-active .materialize-menu-button-alt div.materialize-menu-button-alt-middle:after {
				width:11px;
				
				transform:translateY(3px) translateX(-1px) rotate(-45deg);
				-moz-transform:translateY(3px) translateX(-1px) rotate(-45deg);
				-webkit-transform:translateY(3px) translateX(-1px) rotate(-45deg);
			}
			/* bottom bar animation (alternate 4 lines) */
			.materialize-menu-active .materialize-menu-button-alt:after {
				width:11px;
				
				transform:translateY(-3px) translateX(11px) rotate(45deg);
				-moz-transform:translateY(-3px) translateX(11px) rotate(45deg);
				-webkit-transform:translateY(-3px) translateX(11px) rotate(45deg);
			}
			/* top bar animation (3 lines) */
			.materialize-menu-active .materialize-menu-button-three:before {
				margin:4px 0 0 -2px;
				
				transform:translateY(8px) rotate(45deg);
				-moz-transform:translateY(8px) rotate(45deg);
				-webkit-transform:translateY(8px) rotate(45deg);
			}
			/* bottom bar animation (3 lines) */
			.materialize-menu-active .materialize-menu-button-three:after {
				margin:4px 0 0 -2px;
				
				transform:translateY(-8px) rotate(-45deg);
				-moz-transform:translateY(-8px) rotate(-45deg);
				-webkit-transform:translateY(-8px) rotate(-45deg);
			}
			/* middle bar fade out (3 lines) */
			.materialize-menu-active div.materialize-menu-button-three-middle:before {
				opacity:0;
				
				-webkit-transition:all .15s ease;
				-moz-transition:all .15s ease;
				transition:all .15s ease;
			}
			/* top bar animation (alternate 3 lines) */
			.materialize-menu-active .materialize-menu-button-three-alt:before {
				width:24px;
				margin-right:3px;
				
				transform:translateY(6px) rotate(45deg);
				-moz-transform:translateY(6px) rotate(45deg);
				-webkit-transform:translateY(6px) rotate(45deg);
			}
			/* bottom bar animation (alternate 3 lines) */
			.materialize-menu-active .materialize-menu-button-three-alt:after {
				width:24px;
				margin:8px 0 0 0px;
				
				transform:translateY(-10px) rotate(-45deg);
				-moz-transform:translateY(-10px) rotate(-45deg);
				-webkit-transform:translateY(-10px) rotate(-45deg);
			}
			/* middle bar fade out (alternate 3 lines) */
			.materialize-menu-active div.materialize-menu-button-three-alt-middle:before {
				opacity:0;
				
				-webkit-transition:all .15s ease;
				-moz-transition:all .15s ease;
				transition:all .15s ease;
			}
		<?php } else { ?>
		<?php } ?>
		
		/* if submenu arrow divider is hidden */
		<?php if( get_option('drawer_materialize_hide_submenu_divider') ) { ?>
		.materialize-drawer .menu li span {
			border:none;
			<?php if(get_option('drawer_materialize_horizontal_alignment') == "materializealignright") { ?>
				margin-right:-3px;
			<?php } else { ?>
				margin-left:-3px;
			<?php } ?>
		}
		<?php } ?>
		
		/* hide materialize between resolutions */
		@media ( min-width:<?php echo get_option('drawer_materialize_smaller_than'); ?>px) and (max-width:<?php echo get_option('drawer_materialize_larger_than'); ?>px) {
			.materialize-menu-button-wrapper,
			.materialize-logo-wrapper,
			.tap-tap-header,
			.materialize-background-color,
			.materialize-background-image,
			.materialize-main-wrapper,
			.materialize-search-wrapper,
			.materialize-search-button,
			.materialize-search-button-right { display:none; }
			body { margin-top:0 !important; }
		}
		/* hide theme menu */
		<?php if(get_option('drawer_materialize_hide_theme_menu')) { ?>
		@media screen and (max-width:<?php echo get_option('drawer_materialize_smaller_than'); ?>px) {
			<?php echo stripslashes(get_option('drawer_materialize_hide_theme_menu')); ?> { display:none !important; }
		}
		@media screen and (min-width:<?php echo get_option('drawer_materialize_larger_than'); ?>px) {
			<?php echo stripslashes(get_option('drawer_materialize_hide_theme_menu')); ?> { display:none !important; }
		}
		<?php } ?>
		</style>
		<!-- END CUSTOM COLORS (WP THEME CUSTOMIZER) -->
	
	<?php
	}
	add_action('wp_footer','drawer_materialize_header_customize');

?>