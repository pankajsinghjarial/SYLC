<?


	/*==================================================================*\


	#   coder:Anil Agal    


	    Object :This code will be used for paging funtionality  this file should be 


		include after count all result rows and assign to $total varible and 


		include before query.		                                  


	\*==================================================================*/


 if(!isset($limit))


		  {


			$limit=PAGING_LIMIT;


		  }


	


	  if(!isset($currentPage))


		  {


		   $currentPage=0;


		  }


	  if($limit >= $total ) {


		 $limitStart=0;


		 $currentPage=0; 


		}


	


	  if($limit > 0)


		{


			$pagesTotal = ceil($total / $limit);


		}			 


	  $limitStart=$limit*$currentPage; 


	 ?>