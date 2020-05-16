var el = wp.element.createElement,
    // Fragment = wp.element.Fragment
    registerBlockType = wp.blocks.registerBlockType,
    RichText = wp.editor.RichText,
    // BlockControls = wp.editor.BlockControls,
    // AlignmentToolbar = wp.editor.AlignmentToolbar,
    MediaUpload = wp.editor.MediaUpload,
    components = wp.components;

registerBlockType( 'gutenberg-test/step-three', {
  title: 'Brave New World (Step 3)',
	icon: 'index-card',
	category: 'layout',
	attributes: {
		title: {
			type: 'array',
			source: 'children',
			selector: 'h2',
		},
		mediaID: {
			type: 'number',
		},
		mediaURL: {
			type: 'string',
			source: 'attribute',
			selector: 'img',
			attribute: 'src',
		},
		ingredients: {
			type: 'array',
			source: 'children',
			selector: '.ingredients',
		},
		instructions: {
			type: 'array',
			source: 'children',
			selector: '.steps',
		},
	},
  // Use the block just once per post
  useOnce: true,
	edit: function( props ) {
		var attributes = props.attributes;

		var onSelectImage = function( media ) {
			return props.setAttributes( {
				mediaURL: media.url,
				mediaID: media.id,
			} );
		};

		return (
			el( 'div', { className: props.className },
				el( RichText, {
					tagName: 'h2',
					inline: true,
					placeholder: 'Write Recipe title…',
					value: attributes.title,
					onChange: function( value ) {
						props.setAttributes( { title: value } );
					},
				} ),
				el( 'div', { className: 'recipe-image' },
					el( MediaUpload, {
						onSelect: onSelectImage,
						allowedTypes: 'image',
						value: attributes.mediaID,
						render: function( obj ) {
							return el( components.Button, {
									className: attributes.mediaID ? 'image-button' : 'button button-large',
									onClick: obj.open
								},
								! attributes.mediaID ?  'Upload Image' : el( 'img', { src: attributes.mediaURL } )
							);
						}
					} )
				),
				el( 'h3', {}, 'Ingredients' ),
				el( RichText, {
					tagName: 'ul',
					multiline: 'li',
					placeholder: 'Write a list of ingredients…',
					value: attributes.ingredients,
					onChange: function( value ) {
						props.setAttributes( { ingredients: value } );
					},
					className: 'ingredients',
				} ),
				el( 'h3', {}, 'Instructions' ),
				el( RichText, {
					tagName: 'div',
					inline: false,
					placeholder: 'Write instructions…',
					value: attributes.instructions,
					onChange: function( value ) {
						props.setAttributes( { instructions: value } );
					},
				} )
			)
		);
	},
	save: function( props ) {
		var attributes = props.attributes;

		return (
			el( 'div', { className: props.className },
				el( RichText.Content, {
					tagName: 'h2', value: attributes.title
				} ),
				attributes.mediaURL &&
					el( 'div', { className: 'recipe-image' },
						el( 'img', { src: attributes.mediaURL } ),
					),
				el( 'h3', {}, 'Ingredients' ),
				el( RichText.Content, {
					tagName: 'ul', className: 'ingredients', value: attributes.ingredients
				} ),
				el( 'h3', {}, 'Instructions' ),
				el( RichText.Content, {
					tagName: 'div', className: 'steps', value: attributes.instructions
				} ),
			)
		);
	},
} );

    // } )(
    // 	window.wp.blocks,
    // 	window.wp.editor,
    // 	window.wp.i18n,
    // 	window.wp.element,
    // 	window.wp.components,
    // 	window._,
    // );
