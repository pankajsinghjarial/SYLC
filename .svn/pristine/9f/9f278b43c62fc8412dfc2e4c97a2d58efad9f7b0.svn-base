<?php
/*
Plugin Name: WP Colorful Tag Cloud
Plugin URI: http://blog.websourcing.fr/wp-colorful-tag-cloud-plugin-for-wordpress-reference-page/
Description: A colorful tag cloud easily customizable using the user-friendly administration/settings interface.
Author: Lionel Roux
Version: 2.0.1
Author URI: http://blog.websourcing.fr 
*/ 

/* 
* The "WP Colorful Tag Cloud" plugin code is released under the Creative Commons
* Attribution-ShareAlike 3.0 license. You are free to share
* and make derivatives of this software as long as you give
* credit to the original author and include the author's
* URL in your work. The full license can be found here:
* http://creativecommons.org/licenses/by-sa/3.0/ 
*/

	
define('TEST_COLORFUL_TG_URL', plugins_url().'/'. dirname(plugin_basename(__FILE__)) .'/');

/**
 * Colorful Tag cloud widget class
 *
 * @since 2.0.0
 */
class WP_Widget_Colorful_Tag_Cloud extends WP_Widget {

	function WP_Widget_Colorful_Tag_Cloud() {
		$widget_ops = array( 'description' => __( "Your most used tags in cloud format an colorama") );
		$this->WP_Widget('Colorful_Tag_Cloud', __('Colorful Tag Cloud'), $widget_ops);
	}

	function widget( $args, $instance ) {
		wp_widget_colorful_tag_cloud($args);
	}

	function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		return $instance;
	}

	function form( $instance ) {
?>
	<p>To set up options, please go to the <a href="options-general.php?page=<?php echo plugin_basename(__FILE__) ?>">settings</a></p>
<?php
	}
} 

 
/**
* @desc Initialize the plugin
*/
function wp_ctc_init() {
    if ( !is_blog_installed())
    return;
	
    if (!is_admin()) {
    } else {
        add_filter('admin_head', 'wp_ctc_admin_head');
        add_action('admin_menu', 'wp_ctc_admin_panel');
	}
	
	//Initialize Options
    if(!$options = get_option('wp_ctc_options')) {
	
		$options['ctc_smallest'] = 8;
		$options['ctc_largest'] = 22;
		$options['ctc_title'] = '';
		$options['ctc_unit'] = 'pt';
		$options['ctc_number'] = 45;
		$options['ctc_format'] = 'flat'; 
		$options['ctc_orderby'] = 'name'; 
		$options['ctc_order'] ='ASC';
		$options['ctc_show_tags_count'] = 0;
		$options['ctc_power'] = 1.0;
		
		$i = 8;
		while($i <= 22)
		{
			//set up colors from the request
			$options['ctc_color_for_size'.$i] = "#000";
			//echo('ctc_color_for_size'.$i); echo(' '); echo($options['ctc_color_for_size'.$i]); echo('<br/>');
			$i+=1;
		}		
		update_option('wp_ctc_options',$options);
	}
	
	register_widget('WP_Widget_Colorful_Tag_Cloud');
}

/* Add Init Action */
add_action('widgets_init','wp_ctc_init');

