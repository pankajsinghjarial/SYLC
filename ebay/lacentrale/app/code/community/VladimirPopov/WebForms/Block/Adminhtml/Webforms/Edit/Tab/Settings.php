<?php
/**
 * Feel free to contact me via Facebook
 * http://www.facebook.com/rebimol
 *
 *
 * @author 		Vladimir Popov
 * @copyright  	Copyright (c) 2011 Vladimir Popov
 */

class VladimirPopov_WebForms_Block_Adminhtml_Webforms_Edit_Tab_Settings
	extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareLayout(){
		
		parent::_prepareLayout();
	}	
	
	protected function _prepareForm()
	{
		$model = Mage::getModel('webforms/webforms');
		$form = new Varien_Data_Form();
		$this->setForm($form);
	
		$fieldset = $form->addFieldset('webforms_general',array(
			'legend' => Mage::helper('webforms')->__('General Settings')
		));
		
		$fieldset->addField('registered_only', 'select', array(
			'label'     => Mage::helper('webforms')->__('Registered customers only'),
			'title'     => Mage::helper('webforms')->__('Registered customers only'),
			'name'      => 'registered_only',
			'required'  => false,
			'values'   => Mage::getModel('adminhtml/system_config_source_yesno')->toOptionArray(),
		));

		$fieldset->addField('survey', 'select', array(
			'label'     => Mage::helper('webforms')->__('Survey mode'),
			'title'     => Mage::helper('webforms')->__('Survey mode'),
			'name'      => 'survey',
			'required'  => false,
			'note' => Mage::helper('webforms')->__('Survey mode allows filling up the form only one time'),
			'values'   => Mage::getModel('adminhtml/system_config_source_yesno')->toOptionArray(),
		));
		
		$fieldset->addField('approve', 'select', array(
			'label'     => Mage::helper('webforms')->__('Enable approval'),
			'title'     => Mage::helper('webforms')->__('Enable approval'),
			'name'      => 'approve',
			'required'  => false,
			'note' => Mage::helper('webforms')->__('Enable approval of results'),
			'values'   => Mage::getModel('adminhtml/system_config_source_yesno')->toOptionArray(),
		));

		$fieldset->addField('redirect_url', 'text', array(
			'label'     => Mage::helper('webforms')->__('Redirect URL'),
			'title'     => Mage::helper('webforms')->__('Redirect URL'),
			'name'      => 'redirect_url',
			'note' => Mage::helper('webforms')->__('Redirect to specified url after successful submission'),
		));

		$fieldset = $form->addFieldset('webforms_email',array(
			'legend' => Mage::helper('webforms')->__('E-mail Settings')
		));

		$fieldset->addField('send_email', 'select', array(
			'label'     => Mage::helper('webforms')->__('Send results by e-mail'),
			'title'     => Mage::helper('webforms')->__('Send results by e-mail'),
			'name'      => 'send_email',
			'required'  => false,
			'values'   => Mage::getModel('adminhtml/system_config_source_yesno')->toOptionArray(),
		));
		
		$fieldset->addField('duplicate_email', 'select', array(
			'label'     => Mage::helper('webforms')->__('Duplicate results by e-mail to customer'),
			'title'     => Mage::helper('webforms')->__('Duplicate results by e-mail to customer'),
			'name'      => 'duplicate_email',
			'required'  => false,
			'values'   => Mage::getModel('adminhtml/system_config_source_yesno')->toOptionArray(),
		));
		
		$fieldset->addField('email','text',array(
			'label' => Mage::helper('webforms')->__('Notification e-mail address'),
			'note' => Mage::helper('webforms')->__('If empty default notofication e-mail address will be used. You can set multiple addresses comma-separated'),
			'name' => 'email'
		));
		
		Mage::dispatchEvent('webforms_adminhtml_webforms_edit_tab_settings_prepare_form', array('form' => $form, 'fieldset' => $fieldset));

		if (!Mage::registry('webforms_data')->getId()) {
			Mage::registry('webforms_data')->setData('send_email',1);
		}

		if(Mage::registry('webforms_data')->getData('files_upload_limit') == 0){
			Mage::registry('webforms_data')->setData('files_upload_limit','');
		}
		
		if(Mage::registry('webforms_data')->getData('images_upload_limit') == 0){
			Mage::registry('webforms_data')->setData('images_upload_limit','');
		}
		
		if(Mage::getSingleton('adminhtml/session')->getWebFormsData())
		{
			$form->setValues(Mage::getSingleton('adminhtml/session')->getWebFormsData());
			Mage::getSingleton('adminhtml/session')->setWebFormsData(null);
		} elseif(Mage::registry('webforms_data')){
			$form->setValues(Mage::registry('webforms_data')->getData());
		}
		
		
		
		return parent::_prepareForm();
	}
}  
?>
