<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of common
 *
 * @author SUPERCOMUTER
 */
class common extends utility {
    //put your code here
	var $exch_rate;
	
    function common(){}

    function read($tblName,$whereCondition='',$orderBy='',$groupBy=''){
        global $db;
        $result = $this->am_createSelectAllQuery($tblName, $whereCondition, $orderBy,$groupBy);        
        return $db->query($result);
    }

    function save($tblName,$dataArray){
        global $db;
        $result = $this->am_createInsertQuery($tblName, $dataArray);
        $db->query($result);
        return mysql_insert_id();
    }

    function delete($tblName,$whereCondition){
        global $db;
        $result = $this->am_createDeleteQuery($tblName, $whereCondition);
        $db->query($result);
        //return affectedRows();
    }
    function update($tblName,$dataArray,$whereCondition){
        global $db;
        $result = $this->am_createUpdateQuery($tblName, $dataArray,$whereCondition);        
        $db->query($result);
        //return affectedRows();
    }
    function numberOfRows($tblName,$whereCondition=''){
        global $db;
        $result = $this->am_createSelectAllQuery($tblName, $whereCondition);
        return mysql_num_rows($db->query($result));
    }    
    function customQuery($sqlQuery){
        global $db;
        $result = $db->query($sqlQuery);
        return $result;
    }    
    function getValueByField($tblName,$condition,$field){
        global $db;
        $sqlQuery = $this->am_createSelectAllQuery($tblName, $condition);
        $result = $db->query($sqlQuery);        
        $row = $db->fetchNextObject($result);         
        return $row->$field;
    }    

