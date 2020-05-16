const { __, setLocaleData } = wp.i18n;
const { registerBlockType } = wp.blocks;
// const { RichText } = wp.editor;
const {
	RichText,
	AlignmentToolbar,
	BlockControls,
} = wp.editor;

registerBlockType( 'gutenberg-test/step-six', {
	title: __( 'Example: Basic (esnext)', 'gutenberg-examples' ),
	icon: 'universal-access-alt',
	category: 'layout',
  attributes: {
		content: {
			type: 'array',
			source: 'children',
			selector: 'p',
		},
    alignment: {
			type: 'string',
			default: 'none',
		},
	},
  edit: ( props ) => {
    const { attributes: { content, alignment }, setAttributes, className } = props;
    const onChangeContent = ( newContent ) => {
      setAttributes( { content: newContent } );
    };
    const onChangeAlignment = ( newAlignment ) => {
      // props.setAttributes( { alignment: newAlignment === undefined ? 'none' : newAlignment } );
			setAttributes( { alignment: newAlignment === undefined ? 'none' : newAlignment } );
		};
    return (
      <div>
				{
					<BlockControls>
						<AlignmentToolbar
							value={ alignment }
							onChange={ onChangeAlignment }
						/>
					</BlockControls>
				}
				<RichText
					className={ className }
					style={ { textAlign: alignment } }
					tagName="p"
					onChange={ onChangeContent }
					value={ content }
				/>
			</div>
      // <RichText
      //   tagName="p"
      //   className={ className }
      //   onChange={ onChangeContent }
      //   value={ content }
      // />
    );
  },

  save: ( props ) => {
    return (
			<RichText.Content
				className={ `gutenberg-test-align-${ props.attributes.alignment }` }
				tagName="p"
        style={ { textAlign:  props.attributes.alignment  } }
				value={ props.attributes.content }
			/>
		);
    return <RichText.Content
    tagName="p"
    value={ props.attributes.content } />;
    // return <RichText.Content tagName="p" value={ props.attributes.content } />;
  },
} );
