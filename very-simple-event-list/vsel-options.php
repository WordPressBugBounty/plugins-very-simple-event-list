<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// add admin options page
function vsel_menu_page() {
	add_options_page( esc_html__( 'VS Event List', 'very-simple-event-list' ), esc_html__( 'VS Event List', 'very-simple-event-list' ), 'manage_options', 'vsel', 'vsel_options_page' );
}
add_action( 'admin_menu', 'vsel_menu_page' );

// add admin settings and such
function vsel_admin_init() {
	// general section
	add_settings_section( 'vsel-general-section', esc_html__( 'General', 'very-simple-event-list' ), '', 'vsel-general' );

	add_settings_field( 'vsel-field-100', esc_html__( 'Uninstall', 'very-simple-event-list' ), 'vsel_field_callback_100', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-100', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-38', esc_html__( 'Date format', 'very-simple-event-list' ), 'vsel_field_callback_38', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-38', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-92', esc_html__( 'Time format', 'very-simple-event-list' ), 'vsel_field_callback_92', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-92', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-58', esc_html__( 'Date', 'very-simple-event-list' ), 'vsel_field_callback_58', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-58', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-87', esc_html__( 'Time', 'very-simple-event-list' ), 'vsel_field_callback_87', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-87', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-94', esc_html__( 'Time', 'very-simple-event-list' ), 'vsel_field_callback_94', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-94', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-69', esc_html__( 'Date separator', 'very-simple-event-list' ), 'vsel_field_callback_69', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-69', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-88', esc_html__( 'Time separator', 'very-simple-event-list' ), 'vsel_field_callback_88', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-88', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-70', esc_html__( 'Category separator', 'very-simple-event-list' ), 'vsel_field_callback_70', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-70', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-55', esc_html__( 'Event category', 'very-simple-event-list' ), 'vsel_field_callback_55', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-55', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-56', esc_html__( 'Time', 'very-simple-event-list' ), 'vsel_field_callback_56', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-56', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-57', esc_html__( 'Location', 'very-simple-event-list' ), 'vsel_field_callback_57', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-57', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-61', esc_html__( 'Order', 'very-simple-event-list' ), 'vsel_field_callback_61', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-61', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-46', esc_html__( 'Single event base', 'very-simple-event-list' ), 'vsel_field_callback_46', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-46', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-47', esc_html__( 'Event category base', 'very-simple-event-list' ), 'vsel_field_callback_47', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-47', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-50', esc_html__( 'Menu', 'very-simple-event-list' ), 'vsel_field_callback_50', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-50', array( 'sanitize_callback' => 'sanitize_key' ) );	

	add_settings_field( 'vsel-field-105', esc_html__( 'Revisions', 'very-simple-event-list' ), 'vsel_field_callback_105', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-105', array( 'sanitize_callback' => 'sanitize_key' ) );	

	// page section
	add_settings_section( 'vsel-page-section', esc_html__( 'Page', 'very-simple-event-list' ), 'vsel_page_section_callback', 'vsel-page' );

	add_settings_field( 'vsel-field-66', esc_html__( 'Event details', 'very-simple-event-list' ), 'vsel_field_callback_66', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-66', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-35', esc_html__( 'Event details', 'very-simple-event-list' ), 'vsel_field_callback_35', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-35', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-95', esc_html__( 'Title', 'very-simple-event-list' ), 'vsel_field_callback_95', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-95', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-59', esc_html__( 'Title', 'very-simple-event-list' ), 'vsel_field_callback_59', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-59', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-9', esc_html__( 'Title', 'very-simple-event-list' ), 'vsel_field_callback_9', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-9', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-62', esc_html__( 'Date', 'very-simple-event-list' ), 'vsel_field_callback_62', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-62', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-68', esc_html__( 'Date', 'very-simple-event-list' ), 'vsel_field_callback_68', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-68', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-15', esc_html__( 'Date', 'very-simple-event-list' ), 'vsel_field_callback_15', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-15', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-36', esc_html__( 'Featured image', 'very-simple-event-list' ), 'vsel_field_callback_36', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-36', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-30', esc_html__( 'Featured image', 'very-simple-event-list' ), 'vsel_field_callback_30', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-30', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-53', esc_html__( 'Featured image', 'very-simple-event-list' ), 'vsel_field_callback_53', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-53', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-29', esc_html__( 'Featured image', 'very-simple-event-list' ), 'vsel_field_callback_29', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-29', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-13', esc_html__( 'Event info', 'very-simple-event-list' ), 'vsel_field_callback_13', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-13', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-101', esc_html__( 'Read more', 'very-simple-event-list' ), 'vsel_field_callback_101', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-101', array( 'sanitize_callback' => 'sanitize_key' ) );

	if ( class_exists( 'acf' ) ) {
		add_settings_field( 'vsel-field-51', esc_html__( 'Custom fields', 'very-simple-event-list' ), 'vsel_field_callback_51', 'vsel-page', 'vsel-page-section' );
		register_setting( 'vsel-page-options', 'vsel-setting-51', array( 'sanitize_callback' => 'sanitize_key' ) );
	}

	add_settings_field( 'vsel-field-44', esc_html__( 'Event category', 'very-simple-event-list' ), 'vsel_field_callback_44', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-44', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-98', esc_html__( 'Pagination', 'very-simple-event-list' ), 'vsel_field_callback_98', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-98', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-64', esc_html__( 'Title', 'very-simple-event-list' ), 'vsel_field_callback_64', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-64', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-8', esc_html__( 'Date', 'very-simple-event-list' ), 'vsel_field_callback_8', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-8', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-11', esc_html__( 'Time', 'very-simple-event-list' ), 'vsel_field_callback_11', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-11', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-12', esc_html__( 'Location', 'very-simple-event-list' ), 'vsel_field_callback_12', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-12', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-33', esc_html__( 'Event category', 'very-simple-event-list' ), 'vsel_field_callback_33', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-33', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-10', esc_html__( 'More info link', 'very-simple-event-list' ), 'vsel_field_callback_10', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-10', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-27', esc_html__( 'Featured image', 'very-simple-event-list' ), 'vsel_field_callback_27', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-27', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-28', esc_html__( 'Event info', 'very-simple-event-list' ), 'vsel_field_callback_28', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-28', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-42', esc_html__( 'Pagination', 'very-simple-event-list' ), 'vsel_field_callback_42', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-42', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-16', esc_html__( 'Date', 'very-simple-event-list' ), 'vsel_field_callback_16', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-16', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-17', esc_html__( 'Start date', 'very-simple-event-list' ), 'vsel_field_callback_17', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-17', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-18', esc_html__( 'End date', 'very-simple-event-list' ), 'vsel_field_callback_18', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-18', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-19', esc_html__( 'Time', 'very-simple-event-list' ), 'vsel_field_callback_19', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-19', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-89', esc_html__( 'All-day event', 'very-simple-event-list' ), 'vsel_field_callback_89', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-89', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-20', esc_html__( 'Location', 'very-simple-event-list' ), 'vsel_field_callback_20', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-20', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-102', esc_html__( 'Read more', 'very-simple-event-list' ), 'vsel_field_callback_102', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-102', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	// widget section
	add_settings_section( 'vsel-widget-section', esc_html__( 'Widget', 'very-simple-event-list' ), 'vsel_widget_section_callback', 'vsel-widget' );

	add_settings_field( 'vsel-field-96', esc_html__( 'Title', 'very-simple-event-list' ), 'vsel_field_callback_96', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-96', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-14', esc_html__( 'Title', 'very-simple-event-list' ), 'vsel_field_callback_14', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-14', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-63', esc_html__( 'Date', 'very-simple-event-list' ), 'vsel_field_callback_63', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-63', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-67', esc_html__( 'Date', 'very-simple-event-list' ), 'vsel_field_callback_67', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-67', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-21', esc_html__( 'Date', 'very-simple-event-list' ), 'vsel_field_callback_21', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-21', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-37', esc_html__( 'Featured image', 'very-simple-event-list' ), 'vsel_field_callback_37', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-37', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-32', esc_html__( 'Featured image', 'very-simple-event-list' ), 'vsel_field_callback_32', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-32', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-54', esc_html__( 'Featured image', 'very-simple-event-list' ), 'vsel_field_callback_54', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-54', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-31', esc_html__( 'Featured image', 'very-simple-event-list' ), 'vsel_field_callback_31', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-31', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-1', esc_html__( 'Event info', 'very-simple-event-list' ), 'vsel_field_callback_1', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-1', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-103', esc_html__( 'Read more', 'very-simple-event-list' ), 'vsel_field_callback_103', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-103', array( 'sanitize_callback' => 'sanitize_key' ) );

	if ( class_exists( 'acf' ) ) {
		add_settings_field( 'vsel-field-52', esc_html__( 'Custom fields', 'very-simple-event-list' ), 'vsel_field_callback_52', 'vsel-widget', 'vsel-widget-section' );
		register_setting( 'vsel-widget-options', 'vsel-setting-52', array( 'sanitize_callback' => 'sanitize_key' ) );
	}

	add_settings_field( 'vsel-field-45', esc_html__( 'Event category', 'very-simple-event-list' ), 'vsel_field_callback_45', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-45', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-65', esc_html__( 'Title', 'very-simple-event-list' ), 'vsel_field_callback_65', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-65', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-2', esc_html__( 'Date', 'very-simple-event-list' ), 'vsel_field_callback_2', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-2', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-3', esc_html__( 'Time', 'very-simple-event-list' ), 'vsel_field_callback_3', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-3', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-4', esc_html__( 'Location', 'very-simple-event-list' ), 'vsel_field_callback_4', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-4', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-34', esc_html__( 'Event category', 'very-simple-event-list' ), 'vsel_field_callback_34', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-34', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-6', esc_html__( 'More info link', 'very-simple-event-list' ), 'vsel_field_callback_6', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-6', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-5', esc_html__( 'Featured image', 'very-simple-event-list' ), 'vsel_field_callback_5', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-5', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-7', esc_html__( 'Event info', 'very-simple-event-list' ), 'vsel_field_callback_7', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-7', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-22', esc_html__( 'Date', 'very-simple-event-list' ), 'vsel_field_callback_22', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-22', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-23', esc_html__( 'Start date', 'very-simple-event-list' ), 'vsel_field_callback_23', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-23', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-24', esc_html__( 'End date', 'very-simple-event-list' ), 'vsel_field_callback_24', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-24', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-25', esc_html__( 'Time', 'very-simple-event-list' ), 'vsel_field_callback_25', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-25', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-90', esc_html__( 'All-day event', 'very-simple-event-list' ), 'vsel_field_callback_90', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-90', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-26', esc_html__( 'Location', 'very-simple-event-list' ), 'vsel_field_callback_26', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-26', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-104', esc_html__( 'Read more', 'very-simple-event-list' ), 'vsel_field_callback_104', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-104', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	// single event section
	add_settings_section( 'vsel-single-section', esc_html__( 'Single event', 'very-simple-event-list' ), 'vsel_single_section_callback', 'vsel-single' );

	add_settings_field( 'vsel-field-71', esc_html__( 'Event details', 'very-simple-event-list' ), 'vsel_field_callback_71', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-71', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-72', esc_html__( 'Event details', 'very-simple-event-list' ), 'vsel_field_callback_72', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-72', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-74', esc_html__( 'Date', 'very-simple-event-list' ), 'vsel_field_callback_74', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-74', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-97', esc_html__( 'Date', 'very-simple-event-list' ), 'vsel_field_callback_97', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-97', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-75', esc_html__( 'Date', 'very-simple-event-list' ), 'vsel_field_callback_75', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-75', array( 'sanitize_callback' => 'sanitize_key' ) );

	if ( class_exists( 'acf' ) ) {
		add_settings_field( 'vsel-field-80', esc_html__( 'Custom fields', 'very-simple-event-list' ), 'vsel_field_callback_80', 'vsel-single', 'vsel-single-section' );
		register_setting( 'vsel-single-options', 'vsel-setting-80', array( 'sanitize_callback' => 'sanitize_key' ) );
	}

	add_settings_field( 'vsel-field-73', esc_html__( 'Event category', 'very-simple-event-list' ), 'vsel_field_callback_73', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-73', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-86', esc_html__( 'Date', 'very-simple-event-list' ), 'vsel_field_callback_86', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-86', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-76', esc_html__( 'Time', 'very-simple-event-list' ), 'vsel_field_callback_76', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-76', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-77', esc_html__( 'Location', 'very-simple-event-list' ), 'vsel_field_callback_77', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-77', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-78', esc_html__( 'Event category', 'very-simple-event-list' ), 'vsel_field_callback_78', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-78', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-79', esc_html__( 'More info link', 'very-simple-event-list' ), 'vsel_field_callback_79', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-79', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-81', esc_html__( 'Date', 'very-simple-event-list' ), 'vsel_field_callback_81', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-81', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-82', esc_html__( 'Start date', 'very-simple-event-list' ), 'vsel_field_callback_82', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-82', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-83', esc_html__( 'End date', 'very-simple-event-list' ), 'vsel_field_callback_83', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-83', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-84', esc_html__( 'Time', 'very-simple-event-list' ), 'vsel_field_callback_84', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-84', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-91', esc_html__( 'All-day event', 'very-simple-event-list' ), 'vsel_field_callback_91', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-91', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vsel-field-85', esc_html__( 'Location', 'very-simple-event-list' ), 'vsel_field_callback_85', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-85', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	// default support section
	add_settings_section( 'vsel-support-section', esc_html__( 'Default support', 'very-simple-event-list' ), 'vsel_support_section_callback', 'vsel-support' );

	add_settings_field( 'vsel-field-60', esc_html__( 'Single event', 'very-simple-event-list' ), 'vsel_field_callback_60', 'vsel-support', 'vsel-support-section' );
	register_setting( 'vsel-support-options', 'vsel-setting-60', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-39', esc_html__( 'Single event', 'very-simple-event-list' ), 'vsel_field_callback_39', 'vsel-support', 'vsel-support-section' );
	register_setting( 'vsel-support-options', 'vsel-setting-39', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-48', esc_html__( 'Post type archive', 'very-simple-event-list' ), 'vsel_field_callback_48', 'vsel-support', 'vsel-support-section' );
	register_setting( 'vsel-support-options', 'vsel-setting-48', array( 'sanitize_callback' => 'sanitize_key' ) );	

	add_settings_field( 'vsel-field-43', esc_html__( 'Post type archive', 'very-simple-event-list' ), 'vsel_field_callback_43', 'vsel-support', 'vsel-support-section' );
	register_setting( 'vsel-support-options', 'vsel-setting-43', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-40', esc_html__( 'Event category', 'very-simple-event-list' ), 'vsel_field_callback_40', 'vsel-support', 'vsel-support-section' );
	register_setting( 'vsel-support-options', 'vsel-setting-40', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-41', esc_html__( 'Search results', 'very-simple-event-list' ), 'vsel_field_callback_41', 'vsel-support', 'vsel-support-section' );
	register_setting( 'vsel-support-options', 'vsel-setting-41', array( 'sanitize_callback' => 'sanitize_key' ) );

	// feed section
	add_settings_section( 'vsel-feed-section', esc_html__( 'Feed', 'very-simple-event-list' ), '', 'vsel-feed' );

	add_settings_field( 'vsel-field-99', esc_html__( 'RSS', 'very-simple-event-list' ), 'vsel_field_callback_99', 'vsel-feed', 'vsel-feed-section' );
	register_setting( 'vsel-feed-options', 'vsel-setting-99', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-49', esc_html__( 'iCal', 'very-simple-event-list' ), 'vsel_field_callback_49', 'vsel-feed', 'vsel-feed-section' );
	register_setting( 'vsel-feed-options', 'vsel-setting-49', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vsel-field-93', esc_html__( 'iCal', 'very-simple-event-list' ), 'vsel_field_callback_93', 'vsel-feed', 'vsel-feed-section' );
	register_setting( 'vsel-feed-options', 'vsel-setting-93', array( 'sanitize_callback' => 'sanitize_text_field' ) );
}
add_action( 'admin_init', 'vsel_admin_init' );

// section callbacks
function vsel_page_section_callback() {
	?>
	<p><?php esc_html_e( 'Settings for block, shortcode and default WP pages (except for the single event page).', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_widget_section_callback() {
	?>
	<p><?php esc_html_e( 'Event details are full width when using the widget.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_single_section_callback() {
	?>
	<p><?php esc_html_e( 'Title, event info and featured image are handled by your theme.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_support_section_callback() {
	?>
	<p><?php esc_html_e( 'The plugin hooks into the default WP pages that are listed below.', 'very-simple-event-list' ); ?></p>
	<p><?php esc_html_e( 'Support for the single event page is needed.', 'very-simple-event-list' ); ?></p>
	<p><?php esc_html_e( 'Support for the other pages is added to make the plugin compatible with page builder plugins.', 'very-simple-event-list' ); ?></p>
	<p><?php esc_html_e( 'Events on default WP pages are not ordered by event date.', 'very-simple-event-list' ); ?></p>
	<?php
}

// general section - field callbacks
function vsel_field_callback_100() {
	$value = get_option( 'vsel-setting-100' );
	?>
	<input type="hidden" name="vsel-setting-100" value="no">
	<label><input type="checkbox" name="vsel-setting-100" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Do not delete events and settings when uninstalling plugin.', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_38() {
	$placeholder = get_option( 'date_format' );
	$value = get_option( 'vsel-setting-38' );
	?>
	<input type="text" size="40" maxlength="10" name="vsel-setting-38" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php
}

function vsel_field_callback_92() {
	$placeholder = get_option( 'time_format' );
	$value = get_option( 'vsel-setting-92' );
	?>
	<input type="text" size="40" maxlength="10" name="vsel-setting-92" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php
}

function vsel_field_callback_58() {
	$value = get_option( 'vsel-setting-58' );
	?>
	<input type="hidden" name="vsel-setting-58" value="no">
	<label><input type="checkbox" name="vsel-setting-58" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'One date field instead of start date and end date.', 'very-simple-event-list' ); ?></label>
	<p><?php esc_html_e( 'Resaving an existing event will reset start date and end date.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_87() {
	$value = get_option( 'vsel-setting-87' );
	?>
	<input type="hidden" name="vsel-setting-87" value="no">
	<label><input type="checkbox" name="vsel-setting-87" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'One time field instead of start time and end time.', 'very-simple-event-list' ); ?></label>
	<p><?php esc_html_e( 'This will disable automatic ordering by time.', 'very-simple-event-list' ); ?></p>
	<p><?php esc_html_e( 'Resaving an existing event will reset start time and end time.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_94() {
	$value = get_option( 'vsel-setting-94' );
	?>
	<input type="hidden" name="vsel-setting-94" value="no">
	<label><input type="checkbox" name="vsel-setting-94" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide equal start time and end time in frontend.', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_69() {
	$placeholder = '-';
	$value = get_option( 'vsel-setting-69' );
	?>
	<input type="text" size="40" maxlength="10" name="vsel-setting-69" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php
}

function vsel_field_callback_88() {
	$placeholder = '-';
	$value = get_option( 'vsel-setting-88' );
	?>
	<input type="text" size="40" maxlength="10" name="vsel-setting-88" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php
}

function vsel_field_callback_70() {
	$placeholder = '|';
	$value = get_option( 'vsel-setting-70' );
	?>
	<input type="text" size="40" maxlength="10" name="vsel-setting-70" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php
}

function vsel_field_callback_55() {
	$value = get_option( 'vsel-setting-55' );
	?>
	<input type="hidden" name="vsel-setting-55" value="no">
	<label><input type="checkbox" name="vsel-setting-55" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Disable column in dashboard.', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_56() {
	$value = get_option( 'vsel-setting-56' );
	?>
	<input type="hidden" name="vsel-setting-56" value="no">
	<label><input type="checkbox" name="vsel-setting-56" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Disable column in dashboard.', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_57() {
	$value = get_option( 'vsel-setting-57' );
	?>
	<input type="hidden" name="vsel-setting-57" value="no">
	<label><input type="checkbox" name="vsel-setting-57" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Disable column in dashboard.', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_61() {
	$value = get_option( 'vsel-setting-61' );
	?>
	<input type="hidden" name="vsel-setting-61" value="no">
	<label><input type="checkbox" name="vsel-setting-61" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Disable column in dashboard.', 'very-simple-event-list' ); ?></label>
	<p><?php esc_html_e( 'This column displays your custom order for events that have the same date.', 'very-simple-event-list' ); ?></p>
	<p><?php esc_html_e( 'Custom order can be handy when automatic ordering by time is disabled.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_46() {
	$placeholder = 'event';
	$value = get_option( 'vsel-setting-46' );
	?>
	<input type="text" size="40" maxlength="25" name="vsel-setting-46" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<p><strong><?php printf( esc_html__( 'Resave the %s after changing this.', 'very-simple-event-list' ), '<a href="'.esc_url( admin_url( 'options-permalink.php' ) ).'">'.esc_html( __( 'Permalink', 'very-simple-event-list' ) ).'</a>' ); ?></strong></p>
	<?php
}

function vsel_field_callback_47() {
	$placeholder = 'event_cat';
	$value = get_option( 'vsel-setting-47' );
	?>
	<input type="text" size="40" maxlength="25" name="vsel-setting-47" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<p><strong><?php printf( esc_html__( 'Resave the %s after changing this.', 'very-simple-event-list' ), '<a href="'.esc_url( admin_url( 'options-permalink.php' ) ).'">'.esc_html( __( 'Permalink', 'very-simple-event-list' ) ).'</a>' ); ?></strong></p>
	<?php
}

function vsel_field_callback_50() {
	$value = get_option( 'vsel-setting-50' );
	?>
	<input type="hidden" name="vsel-setting-50" value="no">
	<label><input type="checkbox" name="vsel-setting-50" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Disable events and event categories on the menu page.', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_105() {
	$value = get_option( 'vsel-setting-105' );
	?>
	<input type="hidden" name="vsel-setting-105" value="no">
	<label><input type="checkbox" name="vsel-setting-105" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Activate revisions for events.', 'very-simple-event-list' ); ?></label>
	<?php
}

// page section - field callbacks
function vsel_field_callback_66() {
	$value = get_option( 'vsel-setting-66' );
	$placeholder = '36';
	?>
	<label><input type="number" size="10" min="20" max="60" name="vsel-setting-66" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" /> <?php printf( esc_html__( 'Default value is %s.', 'very-simple-event-list' ), '36' ); ?></label>
	<p><?php esc_html_e( 'This is the width and set as a percentage.', 'very-simple-event-list' ); ?></p>
	<p><?php esc_html_e( 'Event details are full width when event info and featured image are hidden.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_35() {
	$value = get_option( 'vsel-setting-35' );
 	?>
	<select id="vsel-setting-35" name="vsel-setting-35">
		<option value="left" <?php echo ( $value == 'left' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Align left', 'very-simple-event-list' ); ?></option>
		<option value="right" <?php echo ( $value == 'right' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Align right', 'very-simple-event-list' ); ?></option>
	</select>
	<?php
	printf( esc_html__( 'Default value is %s.', 'very-simple-event-list' ), esc_html__( 'Align left', 'very-simple-event-list' ) );
	?>
	<p><?php esc_html_e( 'Event details are full width when event info and featured image are hidden.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_95() {
	$value = get_option( 'vsel-setting-95', 'h3' );
 	?>
	<select id="vsel-setting-95" name="vsel-setting-95">
		<option value="h2" <?php echo ( $value == 'h2' ) ? 'selected' : ''; ?>><?php echo 'H2'; ?></option>
		<option value="h3" <?php echo ( $value == 'h3' ) ? 'selected' : ''; ?>><?php echo 'H3'; ?></option>
		<option value="h4" <?php echo ( $value == 'h4' ) ? 'selected' : ''; ?>><?php echo 'H4'; ?></option>
		<option value="div" <?php echo ( $value == 'div' ) ? 'selected' : ''; ?>><?php echo 'Div'; ?></option>
	</select>
	<?php
	printf( esc_html__( 'Default value is %s.', 'very-simple-event-list' ), 'H3' );
	?>
	<p><?php esc_html_e( 'This tag is being used for the title.', 'very-simple-event-list' ); ?></p>
	<p><?php esc_html_e( 'This does not affect events on default WP pages.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_59() {
	$value = get_option( 'vsel-setting-59' );
	?>
	<input type="hidden" name="vsel-setting-59" value="no">
	<label><input type="checkbox" name="vsel-setting-59" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Display on top (outside event details).', 'very-simple-event-list' ); ?></label>
	<p><?php esc_html_e( 'This does not affect events on default WP pages.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_9() {
	$value = get_option( 'vsel-setting-9' );
	?>
	<input type="hidden" name="vsel-setting-9" value="no">
	<label><input type="checkbox" name="vsel-setting-9" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Link to the event page.', 'very-simple-event-list' ); ?></label>
	<p><?php esc_html_e( 'This does not affect events on default WP pages.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_62() {
	$value = get_option( 'vsel-setting-62' );
	?>
	<select id="vsel-setting-62" name="vsel-setting-62">
		<option value="label" <?php echo ( $value == 'label' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Label', 'very-simple-event-list' ); ?></option>
		<option value="icon" <?php echo ( $value == 'icon' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Icon', 'very-simple-event-list' ); ?></option>
	</select>
	<?php
	printf( esc_html__( 'Default value is %s.', 'very-simple-event-list' ), esc_html__( 'Label', 'very-simple-event-list' ) );
	?>
	<p><?php esc_html_e( 'Display date label or icon.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_68() {
	$value = get_option( 'vsel-setting-68' );
	?>
	<input type="hidden" name="vsel-setting-68" value="no">
	<label><input type="checkbox" name="vsel-setting-68" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Display date icon next to other event details.', 'very-simple-event-list' ); ?></label>
	<p><strong><?php esc_html_e( 'Date icon must be active.', 'very-simple-event-list' ); ?></strong></p>
	<p><strong><?php esc_html_e( 'Date must not be hidden.', 'very-simple-event-list' ); ?></strong></p>
	<?php
}

function vsel_field_callback_15() {
	$value = get_option( 'vsel-setting-15' );
	?>
	<input type="hidden" name="vsel-setting-15" value="no">
	<label><input type="checkbox" name="vsel-setting-15" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Combine start date and end date in one label.', 'very-simple-event-list' ); ?></label>
	<p><?php esc_html_e( 'This does not affect the date icons.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_36() {
	$value = get_option( 'vsel-setting-36' );
 	?>
	<select id="vsel-setting-36" name="vsel-setting-36">
		<option value="right" <?php echo ( $value == 'right' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Align right', 'very-simple-event-list' ); ?></option>
		<option value="left" <?php echo ( $value == 'left' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Align left', 'very-simple-event-list' ); ?></option>
	</select>
	<?php
	printf( esc_html__( 'Default value is %s.', 'very-simple-event-list' ), esc_html__( 'Align right', 'very-simple-event-list' ) );
	?>
	<p><?php esc_html_e( 'This does not affect events on default WP pages.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_30() {
	$value = get_option( 'vsel-setting-30' );
 	?>
	<select id="vsel-setting-30" name="vsel-setting-30">
		<option value="post-thumbnail" <?php echo ( $value == 'post-thumbnail' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Post thumbnail', 'very-simple-event-list' ); ?></option>
		<option value="full" <?php echo ( $value == 'full' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Full', 'very-simple-event-list' ); ?></option>
		<option value="large" <?php echo ( $value == 'large' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Large', 'very-simple-event-list' ); ?></option>
		<option value="medium" <?php echo ( $value == 'medium' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Medium', 'very-simple-event-list' ); ?></option>
		<option value="small" <?php echo ( $value == 'small' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Small', 'very-simple-event-list' ); ?></option>
	</select>
	<?php
	printf( esc_html__( 'Default value is %s.', 'very-simple-event-list' ), esc_html__( 'Post thumbnail', 'very-simple-event-list' ) );
	?>
	<p><?php esc_html_e( 'This size is being used as source for the featured image.', 'very-simple-event-list' ); ?></p>
	<p><?php esc_html_e( 'The size of the post thumbnail may vary by theme.', 'very-simple-event-list' ); ?></p>
	<p><?php esc_html_e( 'This does not affect events on default WP pages.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_53() {
	$value = get_option( 'vsel-setting-53' );
	$placeholder = '40';
	?>
	<label><input type="number" size="10" min="20" max="100" name="vsel-setting-53" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" /> <?php printf( esc_html__( 'Default value is %s.', 'very-simple-event-list' ), '40' ); ?></label>
	<p><?php esc_html_e( 'This is the width and set as a percentage.', 'very-simple-event-list' ); ?></p>
	<p><?php esc_html_e( 'This does not affect events on default WP pages.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_29() {
	$value = get_option( 'vsel-setting-29' );
	?>
	<input type="hidden" name="vsel-setting-29" value="no">
	<label><input type="checkbox" name="vsel-setting-29" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Link to the event page.', 'very-simple-event-list' ); ?></label>
	<p><?php esc_html_e( 'This does not affect events on default WP pages.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_13() {
	$value = get_option( 'vsel-setting-13' );
	?>
	<select id="vsel-setting-13" name="vsel-setting-13">
		<option value="all" <?php echo ( $value == 'all' ) ? 'selected' : ''; ?>><?php esc_html_e( 'All', 'very-simple-event-list' ); ?></option>
		<option value="summary" <?php echo ( $value == 'summary' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Summary', 'very-simple-event-list' ); ?></option>
	</select>
	<?php
	printf( esc_html__( 'Default value is %s.', 'very-simple-event-list' ), esc_html__( 'All', 'very-simple-event-list' ) );
	?>
	<p><?php esc_html_e( 'This does not affect events on default WP pages.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_101() {
	$value = get_option( 'vsel-setting-101' );
	?>
	<input type="hidden" name="vsel-setting-101" value="no">
	<label><input type="checkbox" name="vsel-setting-101" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Display read more link after event info.', 'very-simple-event-list' ); ?></label>
	<p><?php esc_html_e( 'This does not affect events on default WP pages.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_51() {
	$value = get_option( 'vsel-setting-51' );
	?>
	<select id="vsel-setting-51" name="vsel-setting-51">
		<option value="details" <?php echo ( $value == 'details' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Event details', 'very-simple-event-list' ); ?></option>
		<option value="info" <?php echo ( $value == 'info' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Event info', 'very-simple-event-list' ); ?></option>
		<option value="hide" <?php echo ( $value == 'hide' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></option>
	</select>
	<?php
	printf( esc_html__( 'Default value is %s.', 'very-simple-event-list' ), esc_html__( 'Event details', 'very-simple-event-list' ) );
	?>
	<p><?php esc_html_e( 'Where to display the custom fields.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_44() {
	$value = get_option( 'vsel-setting-44' );
	?>
	<input type="hidden" name="vsel-setting-44" value="no">
	<label><input type="checkbox" name="vsel-setting-44" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Link to the category page.', 'very-simple-event-list' ); ?></label>
	<p><?php esc_html_e( 'Events on default WP pages are not ordered by event date.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_98() {
	$value = get_option( 'vsel-setting-98' );
	?>
	<select id="vsel-setting-98" name="vsel-setting-98">
		<option value="simple" <?php echo ( $value == 'simple' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Simple', 'very-simple-event-list' ); ?></option>
		<option value="numeric" <?php echo ( $value == 'numeric' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Numeric', 'very-simple-event-list' ); ?></option>
	</select>
	<?php
	printf( esc_html__( 'Default value is %s.', 'very-simple-event-list' ), esc_html__( 'Simple', 'very-simple-event-list' ) );
	?>
	<p><?php esc_html_e( 'This does not affect events on default WP pages.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_64() {
	$value = get_option( 'vsel-setting-64' );
	?>
	<input type="hidden" name="vsel-setting-64" value="no">
	<label><input type="checkbox" name="vsel-setting-64" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></label>
	<p><?php esc_html_e( 'This does not affect events on default WP pages.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_8() {
	$value = get_option( 'vsel-setting-8' );
	?>
	<input type="hidden" name="vsel-setting-8" value="no">
	<label><input type="checkbox" name="vsel-setting-8" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_11() {
	$value = get_option( 'vsel-setting-11' );
	?>
	<input type="hidden" name="vsel-setting-11" value="no">
	<label><input type="checkbox" name="vsel-setting-11" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_12() {
	$value = get_option( 'vsel-setting-12' );
	?>
	<input type="hidden" name="vsel-setting-12" value="no">
	<label><input type="checkbox" name="vsel-setting-12" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_33() {
	$value = get_option( 'vsel-setting-33' );
	?>
	<input type="hidden" name="vsel-setting-33" value="no">
	<label><input type="checkbox" name="vsel-setting-33" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_10() {
	$value = get_option( 'vsel-setting-10' );
	?>
	<input type="hidden" name="vsel-setting-10" value="no">
	<label><input type="checkbox" name="vsel-setting-10" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_27() {
	$value = get_option( 'vsel-setting-27' );
	?>
	<input type="hidden" name="vsel-setting-27" value="no">
	<label><input type="checkbox" name="vsel-setting-27" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></label>
	<p><?php esc_html_e( 'This does not affect events on default WP pages.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_28() {
	$value = get_option( 'vsel-setting-28' );
	?>
	<input type="hidden" name="vsel-setting-28" value="no">
	<label><input type="checkbox" name="vsel-setting-28" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_42() {
	$value = get_option( 'vsel-setting-42' );
	?>
	<input type="hidden" name="vsel-setting-42" value="no">
	<label><input type="checkbox" name="vsel-setting-42" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></label>
	<p><?php esc_html_e( 'This does not affect events on default WP pages.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_16() {
	$placeholder = __( 'Date: %s', 'very-simple-event-list' );
	$value = get_option( 'vsel-setting-16' );
	?>
	<input type="text" size="40" name="vsel-setting-16" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<p><?php printf( esc_html__( 'Use %1$s to display the %2$s variable.', 'very-simple-event-list' ), '%s', esc_html__( 'Date', 'very-simple-event-list' ) ); ?></p>
	<?php
}

function vsel_field_callback_17() {
	$placeholder = __( 'Start date: %s', 'very-simple-event-list' );
	$value = get_option( 'vsel-setting-17' );
	?>
	<input type="text" size="40" name="vsel-setting-17" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<p><?php printf( esc_html__( 'Use %1$s to display the %2$s variable.', 'very-simple-event-list' ), '%s', esc_html__( 'Start date', 'very-simple-event-list' ) ); ?></p>
	<?php
}

function vsel_field_callback_18() {
	$placeholder = __( 'End date: %s', 'very-simple-event-list' );
	$value = get_option( 'vsel-setting-18' );
	?>
	<input type="text" size="40" name="vsel-setting-18" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<p><?php printf( esc_html__( 'Use %1$s to display the %2$s variable.', 'very-simple-event-list' ), '%s', esc_html__( 'End date', 'very-simple-event-list' ) ); ?></p>
	<?php
}

function vsel_field_callback_19() {
	$placeholder = __( 'Time: %s', 'very-simple-event-list' );
	$value = get_option( 'vsel-setting-19' );
	?>
	<input type="text" size="40" name="vsel-setting-19" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<p><?php printf( esc_html__( 'Use %1$s to display the %2$s variable.', 'very-simple-event-list' ), '%s', esc_html__( 'Time', 'very-simple-event-list' ) ); ?></p>
	<?php
}

function vsel_field_callback_89() {
	$placeholder = __( 'All-day event', 'very-simple-event-list' );
	$value = get_option( 'vsel-setting-89' );
	?>
	<input type="text" size="40" name="vsel-setting-89" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php
}

function vsel_field_callback_20() {
	$placeholder = __( 'Location: %s', 'very-simple-event-list' );
	$value = get_option( 'vsel-setting-20' );
	?>
	<input type="text" size="40" name="vsel-setting-20" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<p><?php printf( esc_html__( 'Use %1$s to display the %2$s variable.', 'very-simple-event-list' ), '%s', esc_html__( 'Location', 'very-simple-event-list' ) ); ?></p>
	<?php
}

function vsel_field_callback_102() {
	$placeholder = __( 'Read more', 'very-simple-event-list' );
	$value = get_option( 'vsel-setting-102' );
	?>
	<input type="text" size="40" name="vsel-setting-102" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php
}

// widget section - field callbacks
function vsel_field_callback_96() {
	$value = get_option( 'vsel-setting-96', 'h3' );
 	?>
	<select id="vsel-setting-95" name="vsel-setting-96">
		<option value="h2" <?php echo ( $value == 'h2' ) ? 'selected' : ''; ?>><?php echo 'H2'; ?></option>
		<option value="h3" <?php echo ( $value == 'h3' ) ? 'selected' : ''; ?>><?php echo 'H3'; ?></option>
		<option value="h4" <?php echo ( $value == 'h4' ) ? 'selected' : ''; ?>><?php echo 'H4'; ?></option>
		<option value="div" <?php echo ( $value == 'div' ) ? 'selected' : ''; ?>><?php echo 'Div'; ?></option>
	</select>
	<?php
	printf( esc_html__( 'Default value is %s.', 'very-simple-event-list' ), 'H3' );
	?>
	<p><?php esc_html_e( 'This tag is being used for the title.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_14() {
	$value = get_option( 'vsel-setting-14' );
	?>
	<input type="hidden" name="vsel-setting-14" value="no">
	<label><input type="checkbox" name="vsel-setting-14" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Link to the event page.', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_63() {
	$value = get_option( 'vsel-setting-63' );
	?>
	<select id="vsel-setting-63" name="vsel-setting-63">
		<option value="label" <?php echo ( $value == 'label' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Label', 'very-simple-event-list' ); ?></option>
		<option value="icon" <?php echo ( $value == 'icon' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Icon', 'very-simple-event-list' ); ?></option>
	</select>
	<?php
	printf( esc_html__( 'Default value is %s.', 'very-simple-event-list' ), esc_html__( 'Label', 'very-simple-event-list' ) );
	?>
	<p><?php esc_html_e( 'Display date label or icon.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_67() {
	$value = get_option( 'vsel-setting-67' );
	?>
	<input type="hidden" name="vsel-setting-67" value="no">
	<label><input type="checkbox" name="vsel-setting-67" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Display date icon next to other event details.', 'very-simple-event-list' ); ?></label>
	<p><strong><?php esc_html_e( 'Date icon must be active.', 'very-simple-event-list' ); ?></strong></p>
	<p><strong><?php esc_html_e( 'Date must not be hidden.', 'very-simple-event-list' ); ?></strong></p>
	<?php
}

function vsel_field_callback_21() {
	$value = get_option( 'vsel-setting-21' );
	?>
	<input type="hidden" name="vsel-setting-21" value="no">
	<label><input type="checkbox" name="vsel-setting-21" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Combine start date and end date in one label.', 'very-simple-event-list' ); ?></label>
	<p><?php esc_html_e( 'This does not affect the date icons.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_37() {
	$value = get_option( 'vsel-setting-37' );
 	?>
	<select id="vsel-setting-37" name="vsel-setting-37">
		<option value="right" <?php echo ( $value == 'right' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Align right', 'very-simple-event-list' ); ?></option>
		<option value="left" <?php echo ( $value == 'left' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Align left', 'very-simple-event-list' ); ?></option>
	</select>
	<?php
	printf( esc_html__( 'Default value is %s.', 'very-simple-event-list' ), esc_html__( 'Align right', 'very-simple-event-list' ) );
}

function vsel_field_callback_32() {
	$value = get_option( 'vsel-setting-32' );
 	?>
	<select id="vsel-setting-32" name="vsel-setting-32">
		<option value="post-thumbnail" <?php echo ( $value == 'post-thumbnail' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Post thumbnail', 'very-simple-event-list' ); ?></option>
		<option value="full" <?php echo ( $value == 'full' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Full', 'very-simple-event-list' ); ?></option>
		<option value="large" <?php echo ( $value == 'large' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Large', 'very-simple-event-list' ); ?></option>
		<option value="medium" <?php echo ( $value == 'medium' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Medium', 'very-simple-event-list' ); ?></option>
		<option value="small" <?php echo ( $value == 'small' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Small', 'very-simple-event-list' ); ?></option>
	</select>
	<?php
	printf( esc_html__( 'Default value is %s.', 'very-simple-event-list' ), esc_html__( 'Post thumbnail', 'very-simple-event-list' ) );
	?>
	<p><?php esc_html_e( 'This size is being used as source for the featured image.', 'very-simple-event-list' ); ?></p>
	<p><?php esc_html_e( 'The size of the post thumbnail may vary by theme.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_54() {
	$value = get_option( 'vsel-setting-54' );
	$placeholder = '40';
	?>
	<label><input type="number" size="10" min="20" max="100" name="vsel-setting-54" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" /> <?php printf( esc_html__( 'Default value is %s.', 'very-simple-event-list' ), '40' ); ?></label>
	<p><?php esc_html_e( 'This is the width and set as a percentage.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_31() {
	$value = get_option( 'vsel-setting-31' );
	?>
	<input type="hidden" name="vsel-setting-31" value="no">
	<label><input type="checkbox" name="vsel-setting-31" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Link to the event page.', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_1() {
	$value = get_option( 'vsel-setting-1' );
	?>
	<select id="vsel-setting-1" name="vsel-setting-1">
		<option value="all" <?php echo ( $value == 'all' ) ? 'selected' : ''; ?>><?php esc_html_e( 'All', 'very-simple-event-list' ); ?></option>
		<option value="summary" <?php echo ( $value == 'summary' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Summary', 'very-simple-event-list' ); ?></option>
	</select>
	<?php
	printf( esc_html__( 'Default value is %s.', 'very-simple-event-list' ), esc_html__( 'All', 'very-simple-event-list' ) );
}

function vsel_field_callback_103() {
	$value = get_option( 'vsel-setting-103' );
	?>
	<input type="hidden" name="vsel-setting-103" value="no">
	<label><input type="checkbox" name="vsel-setting-103" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Display read more link after event info.', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_52() {
	$value = get_option( 'vsel-setting-52' );
	?>
	<select id="vsel-setting-52" name="vsel-setting-52">
		<option value="details" <?php echo ( $value == 'details' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Event details', 'very-simple-event-list' ); ?></option>
		<option value="info" <?php echo ( $value == 'info' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Event info', 'very-simple-event-list' ); ?></option>
		<option value="hide" <?php echo ( $value == 'hide' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></option>
	</select>
	<?php
	printf( esc_html__( 'Default value is %s.', 'very-simple-event-list' ), esc_html__( 'Event details', 'very-simple-event-list' ) );
	?>
	<p><?php esc_html_e( 'Where to display the custom fields.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_45() {
	$value = get_option( 'vsel-setting-45' );
	?>
	<input type="hidden" name="vsel-setting-45" value="no">
	<label><input type="checkbox" name="vsel-setting-45" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Link to the category page.', 'very-simple-event-list' ); ?></label>
	<p><?php esc_html_e( 'Events on default WP pages are not ordered by event date.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_65() {
	$value = get_option( 'vsel-setting-65' );
	?>
	<input type="hidden" name="vsel-setting-2" value="no">
	<label><input type="checkbox" name="vsel-setting-65" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_2() {
	$value = get_option( 'vsel-setting-2' );
	?>
	<input type="hidden" name="vsel-setting-2" value="no">
	<label><input type="checkbox" name="vsel-setting-2" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_3() {
	$value = get_option( 'vsel-setting-3' );
	?>
	<input type="hidden" name="vsel-setting-3" value="no">
	<label><input type="checkbox" name="vsel-setting-3" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_4() {
	$value = get_option( 'vsel-setting-4' );
	?>
	<input type="hidden" name="vsel-setting-4" value="no">
	<label><input type="checkbox" name="vsel-setting-4" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_34() {
	$value = get_option( 'vsel-setting-34' );
	?>
	<input type="hidden" name="vsel-setting-34" value="no">
	<label><input type="checkbox" name="vsel-setting-34" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_6() {
	$value = get_option( 'vsel-setting-6' );
	?>
	<input type="hidden" name="vsel-setting-6" value="no">
	<label><input type="checkbox" name="vsel-setting-6" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_5() {
	$value = get_option( 'vsel-setting-5' );
	?>
	<input type="hidden" name="vsel-setting-5" value="no">
	<label><input type="checkbox" name="vsel-setting-5" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_7() {
	$value = get_option( 'vsel-setting-7' );
	?>
	<input type="hidden" name="vsel-setting-7" value="no">
	<label><input type="checkbox" name="vsel-setting-7" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_22() {
	$placeholder = __( 'Date: %s', 'very-simple-event-list' );
	$value = get_option( 'vsel-setting-22' );
	?>
	<input type="text" size="40" name="vsel-setting-22" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<p><?php printf( esc_html__( 'Use %1$s to display the %2$s variable.', 'very-simple-event-list' ), '%s', esc_html__( 'Date', 'very-simple-event-list' ) ); ?></p>
	<?php
}

function vsel_field_callback_23() {
	$placeholder = __( 'Start date: %s', 'very-simple-event-list' );
	$value = get_option( 'vsel-setting-23' );
	?>
	<input type="text" size="40" name="vsel-setting-23" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<p><?php printf( esc_html__( 'Use %1$s to display the %2$s variable.', 'very-simple-event-list' ), '%s', esc_html__( 'Start date', 'very-simple-event-list' ) ); ?></p>
	<?php
}

function vsel_field_callback_24() {
	$placeholder = __( 'End date: %s', 'very-simple-event-list' );
	$value = get_option( 'vsel-setting-24' );
	?>
	<input type="text" size="40" name="vsel-setting-24" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<p><?php printf( esc_html__( 'Use %1$s to display the %2$s variable.', 'very-simple-event-list' ), '%s', esc_html__( 'End date', 'very-simple-event-list' ) ); ?></p>
	<?php
}

function vsel_field_callback_25() {
	$placeholder = __( 'Time: %s', 'very-simple-event-list' );
	$value = get_option( 'vsel-setting-25' );
	?>
	<input type="text" size="40" name="vsel-setting-25" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<p><?php printf( esc_html__( 'Use %1$s to display the %2$s variable.', 'very-simple-event-list' ), '%s', esc_html__( 'Time', 'very-simple-event-list' ) ); ?></p>
	<?php
}

function vsel_field_callback_90() {
	$placeholder = __( 'All-day event', 'very-simple-event-list' );
	$value = get_option( 'vsel-setting-90' );
	?>
	<input type="text" size="40" name="vsel-setting-90" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php
}

function vsel_field_callback_26() {
	$placeholder = __( 'Location: %s', 'very-simple-event-list' );
	$value = get_option( 'vsel-setting-26' );
	?>
	<input type="text" size="40" name="vsel-setting-26" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<p><?php printf( esc_html__( 'Use %1$s to display the %2$s variable.', 'very-simple-event-list' ), '%s', esc_html__( 'Location', 'very-simple-event-list' ) ); ?></p>
	<?php
}

function vsel_field_callback_104() {
	$placeholder = __( 'Read more', 'very-simple-event-list' );
	$value = get_option( 'vsel-setting-104' );
	?>
	<input type="text" size="40" name="vsel-setting-104" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php
}

// single event section - field callbacks
function vsel_field_callback_71() {
	$value = get_option( 'vsel-setting-71' );
	$placeholder = '36';
	?>
	<label><input type="number" size="10" min="20" max="60" name="vsel-setting-71" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" /> <?php printf( esc_html__( 'Default value is %s.', 'very-simple-event-list' ), '36' ); ?></label>
	<p><?php esc_html_e( 'This is the width and set as a percentage.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_72() {
	$value = get_option( 'vsel-setting-72' );
 	?>
	<select id="vsel-setting-72" name="vsel-setting-72">
		<option value="left" <?php echo ( $value == 'left' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Align left', 'very-simple-event-list' ); ?></option>
		<option value="right" <?php echo ( $value == 'right' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Align right', 'very-simple-event-list' ); ?></option>
	</select>
	<?php
	printf( esc_html__( 'Default value is %s.', 'very-simple-event-list' ), esc_html__( 'Align left', 'very-simple-event-list' ) );
}

function vsel_field_callback_74() {
	$value = get_option( 'vsel-setting-74' );
	?>
	<select id="vsel-setting-74" name="vsel-setting-74">
		<option value="label" <?php echo ( $value == 'label' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Label', 'very-simple-event-list' ); ?></option>
		<option value="icon" <?php echo ( $value == 'icon' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Icon', 'very-simple-event-list' ); ?></option>
	</select>
	<?php
	printf( esc_html__( 'Default value is %s.', 'very-simple-event-list' ), esc_html__( 'Label', 'very-simple-event-list' ) );
	?>
	<p><?php esc_html_e( 'Display date label or icon.', 'very-simple-event-list' ); ?></p>
	<?php
}	

function vsel_field_callback_97() {
	$value = get_option( 'vsel-setting-97' );
	?>
	<input type="hidden" name="vsel-setting-97" value="no">
	<label><input type="checkbox" name="vsel-setting-97" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Display date icon next to other event details.', 'very-simple-event-list' ); ?></label>
	<p><strong><?php esc_html_e( 'Date icon must be active.', 'very-simple-event-list' ); ?></strong></p>
	<p><strong><?php esc_html_e( 'Date must not be hidden.', 'very-simple-event-list' ); ?></strong></p>	
	<?php
}

function vsel_field_callback_75() {
	$value = get_option( 'vsel-setting-75' );
	?>
	<input type="hidden" name="vsel-setting-75" value="no">
	<label><input type="checkbox" name="vsel-setting-75" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Combine start date and end date in one label.', 'very-simple-event-list' ); ?></label>
	<p><?php esc_html_e( 'This does not affect the date icons.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_80() {
	$value = get_option( 'vsel-setting-80' );
	?>
	<select id="vsel-setting-80" name="vsel-setting-80">
		<option value="details" <?php echo ( $value == 'details' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Event details', 'very-simple-event-list' ); ?></option>
		<option value="info" <?php echo ( $value == 'info' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Event info', 'very-simple-event-list' ); ?></option>
		<option value="hide" <?php echo ( $value == 'hide' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></option>
	</select>
	<?php
	printf( esc_html__( 'Default value is %s.', 'very-simple-event-list' ), esc_html__( 'Event details', 'very-simple-event-list' ) );
	?>
	<p><?php esc_html_e( 'Where to display the custom fields.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_73() {
	$value = get_option( 'vsel-setting-73' );
	?>
	<input type="hidden" name="vsel-setting-73" value="no">
	<label><input type="checkbox" name="vsel-setting-73" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Link to the category page.', 'very-simple-event-list' ); ?></label>
	<p><?php esc_html_e( 'Events on default WP pages are not ordered by event date.', 'very-simple-event-list' ); ?></p>
	<?php
}

function vsel_field_callback_86() {
	$value = get_option( 'vsel-setting-86' );
	?>
	<input type="hidden" name="vsel-setting-86" value="no">
	<label><input type="checkbox" name="vsel-setting-86" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_76() {
	$value = get_option( 'vsel-setting-76' );
	?>
	<input type="hidden" name="vsel-setting-76" value="no">
	<label><input type="checkbox" name="vsel-setting-76" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_77() {
	$value = get_option( 'vsel-setting-77' );
	?>
	<input type="hidden" name="vsel-setting-77" value="no">
	<label><input type="checkbox" name="vsel-setting-77" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_78() {
	$value = get_option( 'vsel-setting-78' );
	?>
	<input type="hidden" name="vsel-setting-78" value="no">
	<label><input type="checkbox" name="vsel-setting-78" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_79() {
	$value = get_option( 'vsel-setting-79' );
	?>
	<input type="hidden" name="vsel-setting-79" value="no">
	<label><input type="checkbox" name="vsel-setting-79" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide', 'very-simple-event-list' ); ?></label>
	<?php
}

function vsel_field_callback_81() {
	$placeholder = __( 'Date: %s', 'very-simple-event-list' );
	$value = get_option( 'vsel-setting-81' );
	?>
	<input type="text" size="40" name="vsel-setting-81" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<p><?php printf( esc_html__( 'Use %1$s to display the %2$s variable.', 'very-simple-event-list' ), '%s', esc_html__( 'Date', 'very-simple-event-list' ) ); ?></p>
	<?php
}

function vsel_field_callback_82() {
	$placeholder = __( 'Start date: %s', 'very-simple-event-list' );
	$value = get_option( 'vsel-setting-82' );
	?>
	<input type="text" size="40" name="vsel-setting-82" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<p><?php printf( esc_html__( 'Use %1$s to display the %2$s variable.', 'very-simple-event-list' ), '%s', esc_html__( 'Start date', 'very-simple-event-list' ) ); ?></p>
	<?php
}

function vsel_field_callback_83() {
	$placeholder = __( 'End date: %s', 'very-simple-event-list' );
	$value = get_option( 'vsel-setting-83' );
	?>
	<input type="text" size="40" name="vsel-setting-83" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<p><?php printf( esc_html__( 'Use %1$s to display the %2$s variable.', 'very-simple-event-list' ), '%s', esc_html__( 'End date', 'very-simple-event-list' ) ); ?></p>
	<?php
}

function vsel_field_callback_84() {
	$placeholder = __( 'Time: %s', 'very-simple-event-list' );
	$value = get_option( 'vsel-setting-84' );
	?>
	<input type="text" size="40" name="vsel-setting-84" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<p><?php printf( esc_html__( 'Use %1$s to display the %2$s variable.', 'very-simple-event-list' ), '%s', esc_html__( 'Time', 'very-simple-event-list' ) ); ?></p>
	<?php
}

function vsel_field_callback_91() {
	$placeholder = __( 'All-day event', 'very-simple-event-list' );
	$value = get_option( 'vsel-setting-91' );
	?>
	<input type="text" size="40" name="vsel-setting-91" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php
}

function vsel_field_callback_85() {
	$placeholder = __( 'Location: %s', 'very-simple-event-list' );
	$value = get_option( 'vsel-setting-85' );
	?>
	<input type="text" size="40" name="vsel-setting-85" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<p><?php printf( esc_html__( 'Use %1$s to display the %2$s variable.', 'very-simple-event-list' ), '%s', esc_html__( 'Location', 'very-simple-event-list' ) ); ?></p>
	<?php
}

// default support section - field callbacks
function vsel_field_callback_60() {
	$value = get_option( 'vsel-setting-60' );
	?>
	<input type="hidden" name="vsel-setting-60" value="no">
	<label><input type="checkbox" name="vsel-setting-60" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php printf( esc_html__( 'Disable support for the %s page.', 'very-simple-event-list' ), esc_html__( 'Single event', 'very-simple-event-list' ) ); ?></label>
	<?php
}

function vsel_field_callback_39() {
	$value = get_option( 'vsel-setting-39' );
	?>
	<input type="hidden" name="vsel-setting-39" value="no">
	<label><input type="checkbox" name="vsel-setting-39" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php printf( esc_html__( 'Disable support for the %s template.', 'very-simple-event-list' ), esc_html__( 'Single event', 'very-simple-event-list' ) ); ?></label>
	<?php
}

function vsel_field_callback_48() {
	$value = get_option( 'vsel-setting-48' );
	?>
	<input type="hidden" name="vsel-setting-48" value="no">
	<label><input type="checkbox" name="vsel-setting-48" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php printf( esc_html__( 'Disable support for the %s page.', 'very-simple-event-list' ), esc_html__( 'Post type archive', 'very-simple-event-list' ) ); ?></label>
	<p><strong><?php printf( esc_html__( 'Resave the %s after changing this.', 'very-simple-event-list' ), '<a href="'.esc_url( admin_url( 'options-permalink.php' ) ).'">'.esc_html( __( 'Permalink', 'very-simple-event-list' ) ).'</a>' ); ?></strong></p>
	<?php
}

function vsel_field_callback_43() {
	$value = get_option( 'vsel-setting-43' );
	?>
	<input type="hidden" name="vsel-setting-43" value="no">
	<label><input type="checkbox" name="vsel-setting-43" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php printf( esc_html__( 'Disable support for the %s template.', 'very-simple-event-list' ), esc_html__( 'Post type archive', 'very-simple-event-list' ) ); ?></label>
	<?php
}

function vsel_field_callback_40() {
	$value = get_option( 'vsel-setting-40' );
	?>
	<input type="hidden" name="vsel-setting-40" value="no">
	<label><input type="checkbox" name="vsel-setting-40" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php printf( esc_html__( 'Disable support for the %s template.', 'very-simple-event-list' ), esc_html__( 'Event category', 'very-simple-event-list' ) ); ?></label>
	<?php
}

function vsel_field_callback_41() {
	$value = get_option( 'vsel-setting-41' );
	?>
	<input type="hidden" name="vsel-setting-41" value="no">
	<label><input type="checkbox" name="vsel-setting-41" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php printf( esc_html__( 'Disable support for the %s template.', 'very-simple-event-list' ), esc_html__( 'Search results', 'very-simple-event-list' ) ); ?></label>
	<?php
}

// feed section - field callbacks
function vsel_field_callback_99() {
	$value = get_option( 'vsel-setting-99' );
	?>
	<input type="hidden" name="vsel-setting-99" value="no">
	<label><input type="checkbox" name="vsel-setting-99" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Activate feed.', 'very-simple-event-list' ); ?></label>
	<p><?php esc_html_e( 'This feed contains upcoming events.', 'very-simple-event-list' ); ?> <?php esc_html_e( 'For settings', 'very-simple-event-list' ); ?> <?php echo '<a href="'.esc_url( admin_url( 'options-reading.php' ) ).'">'.esc_html__( 'click here', 'very-simple-event-list' ).'</a>'; ?>.</p>
	<p><strong><?php printf( esc_html__( 'Resave the %s after changing this.', 'very-simple-event-list' ), '<a href="'.esc_url( admin_url( 'options-permalink.php' ) ).'">'.esc_html( __( 'Permalink', 'very-simple-event-list' ) ).'</a>' ); ?></strong></p>
	<?php
	$rss_feed_setting = get_option( 'vsel-setting-99' );
	if ( $rss_feed_setting == 'yes' ) {
	?>
	<p><?php printf( esc_html__( 'Subscribe with URL %s.', 'very-simple-event-list' ), '<code>'.esc_url( get_bloginfo( 'url' ).'/?feed=vsel-rss-feed' ).'</code>' ); ?></p>
	<?php
	}
}

function vsel_field_callback_49() {
	$value = get_option( 'vsel-setting-49' );
	?>
	<input type="hidden" name="vsel-setting-49" value="no">
	<label><input type="checkbox" name="vsel-setting-49" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Activate feed.', 'very-simple-event-list' ); ?></label>
	<p><?php esc_html_e( 'This feed contains upcoming and past events.', 'very-simple-event-list' ); ?></p>
	<p><strong><?php printf( esc_html__( 'Resave the %s after changing this.', 'very-simple-event-list' ), '<a href="'.esc_url( admin_url( 'options-permalink.php' ) ).'">'.esc_html( __( 'Permalink', 'very-simple-event-list' ) ).'</a>' ); ?></strong></p>
	<?php
	$ical_feed_setting = get_option( 'vsel-setting-49' );
	if ( $ical_feed_setting == 'yes' ) {
	?>
	<p><?php printf( esc_html__( 'Subscribe with URL %s.', 'very-simple-event-list' ), '<code>'.esc_url( get_bloginfo( 'url' ).'/?feed=vsel-ical-feed' ).'</code>' ); ?></p>
	<?php
	}
}

function vsel_field_callback_93() {
	$value = get_option( 'vsel-setting-93' );
	$placeholder = '10';
	?>
	<label><input type="number" size="10" min="1" max="100" name="vsel-setting-93" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" /> <?php printf( esc_html__( 'Default value is %s.', 'very-simple-event-list' ), '10' ); ?></label>
	<p><?php esc_html_e( 'Number of events in iCal feed (from future to past).', 'very-simple-event-list' ); ?></p>
	<?php
}

// display admin options page
function vsel_options_page() {
?>
<div class="wrap">
	<h1><?php esc_html_e( 'VS Event List', 'very-simple-event-list' ); ?></h1>
	<?php $active_tab = isset( $_GET['tab'] ) ? sanitize_key( $_GET['tab'] ) : 'general_options'; ?>
	<h2 class="nav-tab-wrapper">
		<a href="?page=vsel&tab=general_options" class="nav-tab <?php echo $active_tab == 'general_options' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'General', 'very-simple-event-list' ); ?></a>
		<a href="?page=vsel&tab=page_options" class="nav-tab <?php echo $active_tab == 'page_options' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Page', 'very-simple-event-list' ); ?></a>
		<a href="?page=vsel&tab=widget_options" class="nav-tab <?php echo $active_tab == 'widget_options' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Widget', 'very-simple-event-list' ); ?></a>
		<a href="?page=vsel&tab=single_options" class="nav-tab <?php echo $active_tab == 'single_options' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Single event', 'very-simple-event-list' ); ?></a>
		<a href="?page=vsel&tab=support_options" class="nav-tab <?php echo $active_tab == 'support_options' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Default support', 'very-simple-event-list' ); ?></a>
		<a href="?page=vsel&tab=feed_options" class="nav-tab <?php echo $active_tab == 'feed_options' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Feed', 'very-simple-event-list' ); ?></a>
	</h2>
	<form action="options.php" method="POST">
		<?php if ( $active_tab == 'general_options' ) {
			settings_fields( 'vsel-general-options' );
			do_settings_sections( 'vsel-general' );
		} elseif ( $active_tab == 'page_options' ) {
			settings_fields( 'vsel-page-options' );
			do_settings_sections( 'vsel-page' );
		} elseif ( $active_tab == 'widget_options' ) {
			settings_fields( 'vsel-widget-options' );
			do_settings_sections( 'vsel-widget' );
		} elseif ( $active_tab == 'single_options' ) {
			settings_fields( 'vsel-single-options' );
			do_settings_sections( 'vsel-single' );
		} elseif ( $active_tab == 'support_options' ) {
			settings_fields( 'vsel-support-options' );
			do_settings_sections( 'vsel-support' );
		} else {
			settings_fields( 'vsel-feed-options' );
			do_settings_sections( 'vsel-feed' );
		}
		submit_button(); ?>
	</form>
	<p><?php esc_html_e( 'You can also use attributes to customize your event list.', 'very-simple-event-list' ); ?></p>
	<p><?php esc_html_e( 'For info and available attributes', 'very-simple-event-list' ); ?> <?php echo '<a href="https://wordpress.org/plugins/very-simple-event-list" rel="noopener noreferrer" target="_blank">'.esc_html__( 'click here', 'very-simple-event-list' ).'</a>'; ?>.</p>
</div>
<?php
}