function wp_ctc_admin_head() {  
	wp_enqueue_script('jquery');
	?>
	<script type="text/javascript"> 
	/*Copyright(c)2009,www.supersite.me*/
	var imageUrl= '<?php echo(TEST_COLORFUL_TG_URL.'color.png')?>';
	function iColorShow(id,id2){var eICP=jQuery("#"+id2).position();
	jQuery("#iColorPicker").css({'top':eICP.top+(jQuery("#"+id).outerHeight())+"px",'left':(eICP.left)+"px",'position':'absolute'}).fadeIn("fast");jQuery("#iColorPickerBg").css({'position':'absolute','top':0,'left':0,'width':'100%','height':'100%'}).fadeIn("fast");var def=jQuery("#"+id).val();jQuery('#colorPreview span').text(def);jQuery('#colorPreview').css('background',def);jQuery('#color').val(def);var hxs=jQuery('#iColorPicker');for(i=0;i<hxs.length;i++){var tbl=document.getElementById('hexSection'+i);var tblChilds=tbl.childNodes;for(j=0;j<tblChilds.length;j++){var tblCells=tblChilds[j].childNodes;for(k=0;k<tblCells.length;k++){jQuery(tblChilds[j].childNodes[k]).unbind().mouseover(function(a){var aaa="#"+jQuery(this).attr('hx');jQuery('#colorPreview').css('background',aaa);jQuery('#colorPreview span').text(aaa)}).click(function(){var aaa="#"+jQuery(this).attr('hx');
	jQuery("#"+id).val(aaa).css("background",aaa);jQuery("#iColorPickerBg").hide();jQuery("#iColorPicker").fadeOut();jQuery(this)})}}}}
	this.iColorPicker=function(){jQuery("input.iColorPicker").each(function(i){
	if(i==0){
		jQuery(document.createElement("div")).attr("id","iColorPicker").css('display','none').html('<table class="pickerTable" id="pickerTable0"><thead id="hexSection0"><tr><td style="background:#f00;" hx="f00"></td><td style="background:#ff0" hx="ff0"></td><td style="background:#0f0" hx="0f0"></td><td style="background:#0ff" hx="0ff"></td><td style="background:#00f" hx="00f"></td><td style="background:#f0f" hx="f0f"></td><td style="background:#fff" hx="fff"></td><td style="background:#ebebeb" hx="ebebeb"></td><td style="background:#e1e1e1" hx="e1e1e1"></td><td style="background:#d7d7d7" hx="d7d7d7"></td><td style="background:#cccccc" hx="cccccc"></td><td style="background:#c2c2c2" hx="c2c2c2"></td><td style="background:#b7b7b7" hx="b7b7b7"></td><td style="background:#acacac" hx="acacac"></td><td style="background:#a0a0a0" hx="a0a0a0"></td><td style="background:#959595" hx="959595"></td></tr><tr><td style="background:#ee1d24" hx="ee1d24"></td><td style="background:#fff100" hx="fff100"></td><td style="background:#00a650" hx="00a650"></td><td style="background:#00aeef" hx="00aeef"></td><td style="background:#2f3192" hx="2f3192"></td><td style="background:#ed008c" hx="ed008c"></td><td style="background:#898989" hx="898989"></td><td style="background:#7d7d7d" hx="7d7d7d"></td><td style="background:#707070" hx="707070"></td><td style="background:#626262" hx="626262"></td><td style="background:#555" hx="555"></td><td style="background:#464646" hx="464646"></td><td style="background:#363636" hx="363636"></td><td style="background:#262626" hx="262626"></td><td style="background:#111" hx="111"></td><td style="background:#000" hx="000"></td></tr><tr><td style="background:#f7977a" hx="f7977a"></td><td style="background:#fbad82" hx="fbad82"></td><td style="background:#fdc68c" hx="fdc68c"></td><td style="background:#fff799" hx="fff799"></td><td style="background:#c6df9c" hx="c6df9c"></td><td style="background:#a4d49d" hx="a4d49d"></td><td style="background:#81ca9d" hx="81ca9d"></td><td style="background:#7bcdc9" hx="7bcdc9"></td><td style="background:#6ccff7" hx="6ccff7"></td><td style="background:#7ca6d8" hx="7ca6d8"></td><td style="background:#8293ca" hx="8293ca"></td><td style="background:#8881be" hx="8881be"></td><td style="background:#a286bd" hx="a286bd"></td><td style="background:#bc8cbf" hx="bc8cbf"></td><td style="background:#f49bc1" hx="f49bc1"></td><td style="background:#f5999d" hx="f5999d"></td></tr><tr><td style="background:#f16c4d" hx="f16c4d"></td><td style="background:#f68e54" hx="f68e54"></td><td style="background:#fbaf5a" hx="fbaf5a"></td><td style="background:#fff467" hx="fff467"></td><td style="background:#acd372" hx="acd372"></td><td style="background:#7dc473" hx="7dc473"></td><td style="background:#39b778" hx="39b778"></td><td style="background:#16bcb4" hx="16bcb4"></td><td style="background:#00bff3" hx="00bff3"></td><td style="background:#438ccb" hx="438ccb"></td><td style="background:#5573b7" hx="5573b7"></td><td style="background:#5e5ca7" hx="5e5ca7"></td><td style="background:#855fa8" hx="855fa8"></td><td style="background:#a763a9" hx="a763a9"></td><td style="background:#ef6ea8" hx="ef6ea8"></td><td style="background:#f16d7e" hx="f16d7e"></td></tr><tr><td style="background:#ee1d24" hx="ee1d24"></td><td style="background:#f16522" hx="f16522"></td><td style="background:#f7941d" hx="f7941d"></td><td style="background:#fff100" hx="fff100"></td><td style="background:#8fc63d" hx="8fc63d"></td><td style="background:#37b44a" hx="37b44a"></td><td style="background:#00a650" hx="00a650"></td><td style="background:#00a99e" hx="00a99e"></td><td style="background:#00aeef" hx="00aeef"></td><td style="background:#0072bc" hx="0072bc"></td><td style="background:#0054a5" hx="0054a5"></td><td style="background:#2f3192" hx="2f3192"></td><td style="background:#652c91" hx="652c91"></td><td style="background:#91278f" hx="91278f"></td><td style="background:#ed008c" hx="ed008c"></td><td style="background:#ee105a" hx="ee105a"></td></tr><tr><td style="background:#9d0a0f" hx="9d0a0f"></td><td style="background:#a1410d" hx="a1410d"></td><td style="background:#a36209" hx="a36209"></td><td style="background:#aba000" hx="aba000"></td><td style="background:#588528" hx="588528"></td><td style="background:#197b30" hx="197b30"></td><td style="background:#007236" hx="007236"></td><td style="background:#00736a" hx="00736a"></td><td style="background:#0076a4" hx="0076a4"></td><td style="background:#004a80" hx="004a80"></td><td style="background:#003370" hx="003370"></td><td style="background:#1d1363" hx="1d1363"></td><td style="background:#450e61" hx="450e61"></td><td style="background:#62055f" hx="62055f"></td><td style="background:#9e005c" hx="9e005c"></td><td style="background:#9d0039" hx="9d0039"></td></tr><tr><td style="background:#790000" hx="790000"></td><td style="background:#7b3000" hx="7b3000"></td><td style="background:#7c4900" hx="7c4900"></td><td style="background:#827a00" hx="827a00"></td><td style="background:#3e6617" hx="3e6617"></td><td style="background:#045f20" hx="045f20"></td><td style="background:#005824" hx="005824"></td><td style="background:#005951" hx="005951"></td><td style="background:#005b7e" hx="005b7e"></td><td style="background:#003562" hx="003562"></td><td style="background:#002056" hx="002056"></td><td style="background:#0c004b" hx="0c004b"></td><td style="background:#30004a" hx="30004a"></td><td style="background:#4b0048" hx="4b0048"></td><td style="background:#7a0045" hx="7a0045"></td><td style="background:#7a0026" hx="7a0026"></td></tr></thead><tbody><tr><td style="border:1px solid #000;background:#fff;cursor:pointer;height:60px;-moz-background-clip:-moz-initial;-moz-background-origin:-moz-initial;-moz-background-inline-policy:-moz-initial;" colspan="16" align="center" id="colorPreview"><span style="color:#000;border:1px solid rgb(0, 0, 0);padding:5px;background-color:#fff;font:11px Arial, Helvetica, sans-serif;"></span></td></tr>		<tr><td style="border:1px solid rgb(0, 0, 0);background:#000;cursor:pointer;height:10px;-moz-background-clip:-moz-initial;-moz-background-origin:-moz-initial;-moz-background-inline-policy:-moz-initial;" colspan="16" align="center" id="colorPickerCredits"></td></tr></tbody></table><style>#iColorPicker input{margin:2px}</style>').appendTo("body");jQuery(document.createElement("div")).attr("id","iColorPickerBg").click(function(){jQuery("#iColorPickerBg").hide();jQuery("#iColorPicker").fadeOut()}).appendTo("body");jQuery('table.pickerTable td').css({'width':'12px','height':'14px','border':'1px solid #000','cursor':'pointer'});jQuery('#iColorPicker table.pickerTable').css({'border-collapse':'collapse'});jQuery('#iColorPicker').css({'border':'1px solid #ccc','background':'#333','padding':'5px','color':'#fff','z-index':9999})}jQuery('#colorPreview').css({'height':'50px'});jQuery(this).css("backgroundColor",jQuery(this).val()).after('<a href="javascript:void(null)" id="icp_'+this.id+'" onclick="iColorShow(\''+this.id+'\',\'icp_'+this.id+'\')"><img src="'+imageUrl+'" style="border:0;margin:0 0 0 3px" align="absmiddle" ></a>')})};
	jQuery(function(){iColorPicker()});
	</script>
	<?php
}

