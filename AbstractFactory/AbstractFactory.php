<?php

/**
 * Какой-нибудь файл конфигурации
 */
class Config
{
	public static $factory = 1;
}

/**
 * Какой-то продукт
 */
interface Product
{

	/**
	 * Возвращает название продукта
	 */
	public function getName();
}

/**
 * Абстрактная фабрика
 */
abstract class AbstractFactory
{
	/**
	 * Возвращает фабрику
	 * в зависимости от значения в конфиге вызывается нужная фабрика
	 */
	public static function getFactory()
	{
		switch (Config::$factory) {
			case 1:
				return new FirstFactory();
			case 2:
				return new SecondFactory();
		}
		throw new Exception('Bad config');// значение не 1 и не 2
	}

	/**
	 * Возвращает продукт
	 */
	abstract public function getProduct();
}


class FirstFactory extends AbstractFactory
{
	/**
	 * Возвращает продукт
	 */
	public function getProduct()
	{
		return new FirstProduct();
	}
}

/**
 * Продукт первой фабрики
 */
class FirstProduct implements Product
{
	/**
	 * Возвращает название продукта
	 */
	public function getName()
	{
		return 'The product from the first factory';
	}
}

class SecondFactory extends AbstractFactory
{
	/**
	 * Возвращает продукт
	 *
	 * @return Product
	 */
	public function getProduct()
	{
		return new SecondProduct();
	}
}

/**
 * Продукт второй фабрики
 */
class SecondProduct implements Product
{

	/**
	 * Возвращает название продукта
	 */
	public function getName()
	{
		return 'The product from second factory';
	}
}
/*
 *  формируем первый продукт
 * - AbstractFactory проверятет Config::$factory и вызывает нужную фабрику
 * - getProduct() в зависимости от выбраной фабрики вызывает нужный продукт
 */
$firstProduct = AbstractFactory::getFactory()->getProduct();
Config::$factory = 2;
$secondProduct = AbstractFactory::getFactory()->getProduct();


print_r($firstProduct->getName()); // Первый продукт
echo '<br>';
print_r($secondProduct->getName()); // Второй продукт