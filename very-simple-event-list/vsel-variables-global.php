<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// global variables

// get utc timezone
$utc_timezone = vsel_utc_timezone();

// get default date format
$date_format_default = get_option( 'date_format' );

// get setting for custom date format
$date_format_settings_page = get_option( 'vsel-setting-38' );

// set global date format
if ( ! empty( $date_format_settings_page ) ) {
	$template_date_format = $date_format_settings_page;
} else {
	$template_date_format = $date_format_default;
}

// get default time format
$time_format_default = get_option( 'time_format' );

// get setting for custom time format
$time_format_settings_page = get_option( 'vsel-setting-92' );

// set global time format
if ( ! empty( $time_format_settings_page ) ) {
	$template_time_format = $time_format_settings_page;
} else {
	$template_time_format = $time_format_default;
}

// get setting for one time field instead of start time and end time
$one_time_field = get_option( 'vsel-setting-87' );

// get setting for hiding equal start time and end time
$hide_equal_time = get_option( 'vsel-setting-94' );

// get settings for date, time and cat separator
$date_separator = get_option( 'vsel-setting-69' );
$time_separator = get_option( 'vsel-setting-88' );
$cat_separator = get_option( 'vsel-setting-70' );

// date, time and cat separator
if ( empty( $date_separator ) ) {
	$date_separator = '-';
}
if ( empty( $time_separator ) ) {
	$time_separator = '-';
}
if ( empty( $cat_separator ) ) {
	$cat_separator = '|';
}

// get settings to disable theme template support
$disable_single_template = get_option( 'vsel-setting-39' );
$disable_category_template = get_option( 'vsel-setting-40' );
$disable_post_type_template = get_option( 'vsel-setting-43' );
$disable_search_template = get_option( 'vsel-setting-41' );

// get event details
$start_date_timestamp = get_post_meta( get_the_ID(), 'event-start-date', true );
$end_date_timestamp = get_post_meta( get_the_ID(), 'event-date', true );
$one_time = get_post_meta( get_the_ID(), 'event-time', true );
$hide_end_time = get_post_meta( get_the_ID(), 'event-hide-end-time', true );
$all_day_event = get_post_meta( get_the_ID(), 'event-all-day', true );
$location = get_post_meta( get_the_ID(), 'event-location', true );
$more_info_link = get_post_meta( get_the_ID(), 'event-link', true );
$more_info_link_label = get_post_meta( get_the_ID(), 'event-link-label', true );
$more_info_link_target = get_post_meta( get_the_ID(), 'event-link-target', true );
$redirect_title_to_more_info = get_post_meta( get_the_ID(), 'event-link-title', true );
$redirect_image_to_more_info = get_post_meta( get_the_ID(), 'event-link-image', true );
$summary = get_post_meta( get_the_ID(), 'event-summary', true );

// get start date and end date for comparing dates
$start_date = gmdate( 'Ymd', intval( $start_date_timestamp ) );
$end_date = gmdate( 'Ymd', intval( $end_date_timestamp ) );

// get start time and end time for comparing times
$start_time = gmdate( 'Hi', intval( $start_date_timestamp ) );
$end_time = gmdate( 'Hi', intval( $end_date_timestamp ) );

// set more info link label
if ( empty( $more_info_link_label) ) {
	$more_info_link_label = __( 'More info', 'very-simple-event-list' );
}

// set more info link target
if ( $more_info_link_target == 'yes' ) {
	$more_info_link_target = 'rel="noopener noreferrer" target="_blank"';
} else {
	$more_info_link_target = 'rel="noreferrer" target="_self"';
}
