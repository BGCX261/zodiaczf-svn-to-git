<?php

/**
 * @see Zodiac_Form_Parser
*/
require_once 'Zodiac/Form/Render/Interface.php';

/**
 * @see Zodiac_Form_Parser
*/
require_once 'Zodiac/Form/Element.php';

/**
 * @see Zodiac_Form_Parser
*/
require_once 'Zodiac/Form/Element/List.php';

/**
 * Zodiac_Form_Render_Password
 *
 * @category   Zodiac
 * @package    Zodiac_Form
 * @author	   John Cartwright
 * @published  September 2007
*/
class Zodiac_Form_Render_Password extends Zodiac_Form_Element implements Zodiac_Form_Render_Interace
{
    public function render(array $attributes)
    {
		if (!empty($attributes['value'])) {
			$attributes['value'] = '';
		}
		
       	return parent::render(new Zodiac_Form_Element_Attribute($attributes), Zodiac_Form_Element_List::PASSWORD);
    }
}

?>