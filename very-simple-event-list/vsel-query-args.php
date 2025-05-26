<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// query args for future events list
if ( $vsel_atts['list'] == 'future' ) {
	if ( $vsel_atts['order'] == 'DESC' ) {
		$order = 'DESC';
	} else {
		$order = 'ASC';
	}
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
		'order' => $order,
		'posts_per_page' => $vsel_atts['posts_per_page'],
		'offset' => $vsel_atts['offset'],
		'paged' => $paged,
		'meta_query' => $vsel_meta_query
	);
// query args for current events list
} elseif ( $vsel_atts['list'] == 'current' ) {
	if ( $vsel_atts['order'] == 'DESC' ) {
		$order = 'DESC';
	} else {
		$order = 'ASC';
	}
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
		'order' => $order,
		'posts_per_page' => $vsel_atts['posts_per_page'],
		'offset' => $vsel_atts['offset'],
		'paged' => $paged,
		'meta_query' => $vsel_meta_query
	);
// query args for past events list
} elseif ( $vsel_atts['list'] == 'past' ) {
	if ( $vsel_atts['order'] == 'ASC' ) {
		$order = 'ASC';
	} else {
		$order = 'DESC';
	}
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
		'order' => $order,
		'posts_per_page' => $vsel_atts['posts_per_page'],
		'offset' => $vsel_atts['offset'],
		'paged' => $paged,
		'meta_query' => $vsel_meta_query
	);
// query args for all events list
} elseif ( $vsel_atts['list'] == 'all' ) {
	if ( $vsel_atts['order'] == 'ASC' ) {
		$order = 'ASC';
	} else {
		$order = 'DESC';
	}
	$vsel_query_args = array(
		'post_type' => 'event',
		'event_cat' => $vsel_atts['event_cat'],
		'post_status' => 'publish',
		'ignore_sticky_posts' => true,
		'meta_key' => 'event-start-date',
		'orderby' => 'meta_value_num menu_order',
		'order' => $order,
		'posts_per_page' => $vsel_atts['posts_per_page'],
		'offset' => $vsel_atts['offset'],
		'paged' => $paged
	);
// query args for upcoming events list
} else {
	if ( $vsel_atts['order'] == 'DESC' ) {
		$order = 'DESC';
	} else {
		$order = 'ASC';
	}
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
		'order' => $order,
		'posts_per_page' => $vsel_atts['posts_per_page'],
		'offset' => $vsel_atts['offset'],
		'paged' => $paged,
		'meta_query' => $vsel_meta_query
	);
}
