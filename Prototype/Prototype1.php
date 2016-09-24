<?php

class ClassA
{
	public function __construct(ClassA $Prototype = null)
	{
		if (null !== $Prototype)
		{
			//do something
		}
	}
}
$Prototype = new ClassA();
$NewObject = new ClassA($Prototype);