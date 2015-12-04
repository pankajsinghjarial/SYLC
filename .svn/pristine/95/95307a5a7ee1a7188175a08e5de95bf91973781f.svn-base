<?php   
class Creare_DynamicSitemap_Block_Dynamicsitemap extends Mage_Core_Block_Template
{   

	public function getCreareCMSPages($start=0, $limit=0){
		
		$storeId = $this->helper('core')->getStoreId(); // thanks to drawandcode for this
		$cms = Mage::getModel('cms/page')->getCollection()
				->addFieldToFilter('is_active',1)
				->addStoreFilter($storeId);
		$url = Mage::getBaseUrl();
		$html = "";
		$index=0;
		foreach($cms as $cmspage):
			$index++;
			if($index>=$start && $index<=$limit) {
				$page = $cmspage->getData();	
				if($page['identifier'] == "no-route" || $page['identifier'] == "enable-cookies" || $page['identifier'] == "empty"){ /* do nothing or something here */ } else {
					if($page['identifier'] == "home"){
						$html .= "<li><a href=\"$url\" title=\"".$page['title']."\">".$page['title']."</a></li>\n"; // this is for a nice local link to home
					} else {
						$html .= "<li><a href=\"$url".$page['identifier']."\" title=\"".$page['title']."\">".$page['title']."</a></li>\n";
					}
				}
			}
		endforeach;
		
		return $html;	
	} 

}