<?php 
include_once('../../conf/config.inc.php'); 
class AdminCarForm extends common{
	
	private $table ="car";
	private $attr_table = "attribute";
	private $attr_opt_val_table = "attribute_option_value";
	private $postArray = array();
	private $fileArray = array();
	
	
	function buildFormElements($postArr = array(), $fileArr = array()){
		global $db;
		$attribute_list = $this->read($this->attr_table,$whereCondition=' publish = 1',$orderBy='tab, sort, attribute_id ASC',$groupBy='');
		$tab=0;
		$flag = false;
		if(count($postArr) > 0){
			$flag = true;
			$this->postArray = $postArr;
		}
		if(count($fileArr) > 0){
			
			$this->fileArray = $fileArr;
		}
		$step = 0; 
		while($getAttrRow = $db->fetchNextObject($attribute_list)){
			if($getAttrRow->tab != $tab) {
				$tab = $getAttrRow->tab;
				switch($getAttrRow->tab){
					case 1: echo '<div id="general_tab"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody>'; break;
					case 2: echo $this->get_basic_block().'</tbody></table></div><div id="images_tab" class="tab_zero_height"><h1>'.$getAttrRow->frontend_label.'</h1><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody>'; break;
					case 3: echo '</tbody></table></div><div id="info_p1_tab" class="tab_zero_height"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody>'; break;
					case 4: echo '</tbody></table></div><div id="info_p2_tab" class="tab_zero_height"><table height="" border="0" cellpadding="0" cellspacing="0" width="100%"><tbody>'; break;
					case 5: echo '</tbody></table></div><div id="dealer_tab" class="tab_zero_height"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody>'; break;
				}
			}
			
			
			if( $step == 0 && $getAttrRow->tab == 1 && !empty($_REQUEST['type']) && $_REQUEST['type'] == 'nostock') {
				
				
				$obj_block = new common();

				$obj_handle = new Handle();   
				
				$getbrandBlock= $obj_block->read(TBL_BRANDS," publish=1"); 
				
				echo '<tr>
				<th valign="top">Brand:</th>
				<td> <select name="brand_id" class="select-form required">
				    <option value="">Select Brand</option>';
				    while($brands = mysql_fetch_object($getbrandBlock)) {
				     if($postArr['brand_id'] == $brands->id) {
					echo '<option value="'.$brands->id.'" selected="selected">'.$brands->title.'</option>';
				     } else { 
					echo '<option value="'.$brands->id.'">'.$brands->title.'</option>';
				    }}
				echo '</select></td>
				<td><div class="error-left"></div>
				  <div class="error-inner">This field is required.</div></td>
				<td>&nbsp;</td>
			      </tr>';
			}
			$step++;
			
			
			
			if($getAttrRow->is_required ==1){
				$req_class =' required';
				//$req_text = '<div class="error-left"></div><div class="error-inner">This field is required.</div>';
			}
			else{
				$req_class ='';
				$req_text = '&nbsp;';
			}
			
			$onchange = 'getOther(this);';
			switch($getAttrRow->frontend_type){
				case "text": {
					if($flag){
							$getAttrRow->default_value = $postArr[$getAttrRow->attribute_code];
					}
					
				echo ' <tr>
                        <th valign="top">'.$getAttrRow->frontend_label.':</th>
                        <td><input type="text" class="inp-form'.$req_class.'" name="'.$getAttrRow->attribute_code.'" id="'.$getAttrRow->attribute_code.'" value="'.$getAttrRow->default_value.'" /></td>
                        <td>'.$req_text.'</td>
                      </tr>';	
				}
				break;
				case "textarea": {
					if($flag){
						$getAttrRow->default_value = $postArr[$getAttrRow->attribute_code];
					}
				echo ' <tr>
                        <th valign="top">'.$getAttrRow->frontend_label.':</th>
                        <td><textarea class="form-textarea myTextEditor'.$req_class.'" name="'.$getAttrRow->attribute_code.'" id="'.$getAttrRow->attribute_code.'">'.$getAttrRow->default_value.'</textarea></td>
                        <td>'.$req_text.'</td>
                      </tr>';	
				}
				break;
				case "select": {
					if($flag){
						$default_value = $postArr[$getAttrRow->attribute_code];
					}
					echo ' <tr>
							<th valign="top">'.$getAttrRow->frontend_label.':</th>
							<td>'.$this->getdropdown($getAttrRow,"select-form".$req_class, $onchange,$default_value).'</td>
							<td>'.$req_text.'</td>
						  </tr>';
				}
				break;
				case "multiselect": {
					
				}
				break;
				case "checkbox": {
					echo ' <tr>
							<th valign="top">'.$getAttrRow->frontend_label.':</th>
							<td>'.$this->get_checkbox($getAttrRow,"".$req_class).'</td>
                        	<td>'.$req_text.'</td>
						  </tr>';
				}
				break;
				case "radio": {
					if($flag){
						$default_value = $postArr[$getAttrRow->attribute_code];
					}
					echo ' <tr>
							<th valign="top">'.$getAttrRow->frontend_label.':</th>
							<td>'.$this->get_radio($getAttrRow, "".$req_class, '', $default_value).'</td>
                        	<td>'.$req_text.'</td>
						  </tr>';
				}
				break;
				case "media_upload": {
					echo $this->get_media_upload($getAttrRow,"file_1 ".$req_class , '', $req_text);
				}
				break;
			}
		}
		echo '</tbody></table></div>';
	}
	
	
	function get_basic_block(){
		//$req_text = '<div class="error-left"></div><div class="error-inner">This field is required.</div>';
		if(count($this->postArray) > 0){
			echo ' <tr>
					<th valign="top">Stock ID:</th>
					<td><input type="text" class="inp-form required" name="stock_id" id="stock_id" value="'.$this->postArray[stock_id].'" /></td>
					<td>'.$req_text.'</td>
				  </tr>';
			echo ' <tr>
					<th valign="top">Vehical Identification Number(VIN):</th>
					<td><input type="text" class="inp-form required" name="vin" id="vin" value="'.$this->postArray[vin].'" /></td>
					<td>'.$req_text.'</td>
				  </tr>';
		}
		else{
			echo ' <tr>
					<th valign="top">Stock ID:</th>
					<td><input type="text" class="inp-form required" name="stock_id" id="stock_id" value="" /></td>
					<td>'.$req_text.'</td>
				  </tr>';
			echo ' <tr>
					<th valign="top">Vehical Identification Number(VIN):</th>
					<td><input type="text" class="inp-form required" name="vin" id="vin" value="" /></td>
					<td>'.$req_text.'</td>
				  </tr>';
		}
	}
	
	
	function get_checkbox($attrObj, $class='', $onchange=''){
		global $db;
		$optionArrayObj = $this->getOptionObj($attrObj->attribute_id);
		while($getAttrRow = $db->fetchNextObject($optionArrayObj)){
			$return .= '<input type="checkbox" name="'.$attrObj->attribute_code.'[]" id="'.$attrObj->attribute_code.'_'.$getAttrRow->value_id.'" value="'.$getAttrRow->value_id.'"/>';
			$return .= '<label for="'.$attrObj->attribute_code.'_'.$getAttrRow->value_id.'">'.$getAttrRow->value.'</label><br/>';
		}
		return $return;
	}
	
	
	function get_radio($attrObj, $class='', $onchange='',$default_value){
		global $db;
		$checked ='';
		$optionArrayObj = $this->getOptionObj($attrObj->attribute_id);
		while($getAttrRow = $db->fetchNextObject($optionArrayObj)){
			if($default_value == $getAttrRow->value_id){
				$checked = 'checked="checked"';
				echo '<script>alert('.$getAttrRow->value_id.$checked.');</script>';
			}
			$return .= '<input type="radio" name="'.$attrObj->attribute_code.'" id="'.$attrObj->attribute_code.'_'.$getAttrRow->value_id.'" value="'.$getAttrRow->value_id.'" '.$checked.'/>';
			$return .= '<label for="'.$attrObj->attribute_code.'_'.$getAttrRow->value_id.'">'.$getAttrRow->value.'</label>';
			$checked ='';
		}
		return $return;
	}
	
	
	
