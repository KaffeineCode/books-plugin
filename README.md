# 📚 Books Plugin – Technical Test

This plugin is part of a technical test. It includes:

- A custom post type for managing "Books"
- A custom taxonomy for "Genres"
- A dynamic Gutenberg block that displays the latest books

---

## 🚀 Setup Instructions

1. Clone or download the repository.
2. Copy it into your `/wp-content/plugins/` folder.
3. Run the block build process:

   ```bash
   npm install
   npm run build
   ```

4. Activate the plugin via the WordPress admin.
5. The "Books" post type will now be available in the sidebar.
6. Add books with title, content, featured image, and genre.
7. Use the "Books List" block inside the block editor to show recent books.

---

## ✅ Part 1: Plugin Development & Code Review

### Code Review

#### ✅ Positives:
- Code is clean, modular, and easy to follow.
- Proper use of hooks, escaping functions, and labels.
- File structure separates logic clearly (`post-types.php`, `taxonomies.php`, etc.).
- Uses `plugin_dir_path()` and `plugins_url()` properly.
- REST API support is correctly enabled.

#### 🔧 Possible Improvements:
- Add unit tests or automated integration testing.
- Internationalization (`__()`/`_e()`) could be added to make the plugin translation-ready.
- Additional meta fields (like Author, Year, ISBN) could be introduced for a real-world book database.
- Could implement a settings page for customization.

---

## 🧩 Part 2: Gutenberg Block Implementation

### PHP Block Registration

Block registration is handled in `includes/blocks.php`. It:

- Registers the block script via `wp_register_script()`.
- Uses `register_block_type()` with a `render_callback` to allow dynamic rendering.
- Includes optional block attributes (e.g., `numberOfBooks`) to allow user customization.
- Registers a frontend CSS file for modern, responsive styling.

### JavaScript Block Structure (Located in `src/`):

- Uses `@wordpress/scripts` for build and bundling.
- The block fetches books dynamically from the REST API.
- Displays featured images and titles using `useSelect` from the WordPress data package.
- Supports user customization of how many books to show using `InspectorControls`.

### Making the Block Customizable (Optional Feature):

The block includes a `numberOfBooks` attribute that can be set via a sidebar control. This allows the editor to decide how many books to display.

Example:

```js
attributes: {
  numberOfBooks: {
    type: 'number',
    default: 5,
  },
}
```

In the editor, a number input is rendered using `PanelBody` and `TextControl` to change this value dynamically.
