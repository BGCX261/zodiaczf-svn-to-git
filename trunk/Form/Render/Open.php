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
 * @see Zodiac_Form_Escape
*/
require_once 'Zodiac/Form/Element/Escape.php';

/**
 * Zodiac_Form_Render_Form
 *
 * @category   Zodiac
 * @package    Zodiac_Form
 * @author	   John Cartwright
 * @published  September 2007
*/
class Zodiac_Form_Render_Open extends Zodiac_Form_Element implements Zodiac_Form_Render_Interace
{
    public function render(array $attributes)
    {
        if (empty($attributes['method'])) {
            $attributes['method'] = 'POST';
        }

        if (empty($attributes['action'])) {
			$ports = array('https' => 443, 'http' => 80);
			$prefix = (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off" ? 'http' : 'https');
			$action = $prefix. '://' . $_SERVER['HTTP_HOST'];
			$action .= $_SERVER['SERVER_PORT'] != $ports[$prefix] ? ':' . $_SERVER['SERVER_PORT'] : '' . $_SERVER['SCRIPT_NAME'];
			$action .= (isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != "" ? "?".$_SERVER['QUERY_STRING'] : "");
			
			$attributes['action'] = $action;
		}

       	return parent::render(new Zodiac_Form_Element_Attribute($attributes), Zodiac_Form_Element_List::FORM);
    }
}

?>