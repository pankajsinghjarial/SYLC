<?php
$server = "localhost";
$user = "httpsylc_sylcUse";
$pass = "User@123";
$base = "httpsylc_sylc"; 


error_reporting(E_ALL | E_STRICT);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);

for($i = 1; true ; $i++){
	if(file_exists(dirname(__FILE__)."/sitemap-car".$i.".xml")){
		unlink(dirname(__FILE__)."/sitemap-car".$i.".xml");
	}
	else{
		break;
	}
}

mysql_connect($server, $user, $pass) or die('ERROR :: Server connection not possible.');
mysql_select_db($base)               or die('ERROR :: Database connection not possible.');


/* variable declaration */
$base_path = dirname(__FILE__);
$root_path = dirname($base_path);
$start = 0;
$end = 1000;

$diff = $end-$start;

$maxurl = 20000;
$count = 0;
$i = 1;
$new_file = true;

$sitemap_arr = array("sitemap-page.xml");


while(true){
	$query ="SELECT car_id FROM car LIMIT ". $start. ", ".$end;
	$carIds_result = mysql_query($query);

	if(mysql_num_rows($carIds_result) > 0 ){
		
		if($new_file){
			if(isset($doc)){
				$doc->appendChild( $r );
				$sitemap_arr[] = "sitemap-car".$i.".xml";
				$doc->save($base_path."/sitemap-car".$i.".xml");
				$i++;
				unset($doc);
			}
			
			//create new xml document
			$doc = new DOMDocument('1.0', "UTF-8");
			$doc->formatOutput = true;
		
			$r = $doc->createElement( "urlset" );
			$xmlns = $doc->createAttribute("xmlns");
			$xmlns->value = "http://www.sitemaps.org/schemas/sitemap/0.9" ;
			$r->appendChild($xmlns);
		
			$xmlnsxsi = $doc->createAttribute("xmlns:xsi");
			$xmlnsxsi->value = "http://www.w3.org/2001/XMLSchema-instance" ;
			$r->appendChild($xmlnsxsi);
		
			$xsischemaLocation = $doc->createAttribute("xsi:schemaLocation");
			$xsischemaLocation->value = "http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd";
			$r->appendChild($xsischemaLocation);
		
			$new_file = false;
		
		}
		
		
		while($row = mysql_fetch_object($carIds_result)){
			$url = $doc->createElement("url");
			$loc = $doc->createElement("loc","http://www.americancarcentrale.com/car/".$row->car_id);
			$ch = $doc->createElement("changefreq", "daily");
			$pri = $doc->createElement("priority", "0.640");
				
				
			$url->appendChild($loc);
			$url->appendChild($ch);
			$url->appendChild($pri);
				
				
			$r->appendChild( $url );
		}

		
		
		$start += $diff;
		$count += $diff;
		
		if($count >= $maxurl) {
			$count = 0;
			$new_file = true;
		}
	}
	else{
		
		if(isset($doc) & !$new_file){
			$doc->appendChild( $r );
			$sitemap_arr[] = "sitemap-car".$i.".xml";
			$doc->save($base_path."/sitemap-car".$i.".xml");
			$i++;
			unset($doc);
		}
		break;
	}
	
}




/* create sitemap index */
$doc = new DOMDocument('1.0', "UTF-8");
$doc->formatOutput = true;

$r = $doc->createElement( "sitemapindex" );
$xmlns = $doc->createAttribute("xmlns");
$xmlns->value = "http://www.sitemaps.org/schemas/sitemap/0.9" ;
$r->appendChild($xmlns);


foreach($sitemap_arr as $val){
	$url = $doc->createElement("url");
	$loc = $doc->createElement("sitemap","http://www.americancarcentrale.com/sitemaps/".$val);
	
	$url->appendChild($loc);
	
	$r->appendChild( $url );
}
$doc->appendChild( $r );
$doc->save($root_path."/sitemap_index.xml");