	function get_media_upload($attrObj, $class='', $onchange='' ,$req_text='') {
		
		$about = '<div class="bubble-left"></div><div class="bubble-inner">JPEG, GIF, PNG 1MB max per image</div><div class="bubble-right"></div>';
		if(count($this->fileArray) > 0){
			$return  = '<tr>';
			$counter = 1;
			foreach($this->fileArray as $images ) {
				$return .= '<td width="15%"><img style="max-width:150px" src="'.$this->getImageUrl($images).'">
				<br/><input type="checkbox" name="deleted_img[]" value="'.$images.'">Delete</td>';
				if($counter % 4 == 0 )
				$return  .= '</tr><tr>';
				$counter ++;
			}
			$return  .= '</tr>';
			$return .= '<tr><td colspan=4><input type="file" multiple="multiple" name="'.$attrObj->attribute_code.'[]" id="'.$attrObj->attribute_code.'_1" class="'.$class.'" onchange="'.$onchange.'" ></td></tr>';
		}
		else{
			////$return = '<tr><td><input type="file" name="'.$attrObj->attribute_code.'_1" id="'.$attrObj->attribute_code.'_1" class="'.$class.'" onchange="'.$onchange.'" ></td><td>'.$about.'</td><td>'.$req_text.'</td></tr>';
			//$return .= '<tr><td><input type="file" multiple="multiple" name="'.$attrObj->attribute_code.'_2" id="'.$attrObj->attribute_code.'_2" class="'.$class.'" onchange="'.$onchange.'" ></td><td>'.$about.'</td><td>'.$req_text.'</td></tr>';
			$return .= '<tr><td colspan=4><input type="file" multiple="multiple" name="'.$attrObj->attribute_code.'[]" id="'.$attrObj->attribute_code.'_1" class="'.$class.'" onchange="'.$onchange.'" ></td></tr>';
		}
		return $return;
	}
	
	
	
