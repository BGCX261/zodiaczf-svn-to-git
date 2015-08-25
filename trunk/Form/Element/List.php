<?php

/**
 * Zodiac_Form_Element_List
 *
 * @category   Zodiac
 * @package    Zodiac_Form
 * @author	   John Cartwright
 * @published  September 2007
*/
class Zodiac_Form_Element_List
{
	const FORM 		= '<form name="[[name]]" [[attributes]]>';
	const FORMCLOSE = '</form>';
	const INPUT 	= '<input type="text" name="[[name]]" value="[[value]]" [[attributes]]/>';
	const HIDDEN 	= '<input type="hidden" name="[[name]]" value="[[value]]" [[attributes]]/>';
	const CHECKBOX  = '<input type="checkbox" name="[[name]]" value="[[value]]" [[attributes]]/>';
	const RADIO		= '<input type="radio" name="[[name]]" value="[[value]]" [[attributes]]/>';
	const PASSWORD  = '<input type="password" name="[[name]]" [[attributes]]/>';
	const FILE		= '<input type="file" name="[[name]]" value="[[value]]" [[attributes]]/>';
	const SUBMIT    = '<input type="submit" name="[[name]]" value="[[value]]" [[attributes]]/>';
	const TEXTAREA 	= '<textarea name="[[name]]" [[attributes]]>[[value]]</textarea>';
	const SELECT    = '<select name="[[name]]">[[options]]</select>';
	const OPTION    = '<option value="[[value]]" [[attributes]]>[[name]]</option>';
}

?>