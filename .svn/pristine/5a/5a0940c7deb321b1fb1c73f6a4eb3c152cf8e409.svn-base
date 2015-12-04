<?php require 'admin/config/database.php'; ?>
<!--//---------------------------------+
//  Developed by Bharat Arora        |
//  Contact for custom scripts       |
//  or implementation help.          |
//  email-er.bharatarora@yahoo.com   |
//---------------------------------+-->

<? $carbrand=intval($_GET['carbrand']);

 $query="SELECT id,model FROM model WHERE car_brand_id=".$carbrand;
$result=mysql_query($query);
//$a=mysql_fetch_array($result);
//print_r($a);

//exit;


?><span class="left_text"> Choisissez un modele: </span>
<select name="model" id="model" class="select_acc13"> 

<option value="Choisissez un model">Choisissez un model</option>
<? while($row=mysql_fetch_array($result)) { ?>

<option value=<?=$row['id']?>><?=$row['model']?></option>
<? } ?>
</select>