	function getdropdown($attrObj, $class='', $onchange='',$default_value='') {
		global $db;
		$optionArrayObj = $this->getOptionObj($attrObj->attribute_id);
		$return = '<select name="'.$attrObj->attribute_code.'" id="'.$attrObj->attribute_code.'" class="'.$class.'" onchange="'.$onchange.'" >';
		$return .= '<option value="">'.$attrObj->default_value.'</option>';
		while($getAttrRow = $db->fetchNextObject($optionArrayObj)){
			if($default_value == $getAttrRow->value_id){
				$return .= '<option value="'.$getAttrRow->value_id.'" selected="selected">'.$getAttrRow->value.'</option>';
			}
			else{
				$return .= '<option value="'.$getAttrRow->value_id.'">'.$getAttrRow->value.'</option>';
			}
		}
		$return .= '<option value="other">Other</option>';
		$return .= '</select>';
		if($default_value == "other"){
			$return .= '<input type="text" class="inp-form'.$req_class.'" name="'.$attrObj->attribute_code.'_other" id="'.$attrObj->attribute_code.'_other" value="'.$this->postArray[$attrObj->attribute_code."_other"].'" />';
		}
		else{
			$return .= '<input type="text" class="inp-form'.$req_class.'" name="'.$attrObj->attribute_code.'_other" id="'.$attrObj->attribute_code.'_other" value="" style="display:none;" />';
		}
		
		return $return;
	}
	
