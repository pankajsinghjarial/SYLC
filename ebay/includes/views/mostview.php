
<?php
$limit = 9;


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
function buildURLArray ($filterarray) {
	global $urlfilter;
	global $i;
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

	return "$urlfilter";
} // End of buildURLArray function

// Build the indexed item filter URL snippet
buildURLArray($filterarray);

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
$resp = simplexml_load_file($apicall);

if($resp->ack == "Success") {
	foreach( $resp->searchResult->item as $item ) {

		$itemId = $item->itemId;
		$title = $item->title;
		$galleryURL = $item->galleryURL;
		if($galleryURL == ''){
			$galleryURL = LIST_ROOT."/images/default.jpg";
		}
			
		?>
<li><span class="img_area"><a
		href="<?php echo DEFAULT_URL ?>/ebay/<?php echo $itemId;?>"><img
			alt="<?php echo $title;?>"
			src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo urlencode($galleryURL); ?>&newWidth=87&newHeight=54"
			<?php /* width="87" height="54" */?>> </a> </span> <span class="img_txt"><a
		href="<?php echo DEFAULT_URL ?>/ebay/<?php echo $itemId;?>"><?php echo substr($title, 0, strpos($title, " ", 30));?>
	</a> </span></li>
<?php 
	}
}else{
						  ?>
<li><span class="img_txt">No record found.</span></li>
<?php } ?>


