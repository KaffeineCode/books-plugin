import { registerBlockType } from '@wordpress/blocks';
import Edit from './edit';

registerBlockType('bp/books-list', {
    title: 'Books List',
    icon: 'book',
    category: 'widgets',
    attributes: {
        numberOfBooks: {
            type: 'number',
            default: 5,
        },
    },
    edit: Edit,
    save: () => null, // Render via PHP
});