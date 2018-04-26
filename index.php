<?php

echo '<a href="classes.php"><button>Посмотреть дополнительное задание</button></a>';
echo '<br/>';





// Домашнее задание к лекции 3.2 <<Наследование и интерфейсы>>

echo '<p>1. Наследование - это способность описывать новый класс на основе имеющегося - родительского, с наследованием свойств и методов родительского класса и возможностью их переопределения. Полиморфизм - взаимозаменяемость объектов с одинаковым интерфейсом, возможность работать в коде с объектами разных классов но имеющих одинаковый интерфейс. </p>';





echo '<p>2. Интерфейс определяет только имена методов и аргументов без их содержания и может содержать константы, при этом содержание методов должно опиываться в классе реализующем данный интерфейс. Интерфейсы лучше использовать при неизвестных заранее способах реализации методов. Абстрактный класс может содержать свойства и методы, как с их реализацией, так и без реализации, представляет собой смесь интерфейса и обычного класса.  Его лучше использовать при уже известных способах реализации методов.</p>';






// Суперкласс Продукт

echo '<p>3. Абстрактный класс - Product.</p>';

abstract class Product
{
	protected $title;
	protected $price;
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
		return $this->price;
	}
	public function printFullDescription()
	{
		echo '<b>наименование товара:</b> '.$this->title.', <b>производитель:</b> '.$this->make.', <b>модель:</b> '.$this->model.', <b>цена:</b> '.$this->getPrice().' руб.';
		$this->printDescription();
	}
	abstract public function printDescription();
}





// Класс Автомобиль

class Car extends Product
{
	private $color = 'не указан';

	public function setColor($color)
	{
		$this->color = $color;
	}

	public function printDescription()
	{
		echo '<b>, цвет:</b> '.$this->color;
	}
}

echo '<h4>Автомобиль</h4>';

$bmwX6 = new Car('автомобиль', 3570000);
// Почему-то у меня не работает короткий вид записи
$bmwX6->setMake('BMW');
$bmwX6->setModel('X6');
$bmwX6->setColor('черный');

$audiQ7 = new Car('автомобиль', 3250000);
$audiQ7->setMake('Audi');
$audiQ7->setModel('Q7');
$audiQ7->setColor('белый');

$bmwX6->printFullDescription();
echo '<br/>';
$audiQ7->printFullDescription();
echo '<br/>';
echo '<br/>';





// Класс Телевизор

class TV extends Product
{
  private $size = 'не указана';

	public function setSize($size)
	{
		$this->size = $size;
	}

	public function printDescription()
	{
		echo ', <b>диагональ:</b> '.$this->size.' дюймов';
	}
}

echo '<h4>Телевизор</h4>';

$samsung = new TV('телевизор', 32750);
$samsung->setMake('Samsung');
$samsung->setModel('UE40KU6300U');
$samsung->setSize(40);

$lg = new TV('телевизор', 28590);
$lg->setMake('LG');
$lg->setModel('LG 43UH619V');
$lg->setSize(43);

$samsung->printFullDescription();
echo '<br/>';
$lg->printFullDescription();
echo '<br/>';
echo '<br/>';





// Класс Шариковая ручка

class Pen extends Product
{ 
	private $ink = 'не указан';

	public function setInk($ink)
	{
		$this->ink = $ink;
	}

	public function printDescription()
	{
		echo ', <b>цвет чернил:</b> '.$this->ink;
	}
}

echo '<h4>Шариковая ручка</h4>';

$parker = new Pen('шариковая ручка', 3499);
$parker->setInk('синяя');

$zebra = new Pen('шариковая ручка', 1899);
$zebra->setInk('черная');

$parker->printFullDescription();
echo '<br/>';
$zebra->printFullDescription();
echo '<br/>';
echo '<br/>';





// Класс Утка

class Duck extends Product
{ 
	public $name = 'не указано';
	public $species = 'не указана';
  
	public function setSpecies($species)
	{
		$this->species = $species;
	}
	public function setName($name)
	{
		$this->name = $name;
	}
	public function printDescription()
	{
		echo ', <b>вид:</b> '.$this->species.', <b>имя:</b> '.$this->name;
	}
}

echo '<h4>Утка</h4>';

$duckDonald = new Duck('утка', '1 000 000');
$duckDonald->setSpecies('белый селезень с желтым клювом и желтыми лапами');
$duckDonald->setMake('Walt Disney');
$duckDonald->setModel('original');
$duckDonald->setName('Donald Duck');

$duckDaffy = new Duck('утка', '1 000 001');
$duckDaffy->setSpecies('черный селезень с желтым клювом и желтыми лапами');
$duckDaffy->setMake('Warner Brothers & Merrie Melodies');
$duckDaffy->setModel('original');
$duckDaffy->setName('Daffy Duck');

$duckDonald->printFullDescription();
echo '<br/>';
$duckDaffy->printFullDescription();
echo '<br/>';
echo '<br/>';





echo 'Количество созданных объектов: '.Product::$staticProperty;
echo '<br/>';
echo '<br/>';





// Интерфейсы

echo '<p>4. Интерфейс NewProduct.</p>';

