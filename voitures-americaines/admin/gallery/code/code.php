<?php

error_reporting(0);
/*************************************************************************************************************

#Coder       : Kapil Verma

*************************************************************************************************************/




extract($_GET);


extract($_POST);


if(isset($pid) && $action=='delete'){
	//echo $pid; die;
$objCommon->delete('car_gallery','id='.$pid);
  $_SESSION['msg']='Deleted Successfully';
  echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/gallery/index.php";</script>'; 
    exit;

  }

  $statusInfot = $objCommon->read('car_gallery','',"id DESC");
   $total_pages = mysql_num_rows($statusInfot);



/* Setup vars for query. */
$targetpage = "index.php"; 	//your file name  (the name of this file)
$limit = 10; 								//how many items to show per page
if(isset($page))
{
	$page = $_GET['page'];
}else
{	$page = 0;
}if($page)
{	$start = ($page - 1) * $limit; 			//first item to display on this page
}else
{	$start = 0;								//if no page var is given, set start to 0
}
/* Get data. */
$statusInfo = $objCommon->read('car_gallery','',"id DESC limit $start, $limit");
//$result = $obj_cat->getAll('',$start, $limit);
/* Setup page vars for display. */
if ($page == 0){ $page = 1;}					//if no page var is given, default to 1.
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
	
?>
