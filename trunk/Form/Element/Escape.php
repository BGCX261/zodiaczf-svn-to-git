<?php

/**
 * See Zodiac_Form_Element_Escape_Exception
 */
require_once 'Zodiac/Form/Element/Escape/Exception.php';

/**
 * Zodiac_Form_Element_Escape
 *
 * @category   Zodiac
 * @package    Zodiac_Form
 * @author	   John Cartwright
 * @published  September 2007
*/
class Zodiac_Form_Element_Escape
{
	private $_excludeEscape = array();
	
	public function __construct(array $exclude = array())
	{
		$this->_excludeEscape = $exclude;
	}

	public function clean($name, $value) 
	{
		if (!in_array($name, $this->_excludeEscape) && is_string($value)) {
			if (ctype_digit($value)) {
				return intval($value);
			}
			
			return htmlspecialchars($value);
		}
		
		return $value;
	}
}

?>