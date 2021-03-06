<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class bpminifycssToolbar {

    public function __construct()
    {
        // If Cache is not available we don't add the bpminifycss Toolbar
        if( !bpminifycssCache::cacheavail() ) return;

        // Load admin toolbar feature once WordPress, all plugins, and the theme are fully loaded and instantiated.
        add_action( 'wp_loaded', array( $this, 'load_toolbar' ) );
    }

    public function load_toolbar()
    {
        // We check that the current user has the appropriate permissions
        if( current_user_can( 'manage_options' ) && apply_filters( 'bpminifycss_filter_toolbar_show', true ) )
        {
            // Load custom styles and scripts
            if( is_admin() ) {
                // in the case of back-end
                add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
            } else {
                // in the case of front-end
                add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
            }
            
            // Create a handler for the AJAX toolbar requests
            add_action( 'wp_ajax_bpminifycss_delete_cache', array( $this, 'delete_cache' ) );

            // Add the bpminifycss Toolbar to the Admin bar
            add_action( 'admin_bar_menu', array($this, 'add_toolbar'), 100 );
        }
    }

    public function add_toolbar()
    {
        global $wp_admin_bar;

        // Retrieve the bpminifycss Cache Stats information
        $stats = bpminifycssCache::stats();

        // Set the Max Size recommended for cache files
        $max_size = apply_filters('bpminifycss_filter_cachecheck_maxsize', 512 * 1024 * 1024);

        // Retrieve the current Total Files in cache
        $files = $stats[0];
        // Retrieve the current Total Size of the cache
        $bytes = $stats[1];

        $size = $this->format_filesize($bytes);

        // We calculated the percentage of cache used
        $percentage = ceil( $bytes / $max_size * 100 );
        if( $percentage > 100 ) $percentage = 100;

        // We define the type of color indicator for the current state of cache size.
        // "green" if the size is less than 80% of the total recommended 
        // "orange" if over 80%
        // "red" if over 100%
        $color = ( $percentage == 100 ) ? 'red' : ( ( $percentage > 80 ) ? 'orange' : 'green' );

        // Create or add new items into the Admin Toolbar.
        // Main bpminifycss node

    }

    public function delete_cache()
    {
        check_ajax_referer( 'ao_delcache_nonce', 'nonce' );
        if( current_user_can( 'manage_options' ))
        {
            // We call the function for cleaning the bpminifycss cache
            bpminifycssCache::clearall();
        }
        
        wp_die();
        // NOTE: Remember that any return values of this function must be in JSON format
    }

    public function enqueue_scripts()
    {
        // bpminifycss Toolbar Styles
        wp_enqueue_style( 'bpminifycss-toolbar', plugins_url('/static/toolbar.css', __FILE__ ), array(), time(), "all" );

        // bpminifycss Toolbar Javascript
        wp_enqueue_script( 'bpminifycss-toolbar', plugins_url( '/static/toolbar.js', __FILE__ ), array('jquery'), time(), true );

        // Localizes a registered script with data for a JavaScript variable. (We need this for the AJAX work properly in the front-end mode)
        wp_localize_script( 'bpminifycss-toolbar', 'bpminifycss_ajax_object', array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'error_msg' => __( 'Your bpminifycss cache might not have been purged successfully, please check on the <a href=' . admin_url( 'options-general.php?page=bpminifycss' ) . '  style="white-space:nowrap;">bpminifycss settings page</a>.', 'bpminifycss' ),
            'dismiss_msg' => __( 'Dismiss this notice.' ),
            'nonce' => wp_create_nonce( 'ao_delcache_nonce' )
        ) );
    }

    public function format_filesize($bytes, $decimals = 2)
    {
        $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB' );
        for ($i = 0; ($bytes / 1024) > 0.9; $i++, $bytes /= 1024) {}
        return sprintf( "%1.{$decimals}f %s", round( $bytes, $decimals ), $units[$i] );
    }
}
