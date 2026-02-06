<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// page variables

// set date format
if ( ! empty( $vsel_atts['date_format'] ) ) {
	$vsel_date_format = $vsel_atts['date_format'];
} else {
	$vsel_date_format = $template_date_format;
}

// get custom labels from settings page
$vsel_date_label = get_option( 'vsel-setting-16' );
$vsel_start_date_label = get_option( 'vsel-setting-17' );
$vsel_end_date_label = get_option( 'vsel-setting-18' );
$vsel_time_label = get_option( 'vsel-setting-19' );
$vsel_all_day_label = get_option( 'vsel-setting-89' );
$vsel_location_label = get_option( 'vsel-setting-20' );
$vsel_read_more_label = get_option( 'vsel-setting-102' );

// get setting for title tag
$vsel_title_tag = get_option( 'vsel-setting-95' );

// get setting to show date label or icon
$vsel_date_type = get_option( 'vsel-setting-62' );

// get setting to display date icon next to other event details
$vsel_meta_combine = get_option( 'vsel-setting-68' );

// get setting to combine dates on the same line
$vsel_date_combine = get_option( 'vsel-setting-15' );

// get setting to show all event info or summary
$vsel_event_info = get_option( 'vsel-setting-13' );

// get setting for acf fields
$vsel_acf_fields = get_option( 'vsel-setting-51' );

// get setting to show read more link
$vsel_read_more = get_option( 'vsel-setting-101' );

// get setting to display title on top
$vsel_title_on_top = get_option( 'vsel-setting-59' );

// get settings to link title, date and featured image to event page
$vsel_link_title = get_option( 'vsel-setting-9' );
$vsel_link_date = get_option( 'vsel-setting-108' );
$vsel_link_image = get_option( 'vsel-setting-29' );

// get setting to link category to category page
$vsel_link_cat = get_option( 'vsel-setting-44' );

// get settings for event layout
$vsel_meta_alignment = get_option( 'vsel-setting-35' );
$vsel_image_alignment = get_option( 'vsel-setting-36' );
$vsel_meta_width = get_option( 'vsel-setting-66' );
$vsel_meta_full_width = get_option( 'vsel-setting-106' );

// get setting to set featured image size
$vsel_image_size = get_option( 'vsel-setting-30' );

// get setting to set featured image max width
$vsel_image_width = get_option( 'vsel-setting-53' );

// get setting for pagination
$vsel_pagination = get_option( 'vsel-setting-98' );

// get settings to hide elements
$vsel_title_hide = get_option( 'vsel-setting-64' );
$vsel_date_hide = get_option( 'vsel-setting-8' );
$vsel_time_hide = get_option( 'vsel-setting-11' );
$vsel_location_hide = get_option( 'vsel-setting-12' );
$vsel_map_hide = get_option( 'vsel-setting-110' );
$vsel_image_hide = get_option( 'vsel-setting-27' );
$vsel_info_hide = get_option( 'vsel-setting-28' );
$vsel_link_hide = get_option( 'vsel-setting-10' );
$vsel_cats_hide = get_option( 'vsel-setting-33' );
$vsel_pagination_hide = get_option( 'vsel-setting-42' );

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
if ( empty( $vsel_read_more_label ) ) {
	$vsel_read_more_label = __( 'Read more', 'very-simple-event-list' );
}

// set title tag
if ( $vsel_title_tag == 'h2' ) {
	$vsel_title_tag_start = '<h2 class="vsel-meta-title">';
	$vsel_title_tag_end = '</h2>';
} elseif ( $vsel_title_tag == 'h4' ) {
	$vsel_title_tag_start = '<h4 class="vsel-meta-title">';
	$vsel_title_tag_end = '</h4>';
} elseif ( $vsel_title_tag == 'div' ) {
	$vsel_title_tag_start = '<div class="vsel-meta-title">';
	$vsel_title_tag_end = '</div>';
} else {
	$vsel_title_tag_start = '<h3 class="vsel-meta-title">';
	$vsel_title_tag_end = '</h3>';
}

