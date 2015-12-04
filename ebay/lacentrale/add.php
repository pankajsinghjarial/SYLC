<?php

require_once 'app/Mage.php';

$mageRunCode = isset($_SERVER['MAGE_RUN_CODE']) ? $_SERVER['MAGE_RUN_CODE'] : '';
$mageRunType = isset($_SERVER['MAGE_RUN_TYPE']) ? $_SERVER['MAGE_RUN_TYPE'] : 'store';			
Mage::app($mageRunCode,$mageRunType); 

$qty = Mage::app()->getRequest()->getParam('qty');
$sku = Mage::app()->getRequest()->getParam('sku');

$product = Mage::getModel('catalog/product')->loadByAttribute('sku', $sku);
Mage::log($product);

if( is_object($product) && $product->getId()>0 ) {
	$product_id = $product->getId();
	$url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB) . 'checkout/cart/add'.'?product='.$product_id.'&qty='.$qty;
}
else {
	$url = '';
}
echo $url;

?>