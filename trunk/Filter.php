<?php

final class Zodiac_Input
{
	private $_validators = array();
	private $_flags = array();
	private $_errorManager;
	private $_source;

	public function __construct(array $source)
	{
		$this->_source = $source;
		$this->_errorManager = new Zodiac_Input_Error_Manager();
	}

	public function attach($fields, object $validator, int $fieldFlags) 
	{
		if ($validator instanceof Zodiac_Input_Validate_Interface) {
			$this->_attachValidator((array)$fields, $validator, $fieldFlags);
			return;
		}

		if ($validator instanceof Zodiac_Input_Filter_Interface) {
			$this->_attachFilter((array)$fields, $validator, $fieldFlags);
			return;
		}		

		throw new Zodiac_Input_Exception('Validator not valid instance of Zodiac_Input_Validate_Interface or Zodiac_Input_Filter Interface');
	}
	
	private function _attachFilter(array $fields, $filter, $flag) 
	{
		foreach ($fields as $field) {
			if (!array_key_exists($field, $this->_filters)) {
				$this->_filters[$field] = array();
			}
		
			$this->_filters[$field][] = array('type' => $filter, 'flag' => $flag);
		}
	}

	private function _attachValidator(array $fields, $validator, $flag) 
	{
		foreach ($fields as $field) {
			if (!array_key_exists($field, $this->_filters)) {
				$this->_validators[$field] = array();
			}
		
			$this->_validators[$field][] = array('type' => $filter, 'flag' => $flag);
		}
	}
	
	public function isValid()
	{
		if (count($this->_validators)) {
			foreach ($this->_validators as $field => $validator) {
				if (!$validator->isValid($this->_getSource($field)) {
					
				}
			}
			
			foreach ($this->_filters as $field $filter
		}
		
	}
	
	public function getSource($key = false) 
	{
		return $key && isset($this->_source[$key]) ? $this->_source[$key] : $this->_source;
	}
}

?>