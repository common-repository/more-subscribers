<?php

/*
 * Contributors: mdarmanin
 * Plugin Name: More Subscribers
 * Version: 2.0.0
 * Stable tag: 2.0.0
 * Plugin URI: https://wordpress.org/plugins/more-subscribers/
 * Description: A simple plugin that uses a widget to ask for someones first name, last name and email address and adds it to WP Users as a subscriber.
 * Tags: more subscribers, newsletter
 * Author URI: https://profiles.wordpress.org/mdarmanin
 * Author: Michael Darmanin
 * Requires at least: 3.0.1
 * Tested up to: 4.6.1
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html/
*/
	
	//Initialize assets.js and main.css
	add_action( 'wp_enqueue_scripts', 'js_assets' );

	function js_assets() {
		wp_enqueue_script( 'assets', plugins_url( '/js/assets.js', __FILE__ ), array('jquery') );
		wp_localize_script( 'assets', 'assets', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
		wp_enqueue_style( 'main.css', plugins_url( '/css/main.css', __FILE__ ) );
	}	

 	//Initialize widget
	add_action('widgets_init', 'more_subscribers_init'); 

	//Register widget
	function more_subscribers_init () {
	    register_widget('more_subscribers');
	}

	//Create the widget class
	class more_subscribers extends WP_Widget {
    
    	//Extend WP Widget Class to enable custom widget in backend
	    public function __construct() {
	        $widget_options = array(
	            'classname' => 'ms_backend_class',
	            'description' => __('Shows a field where the user can enter email address')
	        );

	        parent::__construct( 
			    'ms_id', 
			    __('More Subscribers'), 
			    $widget_options
			);
	    }
	    
	    //Backend - Settings to do stuff with widget title (such as default or user choice). Also make sure that titles are sanitized.
	    function form ($instance) {
	    	$instance = wp_parse_args($instance, array( 'title' => 'default title' ) );
			$title = sanitize_text_field( $instance['title'] );
	        echo '<p>Title <input type="text" class="widefat" name="' . $this->get_field_name('title') . '" value="' . $title . '" /></p>';
	    }

	    //Show widget in frontend post/page
	    function widget ($args, $instance) {
	       	extract($args);
	       	$title = apply_filters('widget_title', $instance['title']);
	       	echo $before_widget;
	       	echo $before_title . $title . $after_title;
	       	echo '<input type="text" name="userFirstName" placeholder="' . __('Your first name (optional)') . '" id="fn_input_fld">';
	       	echo '<input type="text" name="userLastName" placeholder="' . __('Your last name (optional)') . '" id="ln_input_fld">';
	       	echo '<input type="email" name="userEmail" placeholder="' . __('Your email address') . '" id="email_input_fld">';
	       	echo '<input type="Submit" name="submit_email" id="ms_submit_btn" value="' . __('Submit') . '" />';
	       	echo $after_widget; 
	    }   
	}

	//Initialize function in addEmail.php	
	add_action('wp_ajax_nopriv_add_subscriber','add_subscriber');
	add_action('wp_ajax_add_subscriber','add_subscriber');
	
	//Do some security checks then create the subscriber in the database
	function add_subscriber(){	
		$email = htmlentities($_POST['email']);
		$firstName = strip_tags($_POST['firstName']);
		$firstName = preg_replace('/[^\p{L}\p{N}\s]/u', '', $firstName);
		$lastName = strip_tags($_POST['lastName']);
		$lastName = preg_replace('/[^\p{L}\p{N}\s]/u', '', $lastName);
		$pwd = substr( md5( $email . mt_rand() ), 0, 24);
		$userdata = array(
			'user_email'  =>  $email,
		    'user_login'  =>  $email,
		    'first_name'  =>  $firstName,
		    'last_name'   =>  $lastName,
		    'user_pass'   =>  $pwd,
		    'role'		  =>  'subscriber'
		);		

		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			wp_insert_user($userdata);
			die();
		}
	}
?>