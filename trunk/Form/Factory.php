<?php

/**
 * See Zodiac_Form_Factory_Exception
*/
require_once 'Zodiac/Form/Factory/Exception.php';

/**
 * Zodiac_Form_Element
 *
 * @category   Zodiac
 * @package    Zodiac_Form
 * @author	   John Cartwright
 * @published  September 2007
 * @todo 	   Make into a real factory :)
*/
class Zodiac_Form_Factory
{
	static function get($element)
	{
		$element = ucfirst($element);
		$path = 'Zodiac/Form/Render/'. $element .'.php';
		$includePath = explode(PATH_SEPARATOR, get_include_path());

		foreach ($includePath as $dir) {
			if ($dir !== '.' && is_readable($dir . DIRECTORY_SEPARATOR . $path)) {
				$loaded = true;
				require_once $dir . DIRECTORY_SEPARATOR . $path;
				break;
			}
			
			if (!isset($loaded)) {
				throw new Zodiac_Form_Factory_Exception('Cannot find file for form element render "'. $path .'"');
			}
		}	

		$class = 'Zodiac_Form_Render_'. $element;
		if (!class_exists($class)) {
			throw new Zodiac_Form_Factory_Exception('Cannot find class for form element render "'. $class .'"');
		}

		return new $class;
	}
}

?>