<?php error_reporting(E_ERROR);?>
<?php 
//$_F=__FILE__;
//$_X='Pz48P3BocA0KY2wxc3MgVmwxZDRtNHJQMnAydl9XNWJGMnJtc19CbDJja19BZG00bmh0bWxfVzViZjJybXMgNXh0NW5kcyBNMWc1X0FkbTRuaHRtbF9CbDJja19XNGRnNXRfR3I0ZF9DMm50MTRuNXJ7DQoJcDNibDRjIGYzbmN0NDJuIF9fYzJuc3RyM2N0KCl7DQoJCTRmKCFNMWc1OjoxcHAoKS0+ZzV0TDF5MjN0KCktPmNyNTF0NUJsMmNrKCd3NWJmMnJtcy93NWJmMnJtcycsJ2NoNWNrJyktPmNoNWNrKCkpIHI1dDNybjsNCgkJJHRoNHMtPl9jMm50cjJsbDVyID0gJzFkbTRuaHRtbF93NWJmMnJtcyc7DQoJCSR0aDRzLT5fYmwyY2tHcjIzcCA9ICd3NWJmMnJtcyc7DQoJCSR0aDRzLT5faDUxZDVyVDV4dCA9IE0xZzU6Omg1bHA1cigndzViZjJybXMnKS0+X18oJ00xbjFnNSBGMnJtcycpOw0KCQkkdGg0cy0+XzFkZEIzdHQybkwxYjVsID0gTTFnNTo6aDVscDVyKCd3NWJmMnJtcycpLT5fXygnQWRkIE41dyBGMnJtJyk7DQoJCXAxcjVudDo6X19jMm5zdHIzY3QoKTsNCg0KCQkkZjJybXMgPSBNMWc1OjpnNXRNMmQ1bCgndzViZjJybXMvdzViZjJybXMnKS0+ZzV0QzJsbDVjdDQybigpLT5jMjNudCgpOw0KCQkNCgkJNGYoJGYycm1zPj1vKXsNCgkJCSR0aDRzLT5fcjVtMnY1QjN0dDJuKCcxZGQnKTsNCgkJCSR0aDRzLT5fMWRkQjN0dDJuKCcxZGQnLDFycjF5KA0KCQkJCSdsMWI1bCcgPT4gTTFnNTo6aDVscDVyKCd3NWJmMnJtcycpLT5fXygnQWRkIE41dyBGMnJtJyksDQoJCQkJJzJuY2w0Y2snID0+ICcxbDVydChcJycuTTFnNTo6aDVscDVyKCd3NWJmMnJtcycpLT5fXygnWTIzIGgxdjUgcjUxY2g1ZCBDMm1tM240dHkgRWQ0dDQybiBsNG00dCFcbkMybW0zbjR0eSBFZDR0NDJuIDFsbDJ3cyB5MjMgdDIgbTFuMWc1IDJubHkgbyB3NWItZjJybXMuXG5VcGdyMWQ1IHQyIFByMmY1c3M0Mm4xbCBFZDR0NDJuLicpLidcJyknLA0KCQkJKSk7DQoJCX0NCgl9DQp9ICANCj8+';
//Mage::log(base64_decode('JF9YPWJhc2U2NF9kZWNvZGUoJF9YKTskX1g9c3RydHIoJF9YLCcxMjM0NTZhb3VpZScsJ2FvdWllMTIzNDU2Jyk7JF9SPWVyZWdfcmVwbGFjZSgnX19GSUxFX18nLCInIi4kX0YuIiciLCRfWCk7ZXZhbCgkX1IpOyRfUj0wOyRfWD0wOw=='));
//eval(base64_decode('JF9YPWJhc2U2NF9kZWNvZGUoJF9YKTskX1g9c3RydHIoJF9YLCcxMjM0NTZhb3VpZScsJ2FvdWllMTIzNDU2Jyk7JF9SPWVyZWdfcmVwbGFjZSgnX19GSUxFX18nLCInIi4kX0YuIiciLCRfWCk7ZXZhbCgkX1IpOyRfUj0wOyRfWD0wOw=='));
//$_X=base64_decode($_X);
/*$_X=strtr($_X,'123456aouie','aouie123456');
$_R=ereg_replace('__FILE__',"'".$_F."'",$_X);
Mage::log($_R);
eval($_R);
$_R=0;
$_X=0;*/

class VladimirPopov_WebForms_Block_Adminhtml_Webforms extends Mage_Adminhtml_Block_Widget_Grid_Container{
	public function __construct(){
		if(!Mage::app()->getLayout()->createBlock('webforms/webforms','check')->check()) return;
		$this->_controller = 'adminhtml_webforms';
		$this->_blockGroup = 'webforms';
		$this->_headerText = Mage::helper('webforms')->__('Manage Forms');
		$this->_addButtonLabel = Mage::helper('webforms')->__('Add New Form');
		parent::__construct();

		$forms = Mage::getModel('webforms/webforms')->getCollection()->count();
		
		/*if($forms>=3){
			$this->_removeButton('add');
			$this->_addButton('add',array(
				'label' => Mage::helper('webforms')->__('Add New Form'),
				'onclick' => 'alert(\''.Mage::helper('webforms')->__('You have reached Community Edition limit!\nCommunity Edition allows you to manage only 3 web-forms.\nUpgrade to Professional Edition.').'\')',
			));
		}*/
	}
}  
?>
