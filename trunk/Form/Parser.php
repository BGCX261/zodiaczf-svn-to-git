<?php

/**
 * @see Zodiac_Form_Parser
*/
require_once 'Zodiac/Form/Element/List.php';

/**
 * Zodiac_Form_Parser
 *
 * @category   Zodiac
 * @package    Zodiac_Form
 * @author	   John Cartwright
 * @published  September 2007
*/
class Zodiac_Form_Parser
{	
	private $_tag; 
	private $_source;

	public function __construct(Zodiac_Form_Element_Attribute $attributes, $tag) 
	{
		$this->_tag = $tag;	
		$this->_attributes = $attributes;
	}

	public function render()
	{
        preg_match_all('#\[\[([\w]+)\]\]#', $this->_tag, $placeholders);
        if (isset($placeholders[0]) && count($placeholders[0])) {
			$attributes = $this->_attributes->render();
			foreach($placeholders[1] as $placeholder) {
            	if (array_key_exists($placeholder, $attributes)) {	
                	$this->_tag = str_replace('[['. $placeholder .']]', $attributes[$placeholder], $this->_tag);
                }
            }
        }	
		
		return $this->_tag;
	}
}

?>