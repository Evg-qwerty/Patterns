<?php

// Включим вывод всех ошибок на экран.
error_reporting(E_ALL);
ini_set('display_errors', 1);

class SiteFactory
{
	private $_title = array();

	public function __construct()
	{
		/*
		 * (3) Создаем массив в котором ключами будут 'title',
		 * a значениями имена классов обрабатывающих
		 * поступающие для сортировки массивы
		 */
		$this->_title = array(
			'Good site' => 'GoodSites',
			'Bad site' => 'BadSites',
		);
	}
	/*
	 * (6) В пришедшем массиве $site проверяем наличие значений
	 * из массива $this->_title т.е. ищем там Good site или Bad site
	 * если не находим выводим ошибку.
	 * Если все впорядке, то при помощи массива $this->_title
	 * формируем имя класса, основываясь на значении ячейки с ключем 'title'.
	 * Возвращаем новый объект нужного нам класса и передаем ему наш массив.
	 */
	public function make($site)
	{
		if( !array_key_exists($site['title'], $this->_title) ) {
			throw new InvalidArgumentException("Тип {site['title']} не найден.");
		}
		$className = $this->_title[$site['title']];

		return new $className($site);
	}
}

/*
 * (7) Срабатывает конструктор и присваевает
 * значения встроенных переменных соответствующим
 * ячейкам переданого массива.
 */
class GoodSites
{
	protected $_id;
	protected $_url;
	protected $_desc;

	public function __construct($sites)
	{
		$this->_id = $sites['id'];
		$this->_url = $sites['url'];
		$this->_desc = $sites['desc'];
	}
}

class BadSites
{
	protected $_id;
	protected $_url;
	protected $_desc;

	public function __construct($sites)
	{
		$this->_id = $sites['id'];
		$this->_url = $sites['url'];
		$this->_desc = $sites['desc'];
	}
}

/*
 * (1) цель получить из значений массива объекты,
 * при этом нужно поделить их по двум свойствам указанным в
 * значения ключа title т.е. 'Good site' или 'Bad site'
 */
$sites = array(
	array(
		'id' => 1,
		'url' => 'http://site1.com',
		'title' => 'Good site',
		'desc' => 'This is a good site. He does a good job.'
	),
	array(
		'id' => 2,
		'url' => 'http://site2.com',
		'title' => 'Bad site',
		'desc' => 'This is a bad site. He does a bad job.'
	),
	array(
		'id' => 3,
		'url' => 'http://site3.com',
		'title' => 'Bad site',
		'desc' => 'This is a bad site. He does a bad job.'
	)
);


$sitesFactory = new SiteFactory(); // (2) создаем объект "фабрика" в которой элементы массивов делиться по 'title' и отправляются в соответсвующий класс для превращения там в объект

$sitesResult = array(); //  (4) создаем массив для хранения результатов

/*
 * (5) Берем по очереди каждый элемент массива
 * и передаем в метод make класса $sitesFactory
 */
foreach ($sites as $site) {
	$sitesResult[] = $sitesFactory->make($site);
}
/*
 * (8) Выводим результат
 */
echo '<pre>';
print_r($sitesResult);
echo '</pre>';

/*

Result

Array
(
    [0] => GoodSites Object
        (
            [_id:protected] => 1
            [_url:protected] => http://site1.com
            [_desc:protected] => This is a good site. He does a good job.
        )

    [1] => BadSites Object
        (
            [_id:protected] => 2
            [_url:protected] => http://site2.com
            [_desc:protected] => This is a bad site. He does a bad job.
        )

    [2] => BadSites Object
        (
            [_id:protected] => 3
            [_url:protected] => http://site3.com
            [_desc:protected] => This is a bad site. He does a bad job.
        )

)
 */