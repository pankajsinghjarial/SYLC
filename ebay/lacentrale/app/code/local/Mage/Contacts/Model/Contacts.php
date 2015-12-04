<?php

/**
 * 
 * @author branko
 * 
	$model = new Ajzele_SimpleModel_Model_Hello();
	
	//$model = Mage::getModel('hello/hello');
	//$o = $model->load(1);
	//var_dump($o);
	//$model->save();
	
	$model->setField1('Hello from f1');
	$model->setField2('F2 value here');
	//$model->save();
	
	echo '<pre>'; print_r($model->load(2)); echo '</pre>';
 *
 */

class Mage_Contacts_Model_Contacts extends Mage_Core_Model_Abstract 
{
    protected function _construct()
    {
		$this->_init('contacts/contacts');
    }	
}