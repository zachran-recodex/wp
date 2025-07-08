<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;  

// functions.php is empty so you can easily track what code is needed in order to Vite + Tailwind JIT run well


// Main switch to get frontend assets from a Vite dev server OR from production built folder
// it is recommended to move it into wp-config.php


include "inc/inc.vite.php";

// =============================================================================
// THEME SETUP
// =============================================================================

// Theme Support
function icrp_theme_setup() {
    // Add theme support for featured images
    add_theme_support('post-thumbnails');
    
    // Add theme support for post thumbnails for all post types
    add_theme_support('post-thumbnails', array('post', 'page', 'events', 'libraries', 'hero_slides'));
    
    // Add theme support for menus
    add_theme_support('menus');
    
    // Add theme support for custom logo
    add_theme_support('custom-logo');
    
    // Enable HTML5 support
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption',
        'style',
        'script'
    ));
}
add_action('after_setup_theme', 'icrp_theme_setup');

// Disable Gutenberg for Posts (use Classic Editor like Events and Libraries)
function disable_gutenberg_for_posts($can_edit, $post_type) {
    if ($post_type == 'post') {
        return false;
    }
    return $can_edit;
}
add_filter('use_block_editor_for_post_type', 'disable_gutenberg_for_posts', 10, 2);

// Force Classic Editor for all posts
function force_classic_editor_for_posts() {
    global $pagenow;
    if ($pagenow == 'post.php' || $pagenow == 'post-new.php') {
        if (isset($_GET['post_type']) && $_GET['post_type'] == 'post') {
            add_filter('use_block_editor_for_post', '__return_false');
        } elseif (isset($_GET['post'])) {
            $post = get_post($_GET['post']);
            if ($post && $post->post_type == 'post') {
                add_filter('use_block_editor_for_post', '__return_false');
            }
        } elseif ($pagenow == 'post-new.php' && !isset($_GET['post_type'])) {
            // Default new post
            add_filter('use_block_editor_for_post', '__return_false');
        }
    }
}
add_action('admin_init', 'force_classic_editor_for_posts');

// =============================================================================
// CUSTOM POST TYPES
// =============================================================================

// Events Post Type
function create_events_post_type() {
    register_post_type('events',
        array(
            'labels' => array(
                'name' => 'Events',
                'singular_name' => 'Event',
                'add_new' => 'Add New Event',
                'add_new_item' => 'Add New Event',
                'edit_item' => 'Edit Event',
                'new_item' => 'New Event',
                'view_item' => 'View Event',
                'search_items' => 'Search Events',
                'not_found' => 'No events found',
                'not_found_in_trash' => 'No events found in Trash'
            ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'events'),
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-calendar-alt',
            'menu_position' => 5,
            'show_in_rest' => false,
            'capability_type' => 'post',
            'hierarchical' => false,
        )
    );
}
add_action('init', 'create_events_post_type');

// Libraries Post Type
function create_libraries_post_type() {
    register_post_type('libraries',
        array(
            'labels' => array(
                'name' => 'Libraries',
                'singular_name' => 'Library',
                'add_new' => 'Add New Book',
                'add_new_item' => 'Add New Book',
                'edit_item' => 'Edit Book',
                'new_item' => 'New Book',
                'view_item' => 'View Book',
                'search_items' => 'Search Books',
                'not_found' => 'No books found',
                'not_found_in_trash' => 'No books found in Trash'
            ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'library'),
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-book',
            'menu_position' => 6,
            'show_in_rest' => false,
            'capability_type' => 'post',
            'hierarchical' => false,
        )
    );
}
add_action('init', 'create_libraries_post_type');

// Hero Slides Post Type
function create_hero_slides_post_type() {
    register_post_type('hero_slides',
        array(
            'labels' => array(
                'name' => 'Hero Slides',
                'singular_name' => 'Hero Slide',
                'add_new' => 'Add New Slide',
                'add_new_item' => 'Add New Hero Slide',
                'edit_item' => 'Edit Hero Slide',
                'new_item' => 'New Hero Slide',
                'view_item' => 'View Hero Slide',
                'search_items' => 'Search Hero Slides',
                'not_found' => 'No hero slides found',
                'not_found_in_trash' => 'No hero slides found in Trash'
            ),
            'public' => false,
            'publicly_queryable' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'has_archive' => false,
            'rewrite' => false,
            'supports' => array('title'),
            'menu_icon' => 'dashicons-slides',
            'menu_position' => 4,
            'show_in_rest' => false,
            'capability_type' => 'post',
            'hierarchical' => false,
        )
    );
}
add_action('init', 'create_hero_slides_post_type');

