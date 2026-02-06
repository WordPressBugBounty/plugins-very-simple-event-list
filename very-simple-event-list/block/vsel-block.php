<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// registers the block using the metadata from the `block.json` file
function vsel_register_block() {
	register_block_type(
		__DIR__ . '/build',
		array(
			'render_callback' => 'vsel_server_side_render_block',
		)
	);
}
add_action( 'init', 'vsel_register_block' );

// enqueue styles for block editor
function vsel_enqueue_editor_styles() {
	if ( is_admin() ) {
		wp_enqueue_style( 'vsel-editor-styles', plugins_url( '/css/vsel-style.min.css', __DIR__ ) );
	}
}
add_action( 'enqueue_block_assets', 'vsel_enqueue_editor_styles' );

// renders the block on server
function vsel_server_side_render_block( $attr ) {
	$content = '';
	$list_type = 'upcoming';
	if ( isset( $attr['listType'] ) ) {
		if ( $attr['listType'] == 'upcoming' ) {
			$list_type = 'upcoming';
		} else if ( $attr['listType'] == 'future' ) {
			$list_type = 'future';
		} else if ( $attr['listType'] == 'current' ) {
			$list_type = 'current';
		} else if ( $attr['listType'] == 'past' ) {
			$list_type = 'past';
		} else if ( $attr['listType'] == 'all' ) {
			$list_type = 'all';
		}
	}
	$shortcode_settings = isset( $attr['shortcodeSettings'] ) ? $attr['shortcodeSettings'] : '';
	$shortcode_settings = str_replace( array( '[', ']' ), '', $shortcode_settings );
	$content .= do_shortcode( '[vsel' . ' ' . wp_strip_all_tags( $shortcode_settings, true ) . ' ' . 'list="' . esc_attr( $list_type ) . '"' . ']' );
	return $content;
}
