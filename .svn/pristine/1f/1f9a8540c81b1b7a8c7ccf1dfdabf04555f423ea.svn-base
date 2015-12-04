<?php require 'admin/config/database.php'; ?>
<!--//---------------------------------+
//  Developed by Bharat Arora        |
//  Contact for custom scripts       |
//  or implementation help.          |
//  email-er.bharatarora@yahoo.com   |
//---------------------------------+-->

<? $carbrandId=intval($_GET['carbrand']);
$modelId=intval($_GET['model']);

$query="SELECT id,sub_model FROM sub_model WHERE car_brand_id='".$carbrandId."' AND model_id=".$modelId;
$result=mysql_query($query);
/*$a=mysql_fetch_array($result);
print_r($a);

exit;
*/
?>
<select name="city">
<option value="Choisissez un model">Choisissez un modele sous</option>
<? while($row=mysql_fetch_array($result)) { ?>
<option value><?=$row['sub_model']?></option>
<? } ?>
</select>
