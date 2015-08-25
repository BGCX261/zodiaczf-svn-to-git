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
 * @see Zodiac_Form_Parser
*/
require_once 'Zodiac/Form/Render/Option.php';

/**
 * Zodiac_Form_Render_Select
 *
 * @category   Zodiac
 * @package    Zodiac_Form
 * @author	   John Cartwright
 * @published  September 2007
*/
class Zodiac_Form_Render_Select extends Zodiac_Form_Element implements Zodiac_Form_Render_Interace
{
    public function render(array $attributes)
    {
		if (isset($attributes['options']) && count($attributes['options'])) {
			$selectValue = isset($attributes['value']) ? $attributes['value'] : '';
			$optionList = array();
			foreach ($attributes['options'] as $name => $value) {
				$option = new Zodiac_Form_Render_Option();
				$options = array(
					'name' => $name, 
					'value' => $value, 
					'selectValue' => $selectValue
				);
				
				$optionList[] = $option->render($options);
			}
			
			$attributes['options'] = PHP_EOL . implode(PHP_EOL, $optionList) . PHP_EOL;
		}

       	return parent::render(new Zodiac_Form_Element_Attribute($attributes, array('options')), Zodiac_Form_Element_List::SELECT);
    }
}

?>
