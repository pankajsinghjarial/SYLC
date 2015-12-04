<?php 
extract($_POST);
extract($_GET);

$common = new common();
if($parent_id ){
	$terms = $common->CustomQuery("Select mainpage.* from pages as mainpage left join pages as parentCat on (mainpage.page_cat = parentCat.id) where mainpage.slug = '$page_id' AND parentCat.slug = '$parent_id'");	
}
else{
	$terms = $common->CustomQuery("Select * from pages where slug = '$page_id' and page_cat = 0");	
}

$terms = mysql_fetch_object($terms);
?>