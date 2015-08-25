<?php

/**
 * @see Zodiac_Form_Factory
*/
require_once 'Zodiac/Form/Factory.php';

/**
 * @see Zodiac_Form_Options
*/
require_once 'Zodiac/Form/Options.php';

/**
 * @see Zodiac_Form_Exception
*/
require_once 'Zodiac/Form/Exception.php';

/**
 * Zodiac_Form
 *
 * @category   Zodiac
 * @package    Zodiac_Form
 * @author	   John Cartwright
 * @published  September 2007
*/
class Zodiac_Form extends Zodiac_Form_Options
{	
	/**
	 * __call
	 * Gateway function for rerouting to form element renderer
	 *
	 * @returns (string)
	*/
	public function __call($method, array $options)
	{
		return Zodiac_Form_Factory::get($method)->render($this->_parseOptions($method, $options));
	}	
		
	/**
	 * Form
	 * Primary function for view helper class
	 * Allows for fluent interface
	 *
	 * @returns (object) self
	*/
	public function form()
	{
		return $this;
	}
}

?>