function wp_ctc_admin_panel() {
    add_options_page('Colorful Tag Cloud Plugin Options', 'Colorful Tag Cloud', 10, __FILE__, 'wp_ctc_do_options_page');
}

/**
* @desc Define the options page
*/
function wp_ctc_do_options_page() {
	//retrieve the recorded options
	$options = get_option("wp_ctc_options");

	//in case we change the size range
	if(isset($_POST['submitsizes'])) {
		$options['ctc_smallest'] = $_POST['ctc_smallest'];
		$options['ctc_largest'] = $_POST['ctc_largest'];
		$options['ctc_unit'] = $_POST['ctc_unit'];
		$options['ctc_power'] = empty($_POST['ctc_power'])?1.0:$_POST['ctc_power'];
		
		$i = $options['ctc_smallest'];
		while($i <= $options['ctc_largest'])
		{
			//set up colors from the request
			if(empty($options['ctc_color_for_size'.$i]))
				$options['ctc_color_for_size'.$i] = "#000";
			//echo('ctc_color_for_size'.$i); echo(' '); echo($options['ctc_color_for_size'.$i]); echo('<br/>');
			$i+=1;
		}		
	}
	//in case we update colors
	else if(isset($_POST['submitcolors'])) {
		$i = $options['ctc_smallest'];
		while($i <= $options['ctc_largest'])
		{
			//set up colors from the request
			$options['ctc_color_for_size'.$i] = $_POST['ctc_color_for_size'.$i];
			//echo('ctc_color_for_size'.$i); echo(' '); echo($options['ctc_color_for_size'.$i]); echo('<br/>');
			$i+=1;
		}
	}
	else if(isset($_POST['submitoptions'])) {
		$options['ctc_title'] = $_POST['ctc_title'];
		$options['ctc_number'] = $_POST['ctc_number']; 
		$options['ctc_format']  = $_POST['ctc_format'];
		$options['ctc_orderby'] = $_POST['ctc_orderby']; 
		$options['ctc_order'] = $_POST['ctc_order'];
		$options['ctc_no_title'] = isset($_POST['ctc_no_title'])?1:0;
		$options['ctc_show_tags_count'] = isset($_POST['ctc_show_tags_count'])?1:0;
		//$exclude = $options['ctc_exclude']  = $_POST['ctc_exclude'];
		//$include = $options['ctc_include'] = $_POST['ctc_include']; 
		//$link' = $options['ctc_link'] = $_POST['ctc_link'];
	}
	// record options
	update_option('wp_ctc_options', $options);
?>
<div class="wrap">
	<h2><?=__('WP Colorful Tag Cloud - Options','');?></h2>
    <form method="post">
		<h3><?=__('Options setup','');?></h3>
        <p><?=__('This section is used to set up the cloud options','wp_ctc');?></p>
		<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row">Cloud title</th>
						<td style="text-align: center;">
							<input type="text" value="<?php echo($options['ctc_title']) ?>" name="ctc_title" />
						</td>
						<td style="text-align: center;">
						<span>if not set -Tags- will be displayed</span>
						</td>
						<td>
						<span>Do not set -Title- at all (will remove the title line, even if empty)</span>
						<input style="width: 300px;" name="ctc_no_title" type="checkbox" id="ctc_no_title" value="ctc_no_title" <?php if($options['ctc_no_title']) echo 'checked'; ?> />
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row">Number of tags to display</th>
						<td style="text-align: center;">
							<input type="text" value="<?php echo($options['ctc_number']) ?>" name="ctc_number" />
						</td>
						<td style="text-align: center;">
						<span>default value: 45</span>
						</td >
					</tr>
					<tr valign="top">
						<th scope="row">Show tags count?</th>
						<td style="text-align: center;">
							<input style="width: 300px;" name="ctc_show_tags_count" type="checkbox" id="ctc_show_tags_count" value="ctc_show_tags_count" <?php if($options['ctc_show_tags_count']) echo 'checked'; ?> />
						</td>
						<td style="text-align: center;">
						<span>if checked, display the number of posts near each tag</span>
						</td >
					</tr>
					<tr valign="top">
						<th scope="row">Order by</th>
						<td style="text-align: center;">
							<select name="ctc_orderby">
								<option value="name">- <?php echo __('Select','wp_ctc');?> -</option>
								<option <?php if($options['ctc_orderby'] == 'name') echo 'selected="SELECTED"'; else echo ''; ?> value="name"><?php echo __('Name','wp_ctc');?></option>
								<option <?php if($options['ctc_orderby'] == 'count') echo 'selected="SELECTED"'; else echo ''; ?> value="count"><?php echo __('Count','wp_ctc');?></option>
							</select>
						</td> 
						<th scope="row">Order</th>
						<td style="text-align: center;">
							<select name="ctc_order">
								<option value="ASC">- <?php echo __('Select','wp_ctc');?> -</option>
								<option <?php if($options['ctc_order'] == 'ASC') echo 'selected="SELECTED"' ; else echo ''; ?> value="ASC"><?php echo __('Ascendant','wp_ctc');?></option>
								<option <?php if($options['ctc_order'] == 'DESC') echo 'selected="SELECTED"' ; else echo ''; ?> value="DESC"><?php echo __('Decendant','wp_ctc');?></option>
								<option <?php if($options['ctc_order'] == 'RAND') echo 'selected="SELECTED"'; else echo ''; ?> value="RAND"><?php echo __('Random','wp_ctc');?></option>
							</select>
						</td> 
					</tr>
					<tr valign="top">
						<th scope="row">Format</th>
						<td style="text-align: center;">
							<select name="ctc_format">
								<option value="flat">- <?php echo __('Select','wp_ctc');?> -</option>
								<option <?php if($options['ctc_format'] == 'array') echo 'selected="SELECTED"'; else echo ''; ?> value="array"><?php echo __('Array','wp_ctc');?></option>
								<option <?php if($options['ctc_format'] == 'list') echo 'selected="SELECTED"'; else echo ''; ?> value="list"><?php echo __('List','wp_ctc');?></option>
								<option <?php if($options['ctc_format'] == 'flat') echo 'selected="SELECTED"'; else echo ''; ?> value="flat"><?php echo __('Flat','wp_ctc');?></option>
							</select>
						</td> 
						<td>
						<span>default is flat</span>
						</td >
					</tr>
				</tbody>
		</table>
		<div class="submit">
          <input type="submit" value="Update Options" name="submitoptions"/>
        </div>
		
		<h3><?=__('Range selection','');?></h3>
        <p><?=__('This section is used to set smallest and largest sizes in pixel for the tags','');?></p>
		<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row">Smallest Displayed Tag Size</th>
						<td style="text-align: center;">
							<input type="text" value="<?php echo($options['ctc_smallest']) ?>" name="ctc_smallest" onchange="jQuery('#warning').show()";/>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Largest Displayed Tag Size</th>
						<td style="text-align: center;">
							<input type="text" value="<?php echo($options['ctc_largest']) ?>" name="ctc_largest" onchange="jQuery('#warning').show()";/>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Size unit</th>
						<td style="text-align: center;">
							<select name="ctc_unit">
								<option value="pt">- <?php echo __('Select','wp_ctc');?> -</option>
								<option <?php if($options['ctc_unit'] == 'pt') echo 'selected="SELECTED"'; else echo ''; ?> value="pt"><?php echo __('point (pt)','wp_ctc');?></option>
								<option <?php if($options['ctc_unit'] == 'px') echo 'selected="SELECTED"'; else echo ''; ?> value="px"><?php echo __('pixel (px)','wp_ctc');?></option>
							</select>
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row">Magnify Tag Size</th>
						<td style="text-align: center;">
							<input type="text" value="<?php echo(empty($options['ctc_power'])?1.0:$options['ctc_power']) ?>" name="ctc_power" onchange="jQuery('#warning').show()";/>
						</td>
						<td style="text-align: center;">
						<span>Magnify tag sizes by using a power of the size and the spread.<br/>
						Value must be between 0.1 and +infinite.
						<br/>Default is 1.0</span>
						</td >
					</tr>
					
					<tr valign="top" id="warning" class="hidden">
						<th scope="row">Warning</th>
						<td style="text-align: center;">
							You changed size values. Don't forget to submit using the Update Sizes button to display new color inputs!
						</td>
					</tr>
				</tbody>
		</table>
		<div class="submit">
          <input type="submit" value="Update Sizes" name="submitsizes"/>
        </div>
		
		
		<h3><?=__('Tag Cloud Color Options','');?></h3>
        <p><?=__('These color display options can modify the colors you can use for each tag size in the cloud','');?></p>
		<?php
		$i = $options['ctc_smallest'];
		while($i <= $options['ctc_largest'])
		{
			?>
			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row">Size <?php echo($i); ?></th>
						<td style="text-align: center;">
							<input type="text" value="<?php echo($options['ctc_color_for_size'.$i]); ?>" name="ctc_color_for_size<?php echo($i); ?>" id="ctc_color_for_size<?php echo($i); ?>" class="iColorPicker"/>
						</td> 
					</tr> 
				</tbody>
			</table>
		<?php
		$i+=1;
		} ?>
		<div class="submit">
          <input type="submit" value="Update Settings" name="submitcolors"/>
        </div>
	</form>
</div>
<?php
}

