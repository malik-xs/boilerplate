<?php 

// vars
$prefix = 'acf_fields[' . $field['ID'] . ']';
$id = acf_idify( $prefix );

// add prefix
$field['prefix'] = $prefix;

// div
$div = array(
	'class' 	=> 'acf-field-object acf-field-object-' . acf_slugify($field['type']),
	'data-id'	=> $field['ID'],
	'data-key'	=> $field['key'],
	'data-type'	=> $field['type'],
);

$meta = array(
	'ID'			=> $field['ID'],
	'key'			=> $field['key'],
	'parent'		=> $field['parent'],
	'menu_order'	=> $i,
	'save'			=> ''
);

?>
<div <?php echo acf_esc_attr( $div ); ?>>
	
	<div class="meta">
		<?php foreach( $meta as $k => $v ):
			acf_hidden_input(array( 'name' => $prefix . '[' . $k . ']', 'value' => $v, 'id' => $id . '-' . $k ));
		endforeach; ?>
	</div>
	
	<div class="handle">
		<ul class="acf-hl acf-tbody">
			<li class="li-field-order">
				<span class="acf-icon acf-sortable-handle" title="<?php _e('Drag to reorder','boilerplate'); ?>"><?php echo ($i + 1); ?></span>
			</li>
			<li class="li-field-label">
				<strong>
					<a class="edit-field" title="<?php _e("Edit field",'boilerplate'); ?>" href="#"><?php echo acf_get_field_label($field, 'admin'); ?></a>
				</strong>
				<div class="row-options">
					<a class="edit-field" title="<?php _e("Edit field",'boilerplate'); ?>" href="#"><?php _e("Edit",'boilerplate'); ?></a>
					<a class="duplicate-field" title="<?php _e("Duplicate field",'boilerplate'); ?>" href="#"><?php _e("Duplicate",'boilerplate'); ?></a>
					<a class="move-field" title="<?php _e("Move field to another group",'boilerplate'); ?>" href="#"><?php _e("Move",'boilerplate'); ?></a>
					<a class="delete-field" title="<?php _e("Delete field",'boilerplate'); ?>" href="#"><?php _e("Delete",'boilerplate'); ?></a>
				</div>
			</li>
			<?php // whitespace before field name looks odd but fixes chrome bug selecting all text in row ?>
			<li class="li-field-name"> <?php echo $field['name']; ?></li>
			<li class="li-field-key"> <?php echo $field['key']; ?></li>
			<li class="li-field-type"> <?php echo acf_get_field_type_label($field['type']); ?></li>
		</ul>
	</div>
	
	<div class="settings">			
		<table class="acf-table">
			<tbody class="acf-field-settings">
				<?php 
				
				// label
				acf_render_field_setting($field, array(
					'label'			=> __('Field Label','boilerplate'),
					'instructions'	=> __('This is the name which will appear on the EDIT page','boilerplate'),
					'name'			=> 'label',
					'type'			=> 'text',
					'class'			=> 'field-label'
				), true);
				
				
				// name
				acf_render_field_setting($field, array(
					'label'			=> __('Field Name','boilerplate'),
					'instructions'	=> __('Single word, no spaces. Underscores and dashes allowed','boilerplate'),
					'name'			=> 'name',
					'type'			=> 'text',
					'class'			=> 'field-name'
				), true);
				
				
				// type
				acf_render_field_setting($field, array(
					'label'			=> __('Field Type','boilerplate'),
					'instructions'	=> '',
					'type'			=> 'select',
					'name'			=> 'type',
					'choices' 		=> acf_get_grouped_field_types(),
					'class'			=> 'field-type'
				), true);
				
				
				// instructions
				acf_render_field_setting($field, array(
					'label'			=> __('Instructions','boilerplate'),
					'instructions'	=> __('Instructions for authors. Shown when submitting data','boilerplate'),
					'type'			=> 'textarea',
					'name'			=> 'instructions',
					'rows'			=> 5
				), true);
				
				
				// required
				acf_render_field_setting($field, array(
					'label'			=> __('Required?','boilerplate'),
					'instructions'	=> '',
					'type'			=> 'true_false',
					'name'			=> 'required',
					'ui'			=> 1,
					'class'			=> 'field-required'
				), true);
				
				
				// 3rd party settings
				do_action('acf/render_field_settings', $field);
				
				
				// type specific settings
				do_action("acf/render_field_settings/type={$field['type']}", $field);
				
				
				// conditional logic
				acf_get_view('field-group-field-conditional-logic', array( 'field' => $field ));
				
				
				// wrapper
				acf_render_field_wrap(array(
					'label'			=> __('Wrapper Attributes','boilerplate'),
					'instructions'	=> '',
					'type'			=> 'number',
					'name'			=> 'width',
					'prefix'		=> $field['prefix'] . '[wrapper]',
					'value'			=> $field['wrapper']['width'],
					'prepend'		=> __('width', 'boilerplate'),
					'append'		=> '%',
					'wrapper'		=> array(
						'data-name' => 'wrapper',
						'class' => 'acf-field-setting-wrapper'
					)
				), 'tr');
				
				acf_render_field_wrap(array(
					'label'			=> '',
					'instructions'	=> '',
					'type'			=> 'text',
					'name'			=> 'class',
					'prefix'		=> $field['prefix'] . '[wrapper]',
					'value'			=> $field['wrapper']['class'],
					'prepend'		=> __('class', 'boilerplate'),
					'wrapper'		=> array(
						'data-append' => 'wrapper'
					)
				), 'tr');
				
				acf_render_field_wrap(array(
					'label'			=> '',
					'instructions'	=> '',
					'type'			=> 'text',
					'name'			=> 'id',
					'prefix'		=> $field['prefix'] . '[wrapper]',
					'value'			=> $field['wrapper']['id'],
					'prepend'		=> __('id', 'boilerplate'),
					'wrapper'		=> array(
						'data-append' => 'wrapper'
					)
				), 'tr');
				
				?>
				<tr class="acf-field acf-field-save">
					<td class="acf-label"></td>
					<td class="acf-input">
						<ul class="acf-hl">
							<li>
								<a class="button edit-field" title="<?php _e("Close Field",'boilerplate'); ?>" href="#"><?php _e("Close Field",'boilerplate'); ?></a>
							</li>
						</ul>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	
</div>