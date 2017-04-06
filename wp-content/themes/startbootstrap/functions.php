<?php

/**
 *    WP Enqueue Stylesheets
 */
if ( ! function_exists( 'startbootstrap_enqueue_stylesheets' ) ) {
    function startbootstrap_enqueue_stylesheets() {
    	// Bootstrap Core CSS
    	wp_enqueue_style( 'bootstrap_min', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css' );

    	// Custom Fonts
    	wp_enqueue_style( 'font_awesome_min', get_template_directory_uri() . '/vendor/font-awesome/css/font-awesome.min.css' );

    	// Google Fonts
    	wp_enqueue_style( 'font_montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:400,700');
    	wp_enqueue_style( 'font_Kaushan', 'https://fonts.googleapis.com/css?family=Kaushan+Script');
    	wp_enqueue_style( 'font_droid_serif', 'https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic');
    	wp_enqueue_style( 'font_roboto_slab', 'https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700');

    	// Theme stylesheet.
    	wp_enqueue_style( 'startbootstrap-style', get_stylesheet_uri() );
    }
    add_action( 'wp_enqueue_scripts', 'startbootstrap_enqueue_stylesheets' );
}

/**
 *    WP Enqueue JavaScripts
 */

if ( ! function_exists( 'startbootstrap_enqueue_javascripts' ) ) {
    function startbootstrap_enqueue_javascripts() {

        // jQuery
        wp_enqueue_script( 'jquery_min', get_template_directory_uri() . '/vendor/jquery/jquery.min.js');

        // Bootstrap Core JavaScript
        wp_enqueue_script( 'bootstrap_min', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js');

        // Plugin JavaScript
        wp_enqueue_script( 'jquery_easing_min', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js');

        // Contact Form JavaScript
        wp_enqueue_script( 'jq_bootstrap_validation', get_template_directory_uri() . '/js/jqBootstrapValidation.js');
        wp_enqueue_script( 'contact_me', get_template_directory_uri() . '/js/contact_me.js');
        
        // Theme JavaScript 
        wp_enqueue_script( 'agency_min', get_template_directory_uri() . '/js/agency.min.js');
    }
    add_action( 'wp_enqueue_scripts', 'startbootstrap_enqueue_javascripts' );
}


/***********************************************/
/************** Add Nav Menu  ***************/
/***********************************************/
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

// Add class to menu anchor tag
function add_menuclass($ulclass) {
   return preg_replace('/<a /', '<a class="page-scroll"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');


/***********************************************/
/************** Add plugin page(Though Not Used In Theme)  ***************/
/***********************************************/
class options_page_post_like {
    function __construct() {
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }

    function admin_menu() {
        add_options_page(
            'Post Like',
            'Post Like',
            'manage_options',
            'post-like',
            array(
                $this,
                'Post_like_page'
            )
        );
    }

    function  Post_like_page() {
        require('/plugin_page.php');
    }
}

new options_page_post_like;


// Add Footer Copyright Text 

add_action( 'customize_register', 'my_customize_register' );

function my_customize_register($wp_customize) {

    class Ari_Customize_Textarea_Control extends WP_Customize_Control {
        public $type = 'textarea';
        public function render_content() {
        ?>

        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
        </label>

        <?php
        }
    }
    $wp_customize->add_section('copyright' , array(
     'title' => __('Copyright','Ari'),
    ));
    $wp_customize->add_setting('textarea_setting', array('default' => 'Copyright © Your Website '.date('Y'),));
    $wp_customize->add_control(new Ari_Customize_Textarea_Control($wp_customize, 'textarea_setting', array(
     'label' => 'Copyright Text',
     'section' => 'copyright',
     'settings' => 'textarea_setting',
    )));
}


/***********************************************/
/************** Footer Background Color Change  ***************/
/***********************************************/
function mytheme_customize_register( $wp_customize ) {    
    $wp_customize->add_section( 
        'footer_background', 
        array(
            'title'       => __( 'Footer Background Color', 'mytheme' ),
            'priority'    => 100,
            'capability'  => 'edit_theme_options',
            'description' => __('Change footer background color options here.', 'mytheme'), 
        ) 
    );
    $wp_customize->add_setting( 'footer_bg_color' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#ff2525',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( 
        'mytheme_footer_options', 
        array(
            'label' => 'Footer Background Color',
            'section' => 'footer_background',
            'settings' => 'footer_bg_color', 
        ) 
    );
}
add_action( 'customize_register', 'mytheme_customize_register' );



/***********************************************/
/************** Social Icon Details  ***************/
/***********************************************/
function mysocial_customize_register( $wp_customize ) {
    $wp_customize->add_panel( $panel_id,
        array(
            'priority'          => 109,
            'capability'        => 'manage_links',
            'theme_supports'    => '',
            'title'             => __( 'Social Icon Url Section', 'startbootstrap' ),
            'description'       => __( 'Control various options for contact us section from front page.', 'startbootstrap' ),
        )
    );

    $wp_customize->add_section( 'startbootstrap_general_social_section' ,
        array(
            'title'         => __( 'Social Icons Url', 'startbootstrap' ),
            'description'   => __( 'These are the social icons url details displayed in the social section from front page.', 'startbootstrap' ),
            'priority'      => 3,
            'panel'         => $panel_id
        )
    );

    // Set Social Media Icons Url 

    /* Facebook URL */
    $wp_customize->add_setting( 'startbootstrap_social_bar_facebook_url',
        array(
            'sanitize_callback'  => 'esc_url_raw',
            'default'            =>  esc_url_raw('#'),
            'transport'          => 'postMessage',
            'type'           => 'theme_mod',

        )
    );

    $wp_customize->add_control( '_social_bar_facebook_url',
        array(
            'label'          => __( 'Facebook URL', 'startbootstrap' ),
            'description'    => __( 'Will be displayed in the social section from front page.', 'startbootstrap' ),
            'section'        => 'startbootstrap_general_social_section',
            'settings'       => 'startbootstrap_social_bar_facebook_url',
            'priority'       => 10
        )
    );

    /* Twitter URL */
    $wp_customize->add_setting( 'startbootstrap_social_bar_twitter_url',
        array(
            'sanitize_callback'  => 'esc_url_raw',
            'default'            =>  esc_url_raw('#'),
            'transport'          => 'postMessage',
            'type'           => 'theme_mod',
        )
    );

    $wp_customize->add_control( '_social_bar_twitter_url',
        array(
            'label'          => __( 'Twitter URL', 'startbootstrap' ),
            'description'    => __('Will be displayed in the social section from front page.', 'startbootstrap'),
            'section'        => 'startbootstrap_general_social_section',
            'settings'       => 'startbootstrap_social_bar_twitter_url',
            'priority'       => 10
        )
    );

    /* LinkedIN URL */
    $wp_customize->add_setting( 'startbootstrap_social_bar_linkedin_url',
        array(
            'sanitize_callback'  => 'esc_url_raw',
            'default'            => esc_url_raw('#'),
            'transport'          => 'postMessage',
            'type'           => 'theme_mod',
        )
    );

    $wp_customize->add_control( '_social_bar_linkedin_url',
        array(
            'label'          => __( 'LinkedIN URL', 'startbootstrap' ),
            'description'    => __('Will be displayed in the social section from front page.', 'startbootstrap'),
            'section'        => 'startbootstrap_general_social_section',
            'settings'       => 'startbootstrap_social_bar_linkedin_url',
            'priority'       => 10
        )
    );

}
add_action( 'customize_register', 'mysocial_customize_register' );


/***********************************************/
/************** Add Home Top Background Image ***************/
/***********************************************/
function bg_img_customize_register( $wp_customize ){

    /*
     * Failsafe is safe
     */
    if ( ! isset( $wp_customize ) ) {
        return;
    }

    /**
     * Add 'Home Top' Section.
     */
    $wp_customize->add_section(
        // $id
        'section_home_top',
        // $args
        array(
            'title'         => __( 'Home Top Background Image', 'startbootstrap' ),
            // 'description'    => __( 'Some description for the options in the Home Top section', 'startbootstrap' ),
            'active_callback' => 'is_front_page',
        )
    );

    /**
     * Add 'Home Top Background Image' Setting.
     */
    $wp_customize->add_setting(
        // $id
        'home_top_background_image',
        // $args
        array(
            'default'       => get_stylesheet_directory_uri() . '/img/header-bg.jpg',
            'sanitize_callback' => 'esc_url_raw',
            'transport'     => 'refresh',
            'type'           => 'theme_mod',
        )
    );

    /**
     * Add 'Home Top Background Image' image upload Control.
     */
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            // $wp_customize object
            $wp_customize,
            // $id
            'home_top_background_image',
            // $args
            array(
                'label'         => __( 'Home Top Background Image', 'startbootstrap' ),
                'description'   => __( 'Select the image to be used for Home Top Background.', 'startbootstrap' ),
                'settings'      => 'home_top_background_image',
                'section'       => 'section_home_top',
            )
        )
    );

}

// Settings API options initilization and validation.
add_action( 'customize_register', 'bg_img_customize_register' );


// Login error message change
add_filter('login_errors','login_error_message');

function login_error_message( $error ){
    $error = "Incorrect login information, stay out!";
    return $error;
}


?>