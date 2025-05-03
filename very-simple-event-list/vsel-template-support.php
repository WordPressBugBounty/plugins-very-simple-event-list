<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// content of single event page
function vsel_single_content( $content ) {
	// include event variables
	include 'vsel-variables-global.php';
	include 'vsel-variables-single.php';
	$list_id = 'template_support_single';
	// initialize output
	$output = '';
	// if single event and if template is activated
	if ( is_singular( 'event' ) && in_the_loop() && ( $disable_single_template != 'yes' ) ) {
		// start event container
		$output .= '<div class="vsel-content">';
			// include event template
			include 'vsel-template.php';
		// end event container
		$output .= '</div>';
	// return default content if template is not activated
	} else {
		$output .= $content;
	}
	// return output
	return $output;
}
add_filter( 'the_content', 'vsel_single_content' );

// content of category, post type and search results page
function vsel_archive_content( $content ) {
	// include event variables
	include 'vsel-variables-global.php';
	include 'vsel-variables-page.php';
	$list_id = 'template_support_content';
	// initialize output
	$output = '';
	// if post content is no summary and if template is activated
	if ( ( is_tax( 'event_cat' ) && in_the_loop() && ( $disable_category_template != 'yes' ) ) || ( is_post_type_archive( 'event' ) && ! is_search() && in_the_loop() && ( $disable_post_type_template != 'yes' ) ) || ( ( get_post_type() == 'event' ) && is_search() && in_the_loop() && ( $disable_search_template != 'yes' ) ) ) {
		// get event content
		$vsel_event_data = get_post( get_the_ID() );
		$vsel_event_content = wp_kses_post( wpautop( $vsel_event_data->post_content ) );
		// start event container
		$output .= '<div class="vsel-content">';
			// include event template
			include 'vsel-template.php';
		// end event container
		$output .= '</div>';
	// return default content if template is not activated
	} else {
		$output .= $content;
	}
	// return output
	return $output;
}
add_filter( 'the_content', 'vsel_archive_content' );

function vsel_archive_excerpt( $excerpt ) {
	// include event variables
	include 'vsel-variables-global.php';
	include 'vsel-variables-page.php';
	$list_id = 'template_support_excerpt';
	// initialize output
	$output = '';
	// if post content is summary and if template is activated
	if ( ( is_tax( 'event_cat' ) && in_the_loop() && ( $disable_category_template != 'yes' ) ) || ( is_post_type_archive( 'event' ) && ! is_search() && in_the_loop() && ( $disable_post_type_template != 'yes' ) ) || ( ( get_post_type() == 'event' ) && is_search() && in_the_loop() && ( $disable_search_template != 'yes' ) ) ) {
		// get event content
		$vsel_event_data = get_post( get_the_ID() );
		$vsel_event_content = $vsel_event_data->post_content;
		// create excerpt
		if ( ! empty( $summary ) ) {
			$vsel_event_summary = wp_kses_post( wpautop( $summary ) );
		} else {
			$vsel_event_summary = wp_trim_words( $vsel_event_content, 55, ' [&hellip;] ' );
		}
		// start event container
		$output .= '<div class="vsel-content">';
			// include event template
			include 'vsel-template.php';
		// end event container
		$output .= '</div>';
	// return default excerpt if template is not activated
	} else {
		$output .= $excerpt;
	}
	// return output
	return $output;
}
add_filter( 'the_excerpt', 'vsel_archive_excerpt' );