	function getOptionObj($attr_id){
		return $this->read($this->attr_opt_val_table, $whereCondition='attribute_id = '.$attr_id , $orderBy='sort_order', $groupBy='');
	}
	
	
	function getImageUrl($url){
		if((strpos($url,"http://") !==false) || (strpos($url,"https://") !== false)){
			return $url;
		}
		else{
			return CAR_IMAGES_URL.'/'.$url;
		}
	}
	
	 
	
	
	function getCar($id, $view =false){
		global $db;
		$attrs = $this->getAttributes();
		$postArr = array();
		
		$result = $this->customQuery("Select stock_id,brand_id, vin From car Where car_id = ".$id);
		$value = $db->fetchNextObject($result);
		$postArr['stock_id'] = $value->stock_id;
		$postArr['vin'] = $value->vin;
		$postArr['brand_id'] = $value->brand_id;
		$for_option= array("select", "multiselect", "radio", "checkbox");
		foreach($attrs as $key=>$attr ){
			
			$result = $this->customQuery("Select value From car_".$attr["back"]." Where car_id = ".$id." and attribute_id = ".$attr["id"]);
			$value = $db->fetchNextObject($result);
			
			$value = $value->value;
			if($view){
				if(in_array($attr["front"],$for_option)){
					$value = $attr["options"][$value];
				}
			}
			if($attr["front"] == "media_upload"){
				
				
				$query = "Select value From car_".$attr["back"]." Where car_id = ".$id." and attribute_id = ".$attr["id"];
				$queryResult = mysql_query($query);
				while($image = mysql_fetch_array($queryResult)) {
					$postArr[$key][] = $image['value'];
				}
				
				/*$value = $db->fetchNextObject($result);
			
				
				$postArr[$key][images_1] = $value;
				$val = $db->fetchNextObject($result);
				$val = $val->value;
				$postArr[$key][images_2] = $val;*/
			}
			else{
				$postArr[$key] = $value;
			}	  
		}
		return $postArr;
	}
	