// Force flush rewrite rules on theme activation
function icrp_flush_rewrite_rules() {
    create_events_post_type();
    create_libraries_post_type();
    create_hero_slides_post_type();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'icrp_flush_rewrite_rules');

// Simplified post type support
function ensure_custom_post_type_supports() {
    add_post_type_support('events', 'title');
    add_post_type_support('libraries', 'title');
    add_post_type_support('hero_slides', 'title');
}
add_action('init', 'ensure_custom_post_type_supports', 99);

// Hero Slides Meta Box
function add_hero_slides_meta_boxes() {
    add_meta_box(
        'hero_slides_details',
        'Hero Slide Details',
        'hero_slides_meta_box_callback',
        'hero_slides',
        'normal',
        'high'
    );
    
}
add_action('add_meta_boxes', 'add_hero_slides_meta_boxes');

function hero_slides_meta_box_callback($post) {
    wp_nonce_field('save_hero_slides_meta', 'hero_slides_meta_nonce');
    
    $slide_subtitle = get_post_meta($post->ID, 'slide_subtitle', true);
    $slide_image = get_post_meta($post->ID, 'slide_image', true);
    $slide_cta_text = get_post_meta($post->ID, 'slide_cta_text', true);
    $slide_cta_url = get_post_meta($post->ID, 'slide_cta_url', true);
    $slide_order = get_post_meta($post->ID, 'slide_order', true);
    
    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="slide_subtitle">Subtitle</label></th>';
    echo '<td><textarea id="slide_subtitle" name="slide_subtitle" style="width: 100%; height: 80px;">' . esc_textarea($slide_subtitle) . '</textarea></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="slide_image">Background Image</label></th>';
    echo '<td>';
    echo '<input type="hidden" id="slide_image" name="slide_image" value="' . esc_attr($slide_image) . '" />';
    echo '<input type="button" class="button" id="upload_slide_image_button" value="Choose Image" />';
    echo '<input type="button" class="button" id="remove_slide_image_button" value="Remove Image" style="margin-left: 10px;" />';
    echo '<div id="slide_image_preview" style="margin-top: 10px;">';
    if ($slide_image) {
        echo '<img src="' . esc_url($slide_image) . '" style="max-width: 300px; height: auto; border: 1px solid #ddd; border-radius: 4px;" />';
    }
    echo '</div>';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="slide_cta_text">Button Text</label></th>';
    echo '<td><input type="text" id="slide_cta_text" name="slide_cta_text" value="' . esc_attr($slide_cta_text) . '" style="width: 100%;" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="slide_cta_url">Button URL</label></th>';
    echo '<td><input type="text" id="slide_cta_url" name="slide_cta_url" value="' . esc_attr($slide_cta_url) . '" style="width: 100%;" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="slide_order">Slide Order</label></th>';
    echo '<td><input type="number" id="slide_order" name="slide_order" value="' . esc_attr($slide_order) . '" style="width: 100px;" min="1" /></td>';
    echo '</tr>';
    echo '</table>';
    
    // Add JavaScript for media uploader
    ?>
    <script>
    jQuery(document).ready(function($) {
        var slideMediaUploader;
        
        $('#upload_slide_image_button').click(function(e) {
            e.preventDefault();
            
            if (slideMediaUploader) {
                slideMediaUploader.open();
                return;
            }
            
            slideMediaUploader = wp.media({
                title: 'Choose Slide Background Image',
                button: {
                    text: 'Choose Image'
                },
                multiple: false
            });
            
            slideMediaUploader.on('select', function() {
                var attachment = slideMediaUploader.state().get('selection').first().toJSON();
                $('#slide_image').val(attachment.url);
                $('#slide_image_preview').html('<img src="' + attachment.url + '" style="max-width: 300px; height: auto; border: 1px solid #ddd; border-radius: 4px;" />');
            });
            
            slideMediaUploader.open();
        });
        
        $('#remove_slide_image_button').click(function(e) {
            e.preventDefault();
            $('#slide_image').val('');
            $('#slide_image_preview').html('');
        });
    });
    </script>
    <?php
}