/**
 * Display tag cloud widget.
 *
 * @since 2.3.0
 *
 * @param array $args Widget arguments.
 */
function wp_widget_colorful_tag_cloud($args) {

	$options = get_option('wp_ctc_options');
	
	$colorsbysize = array();
	$i = $options['ctc_smallest'];
	while($i <= $options['ctc_largest'])
	{
		$colorsbysize[$i] = $options['ctc_color_for_size'.$i];
		$i+=1;
	}
	
	$defaults = array(
		'title' => $options['ctc_title'], 
		'smallest' => $options['ctc_smallest'], 
		'largest' => $options['ctc_largest'], 
		'unit' => $options['ctc_unit'], 
		'number' => $options['ctc_number'],
		'format' => $options['ctc_format'], 
		'orderby' => $options['ctc_orderby'], 
		'order' => $options['ctc_order'],
		'exclude' => '', 
		'include' => '', 
		'link' => 'view',
		'showcount' => $options['ctc_show_tags_count'],
		'colorsbysize' => $colorsbysize,
		'power' => $options['ctc_power']
	);
	
	
	extract($args);
	
	$args = wp_parse_args( $args, $defaults );
			
	$title= empty($args['title'])? __('Tags') : apply_filters('widget_title', $args['title']);
	
	echo $before_widget;
	if(!$options['ctc_no_title'])
		echo $before_title . $title . $after_title;
	
	wp_colorful_tag_cloud($args);
	
	echo $after_widget;
}

