<?php

class LazyURL
{
	protected $_stringUrl;
	protected $_domain;

	// (2) записываем значение $stringUrl в внутреннюю переменную $_stringUrl
	public function __construct($stringUrl)
	{
		$this->_stringUrl = $stringUrl;
	}
	/*
	 * (4) проверяем $_stringUrl = если оно не пустое то совершаем в его содержимым
	 * какие-то действия, это и есть "отложеная инициализация". В примере разбор
	 * url происходит только в момент вызвова getDomain(), а в момент вызова
	 * LazyURL происходит только подготовка.
	 */
	public function getDomain()
	{
		if (empty($this->_domain)) {
			$this->_domain = parse_url( $this->_stringUrl,1 );
		}
		return $this->_domain;
	}
}

// (1) создаем новый объект LazyURL при этом срабатывае констуктор класса LazyURL
$url = new LazyURL('http://google.com');

/*
 * Здесь программа занимается своими делами
 */

//(3) Когда нам понадобится, значение из объекта $url, вызываем его метод getDomain()
echo $url->getDomain();//google.com