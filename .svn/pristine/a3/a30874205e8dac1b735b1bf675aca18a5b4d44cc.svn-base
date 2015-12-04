<div class="middle_two_right_announces">
	<div id="craftysyntax_1">
		<script type="text/javascript"
			src="/~httpsylc/live-chat/livehelp_js.php?eo=0&amp;relative=Y&amp;department=1&amp;serversession=1&amp;pingtimes=10&amp;dynamic=Y&amp;creditline=L"></script>
	</div>

	<div class="nos_partenaires_announces">
		<div class="bank_of_america">
			<?php	$slide = $commons->CustomQuery("Select * from banner where publish = 1 and type = 6");
			while($image = mysql_fetch_object($slide)){ ?>
			<?php if($image->website != "") { ?>
			<a href="<?php echo $image->website; ?>" target="_blank"> <?php } ?>
				<img class="ad_img"
				src="<?php echo DEFAULT_URL; ?>/images/banner/<?php echo $image->image;  ?>"
				alt="Banner" /> <?php if($image->website != "") { ?>
			</a>
			<?php } ?>
			<?php } ?>
		</div>
	</div>



	<div class="nos_partenaires_announces">
		<div class="head_1">MODELES POPULAIRES</div>

		<?php
		$limit = 6;
		// API request variables
		$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
		$version = '1.0.0';  // API version supported by your application
		$appid = 'dothejob-c9de-4e5d-adf2-73a736a2651a';  // Replace with your own AppID
		$globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
		$i = '0';  // Initialize the item filter index to 0

		// Create a PHP array of the item filters you want to use in your request
		$filterarray =
		array(
				array(
						'name' => 'MaxPrice',
						'value' => '10000000',
						'paramName' => 'Currency',
						'paramValue' => 'USD'),
				array(
						'name' => 'ListingType',
						'value' => array('FixedPrice','StoreInventory','AuctionWithBIN','Auction'),
						'paramName' => '',
						'paramValue' => ''),
		);

		// Generates an indexed URL snippet from the array of item filters
		function urlArray ($filterarray) {
			
			$i=0;
			// Iterate through each filter in the array
			foreach($filterarray as $itemfilter) {
				// Iterate through each key in the filter
				foreach ($itemfilter as $key =>$value) {
					if(is_array($value)) {
						foreach($value as $j => $content) { // Index the key for each value
							$urlfilter .= "&itemFilter($i).$key($j)=$content";
						}
					}
					else {
						if($value != "") {
							$urlfilter .= "&itemFilter($i).$key=$value";
						}
					}
				}
				$i++;
			}

			return $urlfilter;
		} // End of buildURLArray function

		// Build the indexed item filter URL snippet
		 $urlfilter = urlArray($filterarray);

		// Construct the findItemsByKeywords HTTP GET call
		$apicall = "$endpoint?";
		$apicall .= "OPERATION-NAME=findItemsAdvanced";
		$apicall .= "&SERVICE-VERSION=$version";
		$apicall .= "&SECURITY-APPNAME=$appid";
		$apicall .= "&RESPONSE-DATA-FORMAT=XML&REST-PAYLOAD";
		$apicall .= "&GLOBAL-ID=$globalid";
		$apicall .= "&categoryId=6001";
		$apicall .= "&paginationInput.entriesPerPage=".$limit;
		$apicall .= "&aspectFilter(0).aspectName=Make";
		$apicall .= "&aspectFilter(0).aspectValueName(0)=Mercedes-Benz";
		$apicall .= "&aspectFilter(0).aspectValueName(1)=Aston+Martin";
		$apicall .= "&aspectFilter(0).aspectValueName(2)=Buick";
		$apicall .= "&aspectFilter(0).aspectValueName(3)=Cadillac";
		$apicall .= "&aspectFilter(0).aspectValueName(4)=Chevrolet";
		$apicall .= "&aspectFilter(0).aspectValueName(5)=Chrysler";
		$apicall .= "&aspectFilter(0).aspectValueName(6)=Dodge";
		$apicall .= "&aspectFilter(0).aspectValueName(7)=Excalibur";
		$apicall .= "&aspectFilter(0).aspectValueName(8)=Ferrari";
		$apicall .= "&aspectFilter(0).aspectValueName(9)=Ford";
		$apicall .= "&aspectFilter(0).aspectValueName(10)=General+Motor+Corp.";
		$apicall .= "&aspectFilter(0).aspectValueName(11)=GMC";
		$apicall .= "&aspectFilter(0).aspectValueName(12)=Hummer";
		$apicall .= "&aspectFilter(0).aspectValueName(13)=Chrysler";
		$apicall .= "&aspectFilter(0).aspectValueName(14)=Morgan";
		$apicall .= "&aspectFilter(0).aspectValueName(15)=Plymouth";
		$apicall .= "&aspectFilter(0).aspectValueName(16)=Pontiac ";
		$apicall .= "&aspectFilter(0).aspectValueName(17)=Porsche";
		$apicall .= "&aspectFilter(0).aspectValueName(18)=Studebaker";
		$apicall .= "&aspectFilter(0).aspectValueName(19)=Toyota";
		$apicall .= "&sellingStatus.sellingState=Active";
		$apicall .= "&descriptionSearch=true";
		$apicall .= "$urlfilter";
		$apicall .= '&sortOrder=EndTimeSoonest';

		// Load the call and capture the document returned by eBay API
		$carlistsidebar = simplexml_load_file($apicall);

		if($carlistsidebar->ack == "Success") {
			foreach( $carlistsidebar->searchResult->item as $item ) {

			$itemId = $item->itemId;
			$title = $item->title;
			$galleryURL = $item->galleryURL;
			if($galleryURL == ''){
				$galleryURL = LIST_ROOT."/images/default.jpg";
			}
			
		?>
		<div class="nos_stock_area">
			<div class="nos_stock_img_bg">
			 
			 <div class="imgOuter01">
				<img
					src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo urlencode($galleryURL); ?>&newWidth=96&newHeight=96"
					alt="<?php echo $title;?>" /></div>
			</div>
			<div class="nos_stock_txt">
				<div class="head_4">
					<a href="<?php echo DEFAULT_URL ?>/ebay/<?php echo $itemId;?>">
						<?php echo substr($title, 0, strpos($title, " ", 30));?>
					</a>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		
		<?php  }
			} else {	$galleryURL = LIST_ROOT."/images/default.jpg"; ?>
				<div class="nos_stock_area">
			<div class="nos_stock_img_bg">
				<div class="imgOuter01">
				<img
					src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo urlencode($galleryURL); ?>&newWidth=96&newHeight=96"
					alt="NOT FOUND" />
					</div>
			</div>
			<div class="nos_stock_txt">
				<div class="head_4">
					<a>
						No record found.
					</a>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		<?php /* 
		<?php $new = $common->CustomQuery('Select car_id from car order by car_id DESC limit 0,4');
		while($newcar = mysql_fetch_object($new))
		{
			$newarray = $common->getCarWithAttrList($newcar->car_id ,array("images","manufacturer","model","features"));
			$imgpatha = $commons->getImageUrl($newarray[$newcar->car_id]["images"]);

		 ?>
		<div class="nos_stock_area">
			<div class="nos_stock_img_bg">
				<img
					src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $imgpatha; ?>&newWidth=96&newHeight=96"
					alt="fgf" />
			</div>
			<div class="nos_stock_txt">
				<div class="head_4">
					<a href="<?php echo DEFAULT_URL ?>/car/<?=$newcar->car_id;?>"><?php echo $newarray[$newcar->car_id]["manufacturer"]." : ".$newarray[$newcar->car_id]["model"] ?>
					</a>
				</div>
				<?php echo $common->getFeatureForListing($newarray[$newcar->car_id]["features"],5) ?>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		 */?>
		
	</div>
</div>
<div class="clear"></div>
