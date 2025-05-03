<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// query args for future events list
if ( $vsel_atts['list'] == 'future' ) {
	$vsel_meta_query = array(
		'relation' => 'AND',
		array(
			'key' => 'event-start-date',
			'value' => $tomorrow,
			'compare' => '>=',
			'type' => 'NUMERIC'
		)
	);
	$vsel_query_args = array(
		'post_type' => 'event',
		'event_cat' => $vsel_atts['event_cat'],
		'post_status' => 'publish',
		'ignore_sticky_posts' => true,
		'meta_key' => 'event-start-date',
		'orderby' => 'meta_value_num menu_order',
		'order' => $vsel_atts['order'],
		'posts_per_page' => $vsel_atts['posts_per_page'],
		'offset' => $vsel_atts['offset'],
		'paged' => $paged,
		'meta_query' => $vsel_meta_query
	);
// query args for current events list
} elseif ( $vsel_atts['list'] == 'current' ) {
	$vsel_meta_query = array(
		'relation' => 'AND',
			array(
				'key' => 'event-start-date',
				'value' => $tomorrow,
				'compare' => '<',
				'type' => 'NUMERIC'
			),
			array(
				'key' => 'event-date',
				'value' => $today,
				'compare' => '>=',
				'type' => 'NUMERIC'
		)
	);
	$vsel_query_args = array(
		'post_type' => 'event',
		'event_cat' => $vsel_atts['event_cat'],
		'post_status' => 'publish',
		'ignore_sticky_posts' => true,
		'meta_key' => 'event-start-date',
		'orderby' => 'meta_value_num menu_order',
		'order' => $vsel_atts['order'],
		'posts_per_page' => $vsel_atts['posts_per_page'],
		'offset' => $vsel_atts['offset'],
		'paged' => $paged,
		'meta_query' => $vsel_meta_query
	);
// query args for past events list
} elseif ( $vsel_atts['list'] == 'past' ) {
	$vsel_meta_query = array(
		'relation' => 'AND',
		array(
			'key' => 'event-date',
			'value' => $today,
			'compare' => '<',
			'type' => 'NUMERIC'
		)
	);
	$vsel_query_args = array(
		'post_type' => 'event',
		'event_cat' => $vsel_atts['event_cat'],
		'post_status' => 'publish',
		'ignore_sticky_posts' => true,
		'meta_key' => 'event-start-date',
		'orderby' => 'meta_value_num menu_order',
		'order' => $vsel_atts['order'],
		'posts_per_page' => $vsel_atts['posts_per_page'],
		'offset' => $vsel_atts['offset'],
		'paged' => $paged,
		'meta_query' => $vsel_meta_query
	);
// query args for all events list
} elseif ( $vsel_atts['list'] == 'all' ) {
	$vsel_query_args = array(
		'post_type' => 'event',
		'event_cat' => $vsel_atts['event_cat'],
		'post_status' => 'publish',
		'ignore_sticky_posts' => true,
		'meta_key' => 'event-start-date',
		'orderby' => 'meta_value_num menu_order',
		'order' => $vsel_atts['order'],
		'posts_per_page' => $vsel_atts['posts_per_page'],
		'offset' => $vsel_atts['offset'],
		'paged' => $paged
	);
// query args for upcoming events list
} else {
	$vsel_meta_query = array(
		'relation' => 'AND',
		array(
			'key' => 'event-date',
			'value' => $today,
			'compare' => '>=',
			'type' => 'NUMERIC'
		)
	);
	$vsel_query_args = array(
		'post_type' => 'event',
		'event_cat' => $vsel_atts['event_cat'],
		'post_status' => 'publish',
		'ignore_sticky_posts' => true,
		'meta_key' => 'event-start-date',
		'orderby' => 'meta_value_num menu_order',
		'order' => $vsel_atts['order'],
		'posts_per_page' => $vsel_atts['posts_per_page'],
		'offset' => $vsel_atts['offset'],
		'paged' => $paged,
		'meta_query' => $vsel_meta_query
	);
}
