<?php

$installer = $this;

$installer->startSetup();
$collection =Mage::getModel('onestepcheckout/onestepcheckout')->getCollection();
$installer->run(" alter table {$collection->getTable('onestepcheckout')}  modify column mw_deliverydate_time varchar(55);  ");

$installer->endSetup(); 