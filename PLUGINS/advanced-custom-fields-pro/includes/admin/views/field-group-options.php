<?php

// global
global $field_group;
		
		
// active
acf_render_field_wrap(array(
	'label'			=> __('Active','boilerplate'),
	'instructions'	=> '',
	'type'			=> 'true_false',
	'name'			=> 'active',
	'prefix'		=> 'acf_field_group',
	'value'			=> $field_group['active'],
	'ui'			=> 1,
	//'ui_on_text'	=> __('Active', 'acf'),
	//'ui_off_text'	=> __('Inactive', 'acf'),
));


// style
acf_render_field_wrap(array(
	'label'			=> __('Style','boilerplate'),
	'instructions'	=> '',
	'type'			=> 'select',
	'name'			=> 'style',
	'prefix'		=> 'acf_field_group',
	'value'			=> $field_group['style'],
	'choices' 		=> array(
		'default'			=>	__("Standard (WP metabox)",'boilerplate'),
		'seamless'			=>	__("Seamless (no metabox)",'boilerplate'),
	)
));


// position
acf_render_field_wrap(array(
	'label'			=> __('Position','boilerplate'),
	'instructions'	=> '',
	'type'			=> 'select',
	'name'			=> 'position',
	'prefix'		=> 'acf_field_group',
	'value'			=> $field_group['position'],
	'choices' 		=> array(
		'acf_after_title'	=> __("High (after title)",'boilerplate'),
		'normal'			=> __("Normal (after content)",'boilerplate'),
		'side' 				=> __("Side",'boilerplate'),
	),
	'default_value'	=> 'normal'
));


// label_placement
acf_render_field_wrap(array(
	'label'			=> __('Label placement','boilerplate'),
	'instructions'	=> '',
	'type'			=> 'select',
	'name'			=> 'label_placement',
	'prefix'		=> 'acf_field_group',
	'value'			=> $field_group['label_placement'],
	'choices' 		=> array(
		'top'			=>	__("Top aligned",'boilerplate'),
		'left'			=>	__("Left aligned",'boilerplate'),
	)
));


// instruction_placement
acf_render_field_wrap(array(
	'label'			=> __('Instruction placement','boilerplate'),
	'instructions'	=> '',
	'type'			=> 'select',
	'name'			=> 'instruction_placement',
	'prefix'		=> 'acf_field_group',
	'value'			=> $field_group['instruction_placement'],
	'choices' 		=> array(
		'label'		=>	__("Below labels",'boilerplate'),
		'field'		=>	__("Below fields",'boilerplate'),
	)
));


// menu_order
acf_render_field_wrap(array(
	'label'			=> __('Order No.','boilerplate'),
	'instructions'	=> __('Field groups with a lower order will appear first','boilerplate'),
	'type'			=> 'number',
	'name'			=> 'menu_order',
	'prefix'		=> 'acf_field_group',
	'value'			=> $field_group['menu_order'],
));


// description
acf_render_field_wrap(array(
	'label'			=> __('Description','boilerplate'),
	'instructions'	=> __('Shown in field group list','boilerplate'),
	'type'			=> 'text',
	'name'			=> 'description',
	'prefix'		=> 'acf_field_group',
	'value'			=> $field_group['description'],
));


// hide on screen
$choices = array(
	'permalink'			=>	__("Permalink", 'boilerplate'),
	'the_content'		=>	__("Content Editor",'boilerplate'),
	'excerpt'			=>	__("Excerpt", 'boilerplate'),
	'custom_fields'		=>	__("Custom Fields", 'boilerplate'),
	'discussion'		=>	__("Discussion", 'boilerplate'),
	'comments'			=>	__("Comments", 'boilerplate'),
	'revisions'			=>	__("Revisions", 'boilerplate'),
	'slug'				=>	__("Slug", 'boilerplate'),
	'author'			=>	__("Author", 'boilerplate'),
	'format'			=>	__("Format", 'boilerplate'),
	'page_attributes'	=>	__("Page Attributes", 'boilerplate'),
	'featured_image'	=>	__("Featured Image", 'boilerplate'),
	'categories'		=>	__("Categories", 'boilerplate'),
	'tags'				=>	__("Tags", 'boilerplate'),
	'send-trackbacks'	=>	__("Send Trackbacks", 'boilerplate'),
);
if( acf_get_setting('remove_wp_meta_box') ) {
	unset( $choices['custom_fields'] );	
}

acf_render_field_wrap(array(
	'label'			=> __('Hide on screen','boilerplate'),
	'instructions'	=> __('<b>Select</b> items to <b>hide</b> them from the edit screen.','boilerplate') . '<br /><br />' . __("If multiple field groups appear on an edit screen, the first field group's options will be used (the one with the lowest order number)",'boilerplate'),
	'type'			=> 'checkbox',
	'name'			=> 'hide_on_screen',
	'prefix'		=> 'acf_field_group',
	'value'			=> $field_group['hide_on_screen'],
	'toggle'		=> true,
	'choices' 		=> $choices
));


// 3rd party settings
do_action('acf/render_field_group_settings', $field_group);
		
?>
<div class="acf-hidden">
	<input type="hidden" name="acf_field_group[key]" value="<?php echo $field_group['key']; ?>" />
</div>
<script type="text/javascript">
if( typeof acf !== 'undefined' ) {
		
	acf.newPostbox({
		'id': 'acf-field-group-options',
		'label': 'left'
	});	

}
</script>