<?php
//  ----------------   intial enqueue of childtheme ----------------
function my_theme_enqueue_styles() {
  // This is the parent style handle name. Recommended to leave as it is.
  $parent_style = 'parent-style';

  wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'child-style',
    get_stylesheet_directory_uri() . '/style.css',
    array( $parent_style ),
    wp_get_theme()->get('')  //must match childtheme version if uses
  );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


//  ----------------   enqueue custom jquery file for childtheme ----------------
function add_my_jquery () {
wp_register_script ('paulScript', get_stylesheet_directory_uri() . '/js/paul_custom.js', array('jquery'), '1.1', true);
wp_enqueue_script ('paulScript');
}
add_action( 'wp_enqueue_scripts', 'add_my_jquery');



//  ----------------   enqueue Greensock TweenMax for childtheme ----------------

function add_my_greensock () {
wp_register_script ('greenScript', get_stylesheet_directory_uri() . '/greensock/TweenMax.min.js', array('jquery'), '', true);
wp_enqueue_script ('greenScript');
}
add_action( 'wp_enqueue_scripts', 'add_my_greensock');

//  ----------------   enqueue ScrollMagic for childtheme ----------------

function add_my_scrollmagic () {
wp_register_script ('scrollMagicScript', get_stylesheet_directory_uri() . '/scrollmagic/ScrollMagic.min.js', array(), '', true);
wp_enqueue_script ('scrollMagicScript');
}
add_action( 'wp_enqueue_scripts', 'add_my_scrollmagic');

//  ----------------   enqueue scrollmagic add-indicators plugin for childtheme ----------------


function add_my_indicators () {
wp_register_script ('indicatorsMagicScript', get_stylesheet_directory_uri() . '/scrollmagic/debug.addIndicators.min.js', array(), '', true);
wp_enqueue_script ('indicatorsMagicScript');
}
add_action( 'wp_enqueue_scripts', 'add_my_indicators');

//  ----------------   enqueue gsap for ScrollmMgic plugin ----------------

function add_my_gsapMagic () {
wp_register_script ('gsapMagicScript', get_stylesheet_directory_uri() . '/scrollmagic/animation.gsap.min.js', array(), '', true);
wp_enqueue_script ('gsapMagicScript');
}
add_action( 'wp_enqueue_scripts', 'add_my_gsapMagic');



//   ----------------   ALLOW SVG UPLOADS ---------------

function svg_mime_types( $mimes ) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;}
add_filter( 'upload_mimes', 'svg_mime_types' );  // allows SVG uploads
