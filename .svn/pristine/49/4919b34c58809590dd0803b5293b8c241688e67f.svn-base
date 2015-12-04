<?php
/*************************************************************************************************************
#Coder         : Kapil Verma
#Description   : This Code is used to manage general settings
*************************************************************************************************************/

extract($_GET);
extract($_POST);

$obj_setting = new common();
$obj 		 = new validation();
/* Get Current Date Time Stamp */ 
$currentTimestamp 		= getCurrentTimestamp();
$adminSql	 			= $obj_setting->customQuery("SELECT logo FROM ".TBL_ADMIN." where id='".$_SESSION['LoggedInId']."'");
$adminResult 			= $db->fetchNextObject($adminSql);
$oldImageNameName  		= $adminResult->logo;
$imageName 				= $oldImageNameName; #predefined so if no image name found then it will take image name from datsabase table
 
if($_SERVER['REQUEST_METHOD']=='POST')
    {	
	
			#checking if image uploaded or not
			if(isset($_FILES['logo_header']['tmp_name']) and $_FILES['logo_header']['tmp_name']!=''){
					
					$imageTypes 		= array('image/gif','image/jpeg','image/pjpeg');
					$imageName 			= $currentTimestamp.'_'.$_FILES['logo_header']['name'];
					$successstatus 		= fileUpload(LIST_ROOT_ADMIN.'/images/logo_header/',$imageName,'logo_header',$imageTypes,200,$oldImageNameName,'header_logo.jpg');	
					switch ($successstatus)
					{
					  case 0:
					  $imageName = $oldImageNameName;
					  break;
					  case 1:
					  $imageName = $imageName;
					  break;
					  case 2:
					  $imageName = $oldImageNameName;
					  break;
					} 
								
			}
			else
			{
								$imageName 						= $oldImageNameName;
								$successstatus					= 1;
			}
			
            $dataArr = array('site_title'=>$site_title,'meta_title'=>$meta_title,'meta_keywords'=>$meta_keywords, 'meta_description'=>$meta_description,'google_map_key'=>$google_map_key,'phone1'=>$phone1,'phone2'=>$phone2,'office_address'=>$office_address,'slogan'=>$slogan,'logo'=>$imageName,'copyright_text_footer'=>$copyright_text_footer,'facebook'=>$facebook,'twitter'=>$twitter,'youtube'=>$youtube,'rss'=>$rss);
            $update_site=$obj_setting->update(TBL_ADMIN, $dataArr, 'id = '.$_SESSION['LoggedInId']);
			
			if($successstatus==0){
				$_SESSION['success_msg'] 	= 'Image size is greater then 200kb ,so this image could not be saved.Your other information has been saved successfully.';
			}
			else if($successstatus==2){
				$_SESSION['success_msg'] 	= 'Image type is not JPEG or GIF ,so this image could not be saved.Your other information has been saved successfully.';
			}
			else {
				$_SESSION['success_msg'] 	= 'Your information has been saved successfully.';
			}
			
	}
		 #Code to Fetch data to show on form
		 $fetchSetting 				= $obj_setting->read(TBL_ADMIN, 'id = '.$_SESSION['LoggedInId']);
		 $getSetting 				= $db->fetchNextObject($fetchSetting);
		 $site_title 				= $getSetting->site_title;
		 $meta_title 				= $getSetting->meta_title;
		 $meta_keywords 			= $getSetting->meta_keywords;
		 $meta_description 			= $getSetting->meta_description;
		 $google_map_key 			= $getSetting->google_map_key;	
		 	 		 
		 $phone1 					= $getSetting->phone1;		 		 
		 $phone2 					= $getSetting->phone2;		 		 
		 $office_address 			= $getSetting->office_address;		 		 
		 $slogan 					= $getSetting->slogan;		 		 
		 $logo_header 				= $getSetting->logo;		 		 
		 $copyright_text_footer 	= $getSetting->copyright_text_footer;	
		 $facebook 					= $getSetting->facebook;	
 		 $twitter 					= $getSetting->twitter;
		 $youtube 					= $getSetting->youtube;
		 $rss 					    = $getSetting->rss;	
	 		 
?>