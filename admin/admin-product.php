<?php

Class Simple_Shop_Admin_Product {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $simple_shop    The ID of this plugin.
     */
    private $simple_shop;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $simple_shop       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct( $simple_shop, $version ) {

        $this->simple_shop = $simple_shop;
        $this->version = $version;

    }
	
	// register post type
	public function register_post_type() {
        $args = array(
            'labels' => array(
                'name' => 'Products',
                'singular_name' => 'Product',
                'add_new' => 'Add Product',
                'add_new_item' => 'Add Product Item',
                'edit' => 'Edit',
                'edit_item' => 'Edit Product',
                'new_item' => 'New Product',
                'view' => 'View',
                'view_item' => 'View Product',
                'search_items' => 'Search Product',
                'not_found' => 'No Products Found',
                'not_found_in_trash' => 'No Product found in the trash',
                'parent' => 'Parent Product view'
                ),
            'public' => true,            
            'supports' => array( 'editor','title','thumbnail'),            
            'has_archive' => true,
            'exclude_from_search' => true,
            'publicly_queryable' => false,
            'menu_position' => 5, // places menu item directly below Posts
            'menu_icon' => 'dashicons-image-filter', // image icon
            'taxonomies' => array( 'category' )
        );

        register_post_type( 'simple_shop_product', $args );
	}
}