<?php
/**
 * Created by PhpStorm.
 * User: ghasemi
 * Date: 9/13/2018
 * Time: 10:04 AM
 */

namespace removeunused;


class hooks{
    public function __construct(){
        $core = new core();
        add_action('wp_enqueue_scripts', [$core,'register_scripts_and_styles'],1);
        add_action( 'admin_enqueue_scripts', [$core,'register_admin_scripts_and_styles'], 10000 );
        add_action( 'login_enqueue_scripts', [$core,'removeunusedLoginStylesheet'] );


        // remove script handles we don't need, each with their own conditions

        add_action('wp_print_scripts', [$core,'ru_filter_scripts'], 100000);
        add_action('wp_print_footer_scripts',  [$core,'ru_filter_scripts'], 100000);



        // Jetpack
        add_action('jetpack_implode_frontend_css', [$core,'ru_remove_jetpack']);




        // remove styles we don't need
        add_action('wp_print_styles', [$core,'ru_filter_styles'], 100000);
        add_action('wp_print_footer_scripts', [$core,'ru_filter_styles'], 100000);





        // list loaded assets by our theme and plugins so we know what we're dealing with. This is viewed by admin users only.
        add_action('wp_print_footer_scripts', [$core,'ru_list_assets'], 900000);
    }

}