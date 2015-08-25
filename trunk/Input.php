<?php

final class Zodiac_Input
{
	private $_validators = array();
	private $_filters = array();
	private $_source = array();

	public function __construct(array $source)
	{
		$this->_source = $source;
	}

	public function attachFilter($fields, Zodiac_Filter_Interface $filter) 
	{
		foreach ((array)$fields as $field) {
			if (!array_key_exists($field, $this->_filters)) {
				$this->_filters[$field] = array();
			}
		
			$this->_filters[$field][] = $filter;
		}
	}

	public function attachValidator($fields, Zodiac_Validator_Interface $validator) 
	{
		foreach ((array)$fields as $field) {
			if (!array_key_exists($field, $this->_validators)) {
				$this->_validators[$field] = array();
			}
		
			$this->_validators[$field][] = $validator;
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
		return (is_string($key) && isset($this->_source[$key]) ? $this->_source[$key] : $this->_source);
	}
}

?>