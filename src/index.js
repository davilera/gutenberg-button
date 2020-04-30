/**
 * WordPress dependencies
 */
import { RichTextToolbarButton } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { registerFormatType } from '@wordpress/rich-text';

const MyActionButton = ( { value } ) => (
	<RichTextToolbarButton
		icon="admin-customizer"
		title={ __( 'Nelio Test', 'gutenberg-button' ) }
		onClick={ () => process( value ) }
	/>
);

registerFormatType( 'gutenberg-button/example', {
	title: __( 'Nelio Test', 'gutenberg-button' ),
	tagName: 'span',
	className: 'example',
	edit: MyActionButton,
} );

function process( value ) {
	const selectedText = value.text.substring( value.start, value.end );
	console.log( 'Selection:', selectedText );
} //end process()
