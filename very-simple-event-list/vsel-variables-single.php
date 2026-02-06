<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// single event variables

// set date format
$vsel_date_format = $template_date_format;

// get custom labels from settings page
$vsel_date_label = get_option( 'vsel-setting-81' );
$vsel_start_date_label = get_option( 'vsel-setting-82' );
$vsel_end_date_label = get_option( 'vsel-setting-83' );
$vsel_time_label = get_option( 'vsel-setting-84' );
$vsel_all_day_label = get_option( 'vsel-setting-91' );
$vsel_location_label = get_option( 'vsel-setting-85' );

// get setting to show date label or icon
$vsel_date_type = get_option( 'vsel-setting-74' );

// get setting to display date icon next to other event details
$vsel_meta_combine = get_option( 'vsel-setting-97' );

// get setting to combine dates on the same line
$vsel_date_combine = get_option( 'vsel-setting-75' );

// get setting for acf fields
$vsel_acf_fields = get_option( 'vsel-setting-80' );

// get setting to link category to category page
$vsel_link_cat = get_option( 'vsel-setting-73' );

// get settings for event layout
$vsel_meta_alignment = get_option( 'vsel-setting-72' );
$vsel_meta_width = get_option( 'vsel-setting-71' );
$vsel_meta_full_width = get_option( 'vsel-setting-107' );

// get settings to hide elements
$vsel_date_hide = get_option( 'vsel-setting-86' );
$vsel_time_hide = get_option( 'vsel-setting-76' );
$vsel_location_hide = get_option( 'vsel-setting-77' );
$vsel_map_hide = get_option( 'vsel-setting-112' );
$vsel_link_hide = get_option( 'vsel-setting-79' );
$vsel_cats_hide = get_option( 'vsel-setting-78' );

// show default label if no custom label is set
if ( empty( $vsel_date_label ) || ( strpos( $vsel_date_label, '%s' ) === false ) || ( substr_count( $vsel_date_label, '%' ) > 1 ) ) {
	/* translators: %s: the variable. */
	$vsel_date_label = __( 'Date: %s', 'very-simple-event-list' );
}
if ( empty( $vsel_start_date_label ) || ( strpos( $vsel_start_date_label, '%s' ) === false ) || ( substr_count( $vsel_start_date_label, '%' ) > 1 ) ) {
	/* translators: %s: the variable. */
	$vsel_start_date_label = __( 'Start date: %s', 'very-simple-event-list' );
}
if ( empty( $vsel_end_date_label ) || ( strpos( $vsel_end_date_label, '%s' ) === false ) || ( substr_count( $vsel_end_date_label, '%' ) > 1 ) ) {
	/* translators: %s: the variable. */
	$vsel_end_date_label = __( 'End date: %s', 'very-simple-event-list' );
}
if ( empty( $vsel_time_label ) || ( strpos( $vsel_time_label, '%s' ) === false ) || ( substr_count( $vsel_time_label, '%' ) > 1 ) ) {
	/* translators: %s: the variable. */
	$vsel_time_label = __( 'Time: %s', 'very-simple-event-list' );
}
if ( empty( $vsel_all_day_label ) ) {
	$vsel_all_day_label = __( 'All-day event', 'very-simple-event-list' );
}
if ( empty( $vsel_location_label ) || ( strpos( $vsel_location_label, '%s' ) === false ) || ( substr_count( $vsel_location_label, '%' ) > 1 ) ) {
	/* translators: %s: the variable. */
	$vsel_location_label = __( 'Location: %s', 'very-simple-event-list' );
}

// set but not relevant for single event page
$date_before = '';
$date_after = '';

// set width for event details and event info
$vsel_meta_width_css = 'width:36%;';
$vsel_info_width_css = 'width:60%;';
if ( $vsel_meta_full_width == 'yes' ) {
	$vsel_meta_width_css = 'width:100%; clear:both; margin-bottom:20px; box-sizing:border-box;';
	$vsel_info_width_css = 'width:100%; clear:both; box-sizing:border-box;';
} elseif ( ! empty( $vsel_meta_width ) && is_numeric( $vsel_meta_width ) && ( $vsel_meta_width > 19 ) && ( $vsel_meta_width < 81 ) ) {
	$vsel_content_width_default = 96;
	$vsel_content_width = $vsel_content_width_default - $vsel_meta_width;
	$vsel_meta_width_css = 'width:'.$vsel_meta_width.'%;';
	$vsel_info_width_css = 'width:'.$vsel_content_width.'%;';
}

// set css class for event details and event info
if ( $vsel_meta_full_width == 'yes' ) {
	$vsel_meta_class = 'vsel-meta';
	$vsel_info_class = 'vsel-info';
} else {
	if ( $vsel_meta_alignment == 'right' ) {
		$vsel_meta_class = 'vsel-meta vsel-alignright';
		$vsel_info_class = 'vsel-info vsel-alignleft';
	} else {
		$vsel_meta_class = 'vsel-meta vsel-alignleft';
		$vsel_info_class = 'vsel-info vsel-alignright';
	}
}

// set event details container
$vsel_meta_start = '<div class="'.$vsel_meta_class.'" style="'.$vsel_meta_width_css.'">';
$vsel_meta_end = '</div>';

// set event info container
$vsel_info_start = '<div class="'.$vsel_info_class.'" style="'.$vsel_info_width_css.'">';
$vsel_info_end = '</div>';
