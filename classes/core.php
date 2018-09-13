<?php
/**
 * Created by PhpStorm.
 * User: ghasemi
 * Date: 9/13/2018
 * Time: 10:27 AM
 */

namespace removeunused;


class core{

    function ru_filter_scripts(){

        $this->removejs("bbpress-editor");

        // Device Pixels support
        // This improves the resolution of gravatars and wordpress.com uploads on hi-res and zoomed browsers. We only have gravatars so we should be ok without it.
        $this->removejs("devicepx");

        if( !is_singular( 'docs' ) ){
            // the table of contents plugin is being used on documentation pages only
            $this->removejs("toc-front");
        }

        if( !is_singular( array('docs', 'post' ) ) ){
            $this->removejs("codebox");
        }

        if(is_page(425)){

            $this->removejs("comment-reply");
        }

    }

    private function removejs($handle){
        wp_deregister_script($handle);
        wp_dequeue_script($handle);
    }
    private function removestyle($handle){
        wp_deregister_style($handle);
        wp_dequeue_style($handle);
    }


    function ru_remove_jetpack(){
        return false;
    }

    function ru_filter_styles(){
        //no more bbpress styles.
        $this->removestyle("bbp-default");

        // download monitor is not used in the front-end.
        $this->removestyle("wp_dlmp_styles");

        if( !is_singular( 'docs' ) ){
            // the table of contents plugin is being used on documentation pages only
            $this->removestyle("toc-screen");
        }

        if ( !( is_page( 'account' ) || is_page( 'edit-profile' )) ){
            // this should not be like this. Need to look into it.
            $this->removestyle("wppb_stylesheet");
        }

        if( !is_singular( array('docs', 'post' ) ) ){
            $this->removestyle("codebox");
        }
    }

    function ru_list_assets(){
        if ( !current_user_can('delete_users') ){
            return;
        }

        echo '<h2>List of all scripts loaded on this particular page.</h2>';
        echo '<p>This can differ from page to page depending of what is loaded in that particular page.</p>';

        // Print all loaded Scripts (JS)
        global $wp_scripts;
        $this->ru_print_assets($wp_scripts);

        echo '<h2>List of all css styles loaded on this particular page.</h2>';
        echo '<p>This can differ from page to page depending of what is loaded in that particular page.</p>';
        // Print all loaded Styles (CSS)
        global $wp_styles;
        $this->ru_print_assets($wp_styles);
    }

    function ru_print_assets($wp_asset){
        $nb_of_asset = 0;
        foreach( $wp_asset->queue as $asset ) :
            $nb_of_asset ++;
            $asset_obj = $wp_asset->registered[$asset];
            $this->ru_asset_template($asset_obj, $nb_of_asset);
        endforeach;
    }

    function ru_asset_template($asset_obj, $nb_of_asset){
        if( is_object( $asset_obj ) ){
            echo '<div class="ru_asset" style="padding: 2rem; font-size: 0.8rem; border-bottom: 1px solid #ccc;">';

            echo '<div class="ru_asset_nb"><span style="width: 150px; display: inline-block">Number:</span>';
            echo $nb_of_asset . '</div>';


            echo '<div class="ru_asset_handle"><span style="width: 150px; display: inline-block">Handle:</span>';
            echo $asset_obj->handle . '</div>';

            echo '<div class="ru_asset_src"><span style="width: 150px; display: inline-block">Source:</span>';
            echo $asset_obj->src . '</div>';

            echo '<div class="ru_asset_deps"><span style="width: 150px; display: inline-block">Dependencies:</span>';
            foreach( $asset_obj->deps as $deps){
                echo $deps . ' / ';
            }
            echo '</div>';

            echo '<div class="ru_asset_ver"><span style="width: 150px; display: inline-block">Version:</span>';
            echo $asset_obj->ver . '</div>';

            echo '</div>';

        }
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