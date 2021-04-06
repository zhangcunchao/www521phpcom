<?php

/**
 * Comparator base class
 * 
 */
class ivComparator
{
	/**
	 * Compare two values
	 *
	 * @param  mixed   $val1
	 * @param  mixed   $val2
	 * @return integer
	 */
	function compare($val1, $val2)
	{
		if ($val1 < $val2) {
			$result = -1;
		} elseif ($val1 > $val2) {
			$result = 1;
		} else {
			$result = 0;
		}
		return $result;
	}

	/**
	 * Compare two objects
	 *
	 * @param  mixed   $item1
	 * @param  mixed   $item2
	 * @return integer
	 */
	function random(&$item1, &$item2)
	{
		return rand(0, 2) - 1;
	}

}
?>