/**
 * Display colorful tag cloud.
 *
 * The text size is set by the 'smallest' and 'largest' arguments, which will
 * use the 'unit' argument value for the CSS text size unit. The 'format'
 * argument can be 'flat' (default), 'list', or 'array'. The flat value for the
 * 'format' argument will separate tags with spaces. The list value for the
 * 'format' argument will format the tags in a UL HTML list. The array value for
 * the 'format' argument will return in PHP array type format.
 *
 * The 'orderby' argument will accept 'name' or 'count' and defaults to 'name'.
 * The 'order' is the direction to sort, defaults to 'ASC' and can be 'DESC'.
 *
 * The 'number' argument is how many tags to return. By default, the limit will
 * be to return the top 45 tags in the tag cloud list.
 *
 * The 'topic_count_text_callback' argument is a function, which, given the count
 * of the posts with that tag, returns a text for the tooltip of the tag link.
 *
 * The 'exclude' and 'include' arguments are used for the {@link get_tags()}
 * function. Only one should be used, because only one will be used and the
 * other ignored, if they are both set.
 *
 * @param array|string $args Optional. Override default arguments.
 * @return array Generated tag cloud, only if no failures and 'array' is set for the 'format' argument.
 */
function wp_colorful_tag_cloud( $args = '' ) {
	$return = wp_colorful_tag_cloud_string( $args ); // get the tags as a formated (or not) string
          
	if ( 'array' == $args['format'] )
		return $return;
          
	echo $return;
}         
          
