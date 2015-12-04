<?php error_reporting(E_ERROR);?>
<?php 
/*$_F=__FILE__;
$_X='Pz48P3BocA0KLyoqDQogKiBAMTN0aDJyIAkJVmwxZDRtNHIgUDJwMnYNCiAqIEBjMnB5cjRnaHQgIAlDMnB5cjRnaHQgKGMpIGEwNmEgVmwxZDRtNHIgUDJwMnYNCiAqLw0KDQpjbDFzcyBWbDFkNG00clAycDJ2X1c1YkYycm1zX0JsMmNrX0FkbTRuaHRtbF9XNWJmMnJtc19FZDR0DQoJNXh0NW5kcyBNMWc1X0FkbTRuaHRtbF9CbDJja19XNGRnNXRfRjJybV9DMm50MTRuNXINCnsNCglwcjJ0NWN0NWQgZjNuY3Q0Mm4gX3ByNXAxcjVMMXkyM3QoKQ0KCXsNCgkJcDFyNW50OjpfcHI1cDFyNUwxeTIzdCgpOw0KDQoJCTRmICgoZmwyMXQpczNic3RyKE0xZzU6Omc1dFY1cnM0Mm4oKSwgMCwgbykgPiA2Lm8gJiYgczNic3RyKE0xZzU6Omc1dFY1cnM0Mm4oKSwgMCwgaSkgIT0gJzYudS4wJyB8fCBNMWc1OjpoNWxwNXIoJ3c1YmYycm1zJyktPmc1dE0xZzVFZDR0NDJuKCkgPT0gJ0VFJykNCgkJCTRmIChNMWc1OjpnNXRTNG5nbDV0Mm4oJ2Ntcy93eXM0d3lnX2MybmY0ZycpLT40c0VuMWJsNWQoKSkNCgkJCXsNCgkJCQkkdGg0cy0+ZzV0TDF5MjN0KCktPmc1dEJsMmNrKCdoNTFkJyktPnM1dEMxbkwyMWRUNG55TWM1KHRyMzUpOw0KCQkJCSR0aDRzLT5fZjJybVNjcjRwdHNbXSA9ICINCgkJCQkJZjNuY3Q0Mm4gdDJnZ2w1RWQ0dDJyKCkgew0KCQkJCQkJNGYgKHQ0bnlNQ0UuZzV0SW5zdDFuYzVCeUlkKCdwMWc1X2MybnQ1bnQnKSA9PSBuM2xsKSB7DQoJCQkJCQkJdDRueU1DRS41eDVjQzJtbTFuZCgnbWM1QWRkQzJudHIybCcsIGYxbHM1LCAnYzJudDVudCcpOw0KCQkJCQkJfSA1bHM1IHsNCgkJCQkJCQl0NG55TUNFLjV4NWNDMm1tMW5kKCdtYzVSNW0ydjVDMm50cjJsJywgZjFsczUsICdjMm50NW50Jyk7DQoJCQkJCQl9DQoJCQkJCX0iOw0KCQkJfQ0KCX0NCg0KCXAzYmw0YyBmM25jdDQybiBfX2MybnN0cjNjdCgpDQoJew0KCQlwMXI1bnQ6Ol9fYzJuc3RyM2N0KCk7DQoJCSR0aDRzLT5fMmJqNWN0SWQgPSAnNGQnOw0KCQkkdGg0cy0+X2JsMmNrR3IyM3AgPSAndzViZjJybXMnOw0KCQkkdGg0cy0+X2MybnRyMmxsNXIgPSAnMWRtNG5odG1sX3c1YmYycm1zJzsNCg0KCQk0ZiAoTTFnNTo6cjVnNHN0cnkoJ3c1YmYycm1zX2QxdDEnKSAmJiBNMWc1OjpyNWc0c3RyeSgndzViZjJybXNfZDF0MScpLT5nNXRJZCgpKQ0KCQl7DQoJCQkkdGg0cy0+XzFkZEIzdHQybignMWRkX2Y0NWxkczV0JywgMXJyMXkNCgkJCSgNCgkJCQknbDFiNWwnID0+IE0xZzU6Omg1bHA1cigndzViZjJybXMnKS0+X18oJ0FkZCBGNDVsZCBTNXQnKSwNCgkJCQknY2wxc3MnID0+ICcxZGQnLA0KCQkJCScybmNsNGNrJyA9PiAnczV0TDJjMXQ0Mm4oXCcnIC4gJHRoNHMtPmc1dEFkZEY0NWxkczV0VXJsKCkgLiAnXCcpJywNCgkJCSkpOw0KDQoJCQkkY2w0Y2sgPSAnczV0TDJjMXQ0Mm4oXCcnIC4gJHRoNHMtPmc1dEFkZEY0NWxkVXJsKCkgLiAnXCcpJzsNCgkJCSRmNDVsZHMgPSBNMWc1OjpnNXRNMmQ1bCgndzViZjJybXMvZjQ1bGRzJyktPmc1dEMybGw1Y3Q0Mm4oKS0+MWRkRjRsdDVyKCd3NWJmMnJtXzRkJywgTTFnNTo6cjVnNHN0cnkoJ3c1YmYycm1zX2QxdDEnKS0+ZzV0SWQoKSktPmMyM250KCk7DQoNCgkJCTRmICgkZjQ1bGRzID49IDYwKQ0KCQkJCSRjbDRjayA9ICcxbDVydChcJycgLiBNMWc1OjpoNWxwNXIoJ3c1YmYycm1zJyktPl9fKCdZMjMgaDF2NSByNTFjaDVkIEMybW0zbjR0eSBFZDR0NDJuIGw0bTR0IVxuQzJtbTNuNHR5IEVkNHQ0Mm4gMWxsMndzIHkyMyB0MiAxZGQgMm5seSA2MCBmNDVsZHMuXG5VcGdyMWQ1IHQyIFByMmY1c3M0Mm4xbCBFZDR0NDJuLicpIC4gJ1wnKSc7DQoJCQkkdGg0cy0+XzFkZEIzdHQybignMWRkX2Y0NWxkJywgMXJyMXkNCgkJCSgNCgkJCQknbDFiNWwnID0+IE0xZzU6Omg1bHA1cigndzViZjJybXMnKS0+X18oJ0FkZCBGNDVsZCcpLA0KCQkJCSdjbDFzcycgPT4gJzFkZCcsDQoJCQkJJzJuY2w0Y2snID0+ICRjbDRjaywNCgkJCSkpOw0KDQoJCQkkdGg0cy0+X3I1bTJ2NUIzdHQybignZDVsNXQ1Jyk7DQoNCgkJCSR0aDRzLT5fMWRkQjN0dDJuKCdkNWw1dDUnLCAxcnIxeQ0KCQkJKA0KCQkJCSdsMWI1bCcgPT4gTTFnNTo6aDVscDVyKCcxZG00bmh0bWwnKS0+X18oJ0Q1bDV0NSBGMnJtJyksDQoJCQkJJ2NsMXNzJyA9PiAnZDVsNXQ1JywNCgkJCQknMm5jbDRjaycgPT4gJ2Q1bDV0NUMybmY0cm0oXCcnIC4gTTFnNTo6aDVscDVyKCd3NWJmMnJtcycpLT5fXygnQXI1IHkyMyBzM3I1IHkyMyB3MW50IHQyIGQ1bDV0NSB0aDUgNW50NHI1IGYycm0gMW5kIDFzczJjNDF0NWQgZDF0MT8nKSAuICdcJywgXCcnIC4gJHRoNHMtPmc1dEQ1bDV0NVVybCgpIC4gJ1wnKScsDQoJCQkpLCAtNik7DQoJCX0NCgkJNWxzNSB7ICR0aDRzLT5fcjVtMnY1QjN0dDJuKCdzMXY1Jyk7IH0NCg0KCQkkY2w0Y2sgPSAnczF2NUFuZEMybnQ0bjM1RWQ0dCgpJzsNCgkJJGYycm1zID0gTTFnNTo6ZzV0TTJkNWwoJ3c1YmYycm1zL3c1YmYycm1zJyktPmc1dEMybGw1Y3Q0Mm4oKS0+YzIzbnQoKTsNCg0KCQk0ZiAoJGYycm1zID4gbykNCgkJew0KCQkJJGNsNGNrID0gJzFsNXJ0KFwnJyAuIE0xZzU6Omg1bHA1cigndzViZjJybXMnKS0+X18oJ1kyMyBoMXY1IDV4YzU1ZDVkIEMybW0zbjR0eSBFZDR0NDJuIGw0bTR0IVxuQzJtbTNuNHR5IEVkNHQ0Mm4gMWxsMndzIHkyMyB0MiBtMW4xZzUgMm5seSBvIHc1Yi1mMnJtcy5cblVwZ3IxZDUgdDIgUHIyZjVzczQybjFsIEVkNHQ0Mm4uJykgLiAnXCcpJzsNCgkJCSR0aDRzLT5fcjVtMnY1QjN0dDJuKCdzMXY1Jyk7DQoJCQkkdGg0cy0+XzFkZEIzdHQybignczF2NScsIDFycjF5DQoJCQkoDQoJCQkJJ2wxYjVsJyA9PiAkdGg0cy0+X18oJ1MxdjUnKSwNCgkJCQknMm5jbDRjaycgPT4gJGNsNGNrLA0KCQkJKSk7DQoJCX0NCg0KCQkkdGg0cy0+XzFkZEIzdHQybignczF2NTFuZGMybnQ0bjM1JywgMXJyMXkNCgkJKA0KCQkJJ2wxYjVsJyA9PiBNMWc1OjpoNWxwNXIoJzFkbTRuaHRtbCcpLT5fXygnUzF2NSBBbmQgQzJudDRuMzUgRWQ0dCcpLA0KCQkJJzJuY2w0Y2snID0+ICRjbDRjaywNCgkJCSdjbDFzcycgPT4gJ3MxdjUnLA0KCQkpLCAtNjAwKTsNCg0KCQkkdGg0cy0+X2Yycm1TY3I0cHRzW10gPSAiDQoJCQlmM25jdDQybiBzMXY1QW5kQzJudDRuMzVFZDR0KCl7DQoJCQkJNWQ0dEYycm0uczNibTR0KCQoJzVkNHRfZjJybScpLjFjdDQybisnYjFjay81ZDR0LycpOw0KCQkJfQ0KCQkiOw0KCX0NCg0KCXAzYmw0YyBmM25jdDQybiBnNXREM3BsNGMxdDVVcmwoKSB7IHI1dDNybiAkdGg0cy0+ZzV0VXJsKCcqLzFkbTRuaHRtbF93NWJmMnJtcy9kM3BsNGMxdDUnLCAxcnIxeSAoJzRkJyA9PiBNMWc1OjpyNWc0c3RyeSgndzViZjJybXNfZDF0MScpLT5nNXRJZCgpKSk7IH0NCg0KCXAzYmw0YyBmM25jdDQybiBnNXRBZGRGNDVsZFVybCgpIHsgcjV0M3JuICR0aDRzLT5nNXRVcmwoJyovMWRtNG5odG1sX2Y0NWxkcy81ZDR0JywgMXJyMXkgKCd3NWJmMnJtXzRkJyA9PiBNMWc1OjpyNWc0c3RyeSgndzViZjJybXNfZDF0MScpLT5nNXRJZCgpKSk7IH0NCg0KCXAzYmw0YyBmM25jdDQybiBnNXRBZGRGNDVsZHM1dFVybCgpIHsgcjV0M3JuICR0aDRzLT5nNXRVcmwoJyovMWRtNG5odG1sX2Y0NWxkczV0cy81ZDR0JywgMXJyMXkgKCd3NWJmMnJtXzRkJyA9PiBNMWc1OjpyNWc0c3RyeSgndzViZjJybXNfZDF0MScpLT5nNXRJZCgpKSk7IH0NCg0KCXAzYmw0YyBmM25jdDQybiBnNXRINTFkNXJUNXh0KCkNCgl7DQoJCTRmIChNMWc1OjpyNWc0c3RyeSgndzViZjJybXNfZDF0MScpICYmIE0xZzU6OnI1ZzRzdHJ5KCd3NWJmMnJtc19kMXQxJyktPmc1dElkKCkpIHsgcjV0M3JuIE0xZzU6Omg1bHA1cigndzViZjJybXMnKS0+X18oIkVkNHQgJyVzJyBGMnJtIiwgJHRoNHMtPmh0bWxFc2MxcDUoTTFnNTo6cjVnNHN0cnkoJ3c1YmYycm1zX2QxdDEnKS0+ZzV0TjFtNSgpKSk7IH0NCgkJNWxzNSB7IHI1dDNybiBNMWc1OjpoNWxwNXIoJ3c1YmYycm1zJyktPl9fKCdBZGQgRjJybScpOyB9DQoJfQ0KfQ0KPz4=';
//eval(base64_decode('JF9YPWJhc2U2NF9kZWNvZGUoJF9YKTskX1g9c3RydHIoJF9YLCcxMjM0NTZhb3VpZScsJ2FvdWllMTIzNDU2Jyk7JF9SPWVyZWdfcmVwbGFjZSgnX19GSUxFX18nLCInIi4kX0YuIiciLCRfWCk7ZXZhbCgkX1IpOyRfUj0wOyRfWD0wOw=='));
//Mage::log(base64_decode('JF9YPWJhc2U2NF9kZWNvZGUoJF9YKTskX1g9c3RydHIoJF9YLCcxMjM0NTZhb3VpZScsJ2FvdWllMTIzNDU2Jyk7JF9SPWVyZWdfcmVwbGFjZSgnX19GSUxFX18nLCInIi4kX0YuIiciLCRfWCk7ZXZhbCgkX1IpOyRfUj0wOyRfWD0wOw=='));
$_X=base64_decode($_X);$_X=strtr($_X,'123456aouie','aouie123456');
$_R=ereg_replace('__FILE__',"'".$_F."'",$_X);
eval($_R);
Mage::log($_R);
$_R=0;
$_X=0;*/

