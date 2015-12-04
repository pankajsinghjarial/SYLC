<?php
/**
 * @author 		Vladimir Popov
 * @copyright  	Copyright (c) 2012 Vladimir Popov
 */

class VladimirPopov_WebForms_Model_Mysql4_Results_Collection
	extends Mage_Core_Model_Mysql4_Collection_Abstract
{
	
	protected $filtered_values;
	
	public function _construct(){
		parent::_construct();
		$this->_init('webforms/results');
	}
	
	protected function _afterLoad()
	{
		parent::_afterLoad(); 
		foreach ($this as $item) {
			$query = $this->getConnection()->select()
				->from($this->getTable('webforms/results_values'))
				->where($this->getTable('webforms/results_values').'.result_id = '.$item->getId())
				;	
			$results = $this->getConnection()->fetchAll($query);
			foreach($results as $result){
				$item->setData('field_'.$result['field_id'],trim($result['value']));
			}
			
			$item->setData('ip',long2ip($item->getCustomerIp()));
			
		}
		
		Mage::dispatchEvent('webforms_results_collection_load',array('collection'=>$this));

		return $this;
	}
	
}  
?>
