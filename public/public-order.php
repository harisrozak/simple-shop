<?php

Class Simple_Shop_Public_Order {
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

    // action save_public_order
    public function save_public_order_post_data() {
    	// verify nonce
    	$this->verify_nonce( 'simple_shop_public_order', '%ALjaz2WMP_iE' );

    	// field data
    	$product_id = intval( $_POST[ 'product_id' ] );
    	$qty = intval( $_POST[ 'qty' ] );
    	$customer_note = sanitize_textarea_field( $_POST[ 'customer_note' ] );

    	// get product data
    	$product_name = get_the_title( $product_id );
    	$product_price = get_post_meta( $product_id, 'product_price', true );

    	// set total price
    	$total_price = $qty * floatval( $product_price );
    	$final_total_price = apply_filters( 'simple_post_order_total_price', $total_price );

    	// create a subscription_order post
		$post_id = wp_insert_post( array(
		    'post_title' => 'order_' . uniqid(),
		    'post_content' => $customer_note,
		    'post_type' => 'simple_shop_order',
		    'post_status' => 'publish',
		    'meta_input' => array(
                'id_user' => get_current_user_id(),
                'product_id' => $product_id,
                'product_name' => $product_name,
                'product_price' => $product_price,
                'qty' => $qty,
                'total_price' => $final_total_price,
            ),
		), true );

		// validate post_id
		if( is_wp_error( $post_id ) ) {
  			wp_die( $post_id->get_error_message() );
		}
		else{
		  	// action after added new payment confirmation 
			do_action( 'simple_post_new_order', $post_id );
		}
    }

    // nonce verification
    private function verify_nonce( $nonce_name, $nonce_value ) {
    	if ( isset( $_POST[ $nonce_name ] ) && wp_verify_nonce( $_POST[ $nonce_name ], $nonce_value ) ) return;
	   	
	   	// otherwise
	   	wp_die( __( 'Sorry, your nonce did not verify', 'simple_shop' ) );
	   	exit;
    }
}