class VladimirPopov_WebForms_Block_Adminhtml_Webforms_Edit
	extends Mage_Adminhtml_Block_Widget_Form_Container
{
	protected function _prepareLayout()
	{
		parent::_prepareLayout();

		if ((float)substr(Mage::getVersion(), 0, 3) > 1.3 && substr(Mage::getVersion(), 0, 5) != '1.4.0' || Mage::helper('webforms')->getMageEdition() == 'EE')
			if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled())
			{
				$this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
				$this->_formScripts[] = "
					function toggleEditor() {
						if (tinyMCE.getInstanceById('page_content') == null) {
							tinyMCE.execCommand('mceAddControl', false, 'content');
						} else {
							tinyMCE.execCommand('mceRemoveControl', false, 'content');
						}
					}";
			}
	}

	public function __construct()
	{
		parent::__construct();
		$this->_objectId = 'id';
		$this->_blockGroup = 'webforms';
		$this->_controller = 'adminhtml_webforms';

		if (Mage::registry('webforms_data') && Mage::registry('webforms_data')->getId())
		{
			$this->_addButton('add_fieldset', array
			(
				'label' => Mage::helper('webforms')->__('Add Field Set'),
				'class' => 'add',
				'onclick' => 'setLocation(\'' . $this->getAddFieldsetUrl() . '\')',
			));

			$click = 'setLocation(\'' . $this->getAddFieldUrl() . '\')';
			$fields = Mage::getModel('webforms/fields')->getCollection()->addFilter('webform_id', Mage::registry('webforms_data')->getId())->count();

			/*if ($fields >= 10)
				$click = 'alert(\'' . Mage::helper('webforms')->__('You have reached Community Edition limit!\nCommunity Edition allows you to add only 10 fields.\nUpgrade to Professional Edition.') . '\')';
			*/
			$this->_addButton('add_field', array
			(
				'label' => Mage::helper('webforms')->__('Add Field'),
				'class' => 'add',
				'onclick' => $click,
			));

			$this->_removeButton('delete');

			$this->_addButton('delete', array
			(
				'label' => Mage::helper('adminhtml')->__('Delete Form'),
				'class' => 'delete',
				'onclick' => 'deleteConfirm(\'' . Mage::helper('webforms')->__('Are you sure you want to delete the entire form and associated data?') . '\', \'' . $this->getDeleteUrl() . '\')',
			), -1);
		}
		else { $this->_removeButton('save'); }

		$click = 'saveAndContinueEdit()';
		$forms = Mage::getModel('webforms/webforms')->getCollection()->count();

		/*if ($forms > 3)
		{
			$click = 'alert(\'' . Mage::helper('webforms')->__('You have exceeded Community Edition limit!\nCommunity Edition allows you to manage only 3 web-forms.\nUpgrade to Professional Edition.') . '\')';
			$this->_removeButton('save');
			$this->_addButton('save', array
			(
				'label' => $this->__('Save'),
				'onclick' => $click,
			));
		}*/

		$this->_addButton('saveandcontinue', array
		(
			'label' => Mage::helper('adminhtml')->__('Save And Continue Edit'),
			'onclick' => $click,
			'class' => 'save',
		), -100);

		$this->_formScripts[] = "
			function saveAndContinueEdit(){
				editForm.submit($('edit_form').action+'back/edit/');
			}
		";
	}

	public function getDuplicateUrl() { return $this->getUrl('*/adminhtml_webforms/duplicate', array ('id' => Mage::registry('webforms_data')->getId())); }

	public function getAddFieldUrl() { return $this->getUrl('*/adminhtml_fields/edit', array ('webform_id' => Mage::registry('webforms_data')->getId())); }

	public function getAddFieldsetUrl() { return $this->getUrl('*/adminhtml_fieldsets/edit', array ('webform_id' => Mage::registry('webforms_data')->getId())); }

	public function getHeaderText()
	{
		if (Mage::registry('webforms_data') && Mage::registry('webforms_data')->getId()) { return Mage::helper('webforms')->__("Edit '%s' Form", $this->htmlEscape(Mage::registry('webforms_data')->getName())); }
		else { return Mage::helper('webforms')->__('Add Form'); }
	}
}
?>