<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// shortcode for page
function vsel_shortcode_page( $vsel_atts ) {
	// initialize output
	$output = '';
	// include shortcode attributes
	$vsel_atts = shortcode_atts( vsel_atts_array(), $vsel_atts );
	// main container
	$output .= '<div id="vsel" class="vsel-shortcode vsel-shortcode-'.esc_attr( vsel_container_classes( $vsel_atts ) ).'">';
		// misc vars
		global $paged;
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
		$today = vsel_timestamp_today();
		$tomorrow = vsel_timestamp_tomorrow();
		// include query args
		$vsel_query_args = vsel_query_args( $vsel_atts, $today, $tomorrow, $paged );
		// start query
		$vsel_page_query = new WP_Query( $vsel_query_args );
		if ( $vsel_page_query->have_posts() ) :
			while( $vsel_page_query->have_posts() ): $vsel_page_query->the_post();
				// include event variables
				include 'vsel-variables-global.php';
				include 'vsel-variables-page.php';
				$list_id = 'page';
				// start event container
				$output .= '<div id="event-'.get_the_ID().'" class="vsel-content'.esc_attr( vsel_event_cats() ).esc_attr( vsel_event_status() ).'">';
					// include event template
					include 'vsel-template.php';
				// end event container
				$output .= '</div>';
			endwhile;
			// pagination
			if ( empty( $vsel_atts['offset'] ) && ( $vsel_atts['offset'] != '0' ) ) :
				if ( $vsel_atts['pagination'] != 'false' ) :
					if ( $vsel_pagination_hide != 'yes' ) :
						if ( $vsel_pagination == 'numeric' ) :
							$output .= '<div class="vsel-nav-numeric">';
								$output .= paginate_links( array(
									'total' => $vsel_page_query->max_num_pages,
									'next_text' => __( 'Next &raquo;', 'very-simple-event-list' ),
									'prev_text' => __( '&laquo; Previous', 'very-simple-event-list' ),
								) );
							$output .= '</div>';
						else :
							$output .= '<div class="vsel-nav">';
								$output .= get_next_posts_link( __( 'Next &raquo;', 'very-simple-event-list' ), $vsel_page_query->max_num_pages );
								$output .= get_previous_posts_link( __( '&laquo; Previous', 'very-simple-event-list' ) );
							$output .= '</div>';
						endif;
					endif;
				endif;
			endif;
			// reset post data
			wp_reset_postdata();
		else:
			// if no events
			$output .= '<p class="vsel-no-events">';
			$output .= esc_html( $vsel_atts['no_events_text'] );
			$output .= '</p>';
		// end query
		endif;
	$output .= '</div>';
	// return output
	return $output;
}
add_shortcode( 'vsel', 'vsel_shortcode_page' );

// shortcode for widget
function vsel_shortcode_widget( $vsel_atts ) {
	// initialize output
	$output = '';
	// include shortcode attributes
	$vsel_atts = shortcode_atts( vsel_atts_array(), $vsel_atts );
	// main container
	$output .= '<div id="vsel" class="vsel-widget vsel-widget-'.esc_attr( vsel_container_classes( $vsel_atts ) ).'">';
		// misc vars
		$paged = 0;
		$today = vsel_timestamp_today();
		$tomorrow = vsel_timestamp_tomorrow();
		// include query args
		$vsel_query_args = vsel_query_args( $vsel_atts, $today, $tomorrow, $paged );
		// start query
		$vsel_widget_query = new WP_Query( $vsel_query_args );
		if ( $vsel_widget_query->have_posts() ) :
			while( $vsel_widget_query->have_posts() ): $vsel_widget_query->the_post();
				// include event variables
				include 'vsel-variables-global.php';
				include 'vsel-variables-widget.php';
				$list_id = 'widget';
				// start event container
				$output .= '<div id="event-'.get_the_ID().'" class="vsel-content'.esc_attr( vsel_event_cats() ).esc_attr( vsel_event_status() ).'">';
					// include event template
					include 'vsel-template.php';
				// end event container
				$output .= '</div>';
			endwhile;
			// reset post data
			wp_reset_postdata();
		else:
			// if no events
			$output .= '<p class="vsel-no-events">';
			$output .= esc_html( $vsel_atts['no_events_text'] );
			$output .= '</p>';
		// end query
		endif;
	$output .= '</div>';
	// return output
	return $output;
}
add_shortcode( 'vsel-widget', 'vsel_shortcode_widget' );

// future events shortcode
function vsel_future_events_shortcode() {
	/* translators: %s: the new shortcode tag. */
	return '<p>'.sprintf( esc_html__( 'Deprecated shortcode. Use %s instead.', 'very-simple-event-list' ), '<code>[vsel list="future"]</code>' ).'</p>';
}
add_shortcode( 'vsel-future-events', 'vsel_future_events_shortcode' );

// current events shortcode
function vsel_current_events_shortcode() {
	/* translators: %s: the new shortcode tag. */
	return '<p>'.sprintf( esc_html__( 'Deprecated shortcode. Use %s instead.', 'very-simple-event-list' ), '<code>[vsel list="current"]</code>' ).'</p>';
}
add_shortcode( 'vsel-current-events', 'vsel_current_events_shortcode' );