	function final_paginate($total_pages,$targetpage,$table,$cond,$order_by) {
 
	/* Setup vars for query. */
	//$targetpage = "webinar_listing.php"; 	
	//your file name  (the name of this file)
	$limit = 5; 								
	//how many items to show per page
	if(isset($page))
		$page = $_GET['page'];
	else 
		$page = 0;
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$result = $this->read($table,$cond,$order_by." LIMIT $start,$limit",'');
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pager\">";
		$pagination .= "<ul>";
		//previous button
		if ($page > 1) 
			$pagination.= "<li><a href=\"$targetpage?page=$prev\">&#171; Previous</a></li>";
		else
			$pagination.= "<li class=\"active\">&#171; Previous</li>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<li class=\"active\">$counter</li>";
				else
					$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\">$counter</li>";
					else
						$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\">$counter</li>";
					else
						$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\">$counter</li>";
					else
						$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<li><a href=\"$targetpage?page=$next\">Next &#187;</a></li>";
		else
			$pagination.= "<li class=\"active\">Next &#187;</li>";
		$pagination .= "</ul>";
		$pagination.= "</div>\n";		
	}
	return $pagination;
 }
 
 function countCars(){
        /*global $db;
        $result = $this->customQuery("Select count(car_id) as cou from car");
		$result = mysql_fetch_object($result);
        echo number_format($result->cou + 22766) ;*/
		$my_file = 'file.txt';
		$handle = fopen($my_file, 'r+') or die('Cannot open file:  '.$my_file);
		$data = fread($handle,filesize($my_file));
		fclose($handle);
		echo number_format($data);
 } 
 
 
 
 /* */
 public $attributs = array();
 public function setAttributsToArray(){
		$for_option= array("select", "multiselect", "radio", "checkbox");
		$result = $this->customQuery("Select attribute_id, attribute_code, backend_type, frontend_type, frontend_label From attribute", $this->db)or die(mysql_error());
		if(mysql_num_rows($result) > 0){
			while($row = mysql_fetch_object($result)){
				if(in_array($row->frontend_type, $for_option)){
					$query = "Select value_id, value From attribute_option_value Where attribute_id = ".$row->attribute_id;
					$option_result = $this->customQuery($query, $this->db) or die(mysql_error());
					$options= array();
					if(mysql_num_rows($option_result) > 0){
						while($option_row = mysql_fetch_object($option_result)){
							$options[$option_row->value_id] = $option_row->value;
						}
					} 
					$this->attributs[$row->attribute_code]= array("id"=>$row->attribute_id, "label"=>$row->frontend_label, "front"=>$row->frontend_type, "back"=>$row->backend_type, "options" => $options);
				} else{
					$this->attributs[$row->attribute_code]= array("id"=>$row->attribute_id, "label"=>$row->frontend_label, "front"=>$row->frontend_type, "back"=>$row->backend_type);
				}
			}
		}
	}
 	
	public function getAttributes(){
		$this->setAttributsToArray();
		return $this->attributs;
	}
	
	

	function CarAttributesFromID($carIds = array(), $attr_list =  array("fullName", "mileage", "price", "features")){
		if(count($this->attributs) == 0){
			$this->setAttributsToArray();
		}
		$table_prefix="car_";
		$temp = array();
		foreach($carIds as $carId){
			$car_list = $this->customQuery("Select * From car WHERE car_id = ".$carId);
			while($value = mysql_fetch_object($car_list)){
				$temp[$value->car_id]["id"] = $value->car_id;
				$temp[$value->car_id]["stock_id"] = $value->stock_id;
				foreach($attr_list as $attr){
					$option_result = $this->customQuery("SELECT value From ".$table_prefix.$this->attributs[$attr]["back"]." Where car_id = ".$value->car_id." and attribute_id = ".$this->attributs[$attr]["id"]);
					$option_result  = mysql_fetch_object($option_result);
					$temp[$value->car_id][$attr] = $option_result->value;
				}	
			}
		}
		
		return $temp;
	}
	
	
	
	public function total_getCarListWithAttr($condition = ''){
		$car_list = $this->customQuery("Select * From car ".$where);
		return mysql_num_rows($car_list);
	}
	
	public function getCarListWithAttr($limit, $attr_list, $conditions = null ){
		if(count($this->attributs) == 0){
			$this->setAttributsToArray();
		}
		
		if( $conditions != null ) {
		    $conditions = " where ".$conditions;
		}
		$table_prefix="car_";
		$temp = array();
		$where = '';
		$car_list = $this->customQuery("Select * From car ".$conditions.' '.$limit);
		while($value = mysql_fetch_object($car_list)){
			$temp[$value->car_id]["id"] = $value->car_id;
			$temp[$value->car_id]["stock_id"] = $value->stock_id;
			foreach($attr_list as $attr){
				$option_result = $this->customQuery("SELECT value From ".$table_prefix.$this->attributs[$attr]["back"]." Where car_id = ".$value->car_id." and attribute_id = ".$this->attributs[$attr]["id"]);
				$option_result  = mysql_fetch_object($option_result);
				$temp[$value->car_id][$attr] = $option_result->value;
			}	
		}
		return $temp;
	}
	public $total_getSearchCarListWithAttr;
	
	public function getSearchCarListWithAttr($start = 0, $limit = 25,$searchcar,$searchattr){
		$temp = array();
		$searchcar = trim($searchcar);
		$attr_list = array("fullName", "mileage", "price", "features");
		if(count($this->attributs) == 0){
			$this->setAttributsToArray();
		}
		
		$backtype = explode("~",$searchattr); 
		if($backtype[2] == "select" or $backtype[2] == "radio" or $backtype[2] == "multiselect" or $backtype[2] == "checkbox"){ 
			$option_result	= $this->customQuery("select a.car_id from car_".$backtype['1']." as a left join attribute_option_value as b on b.value_id = a.value where a.attribute_id = '".$backtype['0']."' and b.value like '"."%".$searchcar."%"."' ");
		} 
		else{
			if(($backtype[1] == 'int' && $backtype[2] == 'text') || ($backtype[1] == 'decimal' && $backtype[2] == 'text'))
			{
				$option_result	= $this->customQuery("select car_id from car_".$backtype['1']." where attribute_id = '".$backtype['0']."' and value = '".$searchcar."'");
			}
			else{
				
				$option_result	= $this->customQuery("select car_id from car_".$backtype['1']." where attribute_id = '".$backtype['0']."' and value like '"."%".$searchcar."%"."'");
			}
		} 
		
		$i =1;
		$count=1;
		$this->total_getSearchCarListWithAttr = mysql_num_rows($option_result);
		
		while($row = mysql_fetch_object($option_result)){ 
			if($start < $i){
				if($count > $limit){
					break;
				}
				$count++;
			}
			else{
				$i++;
				continue;
			}
			
			$attr_result = $this->customQuery("select stock_id from car where car_id = ".$row->car_id);
			$fetch_value = mysql_fetch_object($attr_result);
			$temp[$row->car_id]["id"] = $row->car_id;
			$temp[$row->car_id]["stock_id"] = $fetch_value->stock_id;
			
			foreach($attr_list as $attr){ 
					$option_resulte = $this->customQuery("SELECT value From car_".$this->attributs[$attr]["back"]." Where car_id = ".$row->car_id." and attribute_id = ".$this->attributs[$attr]["id"]);
					$option_resulte  = mysql_fetch_object($option_resulte);
					$temp[$row->car_id][$attr] = $option_resulte->value;
			}	
			
			$i++;
		}
		
		return $temp;
	 }
	 
	 
	 
	public function getFeatureForListing($string,$num=4){
		$arr= explode(",", $string);
		$string ='';
		$i=0;
		foreach($arr as $ar){
			if($i == $num) break;
			$string.= $ar.",";
			$i++;
		}
		return substr( trim($string,","), 0, 300);
	}
	
	public function uploadImportFile($fileArr){
		$path = UPLOAD_IMPORT_FILES.'/'.$fileArr["name"];
		if ( !file_exists(UPLOAD_IMPORT_FILES)) {
			mkdir(UPLOAD_IMPORT_FILES ,0777,true);
		}
		try{
			if(move_uploaded_file($fileArr["tmp_name"], $path)){
				return $path;
			}
			else{
				throw new Exception();
				return false;
			}
		}
		catch (Exception $e) {
			echo 'Temp dir path :- '.$fileArr["tmp_name"]."<br>";
			echo 'Upload dir path :- '.$path."<br>";
			echo 'Temp dir path :- '.$fileArr["error"]."<br>";
			echo 'Is Write Permission - ' .is_writable(UPLOAD_IMPORT_FILES)."<br>";
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
	
	
	public function getCarWithAttrList($car_id, $attr_list){
		
		$this->setAttributsToArray();
		
		$table_prefix="car_";
		$temp = array();
	$attr_result = $this->customQuery("select * from car where car_id = $car_id");
			$fetch_value = mysql_fetch_object($attr_result);
			$temp[$car_id]["stock_id"] = $fetch_value->stock_id;
			$temp[$car_id]["vin"] = $fetch_value->vin;

			foreach($attr_list as $attr){
				$option_result = $this->customQuery("SELECT value From ".$table_prefix.$this->attributs[$attr]["back"]." Where car_id = ".$car_id." and attribute_id = ".$this->attributs[$attr]["id"]);
				$option_result  = mysql_fetch_object($option_result);
				
				$for_option= array("select", "multiselect", "radio", "checkbox");
				if(in_array($this->attributs[$attr]["front"],$for_option)){
					$option_result->value = $this->attributs[$attr]["options"][$option_result->value];
				}
				$temp[$car_id][$attr] = $option_result->value;
			}	
		
		return $temp;
	}
	
	
	function getImageUrl($url){
		if($url == ''){
			return DEFAULT_URL.'/images/default.jpg';
		}
		else{
			if((strpos($url,"http://") !==false) || (strpos($url,"https://") !== false)){
				return $url;
			}
			else{
				return CAR_IMAGES_URL.'/'.$url;
			}
		}
	 	
	}
	function getAllImage($carid)
	{	
	$tempo = array();
	$imgArr = array();
		$images_result = $this->customQuery("select * from car_media_gallery where car_id = $carid  and attribute_id = 10");
		while($images = mysql_fetch_object($images_result))
		{
			$imageArr[] = $this->getImageUrl($images->value);
			}
return	$tempo[$carid]["allImage"] = $imageArr;
		}
		
		
		
		function mostView($carid)
		{
			$sql = $this->customQuery("Select car_id from car_view where car_id = $carid");
			if(mysql_num_rows($sql) > 0)
			{
				$query = $this->customQuery("Update car_view set view_count = view_count + 1 where car_id = $carid");
			}
			else
			{
				$query = $this->customQuery("INSERT INTO car_view (`car_id`,`view_count`)
VALUES ($carid,1) ");
			}
			
				
			}
	
	function getPageSlug($id)
	{ 
		$sql = $this->customQuery("Select slug from pages where id = $id");
		$slug = mysql_fetch_object($sql);
		return $slug->slug;
		
		}
	function CurrencyConverter($price){
		if($this->exch_rate ==''){
			$this->getExchangeRate();
		}
		
		//$rateid = $this->customQuery("select * from currency where id = 1");
		//$rate = mysql_fetch_object($rateid);	
		//$finalprice = (($price + $rate->boat) * $rate->custom * $rate->tva) + $rate->transp + $rate->com;
		//$finalprice = ($price + $rate->boat + $rate->transp + $rate->com)*$this->exch_rate;
		//jitendra
		$finalprice = ($price)*$this->exch_rate;
		return number_format($finalprice,2);	
	}
	
	function getOptionNameById($id){
		$sql = $this->customQuery("Select value from attribute_option_value where value_id = $id");
		$slug = mysql_fetch_object($sql);
		return $slug->value;
	}
	
	function getIdByOptionName($attr_id,$val){
		$sql = $this->customQuery("Select value_id from attribute_option_value where attribute_id = $attr_id and value = '$val'");
		$slug = mysql_fetch_object($sql);
		return $slug->value_id;
	}
	
	function getExchangeRate(){
		//$resp = simplexml_load_file("http://www.ecb.int/stats/eurofxref/eurofxref-daily.xml");
//		$name = 'USD';
//		$nodes = $resp->xpath(sprintf('/*/*/*/*[@currency = "%s"]', $name));
//		$this->exch_rate = (float) $nodes[0][rate];

		$url = "http://www.google.com/finance/converter?a=1&from=USD&to=EUR";
		$ch = curl_init();
		$timeout = 0;
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$rawdata = curl_exec($ch);
		curl_close($ch);
		
		$data = explode('currency_converter_result', $rawdata);
		$data = explode("bld", $data[1]);
		$data = explode("EUR", $data[1]);
		$number = preg_replace("/[^0-9.]/", '', $data[0]);
		$this->exch_rate =  $number;
	}
	
	function getAdminNotificationEmails() {
	    
	    $sql = $this->customQuery('SELECT `email` FROM `notification_emails`');
	    $admin_emails = array();
	    while( $emails = mysql_fetch_assoc($sql)) {
		$admin_emails[] = $emails['email'];
	    }
	    return $admin_emails;
	}
}