function wp_colorful_tag_cloud_string( $args = '' ) {		
	$defaults = array(
		'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 45,
		'format' => 'flat', 'separator' => "\n", 'orderby' => 'name', 'order' => 'ASC',
		'exclude' => '', 'include' => '', 'link' => 'view', 'taxonomy' => 'post_tag', 'echo' => true, 
		'showcount' => 0, 'power' => 1
	);
	$args = wp_parse_args( $args, $defaults );

	$tags = get_terms( $args['taxonomy'], array_merge( $args, array( 'orderby' => 'count', 'order' => 'DESC' ) ) ); // Always query top tags

	if ( empty( $tags ) )
		return;

	foreach ( $tags as $key => $tag ) {
		if ( 'edit' == $args['link'] )
			$link = get_edit_tag_link( $tag->term_id, $args['taxonomy'] );
		else
			$link = get_term_link( intval($tag->term_id), $args['taxonomy'] );
		if ( is_wp_error( $link ) )
			return false;

		$tags[ $key ]->link = $link;
		$tags[ $key ]->id = $tag->term_id;
	}

	$return = wp_generate_colorful_tag_cloud( $tags, $args ); // Here's where those top tags get sorted according to $args

	$return = apply_filters( 'wp_colorful_tag_cloud', $return, $args );

	/*if ( 'array' == $args['format'] )
		return $return;

	echo $return;*/
	
	return $return;
}

