<?php

/* function to add custom styles*/
require_once('wp-bootstrap-navwalker.php');
//add featured image
add_theme_support('post-thumbnails');
function Astyles(){
    wp_enqueue_style('myboots-css',get_template_directory_uri().'/css/bootstrap.min.css');
    wp_enqueue_style('myfonts-css',get_template_directory_uri().'/css/fontawesome.min.css');
    wp_enqueue_style('main-css',get_template_directory_uri().'/css/main.css');//Herererwr

}
 /* function to add custom scripts
*/
function Ascript(){//last true in (wp_enqueue_script) to display under body;
    wp_deregister_script('jquery');//remove jquery here from all
    wp_register_script('jquery', includes_url('/js/jquery/jquery.js',false, '', true));//register in footer
    wp_enqueue_script('jquery');//enqueue jquery to footer 
    wp_enqueue_script('myboots-js', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), false, true); 
    wp_enqueue_script('main-js', get_template_directory_uri().'/js/main.min.js', array(), false, true);

}
//add custom menu
function custom_menu(){
    register_nav_menus( array(
        'bootstrap-menu' => 'Navigation Bar',
        'footer_menu' => 'Footer Menu',
    ) );}
function display_menu(){

    wp_nav_menu(array(
        'theme_location'    => 'bootstrap-menu',
        'menu_class'        => 'nav navbar-dark bg-dark',
        'container'         => false,
        'depth'             => 2,
        'walker'            => new wp_bootstrap_navwalker()

    ));
}
function exrept_lengthv($lenght){
    if(is_author()){
        return 4 ;
    }
    elseif(is_category()){
        
        return 2;
    }
    else{
        return 10;
    }


}
add_action('excerpt_length','exrept_lengthv');

function exrept_morev($more){
    return '...';
}

add_action('excerpt_more','exrept_morev');

//add upper actions
add_action('wp_enqueue_scripts','Astyles');
add_action('wp_enqueue_scripts','Ascript');
//include navbar
add_action('init','custom_menu');

//numbering pagination
function numbering_pagination (){
     global $wp_query;//make WP_Query() global
     //max_num_pages [total number of pages]
     $all_pages=$wp_query->max_num_pages;
     //your current page
     $current_page= max(1, get_query_var('paged'));//get current page
     if ($all_pages > 1){//check number of pages
        $paginatlinksargs=array(
            'base'       =>   get_pagenum_link() . '%_%',
            'format'     => 'page/%#%',
            'current'    => $current_page,
            'total'      => $all_pages,// you can go without
            'mid_size'   =>1,//number before current page
        );
        return paginate_links($paginatlinksargs);

     }
}
//Register sidebar
function Dsidebar(){
    //main sidebar
   // $rsargs=array();
    register_sidebar( array (
        'name' => 'Main-sidebar', 
        'id' => 'main-sidebar',
        'description' => 'This is the Main sidebar',
        'before_widget' => '<div class="widget-content">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        'class' => 'main-sidebar'
    ));
}
add_action('widgets_init','Dsidebar');