interface NewProduct
{
	public function __construct($title, $price);
	public function setTitle($title);
	public function setPrice($price);
	public function setMake($make);
	public function setModel($model);
	public function getPrice($price);
	public function printDescription();
}





// Автомобиль

class NewCar implements NewProduct
{
	protected $title;
	protected $price;
	protected $make = 'не указан';
	protected $model = 'не указана';
	private $color = 'не указан';

	public function __construct($title, $price)
	{
		$this->title = $title;
		$this->price = $price;
	}
	public function setTitle($title)
	{
		$this->title = $title;
	}
	public function setPrice($price)
	{
		$this->price = $price;
	}
	public function setMake($make)
	{
		$this->make = $make;
	}
	public function setModel($model)
	{
		$this->model = $model;
	}
	public function getPrice($price)
	{
		return $this->price;
	}
  public function setColor($color)
	{
		$this->color = $color;
	}
  public function printDescription()
	{
		echo '<b>наименование товара:</b> '.$this->title.', <b>производитель:</b> '.$this->make.', <b>модель:</b> '.$this->model.', <b>цвет:</b> '.$this->color.', <b>цена:</b> '.$this->price.' руб.';
	}
}

echo '<h4>Автомобиль</h4>';

$audiA5 = new NewCar('автомобиль', 3250000);
$audiA5->setMake('Audi');
$audiA5->setModel('A5');
$audiA5->setColor('серебристый металлик');
$audiA5->printDescription();
echo '<br/>';
echo '<br/>';





// Телевизор

class NewTV implements NewProduct
{
	protected $title;
	protected $price;
	protected $make = 'не указан';
	protected $model = 'не указана';
	private $size = 'не указана';

	public function __construct($title, $price)
	{
		$this->title = $title;
		$this->price = $price;
	}
	public function setTitle($title)
	{
		$this->title = $title;
	}
	public function setPrice($price)
	{
		$this->price = $price;
	}
	public function setMake($make)
	{
		$this->make = $make;
	}
	public function setModel($model)
	{
		$this->model = $model;
	}
	public function getPrice($price)
	{
		return $this->price;
	}
  public function setSize($size)
	{
		$this->size = $size;
	}
  public function printDescription()
	{
		echo '<b>наименование товара:</b> '.$this->title.', <b>производитель:</b> '.$this->make.', <b>модель:</b> '.$this->model.', <b>диагональ:</b> '.$this->size.', <b>цена:</b> '.$this->price.' руб.';
	}
}

echo '<h4>Телевизор</h4>';

$sony = new NewTV('телевизор', 106900);
$sony->setMake('Sony');
$sony->setModel('KD-55XD9305');
$sony->setSize(55);
$sony->printDescription();
echo '<br/>';
echo '<br/>';





// Шариковая ручка

class NewPen implements NewProduct
{
	protected $title;
	protected $price;
	protected $make = 'не указан';
	protected $model = 'не указана';
	private $ink = 'не указан';

	public function __construct($title, $price)
	{
		$this->title = $title;
		$this->price = $price;
	}
	public function setTitle($title)
	{
		$this->title = $title;
	}
	public function setPrice($price)
	{
		$this->price = $price;
	}
	public function setMake($make)
	{
		$this->make = $make;
	}
	public function setModel($model)
	{
		$this->model = $model;
	}
	public function getPrice($price)
	{
		return $this->price;
	}
  public function setInk($ink)
	{
		$this->ink = $ink;
	}
  public function printDescription()
	{
		echo '<b>наименование товара:</b> '.$this->title.', <b>производитель:</b> '.$this->make.', <b>модель:</b> '.$this->model.', <b>цвет чернил:</b> '.$this->ink.', <b>цена:</b> '.$this->price.' руб.';
	}
}

echo '<h4>Шариковая ручка</h4>';

$penOne = new NewPen('шариковая ручка', 30);
$penOne->setMake('noname');
$penOne->setInk('синий');
$penOne->printDescription();
echo '<br/>';
echo '<br/>';





// Утка

class NewDuck implements NewProduct
{
	protected $title;
	protected $price;
	protected $make = 'не указан';
	protected $model = 'не указана';
	private $name = 'не указано';

	public function __construct($title, $price)
	{
		$this->title = $title;
		$this->price = $price;
	}
	public function setTitle($title)
	{
		$this->title = $title;
	}
	public function setPrice($price)
	{
		$this->price = $price;
	}
	public function setMake($make)
	{
		$this->make = $make;
	}
	public function setModel($model)
	{
		$this->model = $model;
	}
	public function getPrice($price)
	{
		return $this->price;
	}
  public function setName($name)
	{
		$this->name = $name;
	}
  public function printDescription()
	{
		echo '<b>наименование товара:</b> '.$this->title.', <b>производитель:</b> '.$this->make.', <b>модель:</b> '.$this->model.', <b>имя:</b> '.$this->name.', <b>цена:</b> '.$this->price.' руб.';
	}
}

echo '<h4>Утка</h4>';

$donaldDuck = new NewDuck('утка', 1000000);
$donaldDuck->setMake('Warner Brothers');
$donaldDuck->setName('Donald Duck');
$donaldDuck->printDescription();
echo '<br/>';
echo '<br/>';
