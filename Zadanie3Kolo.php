<?php
/**
 * Created by PhpStorm.
 * User: X230 Tablet
 * Date: 2015-12-18
 * Time: 17:31
 */
/*Zadanie 3. Dziedziczenie - koło.
Stwórz kasę koło która ma spełniać następujące wymogi:
1. Dziedziczyć po kształcie
2. Mieć dodatkowy atrybut promień
3. Posiadać konstruktor przyjmujący zmienne, określające wartości x, y, kolor i promień. Pamiętaj o sprawdzeniu czy podane zmienne są liczbami (jeżeli nie są to nastaw oba na 0), a kolor napisem. Konstruktor powinien wypisywać informacje o właśnie stworzonym okręgu.
4. Posiadać destruktor który wypisuje informacje o niszczonym okręgu.
5. Posiadać funkcję dostępu (get, set) do promienia,
6. Nadpisywać funkcje kształtu (nadpisz tylko te które tego wymagają).
7. Posiadać funkcję zwracającą pole powierzchni.
8. Posiadać funkcję zwracającą obwód.*/

?>

    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<?php
define('NumberPi', 3.1415);

class Shape
{
    private $x;
    private $y;
    private $color;

    public function __construct($x, $y, $color)
    {
        $this->x = is_numeric($x) ? $x : 0;
        $this->y = is_numeric($y) ? $y : 0;
        $this->color = is_string($color) ? $color : 'black';
    }


    public function getX()
    {
        return $this->x;
    }

    public function setX($x)
    {
        $this->x = $x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function setY($y)
    {
        $this->y = $y;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function __toString()
    {
        return 'X: ' . $this->x . ', Y: ' . $this->y . ', color: ' . $this->color;
    }

    public function calculateDistance(Shape $shape)
    {
        return sqrt(
            pow(($this->getX() - $shape->getX()), 2) +
            pow(($this->getY() - $shape->getY()), 2)
        );
    }
}


class Circle extends Shape
{


    var $circumference;

    /*    public  const NumberPi = 3.1415;*/
    private $radius;


    public function getRadius()
    {
        return $this->radius;
    }


    public function setRadius($radius)
    {
        $this->radius = $radius;
    }


    public function __construct($x, $y, $color, $radius)
    {
        parent::__construct($x, $y, $color);
        $this->radius = is_numeric($radius) ? $radius : 0;
        echo("<br>Tworzę obiekt koło <br>");
        echo 'położenie x = ' . $this->getX() . '<br>';
        echo 'położenie y = ' . $this->getY() . '<br>';
        echo 'kolor  ' . $this->getColor() . '<br>';
        echo 'promień r = ' . $this->getRadius() . '<br>';
        echo '<hr>';
    }

    public function ShowSurfaceArea()
    {
        $circleSurfaceArea = pow(NumberPi * $this->getRadius(), 2);
        echo 'Powierzchnia koła o promieniu ' . $this->getRadius() . ' i kolorze ' . $this->getColor() . ' wynosi ' . $circleSurfaceArea . '<br>';
    }

    public function ShowCircumference()
    {
        $circumference = (NumberPi * 2 * ($this->getRadius()));
        echo 'Obwód koła o promieniu ' . $this->getRadius() . ' wynosi ' . ' i kolorze ' . $this->getColor() . ' wynosi ' . $circumference . '<br>';
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        echo("<br>niszczę obiekt shape <br>");
    }

}

$shape1 = new Circle(3, 4, 'red', 3);

var_dump($shape1);
echo $shape1->ShowSurfaceArea($shape1);
echo $shape1->ShowCircumference($shape1);


?>