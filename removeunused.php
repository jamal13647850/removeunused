<?php
/*
Plugin Name: removeunused
Plugin URI: https://www.linkedin.com/in/jamal1364/
Description: A Plugin For Remove Unused CSS JS Files in WordPress
Version: 1.0.0
Author: Sayyed Jamal Ghasemi
Author URI: https://www.linkedin.com/in/jamal1364/
License: 

*/
class removeunused{

    const domain ='removeunused' ;
    private $domain='removeunused';
    /**
     * removeunused constructor.
     */
    public function __construct(){
        /**
         * load text domain for translate
         */
        load_plugin_textdomain( 'removeunused', false, dirname( plugin_basename( __FILE__ ) ) . '/langs/' );
        /**
         * define constant
         */
        /**
         * load text domain for translate
         */
//load_plugin_textdomain( 'removeunused', false, dirname( plugin_basename( __FILE__ ) ) . '/langs/' );
        /**
         * define constant
         */
        defined( 'ABSPATH' ) || exit;
        define( 'removeunused_DIR', plugin_dir_path( __FILE__ ) );
        define( 'removeunused_url', plugin_dir_url( __FILE__ ) );
        define( 'removeunused_INC_DIR', trailingslashit( removeunused_DIR . 'inc' ) );
        define( 'removeunused_class_DIR', trailingslashit( removeunused_DIR . 'class' ) );
        define( 'removeunused_widget_DIR', trailingslashit( removeunused_DIR . 'widgets' ) );
        define( 'removeunused_js_DIR', trailingslashit( removeunused_DIR . 'js' ) );
        define( 'removeunused_js_url', trailingslashit( removeunused_url . 'js' ) );
        define( 'removeunused_jslang_DIR', trailingslashit( removeunused_DIR . 'jslang' ) );
        define( 'removeunused_jslang_url', trailingslashit( removeunused_url . 'jslang' ) );
        define( 'removeunused_minijs_DIR', trailingslashit( removeunused_DIR . 'minijs' ) );
        define( 'removeunused_minijs_url', trailingslashit( removeunused_url . 'minijs' ) );
        define( 'removeunused_less_DIR', trailingslashit( removeunused_DIR . 'less' ) );
        define( 'removeunused_css_DIR', trailingslashit( removeunused_DIR . 'css' ) );
        define( 'removeunused_fonts_DIR', trailingslashit( removeunused_DIR . 'fonts' ) );
        define( 'removeunused_img_DIR', trailingslashit( removeunused_DIR . 'img' ) );
        define( 'removeunused_img_url', trailingslashit( removeunused_url . 'img' ) );
        define( 'removeunusedTemplateUrl', trailingslashit( removeunused_url . 'template' ) );
        define( 'removeunusedTemplateDir', trailingslashit( removeunused_DIR . 'template' ) );
        define( 'vendor_DIR', trailingslashit( removeunused_DIR . 'vendor' ) );
        require_once vendor_DIR.'autoload.php';





        add_action('wp_enqueue_scripts', array($this,'register_scripts_and_styles'),1);
        add_action( 'admin_enqueue_scripts', array($this,'register_admin_scripts_and_styles'), 10000 );
        add_action( 'login_enqueue_scripts', [$this,'removeunusedLoginStylesheet'] );







    }


    function register_scripts_and_styles() {
        if (!is_admin()) {

        }
    }


    function register_admin_scripts_and_styles() {
        if (is_admin()) {

        }
    }

    public function activation(){

    }
    public function deactivation(){

    }
}

$removeunused=new removeunused();
