<?php 
extract($_POST);
extract($_GET);
$common = new common();
$faq = $common->CustomQuery("Select * from faq where publish = 1");
$faqhead = $common->CustomQuery("Select * from pages where id = 46");
$faqtext = mysql_fetch_object($faqhead);


?>