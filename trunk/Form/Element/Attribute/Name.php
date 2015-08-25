<?php

/**
 * See Zodiac_Form_Element_Attribute_Indice
*/
require_once 'Zodiac/Form/Element/Attribute/Indice.php';

/**
 * Zodiac_Form_Element_Attribute_Name
 *
 * @category   Zodiac
 * @package    Zodiac_Form
 * @author	   John Cartwright
 * @published  September 2007
*/
class Zodiac_Form_Element_Attribute_Name extends Zodiac_Form_Element_Attribute_Indice
{
	private $_inputIndices = array();

	/**
	 * setAttribute
	 *
	 * @access 	public
	 * @param 	(string) $input
	 * @return	(void)
	 */	
	public function setAttribute($input)
	{
		preg_match_all('/[^\[\]\s]++|(?=\[\])/i', $input, $matches);
		$this->_inputIndices = $matches[0];
	}

	/**
	 * buildName
	 *
	 * @access 	public
	 * @return	(string)
	 */	
	public function buildName()
	{
		if (!count($this->_inputIndices)) {
			throw new Zodiac_Form_Element_Attribute_Exception('Cannot build name, no attribute input supplied to self::insert()');
		}
		
		$plainName = array_shift($this->_inputIndices);
		$formatName = $plainName;
		
		$num = count($this->_inputIndices);
		if ($num > 0) {
			$generateIndice = false; 
			if (empty($this->_inputIndices[($num-1)])) {
				$generateIndice = true;
				array_pop($this->_inputIndices);
			}
		
			if ($num > 1) {
				$formatName .= '['. implode('][', $this->_inputIndices).']';				
			}

			if (($num > 1 && $generateIndice) || $num === 1) {
				$formatName .= '['. $this->_registerIndice($plainName, $this->_inputIndices) .']';
				array_push($this->_inputIndices, $this->_getLastIndice());
			}
		}

		$this->_inputIndices = array_merge((array)$plainName, $this->_inputIndices);
		
		return $formatName;
	}
	
	/**
	 * buildIndices
	 *
	 * @access 	public
	 * @return	(array)
	 */	
	public function buildIndices()
	{
		if (!count($this->_inputIndices)) {
			throw new Zodiac_Form_Element_Attribute_Exception('Cannot build indices, no attribute input supplied to self::insert()');
		}
		
		return $this->_inputIndices;
	}	
}

?>