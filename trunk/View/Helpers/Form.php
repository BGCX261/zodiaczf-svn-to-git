<?php

/**
 * @see Zodiac_Form
*/
require_once 'Zodiac/Form.php';

/**
 * Zodiac_View_Helper_Form
 *
 * @category   Zodiac
 * @package    Zodiac_Form
 * @author	   John Cartwright
 * @published  September 2007
*/
final class Zodiac_View_Helper_Form extends Zodiac_Form
{	
	public function __construct()
	{
		parent::__construct(Zend_Controller_Front::getInstance()->getRequest()->getParams());
	}
}

?>