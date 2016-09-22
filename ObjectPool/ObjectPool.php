<?php

class ObjectPool
{
	protected static $pool = array();

	public static function setObject (ObjectGen $object)
	{
		self::$pool[$object->getValue()] = $object;
	}

	public static function getObject ($key)
	{
		return isset( self::$pool[$key] ) ? self::$pool[$key] : null;
	}

	final public static function remove ($key)
	{
		if ( array_key_exists( $key, self::$pool ) ) {
			unset( self::$pool[$key] );
		}
	}
}

class ObjectGen
{
	protected $value;

	public function __construct($value)
	{
		$this->value = $value;
	}

	public function getValue()
	{
		return $this->value;
	}
}

ObjectPool::setObject(new ObjectGen('First') );
ObjectPool::setObject(new ObjectGen('Second') );

echo '<pre>';
var_dump(ObjectPool::getObject('First'));
var_dump(ObjectPool::getObject('Second'));
echo '</pre>';

ObjectPool::remove('First');

echo '<pre>';
var_dump(ObjectPool::getObject(First));
var_dump(ObjectPool::getObject(Second));
echo '</pre>';

/*
Result

object(ObjectGen)#1 (1) {
  ["value":protected]=>
  string(5) "First"
}
object(ObjectGen)#2 (1) {
  ["value":protected]=>
  string(6) "Second"
}
NULL
object(ObjectGen)#2 (1) {
  ["value":protected]=>
  string(6) "Second"
}
*/