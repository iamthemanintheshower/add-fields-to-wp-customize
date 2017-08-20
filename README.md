# add-fields-to-wp-customize
This plugin is intended to be used my WP programmers that need to save time when builing themes and add fields in WP customize.

Install the plugin and print values in your theme by using this code


$section = 'section_name'; //change "section_name" with the name of your section

$field_id = 'field_id'; //change "field_id" with the id of your field

echo print_field($section, 'box2');


I'll publish example themes soon.

# TODO
- manage different sections
- explain what this plugin can do with screenshots and example themes
