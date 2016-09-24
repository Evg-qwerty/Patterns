<?php

class ClassB
{
	/**
	 * This function return new object
	 *
	 * @return ClassB
	 */
	public function getClone()
	{
		$object = new ClassB();
		//do something with object
		return $object;
	}
}
$Prototype = new ClassB();
$NewObject = $Prototype -> getClone();