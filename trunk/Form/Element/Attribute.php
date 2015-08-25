<?php

/**
 * See Zodiac_Form_Element_Attribute_Exception
*/
require_once 'Zodiac/Form/Element/Attribute/Exception.php';

/**
 * Zodiac_Form_Element_Attribute
 *
 * @category   Zodiac
 * @package    Zodiac_Form
 * @author	   John Cartwright
 * @published  September 2007
*/
class Zodiac_Form_Element_Attribute
{
    private $_attributes;
	
	private $_escape;
	
	private $_excludeEscape = array();
	private $_excludeAttributes = array(
		'value' => null, 
		'name' 	=> null,
		'type' 	=> null,
		'options' => null
	);
	
	// DTD attributes
	private $_allowedAttributes = array(
		// Optional ..		Standard ..			Event ..				
		'accept', 			'id', 				'accesskey',
		'align', 			'title', 			'onfocus', 
		'alt', 				'style', 			'onblur', 
		'checked', 			'dir', 				'onselect', 
		'disabled', 		'lang', 			'onchange', 
		'maxlength', 							'onclick',
		'name', 								'ondblclick', 
		'readonly', 							'onmousedown', 
		'size', 								'onmouseup',
		'src', 									'onmouseover',	
		'type', 								'onmousemove',   
		'value',								'onmouseout', 
		'selected',								'onkeypress', 
		'tabindex',								'onkeydown', 
		'rows',									'onkeyup',
		'cols',
		'method',
		'action',
		'options'
			
	);

    public function __construct(array $attributes = array(), array $excludeEscape = array())
    {
		$this->_escape = new Zodiac_Form_Element_Escape($excludeEscape);
	
		$this->_excludeEscape = $excludeEscape;
        $this->_attributes = $this->_parseAttributes($attributes);
    }

    public function render()
    {
        return array_merge(array('attributes' => $this->_attributes), $this->_excludeAttributes);
    }
	
    private function _parseAttributes(array $attributes)
    {
        $output = array();
        foreach($attributes as $type => $attribute) {
			if (!in_array($type, $this->_allowedAttributes)) {
				throw new Zodiac_Form_Element_Attribute_Exception('Cannot add invalid DTD element "'. $type .'"');
			}

			if (array_key_exists($type, $this->_excludeAttributes)) {
				$this->_excludeAttributes[$type] = $this->_escape->clean($type, $attribute);
			}
			else {
				$output[] = strtolower($type) .'="'. $this->_escape->clean($type, $attribute) .'"';
			}
        }

        return implode(' ', $output);
    }
}

?>