// Save Hero Slides Meta
function save_hero_slides_meta($post_id) {
    if (!isset($_POST['hero_slides_meta_nonce']) || !wp_verify_nonce($_POST['hero_slides_meta_nonce'], 'save_hero_slides_meta')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['slide_subtitle'])) {
        update_post_meta($post_id, 'slide_subtitle', sanitize_textarea_field($_POST['slide_subtitle']));
    }
    
    if (isset($_POST['slide_image'])) {
        update_post_meta($post_id, 'slide_image', sanitize_text_field($_POST['slide_image']));
    }
    
    if (isset($_POST['slide_cta_text'])) {
        update_post_meta($post_id, 'slide_cta_text', sanitize_text_field($_POST['slide_cta_text']));
    }
    
    if (isset($_POST['slide_cta_url'])) {
        update_post_meta($post_id, 'slide_cta_url', sanitize_text_field($_POST['slide_cta_url']));
    }
    
    if (isset($_POST['slide_order'])) {
        update_post_meta($post_id, 'slide_order', intval($_POST['slide_order']));
    }
}
add_action('save_post', 'save_hero_slides_meta');

// =============================================================================
// ACF FIELDS CONFIGURATION (Install ACF plugin first)
// =============================================================================

// Check if ACF is available and create field groups programmatically
function create_acf_fields_for_events_and_libraries() {
    // Only run if ACF is active
    if (!function_exists('acf_add_local_field_group')) {
        // Add admin notice if ACF is not active
        add_action('admin_notices', function() {
            echo '<div class="notice notice-warning"><p>ACF plugin is required for Events and Libraries custom fields.</p></div>';
        });
        return;
    }
    
    // Add try-catch for error handling
    try {

    // Events Field Group
    acf_add_local_field_group(array(
        'key' => 'group_events_fields',
        'title' => 'Event Information',
        'fields' => array(
            array(
                'key' => 'field_event_description',
                'label' => 'Event Description',
                'name' => 'event_description',
                'type' => 'wysiwyg',
                'instructions' => 'Enter the full description of the event',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 1,
            ),
            array(
                'key' => 'field_event_featured_image',
                'label' => 'Event Featured Image',
                'name' => 'event_featured_image',
                'type' => 'image',
                'instructions' => 'Upload the main image for this event',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_event_short_description',
                'label' => 'Short Description',
                'name' => 'event_short_description',
                'type' => 'textarea',
                'instructions' => 'Brief description for event previews (max 150 characters)',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => 150,
                'rows' => 3,
                'new_lines' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'events',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    // Libraries Field Group
    acf_add_local_field_group(array(
        'key' => 'group_libraries_fields',
        'title' => 'Book Information',
        'fields' => array(
            array(
                'key' => 'field_book_description',
                'label' => 'Book Description',
                'name' => 'book_description',
                'type' => 'wysiwyg',
                'instructions' => 'Enter the full description of the book',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 1,
            ),
            array(
                'key' => 'field_book_cover_image',
                'label' => 'Book Cover Image',
                'name' => 'book_cover_image',
                'type' => 'image',
                'instructions' => 'Upload the cover image for this book',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_book_summary',
                'label' => 'Book Summary',
                'name' => 'book_summary',
                'type' => 'textarea',
                'instructions' => 'Brief summary for book previews (max 150 characters)',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => 150,
                'rows' => 3,
                'new_lines' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'libraries',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    } catch (Exception $e) {
        // Log error if field group creation fails
        error_log('ACF Field Group Error: ' . $e->getMessage());
    }
}
add_action('acf/init', 'create_acf_fields_for_events_and_libraries');

// =============================================================================
// CUSTOM META BOXES (Legacy - keep for existing functionality)
// =============================================================================

// Events Meta Box
function add_events_meta_boxes() {
    add_meta_box(
        'events_details',
        'Event Details',
        'events_meta_box_callback',
        'events',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_events_meta_boxes');

function events_meta_box_callback($post) {
    wp_nonce_field('save_events_meta', 'events_meta_nonce');
    
    $event_date = get_post_meta($post->ID, 'event_date', true);
    $event_time = get_post_meta($post->ID, 'event_time', true);
    $event_location = get_post_meta($post->ID, 'event_location', true);
    
    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="event_date">Event Date</label></th>';
    echo '<td><input type="date" id="event_date" name="event_date" value="' . esc_attr($event_date) . '" style="width: 100%;" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="event_time">Event Time</label></th>';
    echo '<td><input type="time" id="event_time" name="event_time" value="' . esc_attr($event_time) . '" style="width: 100%;" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="event_location">Event Location</label></th>';
    echo '<td><input type="text" id="event_location" name="event_location" value="' . esc_attr($event_location) . '" style="width: 100%;" /></td>';
    echo '</tr>';
    echo '</table>';
}

// Save Events Meta
function save_events_meta($post_id) {
    if (!isset($_POST['events_meta_nonce']) || !wp_verify_nonce($_POST['events_meta_nonce'], 'save_events_meta')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['event_date'])) {
        update_post_meta($post_id, 'event_date', sanitize_text_field($_POST['event_date']));
    }
    
    if (isset($_POST['event_time'])) {
        update_post_meta($post_id, 'event_time', sanitize_text_field($_POST['event_time']));
    }
    
    if (isset($_POST['event_location'])) {
        update_post_meta($post_id, 'event_location', sanitize_text_field($_POST['event_location']));
    }
}
add_action('save_post', 'save_events_meta');

// Libraries Meta Box
function add_libraries_meta_boxes() {
    add_meta_box(
        'libraries_details',
        'Book Details',
        'libraries_meta_box_callback',
        'libraries',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_libraries_meta_boxes');

function libraries_meta_box_callback($post) {
    wp_nonce_field('save_libraries_meta', 'libraries_meta_nonce');
    
    $book_author = get_post_meta($post->ID, 'book_author', true);
    $book_year = get_post_meta($post->ID, 'book_year', true);
    $book_isbn = get_post_meta($post->ID, 'book_isbn', true);
    
    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="book_author">Author</label></th>';
    echo '<td><input type="text" id="book_author" name="book_author" value="' . esc_attr($book_author) . '" style="width: 100%;" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="book_year">Publication Year</label></th>';
    echo '<td><input type="number" id="book_year" name="book_year" value="' . esc_attr($book_year) . '" style="width: 100%;" min="1900" max="2030" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="book_isbn">ISBN</label></th>';
    echo '<td><input type="text" id="book_isbn" name="book_isbn" value="' . esc_attr($book_isbn) . '" style="width: 100%;" /></td>';
    echo '</tr>';
    echo '</table>';
}

// Save Libraries Meta
function save_libraries_meta($post_id) {
    if (!isset($_POST['libraries_meta_nonce']) || !wp_verify_nonce($_POST['libraries_meta_nonce'], 'save_libraries_meta')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['book_author'])) {
        update_post_meta($post_id, 'book_author', sanitize_text_field($_POST['book_author']));
    }
    
    if (isset($_POST['book_year'])) {
        update_post_meta($post_id, 'book_year', sanitize_text_field($_POST['book_year']));
    }
    
    if (isset($_POST['book_isbn'])) {
        update_post_meta($post_id, 'book_isbn', sanitize_text_field($_POST['book_isbn']));
    }
}
add_action('save_post', 'save_libraries_meta');

// Article Details Meta Box for Posts
function add_article_meta_boxes() {
    // Featured Article Meta Box
    add_meta_box(
        'featured_article',
        'Featured Article',
        'featured_article_meta_box_callback',
        'post',
        'side',
        'high'
    );
    
    // Article Details Meta Box
    add_meta_box(
        'article_details',
        'Article Details',
        'article_details_meta_box_callback',
        'post',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_article_meta_boxes');

function article_details_meta_box_callback($post) {
    wp_nonce_field('save_article_meta', 'article_meta_nonce');
    
    $article_excerpt = get_post_meta($post->ID, 'article_excerpt', true);
    $article_author = get_post_meta($post->ID, 'article_author', true);
    $article_source = get_post_meta($post->ID, 'article_source', true);
    
    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="article_excerpt">Article Excerpt</label></th>';
    echo '<td><textarea id="article_excerpt" name="article_excerpt" style="width: 100%; height: 80px;">' . esc_textarea($article_excerpt) . '</textarea></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="article_author">Author</label></th>';
    echo '<td><input type="text" id="article_author" name="article_author" value="' . esc_attr($article_author) . '" style="width: 100%;" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="article_source">Source</label></th>';
    echo '<td><input type="text" id="article_source" name="article_source" value="' . esc_attr($article_source) . '" style="width: 100%;" /></td>';
    echo '</tr>';
    echo '</table>';
}

function featured_article_meta_box_callback($post) {
    wp_nonce_field('save_featured_article_meta', 'featured_article_nonce');
    
    $is_featured = get_post_meta($post->ID, 'featured', true);
    
    echo '<label for="is_featured">';
    echo '<input type="checkbox" id="is_featured" name="is_featured" value="1" ' . checked($is_featured, '1', false) . ' />';
    echo ' Set as Featured Article for Homepage';
    echo '</label>';
}

// Save Article Meta
function save_article_meta($post_id) {
    if (!isset($_POST['article_meta_nonce']) || !wp_verify_nonce($_POST['article_meta_nonce'], 'save_article_meta')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['article_excerpt'])) {
        update_post_meta($post_id, 'article_excerpt', sanitize_textarea_field($_POST['article_excerpt']));
    }
    
    if (isset($_POST['article_author'])) {
        update_post_meta($post_id, 'article_author', sanitize_text_field($_POST['article_author']));
    }
    
    if (isset($_POST['article_source'])) {
        update_post_meta($post_id, 'article_source', sanitize_text_field($_POST['article_source']));
    }
}
add_action('save_post', 'save_article_meta');

// Save Featured Article Meta
function save_featured_article_meta($post_id) {
    if (!isset($_POST['featured_article_nonce']) || !wp_verify_nonce($_POST['featured_article_nonce'], 'save_featured_article_meta')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Remove featured status from other posts first
    if (isset($_POST['is_featured']) && $_POST['is_featured'] == '1') {
        global $wpdb;
        $wpdb->delete($wpdb->postmeta, array('meta_key' => 'featured', 'meta_value' => '1'));
        update_post_meta($post_id, 'featured', '1');
    } else {
        delete_post_meta($post_id, 'featured');
    }
}
add_action('save_post', 'save_featured_article_meta');

// =============================================================================
// SEPARATE ADMIN MENUS
// =============================================================================

// Add Admin Menus
function icrp_add_admin_menus() {
    // Remove old Hero Section Menu - now uses Custom Post Type
    
    // CTA Section Menu
    add_menu_page(
        'Call to Action',
        'Call to Action',
        'manage_options',
        'icrp-cta-settings',
        'icrp_cta_settings_page',
        'dashicons-megaphone',
        7
    );
    
    // Articles Management Guide
    add_menu_page(
        'Articles Guide',
        'Articles Guide',
        'manage_options',
        'icrp-articles-guide',
        'icrp_articles_guide_page',
        'dashicons-admin-post',
        8
    );
}
add_action('admin_menu', 'icrp_add_admin_menus');

// Enqueue media uploader for admin pages
function enqueue_media_uploader_for_admin() {
    global $pagenow;
    
    // Only load on our custom admin pages
    if (isset($_GET['page']) && in_array($_GET['page'], ['icrp-cta-settings'])) {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'enqueue_media_uploader_for_admin');

// Initialize CTA Settings
function icrp_cta_settings_init() {
    register_setting('icrp_cta_settings', 'icrp_cta_title');
    register_setting('icrp_cta_settings', 'icrp_cta_subtitle');
    register_setting('icrp_cta_settings', 'icrp_cta_button_text');
    register_setting('icrp_cta_settings', 'icrp_cta_image');
    
    add_settings_section(
        'icrp_cta_section',
        'Call to Action Configuration',
        'icrp_cta_section_callback',
        'icrp_cta_settings'
    );
    
    add_settings_field(
        'icrp_cta_title',
        'CTA Title',
        'icrp_cta_title_render',
        'icrp_cta_settings',
        'icrp_cta_section'
    );
    
    add_settings_field(
        'icrp_cta_subtitle',
        'CTA Subtitle',
        'icrp_cta_subtitle_render',
        'icrp_cta_settings',
        'icrp_cta_section'
    );
    
    add_settings_field(
        'icrp_cta_button_text',
        'CTA Button Text',
        'icrp_cta_button_text_render',
        'icrp_cta_settings',
        'icrp_cta_section'
    );
    
    add_settings_field(
        'icrp_cta_image',
        'CTA Background Image',
        'icrp_cta_image_render',
        'icrp_cta_settings',
        'icrp_cta_section'
    );
}
add_action('admin_init', 'icrp_cta_settings_init');

function icrp_cta_section_callback() {
    echo '<p>Configure the call-to-action section that appears at the bottom of your homepage. This section encourages visitors to take action.</p>';
}

// CTA Field Renders
function icrp_cta_title_render() {
    $value = get_option('icrp_cta_title', 'Bergabunglah dengan Misi Perdamaian');
    echo '<input type="text" name="icrp_cta_title" value="' . esc_attr($value) . '" style="width: 100%; max-width: 500px;" />';
    echo '<p class="description">The main title for the call-to-action section.</p>';
}

function icrp_cta_subtitle_render() {
    $value = get_option('icrp_cta_subtitle', 'Mari bersama-sama membangun dialog yang bermakna dan memperkuat persaudaraan lintas iman demi Indonesia yang damai dan harmonis');
    echo '<textarea name="icrp_cta_subtitle" style="width: 100%; max-width: 500px; height: 100px;">' . esc_textarea($value) . '</textarea>';
    echo '<p class="description">The descriptive text for the call-to-action section.</p>';
}

function icrp_cta_button_text_render() {
    $value = get_option('icrp_cta_button_text', 'Bergabung Sekarang');
    echo '<input type="text" name="icrp_cta_button_text" value="' . esc_attr($value) . '" style="width: 100%; max-width: 300px;" />';
    echo '<p class="description">The text displayed on the call-to-action button.</p>';
}

function icrp_cta_image_render() {
    $value = get_option('icrp_cta_image', 'https://images.unsplash.com/photo-1529390079861-591de354faf5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
    
    echo '<div class="cta-image-upload">';
    echo '<input type="hidden" name="icrp_cta_image" id="icrp_cta_image" value="' . esc_attr($value) . '" />';
    echo '<input type="button" class="button" id="upload_cta_image_button" value="Choose Image" />';
    echo '<input type="button" class="button" id="remove_cta_image_button" value="Remove Image" style="margin-left: 10px;" />';
    echo '<p class="description">Upload or select CTA background image from Media Library. Recommended size: 1920x1080px.</p>';
    
    // Preview image
    echo '<div id="cta_image_preview" style="margin-top: 10px;">';
    if ($value) {
        echo '<img src="' . esc_url($value) . '" style="max-width: 300px; height: auto; border: 1px solid #ddd; border-radius: 4px;" />';
    }
    echo '</div>';
    echo '</div>';
    
    // Add JavaScript for media uploader
    ?>
    <script>
    jQuery(document).ready(function($) {
        var ctaMediaUploader;
        
        $('#upload_cta_image_button').click(function(e) {
            e.preventDefault();
            
            if (ctaMediaUploader) {
                ctaMediaUploader.open();
                return;
            }
            
            ctaMediaUploader = wp.media({
                title: 'Choose CTA Background Image',
                button: {
                    text: 'Choose Image'
                },
                multiple: false
            });
            
            ctaMediaUploader.on('select', function() {
                var attachment = ctaMediaUploader.state().get('selection').first().toJSON();
                $('#icrp_cta_image').val(attachment.url);
                $('#cta_image_preview').html('<img src="' + attachment.url + '" style="max-width: 300px; height: auto; border: 1px solid #ddd; border-radius: 4px;" />');
            });
            
            ctaMediaUploader.open();
        });
        
        $('#remove_cta_image_button').click(function(e) {
            e.preventDefault();
            $('#icrp_cta_image').val('');
            $('#cta_image_preview').html('');
        });
    });
    </script>
    <?php
}


// CTA Settings Page
function icrp_cta_settings_page() {
    ?>
    <div class="wrap">
        <h1>Call to Action Settings</h1>
        <p>Configure the call-to-action section that appears at the bottom of your homepage. This section encourages visitors to engage with your organization.</p>
        
        <form action="options.php" method="post">
            <?php
            settings_fields('icrp_cta_settings');
            do_settings_sections('icrp_cta_settings');
            submit_button('Save CTA Settings');
            ?>
        </form>
        
        <div style="margin-top: 30px; padding: 20px; background: #f1f1f1; border-left: 4px solid #0073aa;">
            <h3>Tips:</h3>
            <ul>
                <li><strong>Title:</strong> Use action-oriented language to motivate visitors</li>
                <li><strong>Subtitle:</strong> Explain the benefits of taking action</li>
                <li><strong>Button Text:</strong> Use clear, compelling call-to-action words</li>
                <li><strong>Background:</strong> Choose images that complement the message</li>
            </ul>
        </div>
    </div>
    <?php
}

// Articles Guide Page
function icrp_articles_guide_page() {
    ?>
    <div class="wrap">
        <h1>Articles Management Guide</h1>
        <p>Learn how to manage articles for your ICRP website homepage. Articles are managed using the standard WordPress Posts system with additional features.</p>
        
        <div style="margin-bottom: 30px;">
            <h2>How to Add Articles</h2>
            <ol style="font-size: 14px; line-height: 1.6;">
                <li><strong>Go to Posts → Add New</strong> in the WordPress admin menu</li>
                <li><strong>Enter Title:</strong> Write a compelling article title</li>
                <li><strong>Add Content:</strong> Write your article content in the editor</li>
                <li><strong>Set Featured Image:</strong> Click "Set featured image" and upload an image</li>
                <li><strong>Choose Category:</strong> Select or create a category for your article</li>
                <li><strong>Set as Featured (Optional):</strong> Check the "Set as Featured Article" box in the sidebar to make it the main homepage article</li>
                <li><strong>Publish:</strong> Click "Publish" to make the article live</li>
            </ol>
        </div>
        
        <div style="margin-bottom: 30px;">
            <h2>Article Display Logic</h2>
            <div style="background: #f9f9f9; padding: 15px; border-left: 4px solid #0073aa;">
                <p><strong>Featured Article:</strong> Only one article can be marked as "Featured" at a time. This article will appear as the large hero article at the top of the homepage.</p>
                <p><strong>Slider Articles:</strong> The 9 most recent articles (excluding the featured article) will appear in the article slider below the featured article.</p>
                <p><strong>Fallback:</strong> If there are no articles, dummy content will be displayed automatically.</p>
            </div>
        </div>
        
        <div style="margin-bottom: 30px;">
            <h2>Quick Actions</h2>
            <p>
                <a href="<?php echo admin_url('post-new.php'); ?>" class="button button-primary">Add New Article</a>
                <a href="<?php echo admin_url('edit.php'); ?>" class="button">View All Articles</a>
                <a href="<?php echo admin_url('edit-tags.php?taxonomy=category'); ?>" class="button">Manage Categories</a>
            </p>
        </div>
        
        <div style="margin-bottom: 30px;">
            <h2>Best Practices</h2>
            <ul style="font-size: 14px; line-height: 1.6;">
                <li><strong>Image Size:</strong> Use images with at least 800x600px resolution for best quality</li>
                <li><strong>Title Length:</strong> Keep titles under 60 characters for better display</li>
                <li><strong>Content Preview:</strong> The first 100-150 characters will be shown in the slider</li>
                <li><strong>Categories:</strong> Use consistent category names like "Dialog Lintas Agama", "Toleransi", etc.</li>
                <li><strong>Featured Article:</strong> Update the featured article regularly to keep the homepage fresh</li>
            </ul>
        </div>
        
        <div style="background: #fff3cd; border: 1px solid #ffeaa7; padding: 15px; border-radius: 4px;">
            <h3 style="margin-top: 0; color: #856404;">Important Notes:</h3>
            <ul style="margin-bottom: 0; color: #856404;">
                <li>Only one article can be featured at a time - setting a new featured article will automatically unmark the previous one</li>
                <li>Articles will appear on the homepage immediately after publishing</li>
                <li>If you have fewer than 10 articles, dummy content will fill the remaining slots</li>
                <li>Categories are used for organization and display purposes</li>
            </ul>
        </div>
    </div>
    <?php
}

// Theme Customizer Support (Keep existing)
function icrp_theme_customizer($wp_customize) {
    // Logo Section
    $wp_customize->add_section('icrp_logo_section', array(
        'title' => 'Logo ICRP',
        'priority' => 30,
    ));
    
    // Logo Setting
    $wp_customize->add_setting('icrp_logo', array(
        'default' => get_template_directory_uri() . '/assets/img/logo.png',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    // Logo Control
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'icrp_logo_control', array(
        'label' => 'Upload Logo ICRP',
        'section' => 'icrp_logo_section',
        'settings' => 'icrp_logo',
    )));
}
add_action('customize_register', 'icrp_theme_customizer');


