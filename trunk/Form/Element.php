<?php

/**
 * @see Zodiac_Form_Parser
*/
require_once 'Zodiac/Form/Parser.php';

/**
 * @see Zodiac_Form_Element_Attribute
*/
require_once 'Zodiac/Form/Element/Attribute.php';

/**
 * Zodiac_Form_Element
 *
 * @category   Zodiac
 * @package    Zodiac_Form
 * @author	   John Cartwright
 * @published  September 2007
*/
abstract class Zodiac_Form_Element
{
    public function render(Zodiac_Form_Element_Attribute $attributes, $tag, array $excludeEscape = array())
    {
		$parser = new Zodiac_Form_Parser($attributes, $tag, $excludeEscape);

	    return $parser->render();
    }
}

?>