	function viewCar($id){
		$postArr = $this->getCar($id, true);
		$fileArr = $postArr[images];
		unset($postArr[images]);
		
		$this->buildViewElements($postArr, $fileArr);
	}
	
	
	function buildViewElements($postArr = array(), $fileArr = array()){
		global $db;
		$attribute_list = $this->read($this->attr_table,$whereCondition='',$orderBy='tab, sort, attribute_id ASC',$groupBy='');
		$tab=0;
		$flag = false;
		if(count($postArr) > 0){
			$flag = true;
		}
		$step= 0;
		
		while($getAttrRow = $db->fetchNextObject($attribute_list)){
			if($getAttrRow->tab != $tab) {
				$tab = $getAttrRow->tab;
				switch($getAttrRow->tab){
					case 1: echo '<div id="general_tab"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody>'; break;
					case 2: echo $this->getStock_Vin($postArr).'</tbody></table></div><div id="images_tab" class="tab_zero_height"><h1>'.$getAttrRow->frontend_label.'</h1><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody>'; break;
					case 3: echo '</tbody></table></div><div id="info_p1_tab" class="tab_zero_height"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody>'; break;
					case 4: echo '</tbody></table></div><div id="info_p2_tab" class="tab_zero_height"><table height="" border="0" cellpadding="0" cellspacing="0" width="100%"><tbody>'; break;
					case 5: echo '</tbody></table></div><div id="dealer_tab" class="tab_zero_height"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody>'; break;
				}
			}
			
			
			if(  $step == 0 && $getAttrRow->tab == 1 && !empty($_REQUEST['type']) && $_REQUEST['type'] == 'nostock') {
				
				
				$obj_block = new common();

				$obj_handle = new Handle();   
				
				
				
				echo '<tr>
				<th valign="top">Brand:</th>
				<td>';
				if( $flag ) {
					if( !empty($postArr['brand_id'])) {
						$getbrandBlock= $obj_block->read(TBL_BRANDS," publish=1 AND id = ".$postArr['brand_id']);
						$brand = mysql_fetch_array($getbrandBlock);
						echo (!empty($brand['title'])) ? $brand['title'] : 'None';
					}
					
				}
				else {
					$getbrandBlock= $obj_block->read(TBL_BRANDS," publish=1"); 
						echo '<select name="brand_id" class="select-form required">
					    <option value="">Select Brand</option>';
					    while($brands = mysql_fetch_object($getbrandBlock)) {
					     
						echo '<option value="'.$brands->id.'">'.$brands->title.'</option>';
					    }
				echo '</select>';	
				}
				
				
				echo '</td>
				<td></td>
				<td>&nbsp;</td>
			      </tr>';
			}
			$step++;
			
			
			$req_text = '&nbsp;';
				
			switch($getAttrRow->frontend_type){
				case "text": {
					if($flag){
							$getAttrRow->default_value = $postArr[$getAttrRow->attribute_code];
					}
					if(is_numeric($getAttrRow->default_value)){
						$getAttrRow->default_value = number_format($getAttrRow->default_value);
					}
					
				echo ' <tr>
                        <th valign="top">'.$getAttrRow->frontend_label.':</th>
                        <td><span>'.$getAttrRow->default_value.'</span></td>
						 <td>'.$req_text.'</td>
                      </tr>';	
				}
				break;
				case "textarea": {
					if($flag){
						$getAttrRow->default_value = $postArr[$getAttrRow->attribute_code];
					}
					if($getAttrRow->attribute_code == 'features' || $getAttrRow->attribute_code == 'std_equip'){
						$getAttrRow->default_value = $this->getList($getAttrRow->default_value);
					}
					
					echo ' <tr>
                        <th valign="top">'.$getAttrRow->frontend_label.':</th>
                        <td><p>'.$getAttrRow->default_value.'</p></td>
                        <td>'.$req_text.'</td>
                      </tr>';	
				}
				break;
				case "select": {
					if($flag){
						$default_value = $postArr[$getAttrRow->attribute_code];
					}
					echo ' <tr>
							<th valign="top">'.$getAttrRow->frontend_label.':</th>
							<td><span>'.$default_value.'</span></td>
							<td>'.$req_text.'</td>
						  </tr>';
				}
				break;
				case "checkbox": {
					if($flag){
						$default_value = $postArr[$getAttrRow->attribute_code];
					}
					echo ' <tr>
							<th valign="top">'.$getAttrRow->frontend_label.':</th>
							<td>'.$default_value.'</td>
                        	<td>'.$req_text.'</td>
						  </tr>';
				}
				break;
				case "radio": {
					if($flag){
						$default_value = $postArr[$getAttrRow->attribute_code];
					}
					echo ' <tr>
							<th valign="top">'.$getAttrRow->frontend_label.':</th>
							<td>'.$default_value.'</td>
                        	<td>'.$req_text.'</td>
						  </tr>';
				}
				break;
				case "media_upload": {
					$return = '<tr><td><img src="'.$this->getImageUrl($fileArr["images_1"]).'"></td><td><img src="'.$this->getImageUrl($fileArr["images_2"]).'"></td><td>'.$req_text.'</td></tr>';
					echo $return;
				}
				break;
			}
		}
		echo '</tbody></table></div>';
	}
	
	
	function getStock_Vin($postArr){
		echo ' <tr>
					<th valign="top">Stock ID:</th>
					<td>'.$postArr[stock_id].'</td>
					<td>&nbsp;</td>
				  </tr>
				<tr>
					<th valign="top">Vehical Identification Number(VIN):</th>
					<td>'.$postArr[vin].'</td>
					<td>&nbsp;</td>
				  </tr>';
	}
	
