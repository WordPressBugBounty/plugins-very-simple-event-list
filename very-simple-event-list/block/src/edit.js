/**
 * WordPress Dependencies
 */
import { __ } from '@wordpress/i18n';
import { InspectorControls, useBlockProps } from '@wordpress/block-editor';
import { Disabled, PanelBody, SelectControl, TextareaControl, ExternalLink } from '@wordpress/components';
import ServerSideRender from '@wordpress/server-side-render';

/**
 * Block in Editor
 */
export default function Edit( props ) {
	const { attributes, setAttributes } = props;
	return (
		<>
			<InspectorControls>
				<PanelBody
					title={ __( 'Settings', 'very-simple-event-list' ) }
				>
					<SelectControl
						label={ __( 'Display', 'very-simple-event-list' ) }
						value={ attributes.listType }
						options={ [
							{ label: __( 'Upcoming events (today included)', 'very-simple-event-list' ), value: 'upcoming' },
							{ label: __( 'Future events (today not included)', 'very-simple-event-list' ), value: 'future' },
							{ label: __( 'Current events', 'very-simple-event-list' ), value: 'current' },
							{ label: __( 'Past events (before today)', 'very-simple-event-list' ), value: 'past' },
							{ label: __( 'All events', 'very-simple-event-list' ), value: 'all' },
						] }
						onChange={ ( listType ) => setAttributes( { listType } ) }
						__next40pxDefaultSize
						__nextHasNoMarginBottom
					/>
					<TextareaControl
						label={ __( 'Attributes', 'very-simple-event-list' ) }
						help={ __( 'Example', 'very-simple-event-list' ) + ": posts_per_page=\"5\"" }
						value={ attributes.shortcodeSettings }
						onChange={ ( shortcodeSettings ) => setAttributes( { shortcodeSettings } ) }
						__nextHasNoMarginBottom
					/>
					<div> { __( 'For info and available attributes', 'very-simple-event-list' ) } {' '}
						<ExternalLink href="https://wordpress.org/plugins/very-simple-event-list">
							{ __( 'click here', 'very-simple-event-list' ) }
						</ExternalLink>
					</div>					
				</PanelBody>
			</InspectorControls>
			<div { ...useBlockProps() }>
				<Disabled>
					<ServerSideRender
						skipBlockSupportAttributes
						block="vsel/vsel-block"
						attributes={ attributes }
					/>
				</Disabled>
			</div>
		</>
	);
}
