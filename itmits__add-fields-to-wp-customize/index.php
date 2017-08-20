<?php
/*
Plugin Name: itmits - add fields to wp customize
Plugin URI: http://www.imthemanintheshower.com/add-fields-to-wp-customize
Description: add fields to wp customize
Version: 0.1
Author: imthemanintheshower
Author URI: http://www.imthemanintheshower.com
License: MIT - https://opensource.org/licenses/mit-license.php
*/
/*
Copyright 2017 iamthemanintheshower@gmail.com

Permission is hereby granted, free of charge, to any person obtaining a copy of 
this software and associated documentation files (the "Software"), to deal in 
the Software without restriction, including without limitation the rights to use, 
copy, modify, merge, publish, distribute, sublicense, and/or sell copies 
of the Software, and to permit persons to whom the Software is furnished 
to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in 
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, 
INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A 
PARTICULAR PURPOSE AND NONINFRINGEMENT. 
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, 
DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER 
DEALINGS IN THE SOFTWARE.
*/


function add_fields_to_wp_customize($wp_customize) {
    //*** CUSTOMIZE THIS PART: FROM HERE ******//
    //header
    $ary_fields[] = array('html_section' => 'header', 'code' => 'header_h1', 'label' => 'h1', 'section' => 'title_tagline');
    $ary_fields[] = array('html_section' => 'header', 'code' => 'header_h1_content', 'label' => 'h1_content', 'section' => 'title_tagline', 'type' => 'textarea');
    //*** CUSTOMIZE THIS PART: TO HERE ******//

    foreach ($ary_fields as $f){
        $wp_customize->add_setting( $f['code'], array( 'default' => '', 'capability' => 'edit_theme_options' ) );
        if(isset($f['type']) && $f['type'] !== ''){ $type = $f['type']; }else{ $type = 'text'; }
        $wp_customize->add_control( $f['code'], array( 'label' => $f['html_section'].': '.$f['label'], 'section' => $f['section'], 'type' => $type ) );
    }
}
add_action('customize_register', 'add_fields_to_wp_customize');


function print_field($section, $id_field){
    echo get_theme_mod($section.'_'.$id_field);
}