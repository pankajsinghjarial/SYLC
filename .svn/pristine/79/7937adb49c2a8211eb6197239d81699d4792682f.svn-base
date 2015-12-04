<?php
/**
 * @author 		Vladimir Popov (mageme.com)
 * @copyright  	Copyright (c) 2012 Vladimir Popov
 */

class VladimirPopov_WebForms_Model_Fields
	extends Mage_Core_Model_Abstract
{
	protected $img_regex = '/{{img ([\w\/\.]+)}}/';

	public function _construct()
	{
		parent::_construct();
		$this->_init('webforms/fields');
	}

	public function getFieldTypes()
	{
		$types = new Varien_Object(array
		(
			"text" => Mage::helper('webforms')->__('Text'),
			"email" => Mage::helper('webforms')->__('Text / E-mail'),
			"number" => Mage::helper('webforms')->__('Text / Number'),
			"textarea" => Mage::helper('webforms')->__('Textarea'),
			"select" => Mage::helper('webforms')->__('Select'),
			"select/radio" => Mage::helper('webforms')->__('Select / Radio'),
			"select/checkbox" => Mage::helper('webforms')->__('Select / Checkbox'),
		));

		// add more field types
		Mage::dispatchEvent('webforms_fields_types', array ('types' => $types));

		return $types->getData();
	}

	public function getSelectOptions($clean = true)
	{
		$field_value = $this->getValue();
		$options = explode("\n", $field_value);
		$options = array_map('trim', $options);
		$select_options = array ();

		foreach ($options as $o)
		{
			if ($this->getType() == 'select/contact')
			{
				if ($clean)
				{
					$contact = $this->getContactArray($o);
					$o = $contact['name'];
				}
			}
			$select_options[$this->getCheckedOptionValue($o)] = $this->getCheckedOptionValue($o);
		}
		return $select_options;
	}

	public function getResultsOptions()
	{
		$query = $this->getResource()->getReadConnection()->select('value')->from($this->getResource()->getTable('webforms/results_values'), array ('value'))->where('field_id = ' . $this->getId())->order('value asc')->distinct();
		$results = $this->getResource()->getReadConnection()->fetchAll($query);
		$options = array ();

		foreach ($results as $result) { $options[$result['value']] = $result['value']; }
		return $options;
	}

	public function getSizeTypes()
	{
		$types = new Varien_Object(array
		(
			"standard" => Mage::helper('webforms')->__('Standard'),
			"wide" => Mage::helper('webforms')->__('Wide'),
			"inline" => Mage::helper('webforms')->__('Inline'),
			"inline_limit" => Mage::helper('webforms')->__('Inline limit'),
		));

		// add more size types
		Mage::dispatchEvent('webforms_fields_size_types', array ('types' => $types));

		return $types->getData();
	}

	public function isCheckedOption($value)
	{
		$customer_value = $this->getData('customer_value');

		if ($customer_value)
		{
			$customer_values_array = explode("\n", $customer_value);

			foreach ($customer_values_array as $val)
			{
				if (trim($val) == $this->getCheckedOptionValue($value)) { return true; }
			}
			return false;
		}

		if (substr($value, 0, 1) == '^')
			return true;
		return false;
	}

	public function isNullOption($value)
	{
		if (substr($value, 0, 2) == '^^')
			return true;
		return false;
	}

	public function getCheckedOptionValue($value)
	{
		$value = preg_replace($this->img_regex, "", $value);

		if ($this->isNullOption($value))
			return trim(substr($value, 2));

		if (substr($value, 0, 1) == '^')
			return trim(substr($value, 1));

		return trim($value);
	}

	public function getOptionsArray()
	{
		$options = array ();
		$values = explode("\n", $this->getFilter()->filter($this->getValue()));

		foreach ($values as $val)
		{
			$image_src = false;
			$matches = array ();
			preg_match($this->img_regex, $val, $matches);

			if (!empty($matches[1])) { $image_src = Mage::app()->getStore()->getUrl(dirname('media/' . $matches[1])) . basename($matches[1]); }

			if (trim($val)) { $options[] = array
			(
				'value' => $this->getCheckedOptionValue($val),
				'label' => $this->getCheckedOptionValue($val),
				'null' => $this->isNullOption($val),
				'checked' => $this->isCheckedOption($val),
				'image_src' => $image_src,
			); }
		}

		return $options;
	}

	public function getFilter()
	{
		$filter = new Varien_Filter_Template_Simple();

		$customer = Mage::getSingleton('customer/session')->getCustomer();

		if ($customer->getDefaultBillingAddress())
		{
			foreach ($customer->getDefaultBillingAddress()->getData() as $key => $value)
				$filter->setData($key, $value);
		}
		$filter->setData('firstname', $customer->getFirstname());
		$filter->setData('lastname', $customer->getLastname());
		$filter->setData('email', $customer->getEmail());
		return $filter;
	}

	public function toHtml()
	{
		$html = "";

		$filter = $this->getFilter();

		// apply custom filter
		Mage::dispatchEvent('webforms_fields_tohtml_filter', array ('filter' => $filter));

		$field_id = "field[" . $this->getId() . "]";
		$field_name = $field_id;
		$field_value = $filter->filter($this->getValue());
		$result = $this->getData('result');
		$customer_value = $result ? $result->getData('field_' . $this->getId()) : false;
		$this->setData('customer_value', $customer_value);
		$field_type = $this->getType();
		$field_class = "input-text";
		$field_style = "";
		$validate = "";

		if ($this->getRequired())
			$field_class .= " required-entry";

		if ($field_type == "email")
			$field_class .= " validate-email";

		if ($field_type == "number")
			$field_class .= " validate-number";

		if ($this->getCssClass()) { $field_class .= ' ' . $this->getCssClass(); }

		if ($this->getCssStyle()) { $field_style = $this->getCssStyle(); }
		$tinyMCE = false;
		$showTime = false;
		$config = array
		(
			'field' => $this,
			'field_id' => $field_id,
			'field_name' => $field_name,
			'field_class' => $field_class,
			'field_style' => $field_style,
			'field_value' => $field_value,
			'result' => $result,
			'show_time' => 'false',
			'customer_value' => $customer_value,
			'template' => 'webforms/fields/text.phtml'
		);

		switch ($field_type)
		{
			case 'textarea':
				if ($customer_value) { $config['field_value'] = $customer_value; }
				$config['template'] = 'webforms/fields/textarea.phtml';
				break;

			case 'select':
				$config['field_options'] = $this->getOptionsArray();
				$config['template'] = 'webforms/fields/select.phtml';
				break;

			case 'select/contact':
				$config['field_options'] = $this->getOptionsArray();
				$config['template'] = 'webforms/fields/select_contact.phtml';
				break;

			case 'select/radio':
				$config['field_class'] = $this->getCssClass();
				$config['field_options'] = $this->getOptionsArray();
				$config['template'] = 'webforms/fields/select_radio.phtml';
				break;

			case 'select/checkbox':
				$config['field_class'] = $this->getCssClass();
				$config['field_options'] = $this->getOptionsArray();
				$config['template'] = 'webforms/fields/select_checkbox.phtml';
				break;

			default:
				if ($customer_value) { $config['field_value'] = $customer_value; }
				$config['template'] = 'webforms/fields/text.phtml';
				break;
		}

		$html = Mage::app()->getLayout()->createBlock('core/template', $field_name, $config)->toHtml();

		// apply custom field type
		$html_object = new Varien_Object(array ('html' => $html));
		Mage::dispatchEvent('webforms_fields_tohtml_html', array
		(
			'field' => $this,
			'html_object' => $html_object
		));

		return $html_object->getHtml();
	}
}
?>