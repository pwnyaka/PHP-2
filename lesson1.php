<?php

class Country
{
    private static $countOfInfectedCountries = 0;
    private $name;
    private $population;

    public function __construct($name = null, $population = null)
    {
        $this->name = $name;
        $this->population = $population;
    }


    public function closeBorders()
    {
        echo "{$this->name} закрывает свои границы!<br>";
    }

    public function martialLaw()
    {
        echo "{$this->name} объявила военное положение!<br>";
    }

    public function increaseInfectedCountries()
    {
        return static::$countOfInfectedCountries += 1;
    }

    public function getCountryName()
    {
        return $this->name;
    }
}

class Virus
{
    protected $name;
    protected $infectiousnes;
    protected $danger;
    protected $mortality;

    public function __construct($name = null, $infectiousnes = null, $danger = null, $mortality = null)
    {
        $this->name = $name;
        $this->infectiousnes = $infectiousnes;
        $this->danger = $danger;
        $this->mortality = $mortality;
    }


    function mutate()
    {
        echo "Вирус {$this->name} мутировал<br>";
    }

    function infectCountry(Country $country)
    {
        echo "Вирус {$this->name} заразил страну {$country->getCountryName()}<br>";
        $count = $country->increaseInfectedCountries();
        echo "Всего заражено стран: {$count}<br>";
    }


}

class CoronaVirus extends Virus
{
    public $humanityPanic;

    public function __construct($name = null, $infectiousnes = null, $danger = null, $mortality = null, $humanityPanic = null)
    {
        parent::__construct($name, $infectiousnes, $danger, $mortality);
        $this->humanityPanic = $humanityPanic;
    }

    public function panicCountry(Country $country)
    {
        if ($country->getCountryName() != "Россия") {
            echo "Вирус {$this->name} вызвал панику в стране {$country->getCountryName()}<br>";
        } else {
            echo "На вирус {$this->name} в стране {$country->getCountryName()} совершенно всем плевать, полное спокойствие и хладнокровие.<br>";
        }
    }
}

$germany = new Country("Германия", 82790000);
$china = new Country("Китай", 1386000000);
$italy = new Country("Италия", 60480000);
$russia = new Country("Россия", 144500000);
$ebolaVirus = new Virus("Эбола", 0.4, 0.9, 0.45);
$covid19 = new CoronaVirus("CoVid-19", 0.85, 0.6, 0.05, 1);

$ebolaVirus->mutate();

$covid19->infectCountry($china);
$covid19->panicCountry($china);
$covid19->infectCountry($germany);
$covid19->panicCountry($germany);
$covid19->infectCountry($russia);
$covid19->panicCountry($russia);

// пункт 5

//class A {
//    public function foo() {
//        static $x = 0; //первое: здесь х является не статическим свойством класса А, а получается статической локальной переменной,
//        // значение которой сохраняется и второе: метод foo() существует в единственном экземпляре, т.к. класс один, независимо от кол-ва
//        //экземпляров класса А, в него будет прокидывается разный this
//        echo ++$x;
//    }
//}
//$a1 = new A();
//$a2 = new A();
//$a1->foo(); //1
//$a2->foo(); //2
//$a1->foo(); //3
//$a2->foo(); //4

//пункт 6

//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//class B extends A { // здесь уже создается второй класс, соответственно второй метод foo(), в каждом из них будет своя
//    // статическая переменная x
//}
//$a1 = new A();
//$b1 = new B();
//$a1->foo(); //1
//$b1->foo(); //1
//$a1->foo(); //2
//$b1->foo(); //2

//пункт 7

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A; // результат будет тот же, что в п. 6, при отсутствии аргументов в конструкторе класса круглые скобки после
//названия класса можно опустить, фактически без скобок не вызывается функция конструктор как я понял
$b1 = new B;
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();
