<?php
/*
 * Прототип будущего синглтона
 */
abstract class PoolAbstract
{
	protected static $singleton = array();
	/*
	 *
	 */
	public static function getSingleton()
	{
		/*
		 * Все происходит в классе синглтон унаследовавшем все методы PoolAbstract
		 * Класс getClassName() воззврашает имя класса в котором его вызвали (т.е.)
		 * имя текущего абстрактного класса. Далее происходит проверка на его наличие
		 * в массиве $singleton, при первом вызове он пустой, в этом случае в массив
		 * записывается экземпляр синглетона со всеми его свойствами и методами,
		 * если они там будут, в данном случае там только масcив 'x' к которому
		 * мы можем получить доступ через вызвов Singleton1::getSingleton()->x
		 */
		$className = static::getClassName();
		if ( !isset(self::$singleton[$className]) ) {
			self::$singleton[$className] = new $className();
		}
		return self::$singleton[$className];
	}

	/*
	 * Удаляет синглтон если он есть
	 */
	public static function removeSingleton()
	{
		$className = static::getClassName();
		if ( isset(self::$singleton[$className]) ) {
			unset( self::$singleton[$className] );
		}
	}

	/*
	 * Возвращает имя класса синглтона
	 */
	final protected static function getClassName()
	{
		return get_called_class();
	}

	/*
	 * Исключаем магические методы
	 */
	final protected function __construct()
	{
	}
	final protected function __clone()
	{
	}
	final protected function __sleep()
	{
	}
	final protected function __wakeup()
	{
	}
}

/*
 * Класс наследует методы класса PoolAbstract, а итоговый класс синглтона
 * наследует этот класс Pool, со всеми методами и свойствами.
 */
abstract class Pool extends PoolAbstract
{

	final public static function getSingleton()
	{
		return parent::getSingleton();
	}

	public final static function removeSingleton()
	{
		parent::removeSingleton();
	}
}

/*
 * USE
 */

// Синглтон1 Наследует методы  класса Pool
class Singleton1 extends Pool
{
	public $x = array();
}
// синглтон 2 Наследует свсйсства и методы Синглтон1
class Singleton2 extends Singleton1
{
}

// записываем
Singleton1::getSingleton()->x[] = 1;
Singleton1::getSingleton()->x[] = 2;

Singleton2::getSingleton()->x[] = 4;
Singleton2::getSingleton()->x[] = 5;

// вывод результатов
echo '<pre>';
var_dump(Singleton1::getSingleton()->x);
var_dump(Singleton2::getSingleton()->x);
echo '</pre>';

// удаляем первый
Singleton1::removeSingleton();
echo "Один удалили...";
// вывод результатов
echo '<pre>';
var_dump(Singleton1::getSingleton()->x);
var_dump(Singleton2::getSingleton()->x);
echo '</pre>';

/*
 * Result

array (size=2)
  0 => int 1
  1 => int 2

array (size=2)
  0 => int 4
  1 => int 5

Один удалили...

array (size=0)
  empty

array (size=2)
  0 => int 4
  1 => int 5
*/