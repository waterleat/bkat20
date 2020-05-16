var el = wp.element.createElement,
    registerBlockType = wp.blocks.registerBlockType;
    // blockStyle = { backgroundColor: '#900', color: '#fff', padding: '20px' };

registerBlockType( 'hello-gutenberg/step-four', {
    title: 'My World (Step 4)',

    icon: 'admin-network',

    category: 'layout',

    edit: function( props ) {
        return el( 'p', { className: props.className }, 'Hello editor.' );
    },

    save: function() {
        return el( 'p', {}, 'Hello this is saved content.' );
    },
} );
