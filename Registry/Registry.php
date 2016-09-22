<?php

class Registry
{
	protected static $reg = array();

	public static function set ($key, $value)
	{
		self::$reg[$key] = $value;
	}
	public static function get ($key)
	{
		return isset( self::$reg[$key] ) ? self::$reg[$key] : null;
	}
	final public static function remove ($key)
	{
		if ( array_key_exists( $key, self::$reg ) ) {
			unset( self::$reg[$key] );
		}
	}
}

Registry::set(1,'First note'); // Записываем значение 1
Registry::set(2,'Second note'); // Записываем значение 2
echo '<pre>';
var_dump( Registry::get(1) ); // Выводим результат
var_dump( Registry::get(2) );
echo '</pre>';

Registry::remove(1); // удаляем значение с ключем 1

echo '<pre>';
var_dump( Registry::get(1) ); // выводим результат NULL
echo '</pre>';

/*
 * Result
 * string(10) "First note"
 * string(11) "Second note"
 * NULL
 */