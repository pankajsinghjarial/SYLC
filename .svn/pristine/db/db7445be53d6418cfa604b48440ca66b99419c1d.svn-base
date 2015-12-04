<?php
/**
 * @author 		Vladimir Popov (mageme.com)
 * @copyright  	Copyright (c) 2012 Vladimir Popov
 */

class VladimirPopov_WebForms_Model_Webforms
	extends Mage_Core_Model_Abstract
{
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;

	protected $_fields_to_fieldsets = array ();
	protected $_hidden = array ();

	public function _getFieldsToFieldsets() { return $this->_fields_to_fieldsets; }

	public function _setFieldsToFieldsets($fields_to_fieldsets)
	{
		$this->_fields_to_fieldsets = $fields_to_fieldsets;
		return $this;
	}

	public function _getHidden() { return $this->_hidden; }

	public function _setHidden($hidden)
	{
		$this->_hidden = $hidden;
		return $this;
	}

	public function _construct()
	{
		parent::_construct();
		$this->_init('webforms/webforms');
	}

	public function getAvailableStatuses()
	{
		$statuses = new Varien_Object(array
		(
			self::STATUS_ENABLED => Mage::helper('webforms')->__('Enabled'),
			self::STATUS_DISABLED => Mage::helper('webforms')->__('Disabled'),
		));

		Mage::dispatchEvent('webforms_statuses', array ('statuses' => $statuses));

		return $statuses->getData();
	}

	public function toOptionArray()
	{
		$collection = $this->getCollection()->addFilter('is_active', self::STATUS_ENABLED)->addOrder('name', 'asc');
		$option_array = array ();

		foreach ($collection as $webform)
			$option_array[] = array
			(
				'value' => $webform->getId(),
				'label' => $webform->getName()
			);

		return $option_array;
	}

	public function getFieldsetsOptionsArray()
	{
		$collection = Mage::getModel('webforms/fieldsets')->getCollection()->addFilter('webform_id', $this->getId());
		$collection->getSelect()->order('position asc');
		$options = array (0 => '...');

		foreach ($collection as $o) { $options[$o->getId()] = $o->getName(); }
		return $options;
	}

	public function getTemplatesOptions($type = 'admin')
	{
		$template_code = 'webforms_results';

		if ($type == 'customer') { $template_code = 'webforms_results_customer'; }
		$options = array (0 => Mage::helper('webforms')->__('Default'));

		if ((float)substr(Mage::getVersion(), 0, 3) > 1.3)
			$templates = Mage::getModel('core/email_template')->getCollection()->addFilter('orig_template_code', $template_code);
		else
			$templates = Mage::getResourceSingleton('core/email_template_collection');

		foreach ($templates as $template) { $options[$template->getTemplateId()] = '[' . $template->getTemplateId() . ']' . $template->getTemplateCode(); }
		return $options;
	}

	public function getEmailSettings()
	{
		$settings["email_enable"] = $this->getSendEmail();
		$settings["email"] = Mage::getStoreConfig('webforms/email/email');

		if ($this->getEmail())
			$settings["email"] = $this->getEmail();
		return $settings;
	}

	public function getFieldsToFieldsets($all = false)
	{
		//get form fieldsets
		$fieldsets = Mage::getModel('webforms/fieldsets')->getCollection()->addFilter('webform_id', $this->getId());

		if (!$all)
			$fieldsets->addFilter('is_active', self::STATUS_ENABLED);

		$fieldsets->getSelect()->order('position asc');

		//get form fields
		$fields = Mage::getModel('webforms/fields')->getCollection()->addFilter('webform_id', $this->getId());

		if (!$all) { $fields->addFilter('is_active', self::STATUS_ENABLED); }

		$fields->getSelect()->order('position asc');

		//fields to fieldsets
		//make zero fieldset
		$fields_to_fieldsets = array ();
		$hidden = array ();

		foreach ($fields as $field)
		{
			if ($field->getFieldsetId() == 0)
			{
				if ($all || $field->getType() != 'hidden') { $fields_to_fieldsets[0]['fields'][] = $field; }
				elseif ($field->getType() == 'hidden') { $hidden[] = $field; }
			}
		}

		foreach ($fieldsets as $fieldset)
		{
			foreach ($fields as $field)
			{
				if ($field->getFieldsetId() == $fieldset->getId())
				{
					if ($all || $field->getType() != 'hidden') { $fields_to_fieldsets[$fieldset->getId()]['fields'][] = $field; }
					elseif ($field->getType() == 'hidden') { $hidden[] = $field; }
				}
			}

			if (!empty($fields_to_fieldsets[$fieldset->getId()]['fields']))
			{
				$fields_to_fieldsets[$fieldset->getId()]['name'] = $fieldset->getName();
				$fields_to_fieldsets[$fieldset->getId()]['result_display'] = $fieldset->getResultDisplay();
			}
		}

		$this->_setFieldsToFieldsets($fields_to_fieldsets);
		$this->_setHidden($hidden);

		return $fields_to_fieldsets;
	}

	public function useCaptcha()
	{
		$useCaptcha = true;

		if (Mage::helper('customer')->isLoggedIn())
			$useCaptcha = false;

		if ($this->getData('disable_captcha'))
			$useCaptcha = false;
		
		$pubKey = Mage::getStoreConfig('webforms/captcha/public_key');
		$privKey = Mage::getStoreConfig('webforms/captcha/private_key');
		
		if(!$pubKey || !$privKey) return false;
		
		return $useCaptcha;
	}

	public function validatePostResult()
	{
		if (Mage::registry('webforms_errors_flag_' . $this->getId()))
			return Mage::registry('webforms_errors_' . $this->getId());

		$errors = array ();

		// check captcha
		if ($this->useCaptcha())
		{
			if (Mage::app()->getRequest()->getPost('recaptcha_response_field'))
			{
				$verify = Mage::helper('webforms')->getCaptcha()->verify(Mage::app()->getRequest()->getPost('recaptcha_challenge_field'), Mage::app()->getRequest()->getPost('recaptcha_response_field'));

				if (!$verify->isValid()) { $errors[] = Mage::helper('webforms')->__('Verification code was not correct. Please try again.'); }
			}
			else { $errors[] = Mage::helper('webforms')->__('Verification code was not correct. Please try again.'); }
		}

		$validate = new Varien_Object(array ('errors' => $errors));

		Mage::dispatchEvent('webforms_validate_post_result', array
		(
			'webform' => $this,
			'validate' => $validate
		));

		Mage::register('webforms_errors_flag_' . $this->getId(), true);
		Mage::register('webforms_errors_' . $this->getId(), $validate->getData('errors'));

		return $validate->getData('errors');
	}

	public function savePostResult($config = array ())
	{
		try
		{
			$postData = Mage::app()->getRequest()->getPost();

			if (!empty($config['prefix'])) { $postData = Mage::app()->getRequest()->getPost($config['prefix']); }
			$result = Mage::getModel('webforms/results');

			if (!empty($postData['result_id'])) { $result->load($postData['result_id'])->addFieldArray(); }

			$errors = $this->validatePostResult();

			if (count($errors))
			{
				foreach ($errors as $error) { Mage::getSingleton('core/session')->addError($error); }
				return;
			}

			$session_validator = Mage::getSingleton('customer/session')->getData('_session_validator_data');
			$iplong = ip2long($session_validator['remote_addr']);
			$iplong = ip2long(Mage::helper('webforms')->getRealIp());

			$result->setData('field', $postData['field'])->setWebformId($this->getId())->setStoreId(Mage::app()->getStore()->getId())->setCustomerId(Mage::getSingleton('customer/session')->getCustomerId())->setCustomerIp($iplong)->save();

			Mage::dispatchEvent('webforms_result_submit', array
			(
				'result' => $result,
				'webform' => Mage::registry('webform')
			));

			$emailSettings = $this->getEmailSettings();

			if ($emailSettings['email_enable'])
			{

				$result = Mage::getModel('webforms/results')->load($result->getId());
				$result->sendEmail();

				if ($this->getDuplicateEmail()) { $result->sendEmail('customer'); }
			}

			return $result->getId();
		}
		catch (Exception $e)
		{
			Mage::getSingleton('core/session')->addError($e->getMessage());
			return false;
		}
	}
}
?>