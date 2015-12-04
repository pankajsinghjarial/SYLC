<?php 

require_once 'app/Mage.php';

$mageRunCode = isset($_SERVER['MAGE_RUN_CODE']) ? $_SERVER['MAGE_RUN_CODE'] : '';
$mageRunType = isset($_SERVER['MAGE_RUN_TYPE']) ? $_SERVER['MAGE_RUN_TYPE'] : 'store';			
Mage::app($mageRunCode,$mageRunType); 

$type = Mage::app()->getRequest()->getParam('t');

$session = Mage::getSingleton('core/session', array('name'=>'frontend'));
if( $type=='a' ) {
	$session->setFreehnd(1);
	Mage::getSingleton('checkout/cart')
		->getQuote()
		->setCouponCode('enlevement')
		->collectTotals()
		->save();
}
else {
	$session->setFreehnd(0);
	Mage::getSingleton('checkout/cart')
		->getQuote()
		->setCouponCode('')
		->collectTotals()
		->save();
}

?>