/**
 * Generates a tag cloud (heatmap) from provided data.
 *
 * The text size is set by the 'smallest' and 'largest' arguments, which will
 * use the 'unit' argument value for the CSS text size unit. The 'format'
 * argument can be 'flat' (default), 'list', or 'array'. The flat value for the
 * 'format' argument will separate tags with spaces. The list value for the
 * 'format' argument will format the tags in a UL HTML list. The array value for
 * the 'format' argument will return in PHP array type format.
 *
 * The 'tag_cloud_sort' filter allows you to override the sorting.
 * Passed to the filter: $tags array and $args array, has to return the $tags array
 * after sorting it.
 *
 * The 'orderby' argument will accept 'name' or 'count' and defaults to 'name'.
 * The 'order' is the direction to sort, defaults to 'ASC' and can be 'DESC' or
 * 'RAND'.
 *
 * The 'number' argument is how many tags to return. By default, the limit will
 * be to return the entire tag cloud list.
 *
 * The 'topic_count_text_callback' argument is a function, which given the count
 * of the posts  with that tag returns a text for the tooltip of the tag link.
 *
 * @todo Complete functionality.
 * @since 2.3.0
 *
 * @param array $tags List of tags.
 * @param string|array $args Optional, override default arguments.
 * @return string
 */
