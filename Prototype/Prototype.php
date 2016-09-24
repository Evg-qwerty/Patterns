<?php
/**
 * Какой-то продукт
 */
interface Product
{
}

/**
 * Какая-то фабрика
 */
class Factory
{

	/**
	 * @var Product
	 */
	private $product;


	/**
	 * @param Product $product
	 */
	public function __construct(Product $product)
	{
		$this->product = $product;
	}

	/**
	 * Возвращает новый продукт путём клонирования
	 *
	 * @return Product
	 */
	public function getProduct()
	{
		return clone $this->product;
	}
}

/**
 * Продукт
 */
class SomeProduct implements Product
{
	public $name;
}

/*
 * =====================================
 *          USING OF PROTOTYPE
 * =====================================
 */

/*
 * При срабатывании конструктора обекта Factory,
 * класс SomeProduct() сохроняется в свойство обекта Factory->$product.
 * Создаем новый объект $firstProduct в который при помощи
 * метода $prototypeFactory->getProduct() возвращается клон объекта
 * ранее сохроненный в Factory->$product
 *
 */
$prototypeFactory = new Factory(new SomeProduct());

$firstProduct = $prototypeFactory->getProduct();
$firstProduct->name = 'The first product'."<br>";

$secondProduct = $prototypeFactory->getProduct();
$secondProduct->name = 'Second product'."<br>";

print_r($firstProduct->name);
// The first product
print_r($secondProduct->name);
// Second product