// set title
if ( $vsel_title_hide == 'yes' ) {
	$vsel_event_title = '';
} else {
	if ( ! empty( $vsel_atts['title_link'] ) && ( $vsel_atts['title_link'] == 'false' ) ) {
		$vsel_event_title = $vsel_title_tag_start.get_the_title().$vsel_title_tag_end;
	} else {
		if ( ( $redirect_title_to_more_info == 'yes' ) && ! empty( $more_info_link ) ) {
			$vsel_event_title = $vsel_title_tag_start.'<a href="'.esc_url( $more_info_link ).'" rel="noopener noreferrer" '.$more_info_link_target.' title="'.esc_url( $more_info_link ).'">'.get_the_title().'</a>'.$vsel_title_tag_end;
		} elseif ( $vsel_link_title == 'yes' ) {
			$vsel_event_title = $vsel_title_tag_start.'<a href="'.get_permalink().'" rel="bookmark" title="'.get_the_title().'">'.get_the_title().'</a>'.$vsel_title_tag_end;
		} else {
			$vsel_event_title = $vsel_title_tag_start.get_the_title().$vsel_title_tag_end;
		}
	}
}

// link date label and date icon to title
if ( $vsel_link_date == 'yes' ) {
	$date_before = '<a href="'.get_permalink().'" rel="bookmark">';
	$date_after = '</a>';
} else {
	$date_before = '';
	$date_after = '';
}

// set size for featured image
if ( $vsel_image_size == 'small' ) {
	$vsel_image_source = 'thumbnail';
} elseif ( $vsel_image_size == 'medium' ) {
	$vsel_image_source = 'medium';
} elseif ( $vsel_image_size == 'large' ) {
	$vsel_image_source = 'large';
} elseif ( $vsel_image_size == 'full' ) {
	$vsel_image_source = 'full';
} else {
	$vsel_image_source = 'post-thumbnail';
}

// set max width for featured image
if ( ! empty( $vsel_image_width ) && is_numeric( $vsel_image_width ) && ( $vsel_image_width > 19 ) && ( $vsel_image_width < 101 ) ) {
	if ( $vsel_image_width == '100' ) {
		$vsel_image_width_css = 'max-width:100%; float:none; margin-left:0; margin-right:0; box-sizing:border-box;';
	} else {
		$vsel_image_width_css = 'max-width:'.$vsel_image_width.'%;';
	}
} else {
	$vsel_image_width_css = 'max-width:40%';
}

// set css class for featured image
if ( $vsel_image_alignment == 'left' ) {
	$vsel_img_class = 'vsel-alignleft';
} else {
	$vsel_img_class = 'vsel-alignright';
}

// set width for event details and event info
$vsel_meta_width_css = 'width:36%;';
$vsel_info_width_css = 'width:60%;';
if ( $vsel_meta_full_width == 'yes' ) {
	$vsel_meta_width_css = 'width:100%; clear:both; margin-bottom:20px; box-sizing:border-box;';
	$vsel_info_width_css = 'width:100%; clear:both; box-sizing:border-box;';
} elseif ( ( $vsel_image_hide == 'yes' ) && ( $vsel_info_hide == 'yes' ) ) {
	$vsel_meta_width_css = 'width:100%; clear:both; box-sizing:border-box;';
	$vsel_info_width_css = '';
} elseif ( ! empty( $vsel_meta_width ) && is_numeric( $vsel_meta_width ) && ( $vsel_meta_width > 19 ) && ( $vsel_meta_width < 81 ) ) {
	$vsel_content_width_default = 96;
	$vsel_content_width = $vsel_content_width_default - $vsel_meta_width;
	$vsel_meta_width_css = 'width:'.$vsel_meta_width.'%;';
	$vsel_info_width_css = 'width:'.$vsel_content_width.'%;';
}

// set css class for event details and event info
if ( ( $vsel_meta_full_width == 'yes' ) || ( ( $vsel_image_hide == 'yes' ) && ( $vsel_info_hide == 'yes' ) ) ) {
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
