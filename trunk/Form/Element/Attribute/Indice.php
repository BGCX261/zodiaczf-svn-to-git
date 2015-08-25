<?php

abstract class Zodiac_Form_Element_Attribute_Indice
{
	private $_stack = array();
	private $_lastIndice = 0;

	protected function _registerIndice($input, $indices)
	{
		$indice = implode('|', $indices);
		if (!isset($this->_stack[$input][$indice])) {
			$this->_stack[$input][$indice] = 0;
		}
		else {
			$this->_stack[$input][$indice]++;
		}
		
		$this->_lastIndice = $this->_stack[$input][$indice];
		return $this->_stack[$input][$indice];
	}
	
	protected function _getLastIndice()
	{
		return $this->_lastIndice;
	}
}

?>