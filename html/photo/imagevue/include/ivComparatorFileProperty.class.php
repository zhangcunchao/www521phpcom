<?php
/**
 * File property comparator
 *
 * @author McArrow
 */
class ivComparatorFileProperty extends ivComparator
{
	/**
	 * Property name
	 * @var string
	 */
	var $_property = null;
	
	/**
	 * Constructor
	 *
	 * @param  string $property
	 */
	function ivComparatorFileProperty($property)
	{
		$this->__construct($property);
	}

	/**
	 * Constructor
	 *
	 * @param string $property
	 */
	function __construct($property)
	{
		$this->_property = $property;
	}

	/**
	 * Compare two files by property
	 *
	 * @param  ivFSItem $item1
	 * @param  ivFSItem $item2
	 * @return integer
	 */
	function compare(&$item1, &$item2)
	{
		return parent::compare($item1->getProperty($this->_property), $item2->getProperty($this->_property));
	}

}
?>