function wp_generate_colorful_tag_cloud( $tags, $args = '' ) {
	
	global $wp_rewrite;
	$defaults = array(
		'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 0,
		'format' => 'flat', 'separator' => "\n", 'orderby' => 'name', 'order' => 'ASC',
		'topic_count_text_callback' => 'default_topic_count_text',
		'topic_count_scale_callback' => 'default_topic_count_scale', 'filter' => 1, 
		'showcount' => 0, 'power' => 1
	);

	if ( !isset( $args['topic_count_text_callback'] ) && isset( $args['single_text'] ) && isset( $args['multiple_text'] ) ) {
		$body = 'return sprintf (
			_n(' . var_export($args['single_text'], true) . ', ' . var_export($args['multiple_text'], true) . ', $count),
			number_format_i18n( $count ));';
		$args['topic_count_text_callback'] = create_function('$count', $body);
	}

	$args = wp_parse_args( $args, $defaults );
	extract( $args );

	if ( empty( $tags ) )
		return;

	$tags_sorted = apply_filters( 'tag_cloud_sort', $tags, $args );
	if ( $tags_sorted != $tags  ) { // the tags have been sorted by a plugin
		$tags = $tags_sorted;
		unset($tags_sorted);
	} else {
		if ( 'RAND' == $order ) {
			shuffle($tags);
		} else {
			// SQL cannot save you; this is a second (potentially different) sort on a subset of data.
			if ( 'name' == $orderby )
				uasort( $tags, create_function('$a, $b', 'return strnatcasecmp($a->name, $b->name);') );
			else
				uasort( $tags, create_function('$a, $b', 'return ($a->count > $b->count);') );

			if ( 'DESC' == $order )
				$tags = array_reverse( $tags, true );
		}
	}

	if ( $number > 0 )
		$tags = array_slice($tags, 0, $number);

	$counts = array();
	$real_counts = array(); // For the alt tag
	foreach ( (array) $tags as $key => $tag ) {
		$real_counts[ $key ] = $tag->count;
		$counts[ $key ] = $topic_count_scale_callback($tag->count);
	}

	$power = $args['power'];
	$min_count = min( $counts );
	$spread = pow(max( $counts ) - $min_count, $power);

	if ( $spread <= 0 )
		$spread = 1;
	$font_spread = $largest - $smallest;
	if ( $font_spread < 0 )
		$font_spread = 1;
	$font_step = $font_spread / $spread;

	$a = array();

	$show_count = $args['showcount'];
	foreach ( $tags as $key => $tag ) {
		$count = $counts[ $key ];
		$real_count = $real_counts[ $key ];
		$tag_link = '#' != $tag->link ? esc_url( $tag->link ) : '#';
		$tag_id = isset($tags[ $key ]->id) ? $tags[ $key ]->id : $key;
		$tag_name = $tags[ $key ]->name;
		$tag_size = ( $smallest + ( pow(($count - $min_count), $power ) * $font_step ) );
		$tag_color = $args['colorsbysize'][floor($tag_size)];
		
		$a[] = "<a href='$tag_link' class='tag-link-$tag_id' title='" . esc_attr( $topic_count_text_callback( $real_count ) ) . "' style='font-size: $tag_size$unit; color: $tag_color'>$tag_name" .($show_count?"($real_count)</a>":"</a>");
	}

	switch ( $format ) :
	case 'array' :
		$return =& $a;
		break;
	case 'list' :
		$return = "<ul class='wp-tag-cloud'>\n\t<li>";
		$return .= join( "</li>\n\t<li>", $a );
		$return .= "</li>\n</ul>\n";
		break;
	default :
		$return = join( $separator, $a );
		break;
	endswitch;

    if ( $filter )
		return apply_filters( 'wp_generate_colorful_tag_cloud', $return, $tags, $args );
    else
		return $return;
}

function wp_shortcode_colorful_tag_cloud(){
	$args = array();
	wp_widget_colorful_tag_cloud($args);
}

add_shortcode("wp-ctc", "wp_shortcode_colorful_tag_cloud");

function set_plugin_meta($links, $file) {
 
	$plugin = plugin_basename(__FILE__);
 
	// create link
	if ($file == $plugin) {
		return array_merge(
			$links,
			array( sprintf( '<a href="options-general.php?page=%s">%s</a>', $plugin, __('Settings') ) )
		);
	}
 
	return $links;
}

global $wp_version;
if ( version_compare( $wp_version, '2.8', '>' ) )
	add_filter( 'plugin_row_meta', 'set_plugin_meta', 10, 2 ); // only 2.8 and higher

?>