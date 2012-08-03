<div class="wrap wlcms_wrap">
<h2>White Label CMS Settings</h2>
 
<div class="wlcms_opts">
 
<form method="post" enctype="multipart/form-data">
<input type="hidden" name="wlcms_" value="<?php echo WLCMS; ?>" />
<?php foreach ($wlcmsOptions as $value) {
switch ( $value['type'] ) {
 
case "open":
?>
 
<?php break;
 
 case "closeonce":
?>
 
</div>

 
<?php break;

case "close":
?>
 
</div>
</div>
<br />

 
<?php break;

case "menus":

global $menu, $submenu;
	
//echo '<pre>';print_r($menu); print_r($submenu);
 

echo '<ul id="menus">';

	foreach($menu as $m_key => $menu_item):
		
		if(!$menu_item[0]) { continue; }
		
		echo '<li><strong><input type="checkbox" value="1" name="wlcms_o_hide_menu_'.$m_key.'" '.( get_option( 'wlcms_o_hide_menu_'.$m_key ) ? 'checked="checked" ' : '' ).' /> <span>'.$menu_item[0] . ' <em></em></span> </strong>';
		
			if( isset( $submenu[ $menu_item[2] ] ) ):
				
				echo '<ul >';
			
				foreach($submenu[ $menu_item[2] ] as $sm_key => $submenu_item):
				
					echo '<li><input type="checkbox"  value="1"  name="wlcms_o_hide_submenu_'.$m_key .'_'.$sm_key.'" '. ( get_option( 'wlcms_o_hide_submenu_'.$m_key .'_'.$sm_key ) ? 'checked="checked" ' : '') .'/> '.$submenu_item[0].'</li>';	
				
				endforeach;		
			
				echo '</ul>';
				
			endif;
				
		
		echo '</li>';


	endforeach;
	
echo '</ul>';
 
?>
		 
	
<?php

break;
 
case "title":
?>
<p><strong>For a detailed explanation of the plugin please refer to the official <a href="http://www.videousermanuals.com/white-label-cms/?utm_source=wlcmsplugin&amp;utm_medium=wpplugin&amp;utm_campaign=wlcmshelppage" target="_blank">help page</a>.</strong></p>

<p><em>Please Note:</em> For any images, if you just put the file name, the image will come from the images directory of your theme/child theme. Use the full url if the image comes from another site. If you upload a image, make sure you click "Use This Image"</p> 
  
<?php break;
 
case 'text':
?>
<?php if ($value['id']=='wlcms_o_header_custom_logo' || $value['id']=='wlcms_o_footer_custom_logo' )  {  ?>

<div style="border:0;" class="wlcms_input wlcms_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" class="<?php echo $value['class']; ?>" title="<?php echo $value['title']; ?>"/><?php echo $value['unit']?>
 <small><?php echo $value['desc']; ?></small>
<div class="clearfix"></div>
 
 </div>
 
<?php } else {       ?>
<div class="wlcms_input wlcms_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
 	<input 
 		name="<?php echo $value['id']; ?>" 
 		id="<?php echo $value['id']; ?>" 
 		type="<?php echo $value['type']; ?>" 
 		value="<?php 	if ( get_option( $value['id'] ) != "") 
 						{ echo stripslashes(get_option( $value['id'])  ); } 
 						else 
 						{ echo $value['std']; } ?>" 
		class="<?php echo (isset($value['class']) ? $value['class'] : '' ); ?>"
		title="<?php echo (isset($value['title']) ? $value['title'] : '' ); ?>" />
		<?php echo (isset($value['unit']) ? $value['unit'] : '' );?>
		
 	<small><?php echo $value['desc']; ?></small>
 	<div class="clearfix"></div>
 
 </div>

<?php }  ?>
 <?php break;
////////////////////////////////////////////////////////////////////////////////************************************************************************//
case 'textcustom':
?>

<div class="wlcms_input wlcms_text">
	
	<label for="<?php echo $value['id']; ?>" title="CSS filename relative from <?php echo get_stylesheet_directory_uri();?>/" ><?php echo $value['name']; ?>   </label>
 	
 	<input 
 		name="<?php echo $value['id']; ?>" 
 		id="<?php echo $value['id']; ?>" 
 		type="<?php echo $value['type']; ?>" 
 		value="<?php if ( get_option( $value['id'] ) != "") 
 			{ echo stripslashes(get_option( $value['id'])  ); } 
 			else 
 			{ echo $value['std']; } ?>" 
 				
		class="<?php echo (isset($value['class']) ? $value['class'] : '' ); ?>" 
		title="<?php echo (isset($value['title']) ? $value['title'] : '' ); ?>"/> 
 
 <?php echo (isset($value['unit']) ? $value['unit'] : '' );?>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>


 <?php break;
//********************************************************************/////////////////////////////////////////////////////////////////////////////////////
 
  case "file":
?>

<div class="wlcms_input wlcms_file">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>"/>
 	<input name="upload_image_button" type="button" value="Upload" rel="<?php echo $value['id']; ?>" class="<?php echo $value['class']; ?>"/>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>

</div> 
 <?php
break;

case "import_file":
?>
	<div class="wlcms_input import_file">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="file" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>"/>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>

</div> 
<?php 	
break;
	
/******************************************************************/
case "button":
?>

<div class="wlcms_input wlcms_file">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	
 	<input name="export_button" type="submit" value="Export" class="<?php echo $value['class']; ?>"/>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>


</div> 
 <?php
break;

/*******************************************************************/
 case 'textlocalvideo':
?>

<div class="wlcms_input_local_video wlcms_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
  <?php break;
 case 'message':
?>
<div class="wlcms_input_message wlcms_text">
	<div id="icon-users" class="wlcms-icon32"><br></div><?php echo $value['name']; ?>
 </div>
<?php
break;

case 'message2':
?>
<div class="wlcms_input_message wlcms_text">
	<div id="icon-themes" class="wlcms-icon32"><br></div><?php echo $value['name']; ?>
 </div>
<?php
break;
/*************************************/
case 'message3':
?>
<div class="wlcms_input_message1 wlcms_text">
	<?php echo $value['name']; ?>
 </div>
<?php
break;
/*************************************/
 
case 'textarea':
?>

<div class="wlcms_input_welcome_last wlcms_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
  
<?php
break;
 
case 'select':
?>

<div class="wlcms_input wlcms_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<option value="0">choose a role</option>
<?php foreach ($value['options'] as $role => $option) { ?>
		<option value="<?php echo $role;?>"<?php if (get_option( $value['id'] ) == $role) { echo 'selected="selected"'; } elseif ($role==$value['std']) {echo 'selected="selected"';} ?>><?php echo $option; ?></option><?php } ?>
</select>

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;
//////////////////////////////////////////////////
 case 'selectnew':
?>
<div class="wlcms_optsnew">
<div class="wlcms_input wlcms_select">
	<label for="<?php echo $value['idname']; ?>"><?php echo $value['name']; ?></label>
<span class="lineup"><input name="<?php echo $value['idname']; ?>" id="<?php echo $value['idname']; ?>" type="text" value="<?php if ( get_option( $value['idname'] ) != "") { echo stripslashes(get_option( $value['idname'])  ); } else { echo $value['std']; } ?>" />	<br />
<?php echo $value['label']; ?><br />
<select name="<?php echo $value['idlabel']; ?>" id="<?php echo $value['idlabel']; ?>">
<?php foreach ($value['options'] as $role => $option) { ?>
		<option value="<?php echo $role;?>"<?php if (get_option( $value['idlabel'] ) == $role) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>
<br />
<input name="add_button" type="submit" value="add" class="<?php echo $value['class']; ?>"/></span>	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
</div>
<?php
break;
case 'selectnewnew':
?>
<div class="wlcms_optsnew">
<div class="wlcms_input wlcms_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>


<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $role => $option) { ?>
		<option value="<?php echo $role;?>"<?php if (get_option( $value['id'] ) == $role) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>

<input name="delete_button" OnClick="javascript:return confirm('<?php _e('WARNING! Deleting a role can have severe consequences, proceed only if you know what you are doing.','wlcms')?>');" type="submit" value="delete" class="<?php echo $value['class']; ?>"/>	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
</div>
<?php
break;



 case "headings":
?>
<label id="<?php echo (isset($value['id']) ? $value['id'] : '' ); ?>"><?php echo $value['heading']; ?> </label>
<small><?php echo (isset($value['desc']) ?  $value['desc'] : '' ); ?></small><div class="clearfix"></div>
<?php
break;
///////////////////////////////////////////////////
 case "checkboxlast":
 case "checkbox":
?>

<div class="<?php if($value['type']  == 'checkbox') { echo 'wlcms_input_local_video'; } else { echo 'wlcms_checkbox_last'; }?> wlcms_checkbox">

	<label id="<?php echo $value['id']; ?>" class="<?php echo (!empty($value['class'])?$value['class']:'');?>"><?php echo (isset($value['name']) ? $value['name'] : ''); ?></label>
	
<?php
if(get_option($value['id']))
    {  
        $checked = "checked=\"checked\""; $remChecked = 'wlcms_remChecked';
    }
elseif ( ( ! get_option( 'wlcms_o_ver' ) ) && ($value['std'] == '1') )
    {   
        $checked = "checked=\"checked\"";
        $remChecked = 'wlcms_remChecked';
    }
else
    {
        $checked = '';
        $remChecked = '';
    }
?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> class="<?php echo $remChecked; ?>" />
<?php echo (isset($value['label']) ? $value['label'] : '' ); ?>


	<small><?php echo ( isset($value['desc'] ) ? $value['desc'] : '' ); ?></small><div class="clearfix"></div>
 </div>
 <?php
break;



case "divopen":
?>
<div id="<?php echo $value['id']; ?>" class="<?php echo $value['class']; ?>">
<?php
break;

case "divclose":
?>
</div>
<?php
break;
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
case "checkboxnewnew":
?>

<div class="<?php if($value['type']  == 'checkbox') { echo 'wlcms_input_local_video'; } else { echo 'wlcms_checkbox_last'; }?> wlcms_checkbox">

	
	
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; $remChecked = 'wlcms_remChecked'; }else{ $checked = ""; $remChecked = '';} ?>


<table>
<?php 
echo $value['options'];
?></table>

	<small><?php echo (isset($value['desc']) ? $value['desc'] : '' ); ?></small><div class="clearfix"></div>
 </div>
 <?php
break;
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
case "checkboxlastv3":
	// only show if version 3 of WordPress or above
	global $wp_version;
	if (substr($wp_version,0,3) < 3) {
		echo '<div class="wlcms_checkbox_last wlcms_checkbox">';
		echo '<input type="hidden" name="' . $value['id'] . '" id="' . $value['id'] . '" value="" />';
		echo '<div class="clearfix"></div>';
		echo '</div>';
	} else {
		
		?>
<div class="<?php if($value['type']  == 'checkbox') { echo 'wlcms_input_local_video'; } else { echo 'wlcms_checkbox_last'; }?> wlcms_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; $remChecked = 'wlcms_remChecked'; }else{ $checked = ""; $remChecked = '';} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> class="<?php echo $remChecked; ?>" />

<?php echo (isset($value['label']) ? $value['label'] : '' ); ?>
	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php 
	}
break; 
case "radio":
?>

<div class="wlcms_input wlcms_radio" <?php if($value['id'] == 'wlcms_o_show_welcome') { echo ' id="form-show-welcome" '; }?>
<?php if($value['id'] == 'wlcms_o_editor_template_access') { echo ' id="form-show-template" '; }?>>
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

<?php 
$counter = 1; 
foreach ($value['options'] as $option) { ?>
	<?php $checked=''; if( ( get_option($value['id']) || get_option($value['id']) == '0' ) && (get_option($value['id']) ==  $option)){ $checked = "checked=\"checked\""; }elseif( (! get_option($value['id']) ) && $option == $value['std']){ $checked = "checked=\"checked\""; } else { $checked = ""; } ?>
	<label class="radioyesno"> <?php  if ($counter == 1) { echo 'Yes '; } else { echo 'No '; } ?><input type="radio" name="<?php echo $value['id']; ?>" class="<?php echo $value['id']; ?>" value="<?php echo $option; ?>" <?php echo $checked; ?> /></label>
<?php
$counter++;
}
?>

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break; 
/************************************************/
case "radionew":
?>

<div class="wlcms_radioinput wlcms_radio" <?php if($value['id'] == 'wlcms_o_show_welcome') { echo ' id="form-show-welcome" '; }?> >
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

<?php 
$counter = 1;
foreach ($value['options'] as $option) { ?>
	<?php if(get_option($value['id']) ==  $option){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
	<label class="radioyesno"><?php if ($counter == 1) { echo 'Yes '; } else { echo 'No '; } ?><input type="radio" name="<?php echo $value['id']; ?>" class="<?php echo $value['id']; ?>" value="<?php echo $option; ?>" <?php echo $checked; ?> /></label>
<?php
$counter++;
}
?>

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break; 
/************************************************/
case "radioprofile":
?>

<div class="wlcms_input_profile" <?php if($value['id'] == 'wlcms_o_show_welcome') { echo ' id="form-show-welcome" '; }?> >
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

<?php 
$counter = 1;
foreach ($value['options'] as $option) { ?>
		<?php 
			switch ($counter) {
				case 1:
					$profileName = 'Custom';
					if(get_option($value['id']) ==  1){ $checked = "checked=\"checked\""; }else{ $checked = ""; }
					break;
				case 2:
					$profileName = 'Website';
					if(get_option($value['id']) ==  2){ $checked = "checked=\"checked\""; }else{ $checked = ""; }
					break;
				case 3:
					$profileName = 'Blog';
					if(get_option($value['id']) ==  3){ $checked = "checked=\"checked\""; }else{ $checked = ""; }					
					break;
			}		
		?>
		<label class="radio<?php echo $profileName;?>"><?php echo $profileName;?><input type="radio" name="wlcms_o_radio_profiles" class="<?php echo $value['id']; ?>" value="<?php echo $counter; ?>" <?php echo $checked; ?> id="radio<?php echo $profileName; ?>" /></label>
<?php
$counter++;
}
?>

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div> 
<?php break; 


case "subtitle":
?>
	<div class="wlcms_section">
		<div class="wlcms_subtitle">
			<h3><?php echo $value['name']; ?></h3>
			<div class="clearfix"></div>
		</div>
	</div>
<?php 
break;
case "section":

$i++;

?>

<div class="wlcms_section">
<div class="wlcms_title"><h3><img src="<?php echo plugins_url('images/trans.png', dirname(__FILE__)); ?>" class="inactive" alt=""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
</span><div class="clearfix"></div></div>
<div class="wlcms_options" style="display: none;">

 
<?php break;
case "subsection":
?>
<div id="v<?php echo str_replace(" ", "", $value['name']); ?>" class="video-h">
<h4><?php echo $value['name']; ?> <span class="submit"><input type="submit" value="clear" onclick="clearvid('v<?php echo str_replace(" ", "", $value['name']); ?>');return false;" /></span></h4>
<div class="clearfix"></div>


<?php break;
case "subsectionvars":
?>
<div id="v<?php echo str_replace(" ", "", $value['name']); ?>" class="video-h">
<h4><?php echo $value['name']; ?></h4>
<div class="clearfix"></div>
 
<?php break;
 
}
}
?>
 
<input type="hidden" name="action" value="save" />
</form>
 </div> 
 
<form method="post" style="margin-top:15px;">
<p class="submit" id="wlcm-reset">
Click here to reset the plugin: 
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />

</p>
</form> 

<?php 
if (!get_option('wpm_o_user_id')):
?>
 <p>This plugin is brought to you by the: <a href="http://www.videousermanuals.com/white-label-cms/?utm_source=wlcmsplugin&amp;utm_medium=wpplugin&amp;utm_campaign=wlcmbrought">WordPress User Manual Plugin</a> from <a href="http://www.videousermanuals.com/white-label-cms/?utm_source=wlcmsplugin&amp;utm_medium=wpplugin&amp;utm_campaign=wlcmscom">videousermanuals.com</a>.</p>

<a href="http://www.videousermanuals.com/?utm_source=wlcmsplugin&amp;utm_medium=wpplugin&amp;utm_campaign=wlcmsad"> <img src="<?php echo plugins_url('images/wlcms-plugin-advert.jpg', dirname(__FILE__)); ?>"></a>
<?php
endif;
?>
</div>

    <script type="text/javascript">
jQuery(document).ready(function($) {
		// Upload function goes here

		jQuery('.upload_image_button').click(function() {
		formField = jQuery(this).attr('rel');
		tb_show('', 'media-upload.php?type=image&wlcms=true&TB_iframe=true');
		return false;
		});

		window.send_to_editor = function(html) {
		imgurl = jQuery('img',html).attr('src');
		jQuery('#'+formField).val(imgurl);
		tb_remove();
		}



	var formfield=null;
	window.original_send_to_editor = window.send_to_editor;
	window.send_to_editor = function(html){
		if (formfield) {
			var fileurl = jQuery('img',html).attr('src');
			formfield.val(fileurl);
			tb_remove();
		} else {
			window.original_send_to_editor(html);
		}
		formfield=null;
	};

	jQuery('.lu_upload_button').click(function() {
 		formfield = jQuery(this).parent().parent().find(".text_input");
 		tb_show('', 'media-upload.php?type=image&wlcms=true&TB_iframe=true');
		jQuery('#TB_overlay,#TB_closeWindowButton').bind("click",function(){formfield=null;});
		return false;
	});
	jQuery(document).keyup(function(e) {
  		if (e.keyCode == 27) formfield=null;
	});

});
</script>