// past events shortcode
function vsel_past_events_shortcode() {
	/* translators: %s: the new shortcode tag. */
	return '<p>'.sprintf( esc_html__( 'Deprecated shortcode. Use %s instead.', 'very-simple-event-list' ), '<code>[vsel list="past"]</code>' ).'</p>';
}
add_shortcode( 'vsel-past-events', 'vsel_past_events_shortcode' );

// all events shortcode
function vsel_all_events_shortcode() {
	/* translators: %s: the new shortcode tag. */
	return '<p>'.sprintf( esc_html__( 'Deprecated shortcode. Use %s instead.', 'very-simple-event-list' ), '<code>[vsel list="all"]</code>' ).'</p>';
}
add_shortcode( 'vsel-all-events', 'vsel_all_events_shortcode' );

// shortcode attributes
function vsel_atts_array() {
	return array(
		'list' => '',
		'class' => '',
		'date_format' => '',
		'event_cat' => '',
		'posts_per_page' => '',
		'offset' => '',
		'order' => '',
		'title_link' => '',
		'featured_image' => '',
		'featured_image_link' => '',
		'featured_image_caption' => '',
		'event_info' => '',
		'read_more' => '',
		'pagination' => '',
		'no_events_text' => __( 'No events are found.', 'very-simple-event-list' ),
	);
}

// main container classes
function vsel_container_classes( $vsel_atts ) {
	// extra class for main container
	if ( $vsel_atts['list'] == 'future' ) {
		$extra_class = 'future-events';
	} elseif ( $vsel_atts['list'] == 'current' ) {
		$extra_class = 'current-events';
	} elseif ( $vsel_atts['list'] == 'past' ) {
		$extra_class = 'past-events';
	} elseif ( $vsel_atts['list'] == 'all' ) {
		$extra_class = 'all-events';
	} else {
		$extra_class = 'upcoming-events';
	}
	// custom class for main container
	if ( empty( $vsel_atts['class'] ) ) {
		$custom_class = '';
	} else {
		$custom_class = ' '.$vsel_atts['class'];
	}
	return $extra_class.$custom_class;
}

// query args
function vsel_query_args( $vsel_atts, $today, $tomorrow, $paged ) {
	// base query args (common to all)
	$vsel_query_args = array(
		'post_type' => 'event',
		'event_cat' => $vsel_atts['event_cat'],
		'post_status' => 'publish',
		'ignore_sticky_posts' => true,
		'meta_key' => 'event-start-date',
		'orderby' => 'meta_value_num menu_order',
		'posts_per_page' => $vsel_atts['posts_per_page'],
		'offset' => $vsel_atts['offset'],
		'paged' => $paged,
	);

	// meta query based on list type
	switch ( $vsel_atts['list'] ) {
		case 'future': // future events
			if ( $vsel_atts['order'] == 'DESC' ) {
				$vsel_query_args['order'] = 'DESC';
			} else {
				$vsel_query_args['order'] = 'ASC';
			}
			$vsel_query_args['meta_query'] = array(
				'relation' => 'AND',
				array(
					'key' => 'event-start-date',
					'value' => $tomorrow,
					'compare' => '>=',
					'type' => 'NUMERIC',
				)
			);
			break;
		case 'current': // current events
			if ( $vsel_atts['order'] == 'DESC' ) {
				$vsel_query_args['order'] = 'DESC';
			} else {
				$vsel_query_args['order'] = 'ASC';
			}
			$vsel_query_args['meta_query'] = array(
				'relation' => 'AND',
				array(
					'key' => 'event-start-date',
					'value' => $tomorrow,
					'compare' => '<',
					'type' => 'NUMERIC',
				),
				array(
					'key' => 'event-date',
					'value' => $today,
					'compare' => '>=',
					'type' => 'NUMERIC',
				)
			);
			break;
		case 'past': // past events
			if ( $vsel_atts['order'] == 'ASC' ) {
				$vsel_query_args['order'] = 'ASC';
			} else {
				$vsel_query_args['order'] = 'DESC';
			}
			$vsel_query_args['meta_query'] = array(
				'relation' => 'AND',
				array(
					'key' => 'event-date',
					'value' => $today,
					'compare' => '<',
					'type' => 'NUMERIC',
				)
			);
			break;
		case 'all': // all events (no meta query needed)
			if ( $vsel_atts['order'] == 'ASC' ) {
				$vsel_query_args['order'] = 'ASC';
			} else {
				$vsel_query_args['order'] = 'DESC';
			}
			break;
		default: // upcoming events
			if ( $vsel_atts['order'] == 'DESC' ) {
				$vsel_query_args['order'] = 'DESC';
			} else {
				$vsel_query_args['order'] = 'ASC';
			}
			$vsel_query_args['meta_query'] = array(
				'relation' => 'AND',
				array(
					'key' => 'event-date',
					'value' => $today,
					'compare' => '>=',
					'type' => 'NUMERIC',
				)
			);
			break;
	}
	return $vsel_query_args;
}
