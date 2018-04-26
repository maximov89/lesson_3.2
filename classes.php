<?php

abstract class Product
{
	protected $title;
  protected $price;
  protected $discount = 10;
	protected $delivery = 250;
	protected $deliveryDiscount = 300;
	protected $weight = 'не указан';
	protected $make = 'не указан';
	protected $model = 'не указана';
  public static $staticProperty = 0;

	public function __construct($title, $price)
	{
		$this->title = $title;
		$this->price = $price;
		self::$staticProperty++;
	}
	public function getProperty()
	{
		echo self::$staticProperty;
	}
	public function setTitle($title)
	{
		$this->title = $title;
	}
	public function setPrice($price)
	{
		$this->price = $price;
	}
	public function setWeight($weight)
	{
		$this->weight = $weight;
	}
	public function setMake($make)
	{
		$this->make = $make;
	}
	public function setModel($model)
	{
		$this->model = $model;
	}
	public function getPrice()
	{
		return ($this->price - $this->price * $this->discount / 100);
	}
	public function getDelivery()
	{
		if ($this->getPrice() < $this->price) {
			return $this->deliveryDiscount;
		} else {
			return $this->delivery;
		}
	}
	public function printFullDescription()
	{
		echo '<b>наименование товара:</b> '.$this->title.', <b>производитель:</b> '.$this->make.', <b>модель:</b> '.$this->model.', <b>вес:</b> '.$this->weight.' кг.'.', <b>цена:</b> '.$this->price.' руб.'.'<b>цена со скидкой:</b> '.$this->getPrice().' руб.'.', <b>стоимость доставки:</b> '.$this->getDelivery().' руб.';
		$this->printDescription();
	}
	abstract public function printDescription();
}





// Ноутбук

class Noutbook extends Product
{
	protected $timeWork = 6;

  public function setTimeWork($timeWork)
	{
		$this->timeWork = $timeWork;
	}
  public function printDescription()
	{
		echo ', <b>время автономной работы:</b> '.$this->timeWork.' ч.';
	}
}

echo '<h3>Ноутбук</h3>';
$appleMacBookPro = new Noutbook('ноутбук', 95000);
$appleMacBookPro->printFullDescription();





// Холодильник

class Fridge extends Product
{
	protected $nofrost = 'есть';

  public function setNofrost($nofrost)
	{
		$this->nofrost = $nofrost;
	}
  public function printDescription()
	{
		echo ', <b> No Frost:</b> '.$this->nofrost;
	}
}

echo '<h3>Холодильник</h3>';
$daewoo = new Fridge('холодильник', 65000);
$daewoo->printFullDescription();





// Стиральная машина

class Washer extends Product
{
	protected $autoMode = 'есть';

  public function setAutoMode($autoMode)
	{
		$this->autoMode = $autoMode;
	}
  public function printDescription()
	{
		echo ', <b> режим автоматической стирки:</b> '.$this->autoMode;
	}
	public function getPrice()
	{
    if ($this->weight <= 10) {
			$this->discount = 0;
		} return parent::getPrice();
	}
}

echo '<h3>Стиральная машина</h3>';
$indesit = new Washer('стиральная машина', 12500);
$indesit->setWeight(40);
$indesit->printFullDescription();
echo '<br/>';
echo '<br/>';
$renova = new Washer('стиральная машина', 2990);
$renova->setWeight(9);
$renova->printFullDescription();
echo '<br/>';
echo '<br/>';





echo 'Количество созданных объектов: '.Product::$staticProperty;
