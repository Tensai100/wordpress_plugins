<?php
/*
Plugin Name: Formulos
Plugin URI: github.com/Tensai100/wordpress-myplugins
Description: Un plugin pour gérer vos formulaire
Version: 0.1
Author: BOUFARA Mustapha
Author URI: github.com/Tensai100/
License: GPL2
*/

// include_once("fromdb.php");

function theme_w3_toheader() {
    echo '<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">';
}
add_action('wp_head', 'theme_w3_toheader');


add_shortcode('formulos_form', 'formulos_form');
function formulos_form($atts, $content){
    include_once("fromdb.php");
    $atts = shortcode_atts( array(
        'method' => 'POST',
        'action' => get_site_url().'/wp-content/plugins/formulos/formulos.php'
    ), $atts );

    $method = $atts['method'];
    $action = $atts['action'];

    return "<form method='$method' action='".get_site_url()."/wp-content/plugins/formulos/$action'>".do_shortcode($content)."</form>";
}



add_shortcode('formulos_input', 'formulos_input');
function formulos_input($atts){
    $atts = shortcode_atts( array(
        'label' => 'name',
        'type' => 'text'
    ), $atts );

    $labelName = $atts['label'];
    $type = $atts['type'];

    return "<label>$labelName<input class='w3-input' type='$type' name='formulos_$labelName'/></label>";
}



add_shortcode('formulos_submit', 'formulos_submit');
function formulos_submit($atts){
    $atts = shortcode_atts( array(
        'value' => 'Valider',
    ), $atts );

    $value = $atts['value'];

    return "<input class='w3-input' type='submit' value='$value' />";
}

add_shortcode('formulos_button', 'formulos_button');
function formulos_button($atts){
    $atts = shortcode_atts( array(
        'value' => 'name',
        'color' => 'white'
    ), $atts );

    $color = $atts['color'];
    $value = $atts['value'];

    return "<button class='w3-btn w3-$color' >$value</button>";
}