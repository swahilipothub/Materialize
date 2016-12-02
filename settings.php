<?php

add_action( 'admin_init', 'mn_register_settings' );


function mn_register_settings() {
    $options = mn_get_options();
    $behaviour_vis = $options['mn_sidebar_style'] === 'side' || $options['mn_sidebar_style'] === 'skew' ? false : true;
    $skew_vis = $options['mn_sidebar_style'] !== 'skew';
    $btn_hidden = $options['mn_label_vis'] === 'visible' ? false : true;
    $fade_full_hidden = $options['mn_sidebar_style'] === 'full' ? false : true;
    $opening_type_hidden = $options['mn_sidebar_style'] === 'toollbar' || $options['mn_sidebar_behaviour'] === '' ? false : true;
    $side_stroke_hidden = $options['mn_sidebar_style'] === 'toollbar' || $options['mn_sidebar_behaviour'] === '' ? false : true;
    $mn_license_tab = get_license() ? 'License' : '!Activate';
    $mn_license_label = get_license() ? 'Your Materialize copy activated' : 'Activate Materialize';

	register_setting( 'mn_options', 'mn_options', 'mn_options_validate' );

	add_settings_section('mn_source', '', 'mn_section', 'mn');
    add_settings_field('mn_learn_materialize', "Learn Materialize", 'mn_learn_materialize_str', 'mn', 'mn_source', array('chapter' => 'Source'));
    add_settings_field('mn_active_menu', "MATERIALIZE MENUS", 'mn_active_menu_str', 'mn', 'mn_source');
    add_settings_field('mn_alternative_menu', "ALTERNATIVE MENU AS SOURCE ", 'mn_alternative_menu_str', 'mn', 'mn_source');
	add_settings_field('mn_test_mode', "", 'mn_test_mode_str', 'mn', 'mn_source', array('chapter' => 'Test mode during setup'));
	add_settings_field('mn_display', "", 'mn_display_str', 'mn', 'mn_source', array('chapter' => 'General display rules'));

	// add_settings_field('mn_hide_def', "Visibility of source menu:", 'mn_hide_def_str', 'mn', 'mn_source');
	// own HTML

	add_settings_section('mn_appearance', 'Menu Panel', 'mn_section', 'mn');
	add_settings_field('mn_sidebar_style', "Design", 'mn_sidebar_style_str', 'mn', 'mn_appearance', array('chapter' => 'General', 'subsection' => 'general'));
	add_settings_field('mn_sidebar_behaviour', "Behaviour", 'mn_sidebar_behaviour_str', 'mn', 'mn_appearance', array('subsection' => 'general', 'hidden' => $behaviour_vis));
	add_settings_field('mn_sidebar_pos', "MENU SIDE", 'mn_sidebar_pos_str', 'mn', 'mn_appearance', array('subsection' => 'general'));
	add_settings_field('mn_skew_type', "Skew style", 'mn_skew_type_str', 'mn', 'mn_appearance', array('subsection' => 'general', 'hidden' => $skew_vis));
	add_settings_field('mn_opening_type', "MENU TRIGGER", 'mn_opening_type_str', 'mn', 'mn_appearance', array('subsection' => 'general', 'hidden' => $opening_type_hidden));
	add_settings_field('mn_sub_type', "MOBILE LOGIC FOR SUBMENUS ON DESKTOP", 'mn_sub_type_str', 'mn', 'mn_appearance', array('subsection' => 'general'));
	add_settings_field('mn_sub_opening_type', "Trigger for submenus opening", 'mn_sub_opening_type_str', 'mn', 'mn_appearance', array('subsection' => 'general'));
	add_settings_field('mn_fade_content', "FADE EFFECT", 'mn_fade_content_str', 'mn', 'mn_appearance', array('subsection' => 'general'));
	add_settings_field('mn_fade_full', "Overlay color in fullscreen mode", 'mn_fade_full_str', 'mn', 'mn_appearance', array('subsection' => 'general', 'hidden' => $fade_full_hidden));
	add_settings_field('mn_blur_content', "BLUR EFFECT", 'mn_blur_content_str', 'mn', 'mn_appearance', array('subsection' => 'general'));
	add_settings_field('mn_transparent_panel', "Semi-transparent background mode", 'mn_transparent_panel_str', 'mn', 'mn_appearance', array('subsection' => 'general'));
	add_settings_field('mn_transition', "Fading in/out for page transitions", 'mn_transition_str', 'mn', 'mn_appearance', array('subsection' => 'general'));

	add_settings_field('mn_width_panel_1', "HOME LEVEL", 'mn_width_panel_1_str', 'mn', 'mn_appearance', array('chapter' => 'Styling', 'subsection' => 'styling'));
	add_settings_field('mn_bg_color_panel_1', "", 'mn_bg_color_panel_1_str', 'mn', 'mn_appearance', array('subsection' => 'styling'));
	add_settings_field('mn_color_panel_1', "", 'mn_color_panel_1_str', 'mn', 'mn_appearance', array('subsection' => 'styling'));
	add_settings_field('mn_scolor_panel_1', "", 'mn_scolor_panel_1_str', 'mn', 'mn_appearance', array('subsection' => 'styling'));
	add_settings_field('mn_image_bg', "Custom background image", 'mn_image_bg_str', 'mn', 'mn_appearance', array('subsection' => 'styling'));
	add_settings_field('mn_width_panel_2', "Second level", 'mn_width_panel_2_str', 'mn', 'mn_appearance', array('subsection' => 'styling'));
	add_settings_field('mn_bg_color_panel_2', "", 'mn_bg_color_panel_2_str', 'mn', 'mn_appearance', array('subsection' => 'styling'));
	add_settings_field('mn_color_panel_2', "", 'mn_color_panel_2_str', 'mn', 'mn_appearance', array('subsection' => 'styling'));
	add_settings_field('mn_scolor_panel_2', "", 'mn_scolor_panel_2_str', 'mn', 'mn_appearance', array('subsection' => 'styling'));
	add_settings_field('mn_width_panel_3', "Third level", 'mn_width_panel_3_str', 'mn', 'mn_appearance', array('subsection' => 'styling'));
	add_settings_field('mn_bg_color_panel_3', "", 'mn_bg_color_panel_3_str', 'mn', 'mn_appearance', array('subsection' => 'styling'));
	add_settings_field('mn_color_panel_3', "", 'mn_color_panel_3_str', 'mn', 'mn_appearance', array('subsection' => 'styling'));
	add_settings_field('mn_scolor_panel_3', "", 'mn_scolor_panel_3_str', 'mn', 'mn_appearance', array('subsection' => 'styling'));
	add_settings_field('mn_width_panel_4', "Forth level", 'mn_width_panel_4_str', 'mn', 'mn_appearance', array('subsection' => 'styling'));
	add_settings_field('mn_bg_color_panel_4', "", 'mn_bg_color_panel_4_str', 'mn', 'mn_appearance', array('subsection' => 'styling'));
	add_settings_field('mn_color_panel_4', "", 'mn_color_panel_4_str', 'mn', 'mn_appearance', array('subsection' => 'styling'));
	add_settings_field('mn_scolor_panel_4', "", 'mn_scolor_panel_4_str', 'mn', 'mn_appearance', array('subsection' => 'styling'));
	add_settings_field('mn_chapter_1', "", 'mn_chapter_1_str', 'mn', 'mn_appearance', array('subsection' => 'styling'));
	add_settings_field('mn_chapter_2', "", 'mn_chapter_2_str', 'mn', 'mn_appearance', array('subsection' => 'styling'));
	add_settings_field('mn_chapter_3', "", 'mn_chapter_3_str', 'mn', 'mn_appearance', array('subsection' => 'styling'));
	add_settings_field('mn_chapter_4', "", 'mn_chapter_4_str', 'mn', 'mn_appearance', array('subsection' => 'styling'));

	add_settings_field('mn_tab_logo', "Top image", 'mn_tab_logo_str', 'mn', 'mn_appearance', array('chapter' => 'Identity', 'subsection' => 'identity'));
	add_settings_field('mn_first_line', "SITE TITLE", 'mn_first_line_str', 'mn', 'mn_appearance', array('subsection' => 'identity'));
	add_settings_field('mn_sec_line', "TAGLINE", 'mn_sec_line_str', 'mn', 'mn_appearance', array('subsection' => 'identity'));

	add_settings_field('mn_facebook', "Facebook URL", 'mn_facebook_str', 'mn', 'mn_appearance', array('chapter' => 'Social', 'column' => 1, 'subsection' => 'social'));
	add_settings_field('mn_dribbble', "Dribbble URL", 'mn_dribbble_str', 'mn', 'mn_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('mn_twitter', "Twitter URL", 'mn_twitter_str', 'mn', 'mn_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('mn_youtube', "Youtube URL", 'mn_youtube_str', 'mn', 'mn_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('mn_linkedin', "Linkedin URL", 'mn_linkedin_str', 'mn', 'mn_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('mn_vimeo', "Vimeo URL", 'mn_vimeo_str', 'mn', 'mn_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('mn_gplus', "Google Plus URL", 'mn_gplus_str', 'mn', 'mn_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('mn_soundcloud', "SoundCloud URL", 'mn_soundcloud_str', 'mn', 'mn_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('mn_instagram', "Instagram URL", 'mn_instagram_str', 'mn', 'mn_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('mn_email', "Email", 'mn_email_str', 'mn', 'mn_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('mn_pinterest', "Pinterest URL", 'mn_pinterest_str', 'mn', 'mn_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('mn_skype', "Skype", 'mn_skype_str', 'mn', 'mn_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('mn_flickr', "Flickr URL", 'mn_flickr_str', 'mn', 'mn_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('mn_rss', "RSS", 'mn_rss_str', 'mn', 'mn_appearance', array('column' => 1, 'subsection' => 'social'));

	add_settings_field('mn_social_color', "Icons Color", 'mn_social_color_str', 'mn', 'mn_appearance', array('subsection' => 'social'));

    add_settings_field('mn_search', "Search field", 'mn_search_str', 'mn', 'mn_appearance', array('chapter' => 'Extra', 'subsection' => 'extra'));
	add_settings_field('mn_search_bg', "Search field background fade", 'mn_search_bg_str', 'mn', 'mn_appearance', array('subsection' => 'extra'));
	add_settings_field('mn_above_logo', "Above logo content area", 'mn_above_logo_str', 'mn', 'mn_appearance', array('subsection' => 'extra'));
	add_settings_field('mn_under_logo', "Under logo content area", 'mn_under_logo_str', 'mn', 'mn_appearance', array('subsection' => 'extra'));
	add_settings_field('mn_copy', "Copyrights content area", 'mn_copy_str', 'mn', 'mn_appearance', array('subsection' => 'extra'));

	// MENU SECTION
	add_settings_section('mn_menu_items', 'Menu items', 'mn_section', 'mn');
	add_settings_field('mn_font', "", 'mn_font_str', 'mn', 'mn_menu_items', array('chapter' => 'Font settings'));
	add_settings_field('mn_font_size', "", 'mn_font_size_str', 'mn', 'mn_menu_items');
	add_settings_field('mn_font_weight', "", 'mn_font_weight_str', 'mn', 'mn_menu_items');
	add_settings_field('mn_alignment', "", 'mn_alignment_str', 'mn', 'mn_menu_items');
	add_settings_field('mn_uppercase', "", 'mn_uppercase_str', 'mn', 'mn_menu_items');
    add_settings_field('mn_c_font', "", 'mn_c_font_str', 'mn', 'mn_menu_items', array('chapter' => 'Section headers styling'));
    add_settings_field('mn_c_fs', "", 'mn_c_fs_str', 'mn', 'mn_menu_items');
    add_settings_field('mn_c_weight', "", 'mn_c_weight_str', 'mn', 'mn_menu_items');
	add_settings_field('mn_c_trans', "", 'mn_c_trans_str', 'mn', 'mn_menu_items');

	add_settings_field('mn_padding', "Padding of menu item", 'mn_padding_str', 'mn', 'mn_menu_items', array('chapter' => 'Customizing items'));
	add_settings_field('mn_icon_size', "Icons & images size", 'mn_icon_size_str', 'mn', 'mn_menu_items');
	add_settings_field('mn_icon_color', "Icons color", 'mn_icon_color_str', 'mn', 'mn_menu_items');
	add_settings_field('mn_ind', "Submenu indicators", 'mn_ind_str', 'mn', 'mn_menu_items');
	add_settings_field('mn_separators', "Separators between menu items", 'mn_separators_str', 'mn', 'mn_menu_items');
	add_settings_field('mn_separators_color', "Separators color", 'mn_separators_color_str', 'mn', 'mn_menu_items', array('hidden' => $options['mn_separators'] == '' ? true : false,));
	add_settings_field('mn_separators_width', "Separators width", 'mn_separators_width_str', 'mn', 'mn_menu_items', array('hidden' => $options['mn_separators'] == '' ? true : false,));
	add_settings_field('mn_highlight', "Highlighting of menu items on hover", 'mn_highlight_str', 'mn', 'mn_menu_items');
	add_settings_field('mn_highlight_active', "Highlighting active page item", 'mn_highlight_active_str', 'mn', 'mn_menu_items');

	add_settings_section('mn_label', 'Button', 'mn_section', 'mn');
	add_settings_field('mn_label_vis', "Button visibility", 'mn_label_vis_str', 'mn', 'mn_label', array('chapter' => 'General', 'column' => 1));
	add_settings_field('mn_label_type', "Button type", 'mn_label_type_str', 'mn', 'mn_label', array('hidden' => $btn_hidden, 'column' => 1));
	add_settings_field('mn_fixed', "Button fixed on page", 'mn_fixed_str', 'mn', 'mn_label', array('hidden' => $btn_hidden, 'column' => 1));
	add_settings_field('mn_label_shift', "HORIZONTAL SHIFT", 'mn_label_shift_str', 'mn', 'mn_label', array('hidden' => $btn_hidden, 'column' => 1));
	add_settings_field('mn_label_top', "TOP MARGIN", 'mn_label_top_str', 'mn', 'mn_label', array('hidden' => $btn_hidden, 'column' => 1));
	add_settings_field('mn_label_top_mobile', "TOP MARGIN ON MOBILES", 'mn_label_top_mobile_str', 'mn', 'mn_label', array('hidden' => $btn_hidden, 'column' => 1));
	add_settings_field('mn_mob_nav', "Navbar for mobiles", 'mn_mob_nav_str', 'mn', 'mn_label', array('hidden' => $btn_hidden, 'column' => 1));
	add_settings_field('mn_threshold_point', "Threshold point", 'mn_threshold_point_str', 'mn', 'mn_label', array('hidden' => $btn_hidden, 'column' => 1));

	add_settings_field('mn_label_icon', "Icon", 'mn_label_icon_str', 'mn', 'mn_label', array('hidden' => $btn_hidden || $options['mn_label_type'] == 'default' ? true : false, 'chapter' => 'Stylings', 'column' => 2));
	add_settings_field('mn_label_size', "Icon Size", 'mn_label_size_str', 'mn', 'mn_label', array('hidden' => $btn_hidden, 'column' => 2));
	add_settings_field('mn_label_style', "Button style", 'mn_label_style_str', 'mn', 'mn_label', array('hidden' => $btn_hidden, 'column' => 2));
	add_settings_field('mn_label_width', "Icon lines width", 'mn_label_width_str', 'mn', 'mn_label', array('hidden' => $btn_hidden, 'column' => 2));
	add_settings_field('mn_label_gaps', "Icon lines gaps", 'mn_label_gaps_str', 'mn', 'mn_label', array('hidden' => $btn_hidden, 'column' => 2));
	add_settings_field('mn_label_color', "BUTTON BASE COLOR", 'mn_label_color_str', 'mn', 'mn_label', array('hidden' => $btn_hidden, 'column' => 2));
	add_settings_field('mn_label_icon_color', "Button Icon color", 'mn_label_icon_color_str', 'mn', 'mn_label', array('hidden' => $btn_hidden, 'column' => 2));
	add_settings_field('mn_label_text', "Show Button text", 'mn_label_text_str', 'mn', 'mn_label', array('hidden' => $btn_hidden, 'column' => 2));
	add_settings_field('mn_label_text_field', "", 'mn_label_text_field_str', 'mn', 'mn_label', array('hidden' => $btn_hidden, 'column' => 2));
	add_settings_field('mn_label_text_color', "Button text color", 'mn_label_text_color_str', 'mn', 'mn_label', array('hidden' => $btn_hidden, 'column' => 2));

	add_settings_section('mn_advanced', 'Advanced', 'mn_section', 'mn');
	add_settings_field('mn_css', "Additional CSS", 'mn_css_str', 'mn', 'mn_advanced', array('chapter' => 'Advanced settings'));
	add_settings_field('mn_submenu_support', "Allow Submenu", 'mn_submenu_support_str', 'mn', 'mn_advanced');
	add_settings_field('mn_submenu_mob', "Allow Submenu on mobiles", 'mn_submenu_mob_str', 'mn', 'mn_advanced');
	add_settings_field('mn_submenu_classes', "Sub-menu classes list", 'mn_submenu_classes_str', 'mn', 'mn_advanced');
	add_settings_field('mn_togglers', "Additional element to toggle menu", 'mn_togglers_str', 'mn', 'mn_advanced');
	add_settings_field('mn_dev', "Use non-minified JS script", 'mn_dev_str', 'mn', 'mn_advanced');

    add_settings_section('mn_icons', 'Icons', 'mn_section', 'mn');
    add_settings_field('mn_icons_manager', "", 'mn_icons_manager_str', 'mn', 'mn_icons',  array('chapter' => 'Icon Sets', 'header_hidden' => true));

    /*add_settings_section('mn_license', $mn_license_tab, 'mn_section', 'mn');
	add_settings_field('mn_license_text', "", 'mn_license_text_str', 'mn', 'mn_license', array('chapter' => $mn_license_label));
	add_settings_field('mn_license_fname', "First name", 'mn_license_fname_str', 'mn', 'mn_license');
	add_settings_field('mn_license_lname', "Last name", 'mn_license_lname_str', 'mn', 'mn_license');
	add_settings_field('mn_license_email', "Your email *", 'mn_license_email_str', 'mn', 'mn_license');
	add_settings_field('mn_license_code', "Purchase code *", 'mn_license_code_str', 'mn', 'mn_license');
	add_settings_field('mn_license_subscribe', "", 'mn_license_subscribe_str', 'mn', 'mn_license');
    add_settings_field('mn_license_valid', "", 'mn_license_valid_str', 'mn', 'mn_license', array('hidden' => true));*/

    add_settings_section('mn_feedback', 'Feedback', 'mn_section', 'mn');

}

function mn_section() {

}

global $mn_cached_opts;


function mn_get_options()
{
	global $mn_cached_opts;

	if (isset($mn_cached_opts)) {return $mn_cached_opts;}

	$options = get_option('mn_options');

	$options['locations'] = mn_get_locations();

	if (empty($options['mn_test_mode'])) {
		$options['mn_test_mode'] = '';
	}
    if (empty($options['mn_fixed'])) {
		$options['mn_fixed'] = '';
	}
    if (empty($options['mn_dev'])) {
		$options['mn_dev'] = '';
	}

	if (empty($options['mn_fa_on'])) {
		$options['mn_fa_on'] = '';
	}

	if (empty($options['mn_active_menu'])) {
		$options['mn_active_menu'] = '';
	}

	if (empty($options['mn_display'])) {
		$opts = (object)array(
			"user" => (object)array(
					"everyone" => 1,
					"loggedin" => 0,
					"loggedout" => 0,
				),
			"desktop" => (object)array(
					"yes" => 1,
					"no" => 0,
				),
			"mobile" => (object)array(
					"yes" => 1,
					"no" => 0,
				),
			"rule" => (object)array(
					"include" => 0,
					"exclude" => 1,
				),
			"location" => (object)array(
					"pages" => (object)array(),
					"cposts" => (object)array(),
					"cats" => (object)array(),
					"taxes" => (object)array(),
					"langs" => (object)array(),
					"wp_pages" => (object)array(),
					"ids" => array(),
				),
		);
		$options['mn_display'] =  json_encode($opts);
	}

	if (empty($options['mn_label_width'])) {
		$options['mn_label_width'] = '1';
	}

	if (empty($options['mn_label_gaps'])) {
		$options['mn_label_gaps'] = '8';
	}

    if (empty($options['mn_threshold_point'])) {
		$options['mn_threshold_point'] = '782';
	}

	if (empty($options['mn_alternative_menu'])) {
		$options['mn_alternative_menu'] = '';
	}

	if (empty($options['mn_hide_def'])) {
		$options['mn_hide_def'] = '';
	}

	if (empty($options['mn_tab_logo'])) {
		$options['mn_tab_logo'] = '';
	}
	if (empty($options['mn_first_line'])) {
		$options['mn_first_line'] = '';
	}
	if (empty($options['mn_sec_line'])) {
		$options['mn_sec_line'] = '';
	}

	if (empty($options['mn_bg_color_panel_1'])) {
		$options['mn_bg_color_panel_1'] = '#212121';
	}

    if (empty($options['mn_skew_type'])) {
		$options['mn_skew_type'] = 'top';
	}
    if (empty($options['mn_image_bg'])) {
		$options['mn_image_bg'] = '';
	}

	if (empty($options['mn_bg_color_panel_2'])) {
		$options['mn_bg_color_panel_2'] = '#453e5b';
	}

	if (empty($options['mn_bg_color_panel_3'])) {
		$options['mn_bg_color_panel_3'] = '#36939e';
	}

	if (empty($options['mn_bg_color_panel_4'])) {
		$options['mn_bg_color_panel_4'] = '#9e466b';
	}
    if (empty($options['mn_chapter_1'])) {
		$options['mn_chapter_1'] = '#00FFB8';
	}

	if (empty($options['mn_chapter_2'])) {
		$options['mn_chapter_2'] = '#FFFFFF';
	}

	if (empty($options['mn_chapter_3'])) {
		$options['mn_chapter_3'] = '#FFFFFF';
	}

	if (empty($options['mn_chapter_4'])) {
		$options['mn_chapter_4'] = '#FFFFFF';
	}

	if (empty($options['mn_color_panel_1'])) {
		$options['mn_color_panel_1'] = '#aaaaaa';
	}

	if (empty($options['mn_fade_full'])) {
		$options['mn_fade_full'] = 'rgba(0,0,0,0.9)';
	}

	if (empty($options['mn_scolor_panel_1'])) {
		$options['mn_scolor_panel_1'] = '#aaaaaa';
	}	if (empty($options['mn_scolor_panel_2'])) {
		$options['mn_scolor_panel_2'] = '#aaaaaa';
	}	if (empty($options['mn_scolor_panel_3'])) {
		$options['mn_scolor_panel_3'] = '#aaaaaa';
	}	if (empty($options['mn_scolor_panel_4'])) {
		$options['mn_scolor_panel_4'] = '#aaaaaa';
	}

	if (empty($options['mn_color_panel_2'])) {
		$options['mn_color_panel_2'] = '#ffffff';
	}

	if (empty($options['mn_color_panel_3'])) {
		$options['mn_color_panel_3'] = '#ffffff';
	}

	if (empty($options['mn_color_panel_4'])) {
		$options['mn_color_panel_4'] = '#ffffff';
	}

	if (empty($options['mn_custom_bg'])) {
		$options['mn_custom_bg'] = '';
	}

	if (empty($options['mn_fade_content'])) {
		$options['mn_fade_content'] = 'light';
	}

	if (empty($options['mn_blur_content'])) {
		$options['mn_blur_content'] = '';
	}

	if (empty($options['mn_selectors'])) {
		$options['mn_selectors'] = '';
	}

	if (empty($options['mn_sidebar_pos'])) {
		$options['mn_sidebar_pos'] = 'left';
	}
	if (empty($options['mn_iconbar'])) {
		$options['mn_iconbar'] = '';
	}

	if (empty($options['mn_width_panel_1'])) {
		$options['mn_width_panel_1'] = '275';
	}
	if (empty($options['mn_width_panel_2'])) {
		$options['mn_width_panel_2'] = '250';
	}
	if (empty($options['mn_width_panel_3'])) {
		$options['mn_width_panel_3'] = '250';
	}
	if (empty($options['mn_width_panel_4'])) {
		$options['mn_width_panel_4'] = '200';
	}

	if (empty($options['mn_sidebar_style'])) {
		$options['mn_sidebar_style'] = 'side';
	}

	if (empty($options['mn_sidebar_behaviour'])) {
		$options['mn_sidebar_behaviour'] = 'slide';
	}

	if (empty($options['mn_opening_type'])) {
		$options['mn_opening_type'] = 'hover';
	}

    if (empty($options['mn_sub_type'])) {
		$options['mn_sub_type'] = '';
	}

//	if (empty($options['mn_sub_opening_type'])) {
		$options['mn_sub_opening_type'] = 'hover';
//	}


	if (empty($options['mn_transition'])) {
		$options['mn_transition'] = 'no';
	}

	if (empty($options['mn_transparent_panel'])) {
		$options['mn_transparent_panel'] = 'none';
	}

	if (empty($options['mn_search'])) {
		$options['mn_search'] = 'hidden';
	}

	if (empty($options['mn_search_bg'])) {
		$options['mn_search_bg'] = 'light';
	}

	// Appearance
	if (empty($options['mn_font'])) {
		$options['mn_font'] = 'inherit';
	}
	if (empty($options['mn_c_font'])) {
		$options['mn_c_font'] = 'inherit';
	}
	if (empty($options['mn_font_size'])) {
		$options['mn_font_size'] = '20';
	}

    if (empty($options['mn_c_fs'])) {
		$options['mn_c_fs'] = '15';
	}

	if (empty($options['mn_font_weight'])) {
		$options['mn_font_weight'] = 'normal';
	}
    if (empty($options['mn_c_weight'])) {
		$options['mn_c_weight'] = 'bold';
	}
	if (empty($options['mn_padding'])) {
		$options['mn_padding'] = '15';
	}
	if (empty($options['mn_icon_size'])) {
		$options['mn_icon_size'] = '40';
	}
	if (empty($options['mn_icon_color'])) {
		$options['mn_icon_color'] = '#777';
	}
	if (empty($options['mn_lh'])) {
		$options['mn_lh'] = '20';
	}
	if (empty($options['mn_alignment'])) {
		$options['mn_alignment'] = 'left';
	}
	if (empty($options['mn_uppercase'])) {
		$options['mn_uppercase'] = 'no';
	}
    if (empty($options['mn_c_trans'])) {
		$options['mn_c_trans'] = 'yes';
	}

	if (empty($options['mn_separators'])) {
		$options['mn_separators'] = '';
	}

	if (empty($options['mn_ind'])) {
		$options['mn_ind'] = '';
	}
	if (empty($options['mn_highlight'])) {
		$options['mn_highlight'] = 'semi';
	}

	if (empty($options['mn_highlight_active'])) {
		$options['mn_highlight_active'] = '';
	}

	//
	if (empty($options['mn_label_color'])) {
		$options['mn_label_color'] = '#000000';
	}

	if (empty($options['mn_label_icon_color'])) {
		$options['mn_label_icon_color'] = '#ffffff';
	}

	if (empty($options['mn_label_invert'])) {
		$options['mn_label_invert'] = '';
	}
	if (empty($options['mn_label_type'])) {
		$options['mn_label_type'] = 'default';
	}

	if (empty($options['mn_label_icon'])) {
		$options['mn_label_icon'] = 'Entypo+_####_menu';
	}

	if (empty($options['mn_label_size'])) {
		$options['mn_label_size'] = '53px';
	}

	if (empty($options['mn_label_style'])) {
		$options['mn_label_style'] = 'metro';
	}

	if (empty($options['mn_label_top'])) {
		$options['mn_label_top'] = '0px';
	}

	if (empty($options['mn_label_top_mobile'])) {
		$options['mn_label_top_mobile'] = '0px';
	}

    if (empty($options['mn_label_shift'])) {
		$options['mn_label_shift'] = '0px';
	}

	if (empty($options['mn_label_size'])) {
		$options['mn_label_size'] = '1x';
	}

	if (empty($options['mn_label_vis'])) {
		$options['mn_label_vis'] = 'hidden';
	}

	if (empty($options['mn_mob_nav'])) {
		$options['mn_mob_nav'] = '';
	}

	if (empty($options['mn_label_text'])) {
		$options['mn_label_text'] = '';
	}

	if (empty($options['mn_label_text_field'])) {
		$options['mn_label_text_field'] = 'Menu';
	}

	if (empty($options['mn_label_text_color'])) {
		$options['mn_label_text_color'] = '#CA3C08';
	}

	if (empty($options['mn_css'])) {
		$options['mn_css'] = '';
	}

	// SOCIAL
	if (empty($options['mn_facebook'])) {
		$options['mn_facebook'] = '';
	}
	if (empty($options['mn_twitter'])) {
		$options['mn_twitter'] = '';
	}
	if (empty($options['mn_pinterest'])) {
		$options['mn_pinterest'] = '';
	}
	if (empty($options['mn_youtube'])) {
		$options['mn_youtube'] = '';
	}
	if (empty($options['mn_vimeo'])) {
		$options['mn_vimeo'] = '';
	}
	if (empty($options['mn_soundcloud'])) {
		$options['mn_soundcloud'] = '';
	}
	if (empty($options['mn_instagram'])) {
		$options['mn_instagram'] = '';
	}
	if (empty($options['mn_linkedin'])) {
		$options['mn_linkedin'] = '';
    }
    if (empty($options['mn_dribbble'])) {
		$options['mn_dribbble'] = '';
    }
    if (empty($options['mn_flickr'])) {
		$options['mn_flickr'] = '';
    }
    if (empty($options['mn_skype'])) {
		$options['mn_skype'] = '';
    }
    if (empty($options['mn_email'])) {
		$options['mn_email'] = '';
    }
    if (empty($options['mn_above_logo'])) {
		$options['mn_above_logo'] = '';
	}
    if (empty($options['mn_under_logo'])) {
		$options['mn_under_logo'] = '';
	}
    if (empty($options['mn_copy'])) {
		$options['mn_copy'] = '';
	}
	if (empty($options['mn_gplus'])) {
		$options['mn_gplus'] = '';
	}
	if (empty($options['mn_rss'])) {
		$options['mn_rss'] = '';
	}

	if (empty($options['mn_social_color'])) {
		$options['mn_social_color'] = '#aaaaaa';
	}

	if (empty($options['mn_separators_color'])) {
		$options['mn_separators_color'] = 'rgba(255, 255, 255, 0.075)';
	}

	if (empty($options['mn_separators_width'])) {
		$options['mn_separators_width'] = '100';
	}

	if (empty($options['mn_submenu_support'])) {
		$options['mn_submenu_support'] = '';
	}

	if (empty($options['mn_submenu_mob'])) {
		$options['mn_submenu_mob'] = '';
	}

	if (empty($options['mn_submenu_classes'])) {
		$options['mn_submenu_classes'] = 'sub-menu, children';
	}

	if (empty($options['mn_togglers'])) {
		$options['mn_togglers'] = '';
	}

    if (empty($options['mn_license_valid'])) {
        $options['mn_license_valid'] = '';
    }
	if (empty($options['mn_license_fname'])) {
		$options['mn_license_fname'] = '';
	}
    if (empty($options['mn_license_lname'])) {
        $options['mn_license_lname'] = '';
    }
	if (empty($options['mn_license_email'])) {
		$options['mn_license_email'] = '';
	}
	if (empty($options['mn_license_code'])) {
		$options['mn_license_code'] = '';
	}
	if (empty($options['mn_license_subscribe'])) {
		$options['mn_license_subscribe'] = '';
	}


	$mn_cached_opts = $options;

	return $options;
}

function mn_get_locations () {
	global $mn_locations;

	if (isset($mn_locations)) {return $mn_locations;}

	$locations = new stdClass();

	// pages on site
	$locations->pages = get_posts( array(
		'post_type' => 'page', 'post_status' => 'publish',
		'numberposts' => -1, 'orderby' => 'title', 'order' => 'ASC',
		'fields' => array('ID', 'name'),
	));

	// custom post types
	$locations->cposts = get_post_types( array(
		'public' => true,
	), 'object');

	foreach ( array( 'revision', 'post', 'page', 'attachment', 'nav_menu_item' ) as $unset ) {
		unset($locations->cposts[$unset]);
	}

	foreach ( $locations->cposts as $c => $type ) {
		$post_taxes = get_object_taxonomies($c);
		foreach ( $post_taxes as $post_tax) {
			$locations->taxes[] = $post_tax;
		}
	}

	// categories
	$locations->cats = get_categories( array(
		'hide_empty'    => false,
		//'fields'        => 'id=>name', //added in 3.8
	) );

	// WPML languages
	if (function_exists('icl_get_languages') ) {
		//browser()->log('detect langs');
		$locations->langs = icl_get_languages('skip_missing=0&orderby=code');
	}

	foreach ( $locations as $key => $val ) {

		if (!empty($val)) {
			$length = count($val);
			for ($i = 0; $i <= $length; $i++) {
				if (isset($val[$i])) {
					//browser()->log  ( $val[$i] );
				}
			}
		}
	}

	$page_types = array(
		'front'     => __('Front', 'materialize-menu'),
		'home'      => __('Home/Blog', 'materialize-menu'),
		'archive'   => __('Archives'),
		'single'    => __('Single Post'),
		'forbidden' => '404',
		'search'    => __('Search'),
	);

	foreach ($page_types as $key => $label){
		//browser()->log  ( $key, $label );
		//$instance['page-'. $key] = isset($instance['page-'. $key]) ? $instance['page-'. $key] : false;
	}

	$locations->wp_pages = $page_types;

	$mn_locations = $locations;
	return $locations;
}

function mn_fa_on_str() {
	$options = mn_get_options();
	$style = $options['mn_fa_on'];
	$first_checked = $style == 'yes' ? 'checked="checked"' : '';

	echo "
  <h6>Load icon font if you don't have it already on site and want to use menu items special classes to add icons.</h6>
	<p><label for='mn_fa_on'><input id='mn_fa_on' name='mn_options[mn_fa_on]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>

	";
}

function mn_iconbar_str() {
	$options = mn_get_options();
	$style = $options['mn_iconbar'];
	$first_checked = $style == 'yes' ? 'checked="checked"' : '';

	echo "
  <h6>First you need to add icons/images to each menu item in <a href='/wp-admin/nav-menus.php'>Appearance/Menus</a>. Some settings are overridden or not applied in this mode.</h6>
	<p><label for='mn_iconbar'><input id='mn_iconbar' name='mn_options[mn_iconbar]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>

	";
}

function mn_test_mode_str() {
	$options = mn_get_options();
	$style = $options['mn_test_mode'];
	$first_checked = $style == 'yes' ? 'checked="checked"' : '';

	echo "
  <h6>Menu will be visible in browsers where and when you are logged in.</h6>
	<p><label for='mn_test_mode'><input id='mn_test_mode' name='mn_options[mn_test_mode]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>

	";
}function mn_fixed_str() {
	$options = mn_get_options();
	$style = $options['mn_fixed'];
	$first_checked = $style == 'yes' ? 'checked="checked"' : '';

	echo "
    <h6>Choose whether button should be fixed or float on page.</h6>
	<p><label for='mn_fixed'><input id='mn_fixed' name='mn_options[mn_fixed]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>
	";
}function mn_dev_str() {
	$options = mn_get_options();
	$style = $options['mn_dev'];
	$first_checked = $style == 'yes' ? 'checked="checked"' : '';

	echo "
  <h6>For debugging purposes.</h6>
	<p><label for='mn_dev'><input id='mn_dev' name='mn_options[mn_dev]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>

	";
}
function mn_sub_type_str() {
	$options = mn_get_options();
	$style = $options['mn_sub_type'];
	$first_checked = $style == 'yes' ? 'checked="checked"' : '';

	echo "
    <h6>Sub-items fall down when level 1 menu item clicked. </h6>
	<p><label for='mn_sub_type'><input id='mn_sub_type' name='mn_options[mn_sub_type]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>

	";
}
function mn_transition_str() {
	$options = mn_get_options();
	$style = $options['mn_transition'];
	$first_checked = $style == 'yes' ? 'checked="checked"' : '';

	echo "
	<p><label for='mn_transition'><input id='mn_transition' name='mn_options[mn_transition]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>

	";
}

function mn_display_str() {
	$options = mn_get_options();
	$user_opts = json_decode($options['mn_display']);
	$locations = $options['locations'];
	//browser()->log('tab ' .$index . ' opts');
	//browser()->log($user_opts);

	?>
	<h6>Global settings <strong>for all</strong> Materialize menus.</h6>
	<p>
		<input id='mn_display' name='mn_options[mn_display]' type='hidden' value='<?php echo $options['mn_display']?>' />
	<div class='loc_popup'>
		<p>
			<label for="mn_user_status"><?php _e('Show Materialize menu for:', 'materialize-menu') ?></label>
			<select name="display_user_status" id="mn_user_status" class="widefat">
				<option value="everyone" <?php echo selected( $user_opts->user->everyone, '1' ) ?>><?php _e('Everyone', 'materialize-menu') ?></option>
				<option value="loggedout" <?php echo selected( $user_opts->user->loggedout, '1' ) ?>><?php _e('Logged-out users', 'materialize-menu') ?></option>
				<option value="loggedin" <?php echo selected( $user_opts->user->loggedin, '1' ) ?>><?php _e('Logged-in users', 'materialize-menu') ?></option>
			</select>
		</p>

		<p>
			<label for="mn_display_desktop"><?php _e('Show on desktops:', 'materialize-menu') ?></label>
			<select name="display_desktop" id="mn_display_desktop" class="widefat">
				<option value="yes" <?php echo selected( $user_opts->desktop->yes, '1' ) ?>><?php _e('Show', 'materialize-menu') ?></option>
				<option value="no" <?php echo selected( $user_opts->desktop->no, '1' ) ?>><?php _e('Don\'t show', 'materialize-menu') ?></option>
			</select>
		</p>

		<p>
			<label for="mn_display_mobile"><?php _e('Show on mobiles:', 'materialize-menu') ?></label>
			<select name="display_mobile" id="mn_display_mobile" class="widefat">
				<option value="yes" <?php echo selected( $user_opts->mobile->yes, '1' ) ?>><?php _e('Show', 'materialize-menu') ?></option>
				<option value="no" <?php echo selected( $user_opts->mobile->no, '1' ) ?>><?php _e('Don\'t show', 'materialize-menu') ?></option>
			</select>
		</p>

		<p style="margin-top: 20px">
			<label style="margin-bottom: 5px !important;display: inline-block;" for="mn_user_status"><?php _e('Hide on checked pages:', 'materialize-menu') ?></label>

			<!--<select name="display_rule" id="display_rule" class="widefat">
				<option value="exclude" <?php /*echo selected( $user_opts->rule->exclude, '1' ) */?>><?php /*_e('Hide on checked pages', 'materialize-menu') */?></option>
				<option value="include" <?php /*echo selected( $user_opts->rule->include, '1' ) */?>><?php /*_e('Show on checked pages', 'materialize-menu') */?></option>
			</select>-->
		</p>

		<div style="height:190px; overflow:auto; border:1px solid #dfdfdf; padding:5px; box-sizing:border-box;margin-bottom:5px;">
			<div class="dw_pages_wrap">
			<h4 class="dw_toggle" style="cursor:pointer;margin-top:0;"><?php _e('Default WP pages', 'materialize-menu') ?></h4>
			<div class="dw_collapse">
				<?php foreach ($locations->wp_pages as $key => $label){
					?>
					<p><input class="checkbox" class='switcher' type="checkbox" value="<?php echo $key?>" <?php checked(isset($user_opts->location->wp_pages->$key) ? $user_opts->location->wp_pages->$key : false, true) ?> id="display_wp_page_<?php echo $key?>" name="display_wp_page_<?php echo $key?>" />
						<label for="display_wp_page_<?php echo $key?>"><?php echo $label .' '. __('Page', 'materialize-menu') ?></label></p>
				<?php
				}
				?>
			</div>

			<h4 class="dw_toggle" style="cursor:pointer;"><?php _e('Pages') ?></h4>
			<div class="dw_collapse">
				<?php foreach ( $locations->pages as $page ) {
					//$instance['page-'. $page->ID] = isset($instance['page-'. $page->ID]) ? $instance['page-'. $page->ID] : false;
					$id = $page->ID;
					$p_title = apply_filters('the_title', $page->post_title, $page->ID);
					if ( $page->post_parent ) {
						$parent = get_post($page->post_parent);

						$p_title .= ' ('. apply_filters('the_title', $parent->post_title, $parent->ID);

						if ( $parent->post_parent ) {
							$grandparent = get_post($parent->post_parent);
							$p_title .= ' - '. apply_filters('the_title', $grandparent->post_title, $grandparent->ID);
							unset($grandparent);
						}
						$p_title .= ')';

						unset($parent);
					}
					//browser()->log($p_title);

					?>
					<p><input class="checkbox" type="checkbox" value="<?php echo $id?>" <?php checked(isset($user_opts->location->pages->$id), true) ?> id="display_page_<?php echo $id ?>" name="display_page_<?php echo $id ?>" />
						<label for="display_page_<?php echo $id?>"><?php echo $p_title ?></label></p>
					<?php   unset($p_title);
				}  ?>
			</div>

			<?php if ( !empty($locations->cposts) ) { ?>
				<h4 class="dw_toggle" style="cursor:pointer;"><?php _e('Custom Post Types', 'materialize-menu') ?> +/-</h4>
				<div class="dw_collapse">
					<?php foreach ( $locations->cposts as $post_key => $custom_post ) {
						?>
						<p><input class="checkbox" type="checkbox" value="<?php echo $post_key?>" <?php checked(isset($user_opts->location->cposts->$post_key), true) ?> id="display_cpost_<?php echo $post_key?>" name="display_cpost_<?php echo $post_key?>" />
							<label for="display_cpost_<?php echo $post_key?>"><?php echo stripslashes($custom_post->labels->name) ?></label></p>
						<?php
						unset($post_key);
						unset($custom_post);
					} ?>
				</div>

				<!--<h4 class="dw_toggle" style="cursor:pointer;"><?php /*_e('Custom Post Type Archives', 'materialize-menu') */?> +/-</h4>
				<div class="dw_collapse">
					<?php /*foreach ( $this->cposts as $post_key => $custom_post ) {
						if ( !$custom_post->has_archive ) {
							// don't give the option if there is no archive page
							continue;
						}
						$instance['type-'. $post_key .'-archive'] = isset($instance['type-'. $post_key .'-archive']) ? $instance['type-'. $post_key .'-archive'] : false;
						*/?>
						<p><input class="checkbox" type="checkbox" <?php /*checked($instance['type-'. $post_key.'-archive'], true) */?> id="<?php /*echo $widget->get_field_id('type-'. $post_key .'-archive'); */?>" name="<?php /*echo $widget->get_field_name('type-'. $post_key .'-archive'); */?>" />
							<label for="<?php /*echo $widget->get_field_id('type-'. $post_key .'-archive'); */?>"><?php /*echo stripslashes($custom_post->labels->name) */?> <?php /*_e('Archive', 'materialize-menu') */?></label></p>
					<?php /*} */?>
				</div>-->
			<?php } ?>

			<h4 class="dw_toggle" style="cursor:pointer;"><?php _e('Categories') ?></h4>
			<div class="dw_collapse">
				<?php foreach ( $locations->cats as $cat ) {
					$catid = $cat->cat_ID;
					?>
					<p><input class="checkbox" type="checkbox"  value="<?php echo $catid?>" <?php checked(isset($user_opts->location->cats->$catid), true) ?> id="display_cat_<?php echo $catid?>" name="display_cat_<?php echo $catid?>" />
						<label for="display_cat_<?php echo $catid?>"><?php echo $cat->cat_name ?></label></p>
					<?php
					unset($cat);
				}
				?>
			</div>

			<?php /*if ( !empty($this->taxes) ) { */?><!--
				<h4 class="dw_toggle" style="cursor:pointer;"><?php /*_e('Taxonomies', 'materialize-menu') */?> +/-</h4>
				<div class="dw_collapse">
					<?php /*foreach ( $this->taxes as $tax ) {
						$instance['tax-'. $tax] = isset($instance['tax-'. $tax]) ? $instance['tax-'. $tax] : false;
						*/?>
						<p><input class="checkbox" type="checkbox" <?php /*checked($instance['tax-'. $tax], true) */?> id="<?php /*echo $widget->get_field_id('tax-'. $tax); */?>" name="<?php /*echo $widget->get_field_name('tax-'. $tax); */?>" />
							<label for="<?php /*echo $widget->get_field_id('tax-'. $tax); */?>"><?php /*echo str_replace(array('_','-'), ' ', ucfirst($tax)) */?></label></p>
						<?php
			/*						unset($tax);
								}
								*/?>
				</div>
			--><?php /*} */?>

			<?php if ( !empty($locations->langs) ) { ?>
				<h4 class="dw_toggle" style="cursor:pointer;" class="rule_lang"><?php _e('Languages', 'materialize-menu') ?></h4>
				<div class="dw_collapse"  class="rule_lang">
					<?php foreach ( $locations->langs as $lang ) {
						$key = $lang['language_code'];
						?>
						<p><input class="checkbox" type="checkbox" <?php checked(isset($user_opts->location->langs->$key), true) ?> id="display_lang_<?php echo $key?>" name="display_lang" value="<?php echo $key?>" />
							<label for="display_lang_<?php echo $key?>"><?php echo $lang['native_name'] ?></label></p>

						<?php
						unset($lang);
						unset($key);
					}
					?>
				</div>
			<?php } ?>



			<p class="display_ids_wrap"><label for="display_ids"><?php _e('Comma Separated list of IDs of posts not listed above', 'materialize-menu') ?>:</label>
				<input type="text" value="<?php echo implode(",", $user_opts->location->ids); ?>" name="display_ids" id="display_ids" />
			</p>
			</div>
		</div>

	</div>
	</p>
<?php
}

function mn_alternative_menu_str() {
	$options = mn_get_options();
	echo "<h6>Valid CSS selector for list element on page e.g. <em>#menu ul</em>.</h6>
	<input id='mn_alternative_menu' name='mn_options[mn_alternative_menu]' type='text' value='{$options['mn_alternative_menu']}' style='' />";
}

function mn_hide_def_str() {
	$options = mn_get_options();
	$style = $options['mn_hide_def'];
	$first_checked = $style == 'yes' ? 'checked="checked"' : '';

	echo "
	<p><input id='mn_hide_def' name='mn_options[mn_hide_def]' type='checkbox' value='yes' {$first_checked} style='' /> <label for='mn_hide_def'>Hide default menu when Materialize is generated</label></p>
	";
}

function mn_tab_logo_str() {
    $options = mn_get_options();
    echo '<h6>Logo or user profile photo.</h6>';
	echo "
	<input placeholder='' type='hidden' size='100' id='mn_tab_logo' value='{$options['mn_tab_logo']}' name='mn_options[mn_tab_logo]'>";
    echo "<div class='image-preview'>";
    if (!empty($options['mn_tab_logo'])) {
        echo "<img src='{$options['mn_tab_logo']}' />";
    }
    echo "</div>";
    echo "<div><span class='mn-choose-image'>Select Image</span></div>";
    if (!empty($options['mn_tab_logo'])) {
        echo "<div><span class='mn-remove-image'>Remove Image</span></div>";
    }


	/*$options = mn_get_options();
	echo '<h6>Logo or user profile photo.</h6>';
	if (empty($options['mn_tab_logo'])) {
		echo "<input id='mn_tab_logo_file' type='file' name='mn_pic' value='{$options['mn_tab_logo']}' /> <input name='Submit' type='submit' class='button-primary' value='Upload' />";
	} else {
		echo '<div class="mn_tab_logo_holder"><img class="mn-tab-logo" src="' . $options['mn_tab_logo'] . '" alt=""/></div>';
		echo '<p><input  style="margin-top: 0;" type="submit" class="button-secondary" id="mn_remove_pic" value="Remove this pic"/></p>
                   <script>
                   jQuery("#mn_remove_pic").on("click keydown", function(){
                        jQuery("#mn_tab_logo").val("");
                   })
                   </script>
               ';
		echo "<span>...or upload new one</span><br><input id='mn_tab_logo_file' type='file' name='mn_pic' value='{$options['mn_tab_logo']}' /> <input name='Submit' type='submit' class='button-primary' value='Upload' />";
	}
	echo " <input id='mn_tab_logo' name='mn_options[mn_tab_logo]' size='100' type='hidden' value='{$options['mn_tab_logo']}' style='' />";*/
}

function mn_bg_color_panel_1_str() {
	$options = mn_get_options();

	echo "<input id='mn_bg_color_panel_1' data-color-format='hex' name='mn_options[mn_bg_color_panel_1]' type='text' value='{$options['mn_bg_color_panel_1']}' style='' />
		<script>
				var opts = {
          previewontriggerelement: true,
          previewformat: 'hex',
          flat: false,
          color: '#3e98a8',
          customswatches: 'bg',
          swatches: colorscheme,
          order: {
              hsl: 1,
              preview: 2
          },
          onchange: function(container, color) {}
        };
				jQuery(function(){
					jQuery('#mn_bg_color_panel_1').ColorPickerSliders(opts)
				});

	</script>
	";
}

function mn_bg_color_panel_2_str() {
		$options = mn_get_options();

    echo "<input id='mn_bg_color_panel_2' data-color-format='hex' name='mn_options[mn_bg_color_panel_2]' type='text' value='{$options['mn_bg_color_panel_2']}' style='' />
		<script>

				jQuery(function(){
					jQuery('#mn_bg_color_panel_2').ColorPickerSliders(opts)
				});

	</script>
	";
}

function mn_bg_color_panel_3_str() {
		$options = mn_get_options();

    echo "<input id='mn_bg_color_panel_3' data-color-format='hex' name='mn_options[mn_bg_color_panel_3]' type='text' value='{$options['mn_bg_color_panel_3']}' style='' />
		<script>

				jQuery(function(){
					jQuery('#mn_bg_color_panel_3').ColorPickerSliders(opts)
				});

	</script>
	";
}

function mn_bg_color_panel_4_str() {
		$options = mn_get_options();

    echo "<input id='mn_bg_color_panel_4' data-color-format='hex' name='mn_options[mn_bg_color_panel_4]' type='text' value='{$options['mn_bg_color_panel_4']}' style='' />
		<script>

				jQuery(function(){
					jQuery('#mn_bg_color_panel_4').ColorPickerSliders(opts)
				});

	</script>
	";
}

function mn_color_panel_1_str() {
	$options = mn_get_options();

	echo "<input id='mn_color_panel_1' data-color-format='hex' name='mn_options[mn_color_panel_1]' type='text' value='{$options['mn_color_panel_1']}' style='' />
		<script>
				jQuery(function(){
					jQuery('#mn_color_panel_1').ColorPickerSliders(opts)
				});
	</script>
	";
}
function mn_scolor_panel_1_str() {
	$options = mn_get_options();

	echo "<input id='mn_scolor_panel_1' data-color-format='hex' name='mn_options[mn_scolor_panel_1]' type='text' value='{$options['mn_scolor_panel_1']}' style='' />
		<script>
				jQuery(function(){
					jQuery('#mn_scolor_panel_1').ColorPickerSliders(opts)
				});
	</script>
	";
}

function mn_social_color_str() {
	$options = mn_get_options();

	//echo '<h6>Applies to icons that don\'t have brand color e.g. mail icon.</h6>';
	echo "<input id='mn_social_color' data-color-format='hex' name='mn_options[mn_social_color]' type='text' value='{$options['mn_social_color']}' style='' />
		<script>
            jQuery(function(){
                jQuery('#mn_social_color').ColorPickerSliders(opts)
            });
	    </script>
	";
}

function mn_separators_color_str() {
	$options = mn_get_options();

	echo "<input id='mn_separators_color' data-color-format='rgba' name='mn_options[mn_separators_color]' type='text' value='{$options['mn_separators_color']}'/>
		<script>

				jQuery(function(){
					var opts = {
	          previewontriggerelement: true,
	          previewformat: 'rgba',
	          flat: false,
	          color: '#3e98a8',
	          customswatches: 'bg',
	          swatches: colorscheme,
						order: {
							hsl: 1,
							opacity: 2,
							preview: 3
						},
	          onchange: function(container, color) {}
	        };
					jQuery('#mn_separators_color').ColorPickerSliders(opts)
				});

	</script>
	";
}

function mn_skew_type_str() {
	$options = mn_get_options();
	$value = $options['mn_skew_type'];
	$first_checked = $value === 'top' ? 'checked' : '';
	$sec_checked = $value === 'bottom' ? 'checked' : '';

    echo "<div><input id='mn_skew_type_top' name='mn_options[mn_skew_type]' type='radio' {$first_checked} value='top' style='' /> <label for='mn_skew_type_top'></label></div>";
   	echo "<div><input id='mn_skew_type_bottom' name='mn_options[mn_skew_type]' type='radio' {$sec_checked} value='bottom' style='' /> <label for='mn_skew_type_bottom'></label></div>";
}

function mn_color_panel_2_str() {
		$options = mn_get_options();

    echo "<input id='mn_color_panel_2' data-color-format='hex' name='mn_options[mn_color_panel_2]' type='text' value='{$options['mn_color_panel_2']}' style='' />
		<script>
				jQuery(function(){
					jQuery('#mn_color_panel_2').ColorPickerSliders(opts)
				});

	</script>
	";
}

function mn_color_panel_3_str() {
		$options = mn_get_options();

    echo "<input id='mn_color_panel_3' data-color-format='hex' name='mn_options[mn_color_panel_3]' type='text' value='{$options['mn_color_panel_3']}' style='' />
		<script>
				jQuery(function(){
					jQuery('#mn_color_panel_3').ColorPickerSliders(opts)
				});

	</script>
	";
}

function mn_color_panel_4_str() {
	$options = mn_get_options();

	echo "<input id='mn_color_panel_4' data-color-format='hex' name='mn_options[mn_color_panel_4]' type='text' value='{$options['mn_color_panel_4']}' style='' />
		<script>

				jQuery(function(){
					jQuery('#mn_color_panel_4').ColorPickerSliders(opts)
				});

	</script>
	";
}function mn_fade_full_str() {
	$options = mn_get_options();

	echo "<input id='mn_fade_full' data-color-format='rgba' name='mn_options[mn_fade_full]' type='text' value='{$options['mn_fade_full']}' style='' />
		<script>

				jQuery(function(){
					jQuery('#mn_fade_full').ColorPickerSliders({
         previewontriggerelement: true,
         previewformat: 'rgba',
         flat: false,
         color: 'rgba(0,0,0,0.9)',
         customswatches: 'label',
         swatches: colorscheme,
order: {
				hsl: 1,
				opacity: 2,
				preview: 3
			}
       })
				});

	</script>
	";
}function mn_scolor_panel_2_str() {
		$options = mn_get_options();

    echo "<input id='mn_scolor_panel_2' data-color-format='hex' name='mn_options[mn_scolor_panel_2]' type='text' value='{$options['mn_scolor_panel_2']}' style='' />
		<script>
				jQuery(function(){
					jQuery('#mn_scolor_panel_2').ColorPickerSliders(opts)
				});

	</script>
	";
}

function mn_scolor_panel_3_str() {
		$options = mn_get_options();

    echo "<input id='mn_scolor_panel_3' data-color-format='hex' name='mn_options[mn_scolor_panel_3]' type='text' value='{$options['mn_scolor_panel_3']}' style='' />
		<script>
				jQuery(function(){
					jQuery('#mn_scolor_panel_3').ColorPickerSliders(opts)
				});

	</script>
	";
}

function mn_scolor_panel_4_str() {
	$options = mn_get_options();

	echo "<input id='mn_scolor_panel_4' data-color-format='hex' name='mn_options[mn_scolor_panel_4]' type='text' value='{$options['mn_scolor_panel_4']}' style='' />
		<script>

				jQuery(function(){
					jQuery('#mn_scolor_panel_4').ColorPickerSliders(opts)
				});

	</script>
	";
}function mn_chapter_1_str() {
	$options = mn_get_options();

	echo "
	<input id='mn_chapter_1' data-color-format='hex' name='mn_options[mn_chapter_1]' type='text' value='{$options['mn_chapter_1']}' style='' />
	<script>
		jQuery(function(){
			jQuery('#mn_chapter_1').ColorPickerSliders(opts)
		});
	</script>
	";
}function mn_chapter_2_str() {
	$options = mn_get_options();

	echo "<input id='mn_chapter_2' data-color-format='hex' name='mn_options[mn_chapter_2]' type='text' value='{$options['mn_chapter_2']}' style='' />
		<script>

				jQuery(function(){
					jQuery('#mn_chapter_2').ColorPickerSliders(opts)
				});

	</script>
	";
}function mn_chapter_3_str() {
	$options = mn_get_options();

	echo "<input id='mn_chapter_3' data-color-format='hex' name='mn_options[mn_chapter_3]' type='text' value='{$options['mn_chapter_3']}' style='' />
		<script>

				jQuery(function(){
					jQuery('#mn_chapter_3').ColorPickerSliders(opts)
				});

	</script>
	";
}function mn_chapter_4_str() {
	$options = mn_get_options();

	echo "<input id='mn_chapter_4' data-color-format='hex' name='mn_options[mn_chapter_4]' type='text' value='{$options['mn_chapter_4']}' style='' />
		<script>

				jQuery(function(){
					jQuery('#mn_chapter_4').ColorPickerSliders(opts)
				});

	</script>
	";
}

function mn_search_bg_str() {
	$options = mn_get_options();
	$size = $options['mn_search_bg'];


	echo "<select id='mn_search_bg' name='mn_options[mn_search_bg]'>
    <option value='light' " . ($size === 'light' ? 'selected="selected"' : '') . ">Light</option>
    <option value='dark' " . ($size === 'dark' ? 'selected="selected"' : '') . ">Dark</option>
    </select>
    ";
}




function mn_learn_materialize_str() {
	// Learn Materialize
	echo '<ul>';
	echo '<li><a href="http://materialize.mtaandao.com/docs/Getting_Started/Creating_Your_First_Menu" title="Creating Your First Menu" target="_blank">Creating Your First Menu</a></li>';
	echo '<li><a href="http://materialize.mtaandao.com/docs/Getting_Started/Setup_Multilevel_Menu_and_Add_Rich_Content" title="Setup Multilevel Menu and Add Rich Content" target="_blank">Setup Multilevel Menu and Add Rich Content</a></li>';
	echo '<li><a href="http://materialize.mtaandao.com/docs/Getting_Started/Using_Multiple_Menus" title="Using Multiple Menus" target="_blank">Using Multiple Menus</a></li>';
	echo '<li><a href="http://materialize.mtaandao.com/docs/Customize/Where_to_Setup_Menu_Items" title="Where to Setup Menu Items" target="_blank">Where to Setup Menu Items</a></li>';
	echo '</ul>';
}

function mn_active_menu_str() {
	$options = mn_get_options();

	$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
    $map = json_decode($options['mn_active_menu']);

	echo "<h6>
		Click menu labels that you added to edit location rules. Or click cross icon to remove it. 
		<a href='http://materialize.mtaandao.com/docs/Getting_Started/Using_Multiple_Menus' title='Guide' target='_blank'>Guide</a>
	</h6>";
	if(!$menus){
		echo '<h6>Create at least one <a href="/wp-admin/nav-menus.php" title="Add WP Menu">WP menu</a> before adding it to Materialize.</h6>';
	}
    echo "<input id='mn_active_menu' name='mn_options[mn_active_menu]' type='hidden' value='{$options['mn_active_menu']}' />";

    echo "<script>var mn_menus = {$options['mn_active_menu']}</script>";

    echo '<ul class="mn-menu__list">';

    if (is_object($map) || is_array($map)) {
        foreach ( $map as $menu_object ) {
            echo '<li class="mn-menu__item" data-id="' . $menu_object->term_id . '">' . $menu_object->name . '<i class="flaticon-cross"></i></li>';
        }
    } else {
        // migration
        if (!empty($map)) {
            $menu_object = wp_get_nav_menu_object( $options['mn_active_menu'] );
            //echo 'mn_active_menu' . $options['mn_active_menu'];
            echo '<li class="mn-menu__item" data-id="' . $menu_object->term_id . '">'. $menu_object->name . '<i class="flaticon-cross"></i></li>';
        }
    }
    echo '</ul>';

    if (count($menus) > 0) {
        echo '<span class="mn-menu__add">+ Add new</span>';
        echo "<select id='mn-menu__select' name=''>";
        foreach ($menus as $menu_object) {
            echo "<option value='".$menu_object->term_id."'> ".$menu_object->name."</option>";
        }
        echo "</select>";
    }

}

function mn_width_panel_1_str()
{
	$options = mn_get_options();
	echo " <input id='mn_width_panel_1' name='mn_options[mn_width_panel_1]' size='10' type='text' value='{$options['mn_width_panel_1']}' style='' /> <span class='units'>px</span>";
}

function mn_width_panel_2_str()
{
	$options = mn_get_options();
	echo " <input id='mn_width_panel_2' name='mn_options[mn_width_panel_2]' size='10' type='text' value='{$options['mn_width_panel_2']}' style='' /> <span class='units'>px</span>";
}

function mn_width_panel_3_str()
{
	$options = mn_get_options();
	echo " <input id='mn_width_panel_3' name='mn_options[mn_width_panel_3]' size='10' type='text' value='{$options['mn_width_panel_3']}' style='' /> <span class='units'>px</span>";
}

function mn_width_panel_4_str()
{
	$options = mn_get_options();
	echo " <input id='mn_width_panel_4' name='mn_options[mn_width_panel_4]' size='10' type='text' value='{$options['mn_width_panel_4']}' style='' /> <span class='units'>px</span>";
}

function mn_sidebar_scale_str() {
	$options = mn_get_options();
	$style = $options['mn_sidebar_scale'];
	$first_checked = $style == 'yes' ? 'checked="checked"' : '';

	echo "
	<p><input id='mn_sidebar_scale' name='mn_options[mn_sidebar_scale]' type='checkbox' value='yes' {$first_checked} style='' /> <label for='mn_sidebar_scale'>Scale effect for sidebar content on opening</label></p>
	";
}

function mn_label_color_str() {
	$options = mn_get_options();

	echo "<h6>Not applicable if 'Just Icon' button style is selected.</h6>";
   	echo "<input id='mn_label_color' data-color-format='hex' name='mn_options[mn_label_color]' type='text' value='{$options['mn_label_color']}' style='' />
    <script>

    var preview = jQuery('#mn_label_preview');
    var previewColor = preview.find('.fa:not(.fa-inverse)');
            var opts = {
         previewontriggerelement: true,
         previewformat: 'hex',
         flat: false,
         color: '#c0392b',
         customswatches: 'label',
         swatches: colorscheme,
         order: {
             hsl: 1,
             preview: 2
         },
         onchange: function(container, color) {
            previewColor.css('color', color.tiny.toRgbString())
         }
       };
    jQuery(function(){
        jQuery('#mn_label_color').ColorPickerSliders(opts)
    });
    </script>";
}

function mn_label_icon_color_str() {
	$options = mn_get_options();
    echo "<input id='mn_label_icon_color' data-color-format='hex' name='mn_options[mn_label_icon_color]' type='text' value='{$options['mn_label_icon_color']}' style='' />
    <script>
        var preview = jQuery('#mn_label_preview');
        var previewColor = preview.find('.fa:not(.fa-inverse)');
                var opts = {
             previewontriggerelement: true,
             previewformat: 'hex',
             flat: false,
             color: '#c0392b',
             customswatches: 'label',
             swatches: colorscheme,
             order: {
                 hsl: 1,
                 preview: 2
             },
             onchange: function(container, color) {
                previewColor.css('color', color.tiny.toRgbString())
             }
           };
        jQuery(function(){
            jQuery('#mn_label_icon_color').ColorPickerSliders(opts)
        });
    </script>";
}

function mn_label_text_color_str() {
	$options = mn_get_options();

   echo "<input id='mn_label_text_color' data-color-format='hex' name='mn_options[mn_label_text_color]' type='text' value='{$options['mn_label_text_color']}' style='' />
	<script>

			var opts = {
         previewontriggerelement: true,
         previewformat: 'hex',
         flat: false,
         color: '#c0392b',
         customswatches: 'label',
         swatches: colorscheme,
         order: {
             hsl: 1,
             preview: 2
         }
       };
			jQuery(function(){
				jQuery('#mn_label_text_color').ColorPickerSliders(opts)
			});

</script>
";
}

function mn_label_invert_str() {
	$options = mn_get_options();
	$style = $options['mn_label_invert'];
	$first_checked = $style == 'yes' ? 'checked="checked"' : '';

	echo "
	<p><input id='mn_label_invert' name='mn_options[mn_label_invert]' type='checkbox' value='yes' {$first_checked} style='' /> <label for='mn_label_invert'>Invert colors</label></p>
	";
	echo "
	  <script>
	  jQuery('#mn_label_invert').change(function() {
	        var back = preview.find('i:first');
	        var fore = preview.find('i:last');
	        var color;

	  	    if(this.checked) {
	  	    		color = back.css('color');
	  	        fore.removeClass('fa-inverse').css('color', color);
	  	        back.addClass('fa-inverse').css('color', '');
	  	        previewColor = fore;

	  	    } else {
	  	    	  color = fore.css('color');
	  	        back.removeClass('fa-inverse').css('color', color);
	  	        fore.addClass('fa-inverse').css('color', '');
	  	        previewColor = back;
	  	    }
	  	}).change();

	   </script>
	   ";

}

function mn_selectors_str () {
	$options = mn_get_options();
	echo "<input type='text' id='mn_selectors' value='{$options['mn_selectors']}' name='mn_options[mn_selectors]' value>";
}
function mn_first_line_str () {
	$options = mn_get_options();
    $val = htmlentities($options['mn_first_line'], ENT_QUOTES);
    echo "<h6>You can show this text at the top of sidebar under image, eg. your name or your company name.</h6><input placeholder='' type='text' size='100' id='mn_first_line' value='{$val}' name='mn_options[mn_first_line]' value>";
}
function mn_image_bg_str () {
	$options = mn_get_options();
	echo "
	<input placeholder='' type='hidden' size='100' id='mn_image_bg' value='{$options['mn_image_bg']}' name='mn_options[mn_image_bg]' value>";
    echo "<div class='image-preview'>";
    if (!empty($options['mn_image_bg'])) {
        echo "<img src='{$options['mn_image_bg']}' />";
    }
    echo "</div>";
    echo "<div><span class='mn-choose-image'>Select Image</span></div>";
    if (!empty($options['mn_image_bg'])) {
        echo "<div><span class='mn-remove-image'>Remove Image</span></div>";
    }
}
function mn_sec_line_str () {
	$options = mn_get_options();
    $val = htmlentities($options['mn_sec_line'], ENT_QUOTES);
    echo "<h6>This is second line text. For example you can use first line for name and second line for your job title or company motto.</h6><input placeholder='' size='100' type='text' id='mn_sec_line' value='{$val}' name='mn_options[mn_sec_line]' value>";
}

function mn_label_no_anim_str() {
	$options = mn_get_options();
	$style = $options['mn_label_no_anim'];
	$first_checked = $style == 'yes' ? 'checked="checked"' : '';

	echo "
	<p><input id='mn_label_no_anim' name='mn_options[mn_label_no_anim]' type='checkbox' value='yes' {$first_checked} style='' /> <label for='mn_label_no_anim'>Disable animation</label></p>
	";


}

function mn_label_type_str() {
    $options = mn_get_options();
	$style = $options['mn_label_type'];

    $first_checked = $style === 'default' ? 'checked' : '';
	$sec_checked = $style === 'custom' ? 'checked' : '';

    echo '<h6>A few effects and settings are only applicable to Default button type.</h6>';
	echo "
    <span id='mn_c_trans_chooser'  class='chooser'>
    	<input id='mn_label_type_default' name='mn_options[mn_label_type]'  type='radio' value='default' {$first_checked} style='' /><label for='mn_label_type_default'>Default</label>
    	<input id='mn_label_type_custom' name='mn_options[mn_label_type]' type='radio' value='custom' {$sec_checked} style='' /><label for='mn_label_type_custom'>Custom icon</label>
    </span>";
}

function mn_label_icon_str() {
    $options = mn_get_options();
	$icon = $options['mn_label_icon'];

    echo "<div id='mn_label_icon_select'></div>";
    echo "<input id='mn_label_icon'
                    name='mn_options[mn_label_icon]'
                    type='hidden'
                    value='{$icon}' style='' />";
	echo '
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(document).on("iconManagerCollectionLoaded", function(){
                window["la_icon_manager_select_0"] = new LAIconManager(
                    "0",
                    "#mn_label_icon_select",
                    window["la_icon_manager_collection"],
                    "#mn_label_icon"
                );
                window["la_icon_manager_select_0"].showIconSelect();
            });
        });
    </script>';
}

function mn_label_size_str() {
	$options = mn_get_options();

	echo " <input id='mn_label_size' name='mn_options[mn_label_size]' size='6' type='text' value='{$options['mn_label_size']}' style='' />";
}

function mn_label_style_str() {
	$options = mn_get_options();
	$val = $options['mn_label_style'];
	$first_checked = $val == 'none' ? 'checked="checked"' : '';
    $sec_checked = $val == 'square' ? 'checked="checked"' : '';
    $third_checked = $val == 'rsquare' ? 'checked="checked"' : '';
    $fourth_checked = $val == 'circle' ? 'checked="checked"' : '';
	$fifth_checked = $val == 'metro' ? 'checked="checked"' : '';


	echo "
	<p><input id='mn_label_style_none' name='mn_options[mn_label_style]' type='radio' value='none' {$first_checked} style='' /> <label for='mn_label_style_none'>Just icon</label></p>
	<p><input id='mn_label_style_metro' name='mn_options[mn_label_style]' type='radio' value='metro' {$fifth_checked} style='' /> <label for='mn_label_style_metro'>Metro-style icon</label></p>
	<p><input id='mn_label_style_square' name='mn_options[mn_label_style]' type='radio' value='square' {$sec_checked} style='' /> <label for='mn_label_style_square'>Icon in rectangle</label></p>
	<p><input id='mn_label_style_rsquare' name='mn_options[mn_label_style]' type='radio' value='rsquare' {$third_checked} style='' /> <label for='mn_label_style_rsquare'>Icon in rounded rectangle</label></p>
	<p><input id='mn_label_style_circle' name='mn_options[mn_label_style]' type='radio' value='circle' {$fourth_checked} style='' /> <label for='mn_label_style_circle'>Icon in circle</label></p>
	";
	echo "
    <script>
        jQuery('input[id*=mn_label_style]').change(function(){
        var val = jQuery(this).val();
        });
    </script>
   ";
}

function mn_label_top_str() {
	$options = mn_get_options();
	echo "<h6>Please enter valid CSS value for ex. '50%' or '200px'.</h6>";
	echo " <input id='mn_label_top' name='mn_options[mn_label_top]' size='6' type='text' value='{$options['mn_label_top']}' style='' />";
}

function mn_label_top_mobile_str() {
	$options = mn_get_options();
	echo " <input id='mn_label_top_mobile' name='mn_options[mn_label_top_mobile]' size='6' type='text' value='{$options['mn_label_top_mobile']}' style='' />";
}

function mn_label_shift_str() {
	$options = mn_get_options();
	echo "<h6>Please enter valid CSS value for ex. '50%' or '200px'. <br/> Will not take any affect on mobile!</h6>";
	echo " <input id='mn_label_shift' name='mn_options[mn_label_shift]' size='6' type='text' value='{$options['mn_label_shift']}' style='' />";
}


function mn_sidebar_style_str() {
    $options = mn_get_options();
    $type = $options['mn_sidebar_style'];
    $first_checked = $type === 'side' ? 'checked' : '';
	$sec_checked = $type === 'toolbar' ? 'checked' : '';
	$third_checked = $type === 'full' ? 'checked' : '';
	$fourth_checked = $type === 'skew' ? 'checked' : '';

    echo "
    <span id='mn_sidebar_style_chooser'  class='chooser'>
    	<input id='mn_sidebar_style_side' name='mn_options[mn_sidebar_style]'  type='radio' value='side' {$first_checked} style='' /><label for='mn_sidebar_style_side'>Side panel</label>
    	<input id='mn_sidebar_style_toolbar' name='mn_options[mn_sidebar_style]' type='radio' value='toolbar' {$sec_checked} style='' /><label for='mn_sidebar_style_toolbar'>Navbar</label>
    	<input id='mn_sidebar_style_full' name='mn_options[mn_sidebar_style]' type='radio' value='full' {$third_checked} style='' /><label for='mn_sidebar_style_full'>Fullscreen</label>
    	<input id='mn_sidebar_style_skew' name='mn_options[mn_sidebar_style]' type='radio' value='skew' {$fourth_checked} style='' /><label for='mn_sidebar_style_skew'>Skewed Panel</label>
    </span>";
	echo "<h6 class='skew-disclaimer'>Skewed Panel design is for single level menus only.</h6>";
}

function mn_sidebar_behaviour_str() {
    $options = mn_get_options();
    $type = $options['mn_sidebar_behaviour'];
    $first_checked = $type === 'slide' ? 'checked' : '';
	$sec_checked = $type === 'push' ? 'checked' : '';
	$third_checked = $type === 'always' ? 'checked' : '';

    echo "
    <span id='mn_sidebar_behaviour_chooser'  class='chooser'>
    	<input id='mn_sidebar_behaviour_slide' name='mn_options[mn_sidebar_behaviour]'  type='radio' value='slide' {$first_checked} style='' /><label for='mn_sidebar_behaviour_slide'>Slide in</label>
    	<input id='mn_sidebar_behaviour_push' name='mn_options[mn_sidebar_behaviour]' type='radio' value='push' {$sec_checked} style='' /><label for='mn_sidebar_behaviour_push'>Push content</label>
    	<input id='mn_sidebar_behaviour_always' name='mn_options[mn_sidebar_behaviour]' type='radio' value='always' {$third_checked} style='' /><label for='mn_sidebar_behaviour_always'>Always visible</label>
    </span>";
}

function mn_opening_type_str() {
	$options = mn_get_options();
	$size = $options['mn_opening_type'];

	$first_checked = $size === 'hover' ? 'checked' : '';
	$sec_checked = $size === 'click' ? 'checked' : '';

    echo "
    <span id='mn_opening_type_chooser'  class='chooser'>
    	<input id='mn_opening_type_hover' name='mn_options[mn_opening_type]'  type='radio' value='hover' {$first_checked} style='' /><label for='mn_opening_type_hover'>On mouseover</label>
    	<input id='mn_opening_type_click' name='mn_options[mn_opening_type]' type='radio' value='click' {$sec_checked} style='' /><label for='mn_opening_type_click'>On click</label>
    </span>";
}

function mn_sub_opening_type_str() {
	$options = mn_get_options();
	$size = $options['mn_sub_opening_type'];

	$first_checked = $size === 'hover' ? 'checked' : '';
	$sec_checked = $size === 'click' ? 'checked' : '';

	echo "
    <span id='mn_opening_type_chooser'  class='chooser'>
    	<input id='mn_sub_opening_type_hover' name='mn_options[mn_sub_opening_type]'  type='radio' value='hover' {$first_checked} style='' /><label for='mn_sub_opening_type_hover'>On mouseover</label>
    	<input id='mn_sub_opening_type_click' name='mn_options[mn_sub_opening_type]' type='radio' value='click' {$sec_checked} style='' /><label for='mn_sub_opening_type_click'>On click</label>
    </span>";
}

function mn_transparent_panel_str() {
    $options = mn_get_options();
    $color = $options['mn_transparent_panel'];
    $first_checked = $color === 'none' ? 'checked' : '';
	$sec_checked = $color === 'dark' ? 'checked' : '';
	$third_checked = $color === 'light' ? 'checked' : '';

    echo "
    <h6>Use only with single-level menu or set single level under Advanced tab.</h6>
    <span id='mn_sidebar_behaviour_chooser'  class='chooser'>
    	<input id='mn_transparent_panel_none' name='mn_options[mn_transparent_panel]'  type='radio' value='none' {$first_checked} style='' /><label for='mn_transparent_panel_none'>Off</label>
    	<input id='mn_transparent_panel_dark' name='mn_options[mn_transparent_panel]' type='radio' value='dark' {$sec_checked} style='' /><label for='mn_transparent_panel_dark'>Dark</label>
    	<input id='mn_transparent_panel_light' name='mn_options[mn_transparent_panel]' type='radio' value='light' {$third_checked} style='' /><label for='mn_transparent_panel_light'>Light</label>
    </span>";
}

function mn_search_str() {
	$options = mn_get_options();
	$style = $options['mn_search'];
	$first_checked = $style === 'show' ? 'checked="checked"' : '';

	echo "
	<p><label for='mn_search'><input id='mn_search' name='mn_options[mn_search]' class='switcher' type='checkbox' value='show' {$first_checked} style='' /></label></p>
	";
}

function mn_font_str() {
	$options = mn_get_options();
	$fonts = plugin_dir_path(__FILE__) . 'includes/vendor/mtaandao/google_fonts/google-fonts-fallback.json';
	$google_fonts = '[]';
	if(file_exists($fonts)){
        $google_fonts = file_get_contents($fonts);
	}

	echo "<h6 class='font-preview'>Tip: choose text color for each level on Menu Panel / Styling tab. Another tip: extend menu items with Materialize specials on Wordpress menus <a href='/wp-admin/nav-menus.php'>editor page</a>.</h6>";
	echo "<div class='font-select-wrapper'><input type='text' id='mn_font' name='mn_options[mn_font]' value='{$options['mn_font']}' />";

	echo "
	  <script>
	  jQuery(function(){
	    jQuery('#mn_font').fontselect({
	        fonts: {$google_fonts},
	        placeholder: 'Site default font',
	        empty: 'inherit',
	        lookahead: 2
	    }).trigger('change');
	  });
    </script>
    ";
}

function mn_c_font_str() {
	$options = mn_get_options();
	$fonts = plugin_dir_path(__FILE__) . 'includes/vendor/mtaandao/google_fonts/google-fonts-fallback.json';
	$google_fonts = '[]';
	if(file_exists($fonts)){
        $google_fonts = file_get_contents($fonts);
	}

    echo "<h6 class='font-preview-subheader'>Font settings for chapter headings. You can set up chapters on <a href='/wp-admin/nav-menus.php'>Appearance/Menus</a> page.</h6>";
    echo "<div class='font-select-wrapper'><input type='text' id='mn_c_font' name='mn_options[mn_c_font]' value='{$options['mn_c_font']}' />";

    echo "
	  <script>
	  jQuery(function(){
	    jQuery('#mn_c_font').fontselect({
	        fonts: {$google_fonts},
	        placeholder: 'Site default font',
	        empty: 'inherit',
	        lookahead: 2
	    }).trigger('change');
	    /*.change(function(){
          var font = $(this).val();
          if(font == 'inherit'){
               $('.font-preview-subheader').css({
                'font-family': 'Lato',
                'font-size': '14px',
                'line-height': '19px'
              });
          }else{
              $('.font-preview-subheader').css({
                'font-family': font,
                'font-size': '20px',
                'line-height': 'initial'
              });
          }
	    })*/
	  });
    </script>
    ";
}

function mn_c_fs_str() {
    $options = mn_get_options();

    echo " <input id='mn_c_fs' name='mn_options[mn_c_fs]' size='2' type='text' value='{$options['mn_c_fs']}' style='' /></div>";
}

function mn_font_size_str() {
	$options = mn_get_options();
	echo " <input id='mn_font_size' name='mn_options[mn_font_size]' size='2' type='text' value='{$options['mn_font_size']}' style='' /></div>";
}

function mn_padding_str() {
	$options = mn_get_options();
	echo " <input id='mn_padding' name='mn_options[mn_padding]' size='2' type='text' value='{$options['mn_padding']}' style='' /> <span class='units'>px</span>";
}
function mn_icon_size_str() {
	$options = mn_get_options();
	echo " <input id='mn_icon_size' name='mn_options[mn_icon_size]' size='2' type='text' value='{$options['mn_icon_size']}' style='' /> <span class='units'>px</span>";
}
function mn_icon_color_str() {
    $options = mn_get_options();
	echo "<input id='mn_icon_color' data-color-format='hex' name='mn_options[mn_icon_color]' type='text' value='{$options['mn_icon_color']}' style='' />
		<script>
				var opts = {
          previewontriggerelement: true,
          previewformat: 'hex',
          flat: false,
          color: '#3e98a8',
          customswatches: 'bg',
          swatches: colorscheme,
          order: {
              hsl: 1,
              preview: 2
          },
          onchange: function(container, color) {}
        };
				jQuery(function(){
					jQuery('#mn_icon_color').ColorPickerSliders(opts)
				});

	</script>
	";
}

function mn_lh_str() {
	$options = mn_get_options();
	echo " <input id='mn_lh' name='mn_options[mn_lh]' size='2' type='text' value='{$options['mn_lh']}' style='' /> <span class='units'>px</span>";
}

function mn_font_weight_str() {
	$options = mn_get_options();
	$style = $options['mn_font_weight'];

	$first_checked = $style === 'normal' ? 'checked' : '';
	$sec_checked = $style === 'bold' ? 'checked' : '';
	$third_checked = $style === 'lighter' ? 'checked' : '';

	echo "
    <span id='mn_font_weight_chooser' class='chooser weight_chooser'>
    	<input id='mn_font_weight_normal' name='mn_options[mn_font_weight]'  type='radio' value='normal' {$first_checked} style='' /><label for='mn_font_weight_normal' style='font-weight: normal'>Normal</label><input id='mn_font_weight_bold' name='mn_options[mn_font_weight]'  type='radio' value='bold' {$sec_checked} style='' /><label for='mn_font_weight_bold' style='font-weight: bold'>Bold</label><input id='mn_font_weight_lighter' name='mn_options[mn_font_weight]'  type='radio' value='lighter' {$third_checked} style='' /><label for='mn_font_weight_lighter' style='font-weight: 300'>Light</label>
    </span>";
}
function mn_c_weight_str() {
	$options = mn_get_options();
	$style = $options['mn_c_weight'];

	$first_checked = $style === 'normal' ? 'checked' : '';
	$sec_checked = $style === 'bold' ? 'checked' : '';
	$third_checked = $style === 'lighter' ? 'checked' : '';

	echo "
    <span id='mn_c_weight_chooser' class='chooser weight_chooser'>
    	<input id='mn_c_weight_normal' name='mn_options[mn_c_weight]'  type='radio' value='normal' {$first_checked} style='' /><label for='mn_c_weight_normal' style='font-weight: normal'>Normal</label><input id='mn_c_weight_bold' name='mn_options[mn_c_weight]'  type='radio' value='bold' {$sec_checked} style='' /><label for='mn_c_weight_bold' style='font-weight: bold'>Bold</label><input id='mn_c_weight_lighter' name='mn_options[mn_c_weight]'  type='radio' value='lighter' {$third_checked} style='' /><label for='mn_c_weight_lighter' style='font-weight: 300'>Light</label>
    </span>";
}

function mn_alignment_str() {
	$options = mn_get_options();
	$style = $options['mn_alignment'];
	$first_checked = $style === 'center' ? 'checked' : '';
	$sec_checked = $style === 'left' ? 'checked' : '';
	$third_checked = $style === 'right' ? 'checked' : '';

	echo "
<span id='mn_alignment_chooser' class='chooser alignment_chooser'>
			<input id='mn_alignment_left' name='mn_options[mn_alignment]'  type='radio' value='left' {$sec_checked} style='' /><label for='mn_alignment_left'><i class='flaticon-align-left'></i></label><input id='mn_alignment_center' name='mn_options[mn_alignment]'  type='radio' value='center' {$first_checked} style='' /><label for='mn_alignment_center'><i class='flaticon-align-justify'></i></label><input id='mn_alignment_right' name='mn_options[mn_alignment]'  type='radio' value='right' {$third_checked} style='' /><label for='mn_alignment_right'><i class='flaticon-align-right'></i></label>
    </span>";
}

function mn_c_trans_str() {
	$options = mn_get_options();
	$style = $options['mn_c_trans'];
	$first_checked = $style === 'no' ? 'checked' : '';
	$sec_checked = $style === 'yes' ? 'checked' : '';

	echo "
    <span id='mn_c_trans_chooser'  class='chooser'>
    	<input id='mn_c_trans_no' name='mn_options[mn_c_trans]'  type='radio' value='no' {$first_checked} style='' /><label for='mn_c_trans_no'>Aa</label><input id='mn_c_trans_yes' name='mn_options[mn_c_trans]' type='radio' value='yes' {$sec_checked} style='' /><label for='mn_c_trans_yes'>AA</label>
    </span>";
}
function mn_uppercase_str() {
	$options = mn_get_options();
	$style = $options['mn_uppercase'];
	$first_checked = $style === 'no' ? 'checked' : '';
	$sec_checked = $style === 'yes' ? 'checked' : '';

	echo "
    <span id='mn_uppercase_chooser'  class='chooser'>
    	<input id='mn_uppercase_no' name='mn_options[mn_uppercase]'  type='radio' value='no' {$first_checked} style='' /><label for='mn_uppercase_no'>Aa</label><input id='mn_uppercase_yes' name='mn_options[mn_uppercase]' type='radio' value='yes' {$sec_checked} style='' /><label for='mn_uppercase_yes'>AA</label>
    </span>";
}

function mn_ind_str() {
	$options = mn_get_options();
	$style = $options['mn_ind'];
	$first_checked = $style == 'yes' ? 'checked="checked"' : '';

	echo "
	<p><label for='mn_ind'><input id='mn_ind' name='mn_options[mn_ind]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>
	";
}

function mn_separators_str() {
	$options = mn_get_options();
	$style = $options['mn_separators'];
	$first_checked = $style == 'yes' ? 'checked="checked"' : '';

	echo "
	<p><label for='mn_separators'><input id='mn_separators' name='mn_options[mn_separators]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>
	";
}

function mn_separators_width_str() {
	$options = mn_get_options();
	echo "
	 <h6>Relative to sidebar width in percentage.</h6>
	 <input id='mn_separators_width' name='mn_options[mn_separators_width]' size='3' type='text' value='{$options['mn_separators_width']}' style='' /> <span class='units'>%</span>";
}

function mn_highlight_str() {
	$options = mn_get_options();
	$style = $options['mn_highlight'];

	echo "
	    <h6>When solid color is used, it will be identical to next panel background color.</h6>
<select id='mn_highlight' name='mn_options[mn_highlight]'>
	  <option value='semi' " . ($style === 'semi' ? 'selected="selected"' : '') . ">Semitransparent highlight</option>
	  <option value='semi-dark' " . ($style === 'semi-dark' ? 'selected="selected"' : '') . ">Semitransparent highlight (dark)</option>
	  <option value='solid' " . ($style === 'solid' ? 'selected="selected"' : '') . ">Solid color highlighting</option>
	  <option value='line' " . ($style === 'line' ? 'selected="selected"' : '') . ">Line</option>
	  <!--<option value='cline' " . ($style === 'cline' ? 'selected="selected"' : '') . ">Centered line</option>-->
    </select>
    ";
}

function mn_highlight_active_str() {
	$options = mn_get_options();
	$style = $options['mn_highlight_active'];
	$first_checked = $style === 'yes' ? 'checked="checked"' : '';

	echo "
	<p><label for='mn_highlight_active'><input id='mn_highlight_active' name='mn_options[mn_highlight_active]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>
	";
}

function mn_label_vis_str() {
	$options = mn_get_options();
	$val = $options['mn_label_vis'];
	$first_checked = $val == 'visible' ? 'checked="checked"' : '';

	echo "
    <h6>Turn it off to use your custom toggle element. <a href='http://materialize.mtaandao.com/docs/Customize/Custom_Menu_Trigger' title='Guide' target='_blank'>Guide</a>.</h6>
	<p><label for='mn_label_vis'><input id='mn_label_vis' name='mn_options[mn_label_vis]' class='switcher' type='checkbox' value='visible' {$first_checked} style='' /></label></p>
	";


	/*$first_checked = $val == 'visible' ? 'checked="checked"' : '';
    $sec_checked = $val == 'hidden' ? 'checked="checked"' : '';

	echo "
	<p><input id='mn_label_vis_visible' name='mn_options[mn_label_vis]'  type='radio' value='visible' {$first_checked} style='' /> <label for='mn_label_vis_visible'>Visible</label></p>
	<p><input id='mn_label_vis_hidden' name='mn_options[mn_label_vis]'  type='radio' value='hidden' {$sec_checked} style='' /> <label for='mn_label_vis_hidden'>Don't show it</label></p>
	";*/
}

function mn_mob_nav_str() {
	$options = mn_get_options();
	$style = $options['mn_mob_nav'];
	$first_checked = $style == 'yes' ? 'checked="checked"' : '';

	echo "
    <h6>Overrides 'Top margin on mobiles' and 'Horisontal shift' settings.</h6>
	<p><label for='mn_mob_nav'><input id='mn_mob_nav' name='mn_options[mn_mob_nav]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>
	";
}


function mn_label_width_str() {
	$options = mn_get_options();
	echo "
	 <input id='mn_label_width' name='mn_options[mn_label_width]' size='1' type='text' value='{$options['mn_label_width']}' style='' /> <span class='units'>px</span>";
}
function mn_label_gaps_str() {
	$options = mn_get_options();
	echo "
	 <input id='mn_label_gaps' name='mn_options[mn_label_gaps]' size='1' type='text' value='{$options['mn_label_gaps']}' style='' /> <span class='units'>px</span>";
}
function mn_threshold_point_str() {
	$options = mn_get_options();
	echo "
	 <h6>Navbar will appear if screen width is smaller than this point. On mobiles only.</h6>
	 <input id='mn_threshold_point' name='mn_options[mn_threshold_point]' size='3' type='text' value='{$options['mn_threshold_point']}' style='' /> <span class='units'>px</span>";
}

function mn_fade_content_str () {
    $options = mn_get_options();
    $value = $options['mn_fade_content'];
    $first_checked = $value === 'light' ? 'checked' : '';
	$sec_checked = $value === 'dark' ? 'checked' : '';
	$third_checked = $value === 'none' ? 'checked' : '';

    echo "
	<h6>For page content when menu is exposed.</h6>
    <span id='mn_sidebar_style_chooser'  class='chooser'>
    	<input id='mn_fade_content_light' name='mn_options[mn_fade_content]'  type='radio' value='light' {$first_checked} style='' /><label for='mn_fade_content_light'>Light</label>
    	<input id='mn_fade_content_dark' name='mn_options[mn_fade_content]' type='radio' value='dark' {$sec_checked} style='' /><label for='mn_fade_content_dark'>Dark</label>
    	<input id='mn_fade_content_none' name='mn_options[mn_fade_content]' type='radio' value='none' {$third_checked} style='' /><label for='mn_fade_content_none'>Don't fade</label>
    </span>";
}

function mn_blur_content_str () {
    $options = mn_get_options();
    $first_checked = $options['mn_blur_content'] === 'blur' ? 'checked="checked"' : '';

	echo "
    <h6>For page content when menu is exposed. Blur effect may slow down performance.</h6>
	<p><label for='mn_blur_content'><input id='mn_blur_content' name='mn_options[mn_blur_content]' class='switcher' type='checkbox' value='blur' {$first_checked} style='' /></label></p>
	";
}

function mn_label_text_str () {
	$options = mn_get_options();
	$style = $options['mn_label_text'];
	$first_checked = $style === 'yes' ? 'checked="checked"' : '';

	echo "
    <h6>like 'Menu' and 'Close'.</h6>
	<p><label for='mn_label_text'><input id='mn_label_text' name='mn_options[mn_label_text]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>
	";
}

function mn_label_text_field_str () {
	$options = mn_get_options();

	echo "
	<p><input id='mn_label_text_field' name='mn_options[mn_label_text_field]' size='30' type='text' value='{$options['mn_label_text_field']}' style='' /></p>
	";
}

function mn_sidebar_pos_str () {
    $options = mn_get_options();
    $left_checked = $options['mn_sidebar_pos'] == 'left' ? 'checked="checked"' : '';
    $right_checked = $options['mn_sidebar_pos'] == 'right' ? 'checked="checked"' : '';

	echo "<h6>For sidebar and/or button. </h6>";
   	echo "<div><input id='mn_sidebar_pos_left' name='mn_options[mn_sidebar_pos]' type='radio' {$left_checked} value='left' style='' /> <label for='mn_sidebar_pos_left'></label></div>";
   	echo "<div><input id='mn_sidebar_pos_right' name='mn_options[mn_sidebar_pos]' type='radio' {$right_checked} value='right' style='' /> <label for='mn_sidebar_pos_right'></label></div>";
}

function mn_css_str()
{
    $options = mn_get_options();
    echo "<textarea cols='100' rows='10' id='mn_css' name='mn_options[mn_css]' >" . $options['mn_css'] . "</textarea>";
}

function mn_facebook_str() {
	$options = mn_get_options();
	echo " <input id='mn_facebook' name='mn_options[mn_facebook]' size='100' type='text' value='{$options['mn_facebook']}' style='' />";
}

function mn_twitter_str() {
	$options = mn_get_options();
	echo " <input id='mn_twitter' name='mn_options[mn_twitter]' size='100' type='text' value='{$options['mn_twitter']}' style='' />";
}


function mn_pinterest_str() {
	$options = mn_get_options();
	echo " <input id='mn_pinterest' name='mn_options[mn_pinterest]' size='100' type='text' value='{$options['mn_pinterest']}' style='' />";
}
function mn_youtube_str() {
	$options = mn_get_options();
	echo " <input id='mn_youtube' name='mn_options[mn_youtube]' size='100' type='text' value='{$options['mn_youtube']}' style='' />";
}
function mn_instagram_str() {
	$options = mn_get_options();
	echo " <input id='mn_instagram' name='mn_options[mn_instagram]' size='100' type='text' value='{$options['mn_instagram']}' style='' />";
}
function mn_linkedin_str() {
	$options = mn_get_options();
	echo " <input id='mn_linkedin' name='mn_options[mn_linkedin]' size='100' type='text' value='{$options['mn_linkedin']}' style='' />";
}
function mn_dribbble_str() {
	$options = mn_get_options();
	echo " <input id='mn_dribbble' name='mn_options[mn_dribbble]' size='100' type='text' value='{$options['mn_dribbble']}' style='' />";
}
function mn_vimeo_str() {
	$options = mn_get_options();
	echo " <input id='mn_vimeo' name='mn_options[mn_vimeo]' size='100' type='text' value='{$options['mn_vimeo']}' style='' />";
}
function mn_soundcloud_str() {
	$options = mn_get_options();
	echo " <input id='mn_soundcloud' name='mn_options[mn_soundcloud]' size='100' type='text' value='{$options['mn_soundcloud']}' style='' />";
}
function mn_email_str() {
	$options = mn_get_options();
	echo " <input id='mn_email' name='mn_options[mn_email]' size='100' type='text' value='{$options['mn_email']}' style='' />";
}
function mn_flickr_str() {
	$options = mn_get_options();
	echo " <input id='mn_flickr' name='mn_options[mn_flickr]' size='100' type='text' value='{$options['mn_flickr']}' style='' />";
}
function mn_skype_str() {
	$options = mn_get_options();
	echo " <input id='mn_skype' name='mn_options[mn_skype]' size='100' type='text' value='{$options['mn_skype']}' style='' />";
}
function mn_above_logo_str() {
	$options = mn_get_options();
	wp_editor($options['mn_above_logo'], 'mn_above_logo', array(
        'textarea_name' => 'mn_options[mn_above_logo]',
        'textarea_rows' => 6,
        'quicktags' => true,
        'media_buttons' => true,
        'wpautop' => false,
    ) );
}
function mn_under_logo_str() {
	$options = mn_get_options();
	wp_editor($options['mn_under_logo'], 'mn_under_logo', array(
        'textarea_name' => 'mn_options[mn_under_logo]',
        'textarea_rows' => 6,
        'quicktags' => true,
        'media_buttons' => true,
        'wpautop' => false,
    ) );
}
function mn_copy_str() {
	$options = mn_get_options();
	wp_editor($options['mn_copy'], 'mn_copy', array(
        'textarea_name' => 'mn_options[mn_copy]',
        'textarea_rows' => 6,
        'quicktags' => true,
        'media_buttons' => true,
        'wpautop' => false,
    ) );
}


function mn_gplus_str() {
	$options = mn_get_options();
	echo " <input id='mn_gplus' name='mn_options[mn_gplus]' size='100' type='text' value='{$options['mn_gplus']}' style='' />";
}
function mn_rss_str() {
	$options = mn_get_options();
	echo " <input id='mn_rss' name='mn_options[mn_rss]' size='100' type='text' value='{$options['mn_rss']}' style='' />";
}

function mn_submenu_support_str() {
	$options = mn_get_options();
	$style = $options['mn_submenu_support'];
    $first_checked = $style === 'yes' ? 'checked="checked"' : '';

	echo "
	<h6>Turn it on to enable submenu panels.</h6>
	<p><label for='mn_submenu_support'><input id='mn_submenu_support' name='mn_options[mn_submenu_support]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>
	";
}
function mn_submenu_mob_str() {
	$options = mn_get_options();
	$style = $options['mn_submenu_mob'];
	$first_checked = $style === 'yes' ? 'checked="checked"' : '';

	echo "
	<p><label for='mn_submenu_mob'><input id='mn_submenu_mob' name='mn_options[mn_submenu_mob]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>
	";
}

function mn_submenu_classes_str()
{
	$options = mn_get_options();
	echo "<h6>Comma-separated if multiple without spaces(!).</h6>";
	echo "<input id='mn_submenu_classes' name='mn_options[mn_submenu_classes]' type='text' value='{$options['mn_submenu_classes']}' style='' />";
}

function mn_togglers_str()
{
	$options = mn_get_options();
	echo "<h6>Enter valid CSS selector like #id or .class. <a href='http://materialize.mtaandao.com/docs/Customize/Custom_Menu_Trigger' title='Guide' target='_blank'>Guide</a>.</h6>";
	echo "<input id='mn_togglers' name='mn_options[mn_togglers]' type='text' value='{$options['mn_togglers']}' style='' />";
}

function mn_icons_manager_str(){
    echo '<p class="hint">Learn more from <a href="http://materialize.mtaandao.com/docs/Customize/Upload_Your_Icons" target="_blank">this guide</a>.</p>';
    echo '<div id="la_icon_manager_library"></div>';
    echo '<script type="text/javascript">
        jQuery(document).ready(function($) {
            $(document).on("iconManagerCollectionLoaded", function(){
                window["la_icon_manager_library"] = new LAIconManager("library", "#la_icon_manager_library", window["la_icon_manager_collection"]);
                window["la_icon_manager_library"].showLibrary();
            });
        });
        </script>';
}

function mn_license_text_str(){
    $options = mn_get_options();
    $val = $options['mn_license_valid'];

    if($val){
        echo '<p class="hint">
        Thanks for choosing Materialize as your WordPress menu plugin! <br/>
        All the upcoming premium benefits will be unlocked for you automatically. <br/>
        You can still subscribe/unsubscribe for important updates by choosing checkbox below and clicking "save changes" button.
        </p>';
    }else{
        echo '<p class="hint">
        Fill the quick form below to register your copy of Materialize plugin. <br/>
        Activated copy of Materialize will provide you premium features like auto-updating in future. <br/> 
        We work on plugin improvements constantly. Thanks for using and activating Materialize plugin!
        </p>';
    }
}

function get_license()
{
    $options = mn_get_options();
    $val = $options['mn_license_valid'];
    $theme = wp_get_theme();

    if($theme->get('Name') == 'X' && $theme->get('Author') == 'Themeco'){
        $val = '1';
    }
    if($theme->get('Name') != 'X' && $options['mn_license_code'] == ''){
        $val = '';
    }
    return $val;
}

function mn_license_valid_str(){
    $val = get_license();

    echo "<input type='hidden' id='mn_license_valid' value='{$val}' name='mn_options[mn_license_valid]' value>";
}

function mn_license_fname_str(){
	$options = mn_get_options();
	$val = $options['mn_license_fname'];
	echo "<input placeholder='Enter first name here' 
                type='text' 
                size='100' 
                id='mn_license_fname' 
                value='{$val}' 
                name='mn_options[mn_license_fname]' value>";
}

function mn_license_lname_str(){
    $options = mn_get_options();
    $val = $options['mn_license_lname'];
    echo "<input placeholder='Enter last name here' 
                type='text' 
                size='100' 
                id='mn_license_lname' 
                value='{$val}' 
                name='mn_options[mn_license_lname]' value>";
}

function mn_license_email_str(){
	$options = mn_get_options();
	$val = $options['mn_license_email'];

	echo "<input placeholder='Enter valid email here' type='text' size='100' id='mn_license_email' value='{$val}' name='mn_options[mn_license_email]' value>";
}

function mn_license_code_str(){
	$options = mn_get_options();
	$val = $options['mn_license_code'];
    $class = $options['mn_license_valid'] && $val ? 'validation-success' : '';
    $theme = wp_get_theme();

	if($theme->get('Name') == 'X' && $theme->get('Author') == 'Themeco'){
        echo "<p class='hint validation-success'>Your copy of Materialize is validated with your X theme license</p>";
    }else{
        echo "<p class='hint'>
			<a target='_blank' href=\"https://help.market.mtaandao.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-\">
				Where's my purchase code?
			</a>
		</p>";
        echo '<div class="purchase-code">';
		echo "<input placeholder='Paste code here' class='{$class}' type='text' size='100' id='mn_license_code' value='{$val}' name='mn_options[mn_license_code]' value>";
        echo "<span class='code-error'>Invalid code</span>";
        echo '</div>';
	}
}

function mn_license_subscribe_str(){
	$options = mn_get_options();
	$val = $options['mn_license_subscribe'];
	$checked = $val == 'yep' ? 'checked' : '';
	echo "<input id='mn_license_subscribe' type='checkbox' name='mn_options[mn_license_subscribe]' value='yep' {$checked} />";
	echo "<label for='mn_license_subscribe'>Receive important announcements and updates on email. <strong>We won't spam you</strong>.</label>";
}

function mn_options_validate($plugin_options) {
	if (!empty($_POST['update'])) {
		// Get the options array defined for the form
		foreach ($plugin_options as $option) {
			$id = $option['id'];
			//  Set the check box to "0" by default
			if ( 'checkbox' == $option['type'] && ! isset( $input[$id] ) ) {
				$input[$id] = "no";
			}
		}
	}

	if (isset($_FILES['mn_pic']) && ($_FILES['mn_pic']['size'] > 0)) {

		// Get the type of the uploaded file. This is returned as "type/extension"
		$arr_file_type = wp_check_filetype(basename($_FILES['mn_pic']['name']));
		$uploaded_file_type = $arr_file_type['type'];

		// Set an array containing a list of acceptable formats
		$allowed_file_types = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png');

		// If the uploaded file is the right format
		if (in_array($uploaded_file_type, $allowed_file_types)) {

			// Options array for the wp_handle_upload function. 'test_upload' => false
			$upload_overrides = array('test_form' => false);

			//delete previous
			//if (isset($plugin_options['mn_pic'])) unlink($plugin_options['mn_pic']);

			$uploaded_file = wp_handle_upload($_FILES['mn_pic'], $upload_overrides);

			// If the wp_handle_upload call returned a local path for the image
			if (isset($uploaded_file['file'])) {
				// The wp_insert_attachment function needs the literal system path, which was passed back from wp_handle_upload
				$file_name_and_location = $uploaded_file['file'];
				$wp_upload_dir = wp_upload_dir();
				$plugin_options['mn_tab_logo'] = $wp_upload_dir['url'] . '/' . basename($file_name_and_location);
			} else { // wp_handle_upload returned some kind of error. the return does contain error details, so you can use it here if you want.
				$upload_feedback = 'There was a problem with your upload.';
			}

		} else { // wrong file type
			$upload_feedback = 'Please upload only image files (jpg, gif or png).';
		}

	} else { // No file was passed
		$upload_feedback = false;
	}
	return $plugin_options;
}

