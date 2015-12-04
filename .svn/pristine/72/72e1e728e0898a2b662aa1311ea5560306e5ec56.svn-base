<?php include("conf/config.inc.php"); ?>
<?php
  $value = $_POST['value'];
  $attribute = $_POST['attr'];
  $manufac = $_POST['manufact'];
  $classname = $_POST["class"];
  if($classname == "") { $classname = "customStyleSelectBox";}

$common = new common(); 

if($attribute == "model")
{
	$year =  $common->CustomQuery("SELECT Year From ebay_car where Make LIKE '%".$manufac."%' AND Model = '".$value."' GROUP BY Year order by Year ASC;");

	$returnvalue = '<select class="'.$classname.'" name="madeYear" id="madeYear">';
	$returnvalue .= "<option value=''>Ann&eacute;e</option>";

	while($yrow = mysql_fetch_object($year))
	{
	$returnvalue .= "<option value='".$yrow->Year."'>".$yrow->Year."</option>";
	}
	$returnvalue .= '</select>';
	echo $returnvalue;
}
else if($attribute == "manufacturer")
{ 
	$model =$common->CustomQuery("SELECT Model From ebay_car where Make LIKE '%".$value."%'  GROUP BY Model order by Model ASC;");
	
	$returnvalue = '<select class="'.$classname.'" id="model" name="model" onchange="ajaxcall(this.value,\'model\',\'year\',\''.$value.'\')">';
	$returnvalue .= "<option value=''>Mod&egrave;les</option>";
	while($yrow = mysql_fetch_object($model))
	{
	$returnvalue .= "<option value='".$yrow->Model."'>".$yrow->Model."</option>";
	}
	$returnvalue .= '</select>';
	echo $returnvalue;
}

 ?>