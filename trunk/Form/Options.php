<?php
/**
 * See Zodiac_Form_Element_Attribute_Name
*/
require_once 'Zodiac/Form/Element/Attribute/Name.php';

/**
 * See Zodiac_Form_Options_Exception
 */
require_once 'Zodiac/Form/Options/Exception.php';

/**
 * Zodiac_Form_Render_Select
 *
 * @category   Zodiac
 * @package    Zodiac_Form
 * @author	   John Cartwright
 * @published  September 2007
*/
abstract class Zodiac_Form_Options
{
	private $_attributeHandler;
	private $_inputIndices = array();
	
	private $_request = array();
	
	private $_attributes = array();
	private $_attributesDefault = array(
		'name' 	  => '',
		'value'   => '',
		'options' => array()
	);

	/**
	 * _setRequest
	 *
	 * @param 	(array) $request
	 * @return	void
	 */	
	public function __construct(array $request) 
	{
		$this->_request = $request;
		$this->_attributeHandler = new Zodiac_Form_Element_Attribute_Name();
	}

	/**
	 * _parseOptions
	 *
	 * @access 	private
	 * @param 	(array) $options
	 * @return  (array) $this->_attributes
	 */
    protected function _parseOptions($method, array $options)
    {
		$this->_attributes = array();
		if (isset($options[1]) && is_array($options[1])) {
			$this->_attributes = array_merge($this->_attributesDefault, $options[1]);
		}

		if (isset($options[0])) {	
			$this->_attributeHandler->setAttribute($options[0]);
			$this->_attributes['name'] = $this->_attributeHandler->buildName();		
			$this->_inputIndices = $this->_attributeHandler->buildIndices();
		}

		$default = isset($options[2]) ? $options[2] : '';
        $this->_attributes['value'] = $this->_getRequestValue($default);

		if (isset($options[3]) && is_array($options[3])) {
			$this->_attributes['options'] = $options[3];
		}

		$extra = array('checkbox' => 'checked', 'select' => 'selected');
		if (array_key_exists($method, $extra) && $this->_getRequestValue()) {
			$this->_attributes[$extra[$method]] = $extra[$method];
		}

		return $this->_attributes;		
    }

	/**
	 * _getRequestValue
	 *
	 * @param 	(string) $default
	 * @return	(string)
	 */			
	private function _getRequestValue($default = false)
	{
		if (count($this->_inputIndices) > 1) {
			return $this->_getRequestTreeValue($this->_inputIndices, $this->_request);
		}	
		
		if (isset($this->_inputIndices[0]) && array_key_exists($this->_inputIndices[0], $this->_request)) {
			return $this->_request[$this->_inputIndices[0]];
		}	
		
		return $default;
	}

	/**
	 * _getRequestTreeValue
	 *
	 * @param 	(array) $indices
	 * @param 	(array) $tree
	 * @return	(mixed)
	 */		
	private function _getRequestTreeValue(array $indices, array $tree)
	{
		$currentIndex = array_shift($indices);
		if (isset($tree[$currentIndex])) {
			if (is_array($tree[$currentIndex])) {
				return $this->_getRequestTreeValue($indices, $tree[$currentIndex]);
			}

			return $tree[$currentIndex];
		}
	}
}
		
?>
