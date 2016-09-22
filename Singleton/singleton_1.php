<?php

// Шаблон Синглтон, принцип организации
class Singleton
{
	// в $instance будет храниться весь класс Singleton после первого вызова метода getInstance
	protected static $instance;

	public static function getInstance()
	{

		// проверяем $instance на пустоту,
		// если значение не присвоено записываем в неё весь класс,
		// если $instance не пустой значит к классу уже обращались и
		// при повторном обращении вернется не текущее состояние класса Singleton
		// а то что было записано в $instance при первом обращении

		if ( !isset(self::$instance) ) {
			$class = __CLASS__;
			self::$instance = new $class();
			// здесь может быть например подключение к db
			echo "Первое обращение к методу "."<br>";
		}   else {
			echo "НЕ первое обащение к методу "."<br>";
		}
		return self::$instance;
	}

	// защита класса от создания объекта данного класса
	private function __construct() { }
	private function __clone() { }
	private function __wakeup() { }
}

Singleton::getInstance(); // Вызываем метод из синглтон класса первый раз
Singleton::getInstance(); // Вызываем метод из синглтон класса не первый раз

/*
 * Result
 * Первое обращение к методу
 * НЕ первое обащение к методу
 */