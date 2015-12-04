<?php
//Takeing all admin info from admins table
$adminInfo 		= $objCommon->read(TBL_ADMIN, 'id='.$_SESSION['LoggedInId']);
$adminDetails 	= $db->fetchNextObject($adminInfo);
$totalPages 	= $objCommon->numberOfRows(TBL_PAGE);
$totalCars 	= $objCommon->numberOfRows("car");
$totalContact 	= $objCommon->numberOfRows("contact","status = 0");
$latestcars = $objCommon->customQuery("select car_id,stock_id from car order by car_id desc limit 5");
$latestenquiry = $objCommon->customQuery("select * from contact where status = 0 order by id desc limit 5");
$latestpage = $objCommon->customQuery("select * from pages where publish = 1 order by id desc limit 5");
?>