<?php

class Jain_Didyoumean_Helper_Data extends Mage_Core_Helper_Abstract
{
	function getDidyoumeanText()
	{
	
		Mage::getSingleton('catalogsearch/fulltext')->prepareResult();
		
		$search=Mage::getModel('catalogsearch/Mysql4_fulltext_collection');
		$search->addAttributeToSelect(Mage::getSingleton('catalog/config')->getProductAttributes());
		$search->loadData();
		
		
		$bestMatch = array();
		$input = 	Mage::helper('catalogsearch')->getQueryText();		
		foreach($search as $search1)
		{
			$words1 = explode(" ",$search1->getName());
			for($k=0; $k<count($words1); $k++)
			{
				$keyword=$words1[$k];
				$str1 = strtolower($keyword);
				$str2 = strtolower($input);
				$lev = levenshtein($str1, $str2, 1, 1, 1);
				if(isset($keyword) && trim($keyword)!= "")
					$bestMatch[$lev][] = $keyword;
					
				if(!isset($lowest) || $lev < $lowest)
				{
					$lowest = $lev;
				}				
			}
		}		
		return array_unique($bestMatch[$lowest]);
	}
	
}