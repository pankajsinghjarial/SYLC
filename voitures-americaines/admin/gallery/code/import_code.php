<?php
//echo "<pre>";print_r($_FILES);exit;
$obj = new validation();

 if(!empty($_FILES)) {
            
      $error='';
      //pr($_FILES);exit;
      $obj->add_fields($_FILES['import_file']['name'], 'req', "Please upload file.");
      /*$obj->add_fields($_FILES['import_file']['type'], 'ftype=application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', "Please upload .xlsx file.");
      $obj->add_fields($_FILES['import_file']['type'], 'ftype=application/x-msexcel', "Please upload .xls file.");*/
      $obj->add_fields($_FILES['import_file']['type'], 'ftype=text/comma-separated-values', "Please upload .csv file.");
     
      if($_FILES['import_file']['error']==0) {
            set_time_limit(0);
            $docDestination = LIST_ROOT_ADMIN.'/prices/temp-uploads/'.$_FILES['import_file']['name'];
            @chmod(LIST_ROOT_ADMIN.'/prices/temp-uploads',0777);
            move_uploaded_file($_FILES['import_file']['tmp_name'], $docDestination) or die($docDestination);				            
            //---------------------------------------------------------------------------------------------//
            //pr($_FILES['import_file']);echo "hhiiii";exit;
                
            if($_FILES['import_file']['type']=='text/comma-separated-values' || $_FILES['import_file']['type']=='application/vnd.ms-excel') { 
                $tableColumnArray = array(
                    'device_id',
                    'brand',
                    'model',
                    'mint',
                    'good',
                    'poor',                    
                    'broken',                    
                    'damage_dead',                                        
                    );
                    
                $row = 1;
                if (($handle = fopen("temp-uploads/".$_FILES['import_file']['name'], "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);                        
                        $row++;
                        if($row==2) continue;
                        for ($c=0; $c < $num; $c++) {
                            //echo $data[$c] . "<br />\n"; 
                            //if($c==3 || $c == 4 || $c==5) continue;
                            $dataArray[$tableColumnArray[$c]] = htmlspecialchars($data[$c]);                            
                        }
                        //pr($dataArray);
                        $objCommon->save(TABLE_DEVICE,$dataArray);
                    }
                    fclose($handle);
                }               
            }
           
            //---------------------------------------------------------------------------------------------//
            unlink($docDestination);
            $_SESSION['msg']='Uploaded Successfully';
            echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/prices/index.php";</script>';
            }
        }
?>
