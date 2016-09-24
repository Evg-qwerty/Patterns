<?php

class ClassC
{
	public function __clone()
	{
		//do something
	}
}
$Prototype = new ClassC();
$NewObject = clone $Prototype;