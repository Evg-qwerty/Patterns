<?php

// Включим вывод всех ошибок на экран.
error_reporting(E_ALL);
ini_set('display_errors', 1);

class carFactory {

	public function __construct() {
		// ... //
	}

	public static function build ($type = '') {

		if($type == '') {
			throw new Exception('Invalid Car Type.');
		} else {

			$className = 'car_'.ucfirst($type);

			// Assuming Class files are already loaded using autoload concept
			if(class_exists($className)) {
				return new $className();
			} else {
				throw new Exception('Car type not found.');
			}
		}
	}
}

class car_Sedan {

	public function __construct() {
		echo "Creating Sedan"."<br>";
	}

}

class car_Suv {

	public function __construct() {
		echo "Creating SUV"."<br>";
	}

}

// Creating new Sedan
$sedan = carFactory::build('sedan');

// Creating new SUV
$suv = carFactory::build('suv');

/*
 * Result
 * Creating Sedan
 * Creating SUV
 */