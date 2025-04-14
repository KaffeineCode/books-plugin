import { useSelect } from '@wordpress/data';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, RangeControl } from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
  const books = useSelect((select) =>
    select('core').getEntityRecords('postType', 'books', {
      per_page: attributes.numberOfBooks,
      _embed: true,
    })
  );

  return (
    <>
      <InspectorControls>
        <PanelBody title="Settings">
          <RangeControl
            label="Number of Books"
            value={attributes.numberOfBooks}
            onChange={(val) => setAttributes({ numberOfBooks: val })}
            min={1}
            max={20}
          />
        </PanelBody>
      </InspectorControls>
      <div>
        <h3>Book List</h3>
        <ul class="bp-books-list">
          {books?.length ? (
            books.map((book) => (
              <li key={book.id}>
                {book._embedded?.['wp:featuredmedia']?.[0]?.source_url && (
                  <img
                    src={book._embedded['wp:featuredmedia'][0].source_url}
                    alt={book.title.rendered}
                    className="book-thumbnail"
                  />
                )}
                <strong>{book.title.rendered}</strong>
              </li>
            ))
          ) : (
            <p>No books found.</p>
          )}
        </ul>
      </div>
    </>
  );
}