	function getList($text){
		$arrays = explode(",",$text);
		$return = "<ul>";
		foreach($arrays as $val){
			$return .= "<li><span>".$val."</span></li>";
		}
		$return .= "</ul>";
		return $return;
	}
	
	
	
	
	public $error='';
	public function AddCar($arrPost, $arrFiles, $edit=false, $car_id = ''){
		
		global $db;
		if($edit){
			
			$result = $this->customQuery("SELECT car_id FROM car WHERE stock_id= '".$arrPost['stock_id']."' and vin = '".$arrPost['vin']."'");
			if(mysql_num_rows($result) == 0){
				$arr = array("stock_id" =>$arrPost[stock_id], "vin" =>$arrPost[vin], "updated_at" => getCurrentTimestamp());
				$this->update("car", $arr, "car_id = ".$car_id);
				unset($arrPost['stock_id']);
				unset($arrPost['vin']);
			}
			else{
				$result_id = $db->fetchNextObject($result);
				if($car_id != $result_id->car_id){
					$this->error .= 'Stock Id and VIN Duplicate.'.'<br>';
					return false;
				}
				else{
					$arr = array("stock_id" =>$arrPost[stock_id], "vin" =>$arrPost[vin], "updated_at" => getCurrentTimestamp());
					if( !empty($arrPost['brand_id'])){
						$arr['brand_id'] =  $arrPost['brand_id'];
					}
					$this->update("car", $arr, "car_id = ".$car_id);
					unset($arrPost['stock_id']);
					if( !empty( $arrPost['brand_id'] ) ) unset($arrPost['brand_id']);
					unset($arrPost['vin']);
				}
			}
			
			// deleted images
			
			if( !empty($arrPost['deleted_img']) ) {
				foreach( $arrPost['deleted_img'] as $image ) {
					$resultImage = $this->customQuery("DELETE FROM `car_media_gallery` WHERE `car_media_gallery`.`value` = '".$image."' LIMIT 1");
					unlink(UPLOAD_CAR_IMAGES.'/'.$image);
				}
			}
		}
		else{
			$result = $this->customQuery("SELECT car_id FROM car WHERE stock_id= '".$arrPost['stock_id']."' and vin = '".$arrPost['vin']."'");
			if(mysql_num_rows($result) == 0){
				$arr = array("stock_id" =>$arrPost[stock_id], "vin" =>$arrPost[vin], "created_at" => getCurrentTimestamp());
				if( !empty($arrPost['brand_id'])){
					$arr['brand_id'] =  $arrPost['brand_id'];
				}
				if( !empty($_REQUEST['type']) && $_REQUEST['type'] == 'nostock' )
				$arr['site_name'] =  2;
				
				$car_id = $this->save("car",$arr);
				unset($arrPost['stock_id']);
				unset($arrPost['vin']);
				unset($arrPost['brand_id']);
				unset($arrPost['site_name']);
			}
			else{
				$this->error .= 'Stock Id and VIN Duplicate.'.'<br>';
				return false;
			}
		}
		$attributes =$this->getAttributes();
		
		foreach($arrPost as $key => $value ){
			if($key == "submit") break;
			if($value == '') continue;
			if($attributes[$key]["front"] == "select"){
				if($value == 'other'){
					$arr = array("attribute_id" =>$attributes[$key]["id"], "value" =>$arrPost[$key."_other"]);
					$value = $this->save("attribute_option_value",$arr);
					unset($arrPost[$key."_other"]);
				}
			}
			$arr = array("attribute_id" =>$attributes[$key]["id"], "car_id" =>$car_id, "value" =>$value);
			
			if( !empty($attributes[$key]["id"])) {
			
				$result = $this->customQuery("SELECT value_id FROM car_".$attributes[$key]["back"]." WHERE
							     attribute_id= '".$attributes[$key]["id"]."' and
							     car_id = '".$car_id."'");
				$exists = mysql_fetch_array($result);
				if( !empty($exists['value_id']) ){
					$value = $this->update("car_".$attributes[$key]["back"],$arr, "value_id = ".$exists['value_id']);
				}
				else 
				$value = $this->save("car_".$attributes[$key]["back"],$arr);
			}
		}
		
		$j=1;
		
		$counter = 0;
		foreach($arrFiles['images']['name'] as $file){
			$path = $this->getUploadDirPath($file);
			if(move_uploaded_file($arrFiles['images']["tmp_name"][$counter], UPLOAD_CAR_IMAGES.'/'.$path)){
				$arr = array("attribute_id" =>$attributes['images']["id"], "car_id" =>$car_id, "value" =>$path, "fetched" =>1);
				$value = $this->save("car_".$attributes['images']["back"],$arr);
				$arr = array("value_id" => $value, "position" => $j++);
				$value = $this->save("car_".$attributes['images']["back"]."_value",$arr);
			}
			else{
				$this->error .= 'Cannot Upload File.<br>';
			}
			$counter++;
		}
		return true;
	}
	
	function getUploadDirPath($name){
		$path = '/'.date('m').'/'.date('d');
		if ( !file_exists(UPLOAD_CAR_IMAGES.'/'.$path)) {
			mkdir(UPLOAD_CAR_IMAGES.'/'.$path,0777,true);
		}
		return $path.'/'.time().$name;
	}
}
?>